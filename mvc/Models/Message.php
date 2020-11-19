<?php 
	class Message extends DB
	{

		public function getMessageFromMeToUser($user_id)
		{
			$my_id = $_SESSION['user_id'];
			$this->filter =['$or' => [
				[ '$and' => [ ['from'=>$my_id], ['to'=>(int)$user_id] ] ],
				 ['$and' => [ ['from'=>(int)$user_id], ['to' => $my_id] ]]
			] ];
			$this->query = new MongoDB\Driver\Query($this->filter, $this->options);
			$message = $this->mongoConnection->executeQuery("phongtrodb.message", $this->query);
			// foreach($message as $m)
			// {
			// 	echo $m->message;
			// }

			$bulk = new MongoDB\Driver\BulkWrite;
			$bulk->update(
			    [ 'from' => (int)$user_id, 'to'=> $my_id, 'is_read' => 0],
			    ['$set' => ['is_read' => 1]],
			    ['multi' => true, 'upsert' => false]
			);

			$result = $this->mongoConnection->executeBulkWrite("phongtrodb.message", $bulk);
			
			return $message;
		}

		public function createMessage($from, $to, $message, $is_read){
			// $messageCollection = (new MongoDB\Client)->phongtrodb->message;
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$document = [
				"from" => $from,
				"to" => (int)$to,
				"message" => $message,
				"is_read" => $is_read
				// "time" => date("Y-m-d H:i:s")
			];
			$this->messageCollection->insertOne($document);
		}

		public function countMessageNoRead($from){
			$count = 0;
			$to = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";
			// $messageCollection = (new MongoDB\Client)->phongtrodb->message;
			$ops = [
				[
					'$lookup' => [
						"from" => "users",
						"localField" => "from",
						"foreignField" => "user_id",
						"as" => "users_doc"
					]
				],
				[
					'$match' => [
						"from" => (int)$from,
						"to" => (int)$to,
						"is_read" => 0
					]
				],
				[
					'$group' => [
						"_id" => null,
						"count" => ['$sum' => 1]
					]
				]


					
			];
			$result = $this->messageCollection->aggregate($ops);
			foreach($result as $r)
			{
				$count = $r["count"];
			}
			return $count;
		}

		public function time_elapsed_B($secs){
		    $bit = array(
		        ' năm'        => $secs / 31556926 % 12,
		        ' tuần'        => $secs / 604800 % 52,
		        ' ngày'        => $secs / 86400 % 7,
		        ' giờ'        => $secs / 3600 % 24,
		        ' phút'    => $secs / 60 % 60,
		        ' giây'    => $secs % 60
		        );
		       
		    foreach($bit as $k => $v){
		        if($v > 1)$ret[] = $v . $k ;
		        if($v == 1)$ret[] = $v . $k;
		        }
		    array_splice($ret, count($ret)-1, 0, 'và');
		    $ret[] = 'trước.';
		   
		    return join(' ', $ret);
		}
	}
 ?>