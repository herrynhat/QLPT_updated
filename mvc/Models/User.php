<?php 
	class User extends DB
	{
		public function showUser($user_id)
		{
			$user = $this->userCollection->findOne(['user_id' => $user_id]);
			return $user;
		}
		public function createNewUser($username, $password){
			$lastIdCollection = (new MongoDB\Client)->phongtrodb->last_id_collection;
			$getId = $lastIdCollection->findOne([
				'id'=>"last_id_for_collection"
			]);
			$document = array(
				"username" =>  $username,
				"name" => "user_" . $getId->user_id,
				"user_id" => $getId->user_id + 1,
				"password" => $password,
				"last_login" => date("Y-m-d H:i:s"),
				"relationship" => [],
				"phanquyen" => 1, //khachthue
			);

			$result = $this->userCollection->insertOne($document);
			$lastIdCollection->updateOne(
				["id" => "last_id_for_collection"],
				['$set' => ['user_id' => $getId->user_id + 1]]
			);

			$this->userCollection->updateOne(
				['user_id' => 0],
				['$push' => ['relationship' => [
					'friend_id' => $getId->user_id + 1,
					'status' => "f"
				]]]
			);
			echo 'Register Successfully';
		}

		public function checkForLogin($username, $password)
		{
			// $userCollection = (new MongoDB\Client)->phongtrodb->users;
			// $this->filter =['$and' => [['username'=> $username], ['password'=>$password]]];
			// $this->options = [];
			$result = $this->userCollection->findOne(['username'=>$username, 'password'=>$password]);
			if($result)
			{
				// $_SESSION["username"] = $username;
				// $_SESSION["password"] = $password;
				// $_SESSION["user_type"] = "user";
				// echo $_SESSION["username"];

					// echo $r->username . '<br>';
					// $_SESSION["user_id"] = $r->user_id;
					// $_SESSION["name"] = $r->name;
					$_SESSION["phanquyen"] = $result->phanquyen;
					// echo $r->user_id;
					if($_SESSION["phanquyen"]==0) //admin
					{
						$_SESSION["admin"] = $result->user_id;
						echo '<script>window.location.href="../Admin/Home";</script>';
					}
					else
					{
						echo '<script>window.location.href="../";</script>';
					}
					$_SESSION["user_id"] = $result->user_id;
					$_SESSION["name"] = $result->name;
					$_SESSION["username"] = md5($result->username);
					$_SESSION["password"] = md5($result->password);
 			}
			else
			{
				echo '<script>window.location.href="../Login/getFormLogin";</script>';
			}
		}
		public function getAllUserWithoutUserLogin(){
			$my_id = $_SESSION['user_id'];
			$this->filter = ["user_id"=>['$ne'=>$my_id]]; // not equal
			$this->query = new MongoDB\Driver\Query($this->filter, $this->options);
			$users = $this->mongoConnection->executeQuery("phongtrodb.users", $this->query);
			return $users;
		}

		public function sendFrRequest($from, $to){
			$this->userCollection->updateOne(
						['user_id' => (int)$from],
						['$push' => ['relationship' => [
							'friend_id' => (int)$to,
							'status' => "s"
						]]]
			);
			$this->userCollection->updateOne(
						['user_id' => (int)$to],
						['$push' => ['relationship' => [
							'friend_id' => (int)$from,
							'status' => "r"
						]]]
			);

		}

		public function acceptFriendRequest($from, $to){
			$update = $this->userCollection->findOneAndUpdate(
				['$and' =>[ ['user_id' => (int)$from], ['relationship' => ['friend_id' => (int)$to, 'status' => "s"]] ]],
				['$set' => ['relationship.$.status' => "f"] ] 
			);

			$this->userCollection->findOneAndUpdate(
				['$and' =>[ ['user_id' => (int)$to], ['relationship' => ['friend_id' => (int)$from, 'status' => "r"]] ]],
				['$set' => ['relationship.$.status' => "f"] ] 
			);
		}

		// mới sửa ngày 30/10/20208
		public function getFriendsOfUser($user_login)
		{
			$abc = [];
		    $arr = $this->userCollection->aggregate([ 
		    	['$unwind' => '$relationship'],
		    	['$match' => [
		    		'user_id' => $user_login,
		    		'relationship.status' => "f"
		    	] ]
		    	 ]);
		    foreach($arr as $a)
		    {
		    	$b = $a->relationship->bsonSerialize();
		    	// echo $b->friend_id . '<br>';
		    	array_push($abc, $b->friend_id);
		    }
		    return $abc;
		}

		public function getUserAreNotFriends($userlogin_id){
			$abc = [];
		    $arr = $this->userCollection->aggregate([ 
		    	['$unwind' => '$relationship'],
		    	['$match' => [
		    		'user_id' => $userlogin_id,
		    		'relationship.status' => "f"
		    	] ]
		    	 ]);
		    foreach($arr as $a)
		    {
		    	$b = $a->relationship->bsonSerialize();
		    	// echo $b->friend_id . '<br>';
		    	array_push($abc, $b->friend_id);
		    }
			$userAreNotFriends = $this->userCollection->find(
				[
			        '$and' => 
			        [
			            ['user_id' => ['$nin' => $abc]],
			            ['user_id' => ['$ne' => $userlogin_id] ]
			        ]
			    ]
			);
			return $userAreNotFriends;
		}

		public function checkIfSender($a){
			$result = '';
			$b = $this->userCollection->findOne([
				'$and' => [
					['user_id' => $a],
					['relationship' => ['friend_id' => $_SESSION["user_id"], 'status'=>"s"]]
					]
				]);
			return $b;
		}

		public function checkIfReceiver($a){
			$result = '';
			$b = $this->userCollection->findOne([
				'$and' => [
					['user_id' => $a],
					['relationship' => ['friend_id' => $_SESSION["user_id"], 'status'=>"r"]]
					]
				]);
			return $b;
		}

		public function loginQrCode($contentqrcode)
		{
			$a = 0;
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$time = strtotime(date('y-m-d H:i:s'));
			$result = $this->userCollection->findOne(['qrcode' => $contentqrcode]);
			if($result)
			{
				if($time <= $result->qrcode_expire){
				// $_SESSION["username"] = $username;
				// $_SESSION["password"] = $password;
				// $_SESSION["user_type"] = "user";
				// echo $_SESSION["username"];

					// echo $r->username . '<br>';
					// $_SESSION["user_id"] = $r->user_id;
					// $_SESSION["name"] = $r->name;
					$_SESSION["phanquyen"] = $result->phanquyen;
					// echo $r->user_id;
					if($_SESSION["phanquyen"]==0) //admin
					{
						$_SESSION["admin"] = $result->user_id;
						// echo '<script>window.location.href="../Admin/Home";</script>';
					}
					else
					{
						// echo '<script>window.location.href="../";</script>';
					}
					$_SESSION["user_id"] = $result->user_id;
					$_SESSION["name"] = $result->name;
					$_SESSION["username"] = md5($result->username);
					$_SESSION["password"] = md5($result->password);
					$a = 1;
					echo $a;
					
				}	
 			}
			else
			{
				// echo '<script>window.location.href="../Login/getFormLogin";</script>';
				$a = 0;
				echo $a;
			}
		}

		
	}
 ?>