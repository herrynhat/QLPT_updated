<?php 
	require_once "./mvc/core/vendor/autoload.php";
	session_start();

	$userCollection = (new MongoDB\Client)->phongtrodb->test;

// $userss = $userCollection->findOneAndUpdate(
// 				['relationship' => ['friend_id' => (int)2, 'status' => "p"]],
// 				['$set' => ['relationship.$.status' => "f"] ] 
// 			);
// var_dump($userss);


	// $userUpdate = $userCollection->updateOne(
	// 	['username' => 'qakhudaubuon12@gmail.com'],
	// 	['$set' => [
	// 		"relationship" => [
	// 			[
	// 				'friend_id' => (int)1,
	// 				'status' => "f"
	// 			]
	// 		]
	// 	]
	// ]

	// 	['$push' => ['relationship' => 
	// 	[
	// 		'friend_id' => (int)2,
	// 		'status' => 'p'
	// 	]
	// ]]
	// );
	// var_dump($userUpdate);

	// --------------------------------------------------------------------------------
	// $user = $userCollection->find(
	// 			['$and' => [ ['user_id' => 2], ['relationship.status' => "f" ]]]
	// 		);
	// foreach($user as $u)
	// {
	// 	echo $u->username;
	// }

	//----------------------------------------------------------------------------------

	$users = $userCollection->find(
		[
			'$and' => [
				['user_id' => ['$ne' => $_SESSION["user_id"]]]
			]
		]
		

	);
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<base href="http://localhost:88/QuanLyPhongTro/">
 </head>
 <body>
 	<div id="friend_request">
 		<input type="hidden" name="" id="user_login" value="<?php echo $_SESSION['user_id']; ?>">
 	</div>
 	<?php foreach($users as $u){ ?>
		
		<?php foreach($u->relationship as $r){ ?>
			<?php if($r->friend_id == $_SESSION["user_id"] && $r->status == "p"){ ?>
				<p><?php echo $u->name; ?> đã gửi cho bạn một lời mời kết bạn.</p>
				<a href="ChatRealtime/acceptFrRequest/<?php echo $u->user_id; ?>/<?php echo $r->friend_id; ?>">Đồng ý</a>
			<?php } ?>
		<?php } ?>


		<?php if(empty($u->relationship->bsonSerialize())){ ?>
			<button class="add-fr" id="<?php echo $u->user_id; ?>"><?php echo $u->name; ?></button>
		<?php } ?>
		<?php foreach($u->relationship as $r){ ?>
			<?php if($r->friend_id != $_SESSION["user_id"]){ ?>
				<button class="add-fr" id="<?php echo $u->user_id; ?>"><?php echo $u->name; ?></button>
			<?php } ?>
		<?php } ?>

	<?php } ?>
 		
 </body>
 <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		var friend_id = '';
 		var user_login = $('#user_login').val();
 		var from_id = 0;
 		var action = "friend_request";

 		Pusher.logToConsole = true;

        var pusher = new Pusher('ed3cf9bac608e3b56afa', {
          cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
        	// alert(JSON.stringify(data));
        	friend_id = data["friend_id"];
        	from_id = data["from_id"];

        	if(user_login == friend_id)
        	{
        		$('#friend_request').append('<h3>You have a friend request</h3><a href="ChatRealtime/acceptFrRequest/'+from_id+ '/' + friend_id +'">Accept Now</a>');
        	}
        	// window.location.href="http://localhost:88/QuanLyPhongTro/friends.php";

        });
 		$('.add-fr').on('click', function(){
 				friend_id = $(this).attr('id');
 				from_id = user_login;
 			$.ajax({
 				type: "post",
 				url: 'ChatRealtime/sendFrRequest',
 				data: {from_id: from_id,friend_id:friend_id, action: action},
 				success: function(){

 				}
 			});
 		});

 		// $('#accept-button').on('click', function(){
 			// $.ajax({
 			// 	type: "post",
 			// 	url: './ChatRealtime/acceptFrRequest',
 			// 	data: {relationship_a: user_login, relationship_b: $('#friend_id_request').val()},
 			// 	success: function(content){
 			// 		alert(content);
 			// 	}
 			// });
 		// 	alert("hello");
 		// });
 	});
 </script>
 </html>