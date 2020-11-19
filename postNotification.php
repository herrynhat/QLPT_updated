<?php 
	require_once "mvc/core/vendor/autoload.php";
	session_start();
	$notificationCollection = (new MongoDB\Client)->phongtrodb->notification;
	$username = $_SESSION["user_id"];
	$options = array(
		    'cluster' => 'eu',
		    'useTLS' => true
		  );
		  $pusher = new Pusher\Pusher(
		    'ed3cf9bac608e3b56afa',
		    'aac2cefbec89dc1447e9',
		    '1088393',
		    $options
		  );
		  $data["content"] = isset($_POST["thongbao"]) ? $_POST["thongbao"] : "";
		  $data["username"] = $username;

		  // $newNotification = $notificationCollection->insertOne(
		  // 	[
		  // 		"notifiId" => 1,
		  // 		"user_post_notification" => $username,
		  // 		"content" => isset($_POST["thongbao"]) ? $_POST["thongbao"] : "",
		  // 		"user_read" => []
 		 //  	]
		  // );
		  $notifiDetail = $notificationCollection->findOne(["notifiId" => 1]);
		  // echo in_array(1, $notifiDetail->user_read);
		  print_r(gettype($notifiDetail->user_read->bsonSerialize()));
		  print_r($notifiDetail->user_read->bsonSerialize());
		  echo in_array(5, $notifiDetail->user_read->bsonSerialize());
		  

		  // $update = $notificationCollection->updateOne(
		  // 	["notifiId" => 1], 
		  // 	['$push' => ["user_read" => 1]]
		  // );

		  $pusher->trigger('my-channel', 'my-event', $data);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<button>Thông báo<span class="pending">0</span></button>
 </body>
 </html>