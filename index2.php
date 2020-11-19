<?php 
	require_once "./mvc/core/vendor/autoload.php";
	require_once "./mvc/core/DB.php";
	$userCollection = (new MongoDB\Client)->phongtrodb->users;
	// $users = $userCollection->countDocuments(
	// 	[
	// 		'$or'=>[
	// 		['$and' =>[ ['user_id' => 1], ['relationship' => ['friend_id' => 2, 'status' => "p"]] ]],
	// 		['$and' =>[ ['user_id' => 2], ['relationship' => ['friend_id' => 1, 'status' => "p"]] ]]
	// 	]]
	// );
	
	require_once './mvc/Models/Message.php';

    $abc = [];
    $arr = $userCollection->aggregate([ 
    	['$unwind' => '$relationship'],
    	['$match' => [
    		'user_id' => $_SESSION['user_id'],
    		'relationship.status' => "f"
    	] ]
    	 ]);
    foreach($arr as $a)
    {
    	$b = $a->relationship->bsonSerialize();
    	// echo $b->friend_id . '<br>';
    	array_push($abc, $b->friend_id);
    }
    // foreach($abc as $c)
    // {
    // 	echo $c["user_id"] . '<br>';
    // }
    $i = 0;
   $userNotFriends = $userCollection->find(
    [
        '$and' => 
        [
            ['user_id' => ['$nin' => $abc]],
            ['user_id' => ['$ne' => $_SESSION['user_id']] ]
        ]
    ]
            
   );
   foreach($userNotFriends as $nf)
   {
    echo $nf->username . '<br>';
   }
   
   
    
 ?>