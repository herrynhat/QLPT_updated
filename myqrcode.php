<?php 
	require_once './mvc/core/vendor/phpqrcode/qrlib.php';
	require_once './mvc/core/vendor/autoload.php';
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$time = strtotime(date('y-m-d H:i:s'));
	// echo $_SESSION["username"];
	// echo $_SESSION["password"];
	$text = $_SESSION["username"];
	$text .= $_SESSION["password"];
	echo $text;
	$user = (new MongoDB\Client)->phongtrodb->users;
	$user->updateMany(['user_id' => ['$ne' => null]],['$set' => ['qrcode_expire' => $time + 3600]]);
	// echo '<br>';
	// $vitri = strpos($text, '-');
	// echo substr($text, $vitri + 1);
	// echo '--' . substr($text, 0, $vitri - 1);


	$fileName = md5(uniqid()).'.png';
	$tempDir = './public/imagesQR/';
	$filePath = $tempDir . $fileName;
	$a = QRCode::png($text, $filePath);
	if(file_exists($filePath))
	{
		echo '<a href="./'.$filePath.'" download="download qr code">';
			echo '<img src="./'.$filePath.'" />';
		echo '</a>';
	}
 ?>