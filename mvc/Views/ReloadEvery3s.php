<?php 
	// require_once "./mvc/core/vendor/autoload.php";
	// require_once "./mvc/core/DB.php";
	// require_once "./mvc/Models/User.php";
	// require_once "./mvc/Models/Message.php";

	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$timestamp = strtotime(date("Y-m-d H:i:s"));
	$time = $timestamp - 5;
	$datetime = date("Y-m-d H:i:s", $time);

	$message = new Message;
    $usermodel = new User;
    $users = $usermodel->getFriendsOfUser($_SESSION["user_id"]);

    $userCollection = (new MongoDB\Client)->phongtrodb->users;
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<div id="aboutFriend" style="width: 320px; border: 1px solid black;text-overflow: auto;">
 		<h3 class="text-center">Thông báo tin nhắn</h3>
 		<div class="text-center" style="width: 300px; ">
 			<div class="row" id="alert-message" style="width: 100%;">
 				<?php for($i = 0; $i < count($users); $i++){ ?>
 					<?php if($message->countMessageNoRead($users[$i]) > 0){ ?>
 						<p class="ml-4 text-danger"><?php echo $message->countMessageNoRead($users[$i]); ?> tin nhắn mới từ <?php echo $usermodel->showUser($users[$i])->name; ?></p>
 					<?php }} ?>
 			</div>
 		</div>
 	</div>

 	<?php 
 		if($_POST["action"] == "update_time")
		{
			$userCollection->updateOne(
				['user_id' => $_SESSION["user_id"]],
				['$set' => ["last_login" => date("Y-m-d H:i:s")]]
			);
		}
 	?>

 	<?php 
 		if($_POST["action"] == "fetch_data")
		{
			$friend_id = 0;
			$users = $userCollection->find(
				['user_id'=>$_SESSION["user_id"]]
		);
 	?>

 	<table id="friends_table">
 		<tr><th>Friends</th><th>Status</th></tr>
 		<?php 
 			foreach($users as $u)
			{
				foreach($u->relationship as $r)
				{

					if($r->status == "f")
					{
 		?>
 		<tr>
 		<?php
 			$friend = $userCollection->findOne(['user_id' => $r->friend_id]);
					if(strtotime($friend->last_login) > $time){
						if($friend->name == "admin")
						{
 		?>
 		<td><button class="nhanvao addClass" id="<?php echo $friend->user_id; ?>" friend_name="<?php echo $friend->name; ?>">Chủ phòng trọ</button></td>
 		<td>Online</td>
 		<?php 
 						}
						else
						{
 		?>
 		<td><button class="nhanvao addClass" id="<?php echo $friend->user_id; ?>" friend_name="<?php echo $friend->name; ?>"><?php echo $friend->name; ?></button></td>
 		<td>Online</td>
 		<?php 
 						}
						
					}
					else
					{
 		?>
 		<td><button class="nhanvao addClass" id="<?php echo $friend->user_id; ?>" friend_name="<?php echo $friend->name; ?>"><?php echo $friend->name; ?></button></td>
 		<td>Đã hoạt động <?php echo $message->time_elapsed_B($timestamp - strtotime($friend->last_login)); ?></td>
 	<?php } ?>
 	</tr>
 	<?php }}}} ?>
 	</table>

 </body>
 <script type="text/javascript">
 	$(".nhanvao").on("click", function(){
		friend_id = $(this).attr("id");
		chutro_id = null;
		friendClass = $('#' + friend_id);
		name = $(this).attr("friend_name");
   //        $('#qnimate').addClass('popup-box-on');

   //        $('.popup-head-left').html('<img src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" alt="iamgurdeeposahan">'+name+'');

   //        $.get("ChatRealtime/chatWith/" + friend_id, function(data){
			// 	$(".messages").html(data);
   //              // scrollToBottomFunc();
			// });
		    	openMiniBoxChat(friend_id);

          
	});
 </script>
 </html>