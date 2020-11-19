<?php 
    require_once './mvc/Models/Message.php';
    $messageModel = new Message;
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="">

	<!-- Script -->
	<!-- <script type="text/javascript" src="../public/js/app.js"></script> -->

	<!-- css -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/app.css">
	 <style type="text/css">
        ul
        {
            margin: 0;
            padding: 0;
        }
        li
        {
            list-style: none;
        }
        .user-wrapper, .message-wrapper{
            border: 1px solid #dddddd;
            overflow-y: auto;
        }
        .user-wrapper{
            height: 600px;

        }
        .user
        {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }
        .user:hover
        {
            background: #eeeeee;
        }
        .user:last-child
        {
            margin-bottom: 0;
        }
        .pending
        {
            position: absolute;
            top: 5px;
            left: 13px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;

        }
        .media-left
        {
            margin: 0 10px;
        }
        .media-left img
        {
            width: 64px;
            border-radius: 64px;

        }
        .media-body p
        {
            padding: 10px;
            margin: 6px 0;
        }
        .message-wrapper
        {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }
        .messages .message:last-child
        {
            margin-bottom: 0;
        }
        .received, .sent
        {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;

        }
        .received
        {
            background: #ffffff;

        }
        .sent
        {
            background: #3bebff;
            float: right;
            text-align: right;
        }
        .message p
        {
            margin: 5px 0;
        }
        .date 
        {
            background: #eeeeee;
            color: #777777;
            font-size: 12px;

        }
        .active {
            background: #eeeeee;

        }
        input[type=text]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid  #eeeeee;

        }
        input[type=text]:focus
        {
            border: 1px solid #aaaaaa;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
	<div id="app">
		
        <main class="py-4">
            	<div class="content">
		<div class="container-fluid">
		    <div class="row">
		        <div class="col-md-4">
		            <div class="user-wrapper">
		                <ul class="users">
		                	<?php
		                    	foreach($data["users"] as $u){
                                    if($u->user_id != $_SESSION["user_id"]){
		                    ?>
		                    <li class="user">
		                    	
		                        <input type="hidden" name="my_id" id="my_id" value="<?php echo $_SESSION['user_id']; ?>"> 
		                        <a type="button" class="chatWith" data-userId="<?php echo $u->user_id; ?>" id="<?php echo $u->user_id; ?>">
		                            
		                            <span class="pending">
                                        <?php 
                                            
                                            $count = $messageModel->countMessageNoRead($u->user_id);
                                            echo $count;
                                         ?>      
                                    </span>
		                            

		                        <div class="media">
		                            <div class="media-left">
		                                <img src="https://via.placeholder.com/150" alt="user image" class="media-object">
		                            </div>

		                            <div class="media-body">
		                                <p class="name"><?php echo $u->name; ?></p>
		                                <p class="email"><?php echo $u->username; ?></p>
		                            </div>
		                        </div>
		                        </a>
		                    </li>
		                	<?php }} ?>
		                </ul>
		            </div>
		        </div>

		        <div class="col-md-8" id="messages">
		            <div class="message-wrapper">
		                <ul class="messages">
		                    <!-- <li class="message clearfix">
		                        <div class="sent">
		                            <p>Lorem ispum</p>
		                            <p class="date">1 sep 2020</p>
		                        </div>
		                    </li>

		                    <li class="message clearfix">
		                        <div class="received">
		                            <p>Lorem ispum</p>
		                            <p class="date">1 sep 2020</p>
		                        </div>
		                    </li> -->
		                </ul>
		            </div>

		            <div class="input-text">
		                <input type="text" name="message" class="submit">
		                <input type="submit" name="submit" value="Gửi">
		            </div>

		        </div>
		    </div>
</div>
	</div>
        </main>
    </div>
</div>
</body>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	let my_id = $('#my_id').val();
	let user_id = 0;
	$(document).ready(function(){

		$(".chatWith").on("click", function(){

            $('.chatWith').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

			user_id = $(this).attr("data-userId");
			$.get("../ChatRealtime/chatWith/" + user_id, function(data){
				$(".messages").html(data);
                scrollToBottomFunc();
			});
		});

        Pusher.logToConsole = true;

        var pusher = new Pusher('ed3cf9bac608e3b56afa', {
          cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          alert(JSON.stringify(data));
          if(data["from"] == my_id)
          {
            $('#' + data["to"]).click();
            // alert("Tao da click");
          }
          else if(my_id == data["to"])
          {
            // alert(user_id); // 1
            // alert(my_id);
            if(data["from"] == user_id)
            {
                $('#' + data["from"]).click();
                // alert("Yes");
            }
            else
            {
                var pending = parseInt($("#" + data["from"]).find(".pending").html());
                alert(pending);
                if(pending)
                {
                    $("#" + data["from"]).find(".pending").html(pending + 1);
                }
                else
                {
                    $("#" + data["from"]).append('<span class="pending">1</span>');
                }
            }
          }
        });

    $(document).on("keyup", ".input-text input", function(e){
        let message = $(this).val();
        if(e.keyCode == 13 && message != '' && user_id != '')
        {
            let dataStr = "received_id=" + user_id + "&message=" + message;
            $.ajax({
                        type: "post",
                        url: "../ChatRealtime/sendMessage",
                        data: dataStr,
                        cache: false,
                        success: function(data)
                        {

                        },
                        error: function(jqXHR, status, err)
                        {

                        },
                        complete: function(){
                            
                        }
                    });
        }
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }

	});
</script>
</html>