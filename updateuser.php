<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<div id="user_login_status">

    </div>
 </body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		function test(){
 			var action = "update_time";
 			var date = new Date().toLocaleString();
 			$.ajax({
 				url: "testAction.php",
 				method: "POST",
 				data: {action: action},
 				success: function(data){
				
 				}
 			});
 			console.log(date);
 		}

 		function fetch_user_login_data()
 		{
 			var action = "fetch_data";
 			$.ajax({
 				url: "testAction.php",
 				method: "POST",
 				data: {action: action},
 				success: function(data){
 					$('#user_login_status').html(data);
 				}
 			});
 		}

 				setInterval(function(){
 					test();
 				}, 3000);

 				setInterval(function(){
 					fetch_user_login_data();
 				}, 3000);

 		
 	});
 </script>
 </html>