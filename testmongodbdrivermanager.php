<?php 
	$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$filter = ["user_id"=>['$ne'=>'1']];
	$options = [
		// "projection" => ["_id" => 0],
	];
	$query = new MongoDB\Driver\Query($filter, $options);
	$row = $mongo->executeQuery('phongtrodb.users', $query);
	foreach($row as $r)
	{
		print_r($r->name);
	}
 ?>