<?php 
	require_once "./mvc/core/vendor/autoload.php";
	require_once "./mvc/core/DB.php";
	require_once "./mvc/Models/User.php";
	require_once "./mvc/Models/Message.php";

	
	 // require_once './mvc/Models/Message.php';
  //   $messageModel = new Message;
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$timestamp = strtotime(date("Y-m-d H:i:s"));
	$time = $timestamp - 5;
	$datetime = date("Y-m-d H:i:s", $time);


	$message = new Message;
    $usermodel = new User;
    $users = $usermodel->getFriendsOfUser($_SESSION["user_id"]);

	$userCollection = (new MongoDB\Client)->phongtrodb->users;
	function time_elapsed_B($secs){
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

    echo '<div id="aboutFriend" style="width: 320px;">';
        echo '<h3 class="text-center">Thông báo tin nhắn</h3>';
        echo '<div class="text-center" style="width: 300px; ">';
            echo '<div class="row" id="alert-message" style="width: 100%;">';
                for($i = 0; $i < count($users); $i++){
                    if($message->countMessageNoRead($users[$i]) > 0){
                    echo $message->countMessageNoRead($users[$i]); ?> tin nhắn mới từ <?php echo $usermodel->showUser($users[$i])->name;
                }}
            
            echo '</div>';
        echo '</div>';
    echo '</div>';

	if($_POST["action"] == "update_time")
	{
		$userCollection->updateOne(
			['user_id' => $_SESSION["user_id"]],
			['$set' => ["last_login" => date("Y-m-d H:i:s")]]
		);
	}

	if($_POST["action"] == "fetch_data")
	{
		$friend_id = 0;
		$users = $userCollection->find(
			['user_id'=>$_SESSION["user_id"]]
		);
		echo '<table id="friends_table">';

		echo '<tr><th>Friends</th><th>Status</th></tr>';
		foreach($users as $u)
		{
			foreach($u->relationship as $r)
			{

				if($r->status == "f")
				{
					// echo $r->friend_id . '<br>';
					echo '<tr>';
					$friend = $userCollection->findOne(['user_id' => $r->friend_id]);
					if(strtotime($friend->last_login) > $time){
						if($friend->name == "qakhudaubuon")
						{
							echo '<td><button class="nhanvao addClass" id="'.$friend->user_id.'" friend_name="'.$friend->name.'">Chủ phòng trọ</button></td>';
							echo '<td>Online</td>';	
						}
						else
						{
							echo '<td><button class="nhanvao addClass" id="'.$friend->user_id.'" friend_name="'.$friend->name.'">'.$friend->name.'</button></td>';
							echo '<td>Online</td>';	
						}
						
					}
					else
					{
						echo '<td><button class="nhanvao addClass" id="'.$friend->user_id.'" friend_name="'.$friend->name.'" >' . $friend->name.'</button></td>';
						echo '<td>Đã hoạt động '.time_elapsed_B($timestamp - strtotime($friend->last_login)).'</td>';
					}
					echo '</tr>';
				}
			}
		}
		echo '</table>';

		// foreach($users as $u)
		// {
		// 	foreach($u->relationship as $r){
		// 		$friend_id = $r->friend_id;
		// 	}
		// 	$friend = $userCollection->findOne(['user_id' => $friend_id]);

		// 	if(strtotime($u->last_login) > $time)
		// 	{
		// 		// echo $u->last_login . '--' . $datetime . '<br>';
		// 		echo '<button class="nhanvao" friend_name="'.$friend->name.'" id="'.$friend->user_id.'">'.$friend->name.'</button>' . ' đang online';
		// 		echo '<br>';
		// 	}
		// 	else
		// 	{
		// 		// $distance = $timestamp - strtotime($u->last_login);
		// 		// echo $timestamp . '<br>';
		// 		// echo $time . '<br>';
		// 		// echo $distance . '<br>';
		// 		echo $u->name . ' đã hoạt động ' . time_elapsed_B($timestamp - strtotime($u->last_login)) . '<br>';
		// 	}
			
		// }





	}
 ?>
 <script type="text/javascript">
 	$(".nhanvao").on("click", function(){
		friend_id = $(this).attr("id");
		chutro_id = 0;
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