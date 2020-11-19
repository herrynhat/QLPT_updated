<?php 
	session_start();
	if(isset($_SESSION["username"]))
	{
		echo $_SESSION["username"];
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="./postNotification.php">
		<textarea class="thongbao" name="thongbao"></textarea>
		<input type="submit" name="submit" value="Đăng">
		<input type="reset" name="" value="Reset">
	</form>
</body>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		Pusher.logToConsole = true;

	        var pusher = new Pusher('ed3cf9bac608e3b56afa', {
	          cluster: 'eu'
	        });

	        var channel = pusher.subscribe('my-channel');
	        channel.bind('my-event', function(data) {
	        	alert(JSON.stringify(data));
	        });
		$(document).on("keyup", ".thongbao", function(e){
			var thongbao = $(".thongbao").val();

			
			
		});
	});

</script>
</html>