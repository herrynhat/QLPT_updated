<?php 
	require_once "mvc/core/vendor/autoload.php";

	$client = new MongoDB\Client;
	$phongtrodb = $client->phongtrodb->users;
	$result = $phongtrodb->findOne(['username'=>'qakhudaubuon12@gmail.com']);
	// echo $result["user_id"];
	
	$messageCollection = $client->phongtrodb->message;
	// $messageCollection->insertMany([
	// 	[
	// 		"from"=> 1,
	// 		"to" => 3
	// 	],
	// 	[
	// 		"from" => 1,
	// 		"to" => 2
	// 	]
	// ]);
	$result2 = $client->phongtrodb->message->find(["from"=>1, "to"=>3]);
	foreach($result2 as $r2)
	{
		echo $r2["to"];
	}

	// $array = $result['laravel-chat'];
	// print_r(count($array));
 ?>