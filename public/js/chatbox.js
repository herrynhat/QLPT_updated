var my_id = $('#my_id').val() || 0;
    let user_id = 0;
    let friend_id = 0;
    let chutro_id = null;
    let friendClass;
    let name = '';
    let updateTimeOnline;
    let userOnline;
    function openMiniBoxChat(chatWith_id){
                if(my_id == null) // user is logining
                {
                    window.location.href = "Login/getFormLogin";
                }
                $('#addClass').css("display", "none");
                $('#qnimate').addClass('popup-box-on');
                if(chatWith_id == 0)
                {
                    $('.popup-head-left').html("Chủ trọ");
                }
                else
                {
                    $('.popup-head-left').html(name);   
                }
                $.get("ChatRealtime/chatWith/" + chatWith_id, function(data){
                    $(".messages").html(data);
                    scrollToBottomFunc();
                });
                $('#typeMessage').focus();
    }
    function scrollToBottomFunc() 
    {
                $('.popup-messages').animate({
                    scrollTop: $('.popup-messages').get(0).scrollHeight
                }, 100);
    }
    //update thời gian online
            function test(){
            var action = "update_time";
            var date = new Date().toLocaleString();
            $.ajax({
                url: "ReloadEvery3s.php",
                method: "POST",
                data: {action: action},
                success: function(data){
                
                }
            });
            // console.log(date);
            }

            function fetch_user_login_data()
            {
                var action = "fetch_data";
                $.ajax({
                    url: "ReloadEvery3s.php",
                    method: "POST",
                    data: {action: action},
                    success: function(data){
                        $('#user_login_status').html(data);
                    }
                });
            }
    $(document).ready(function(){
        test();
        fetch_user_login_data();
        updateTimeOnline = setInterval(function(){
                    test();
                }, 3000);

                userOnline = setInterval(function(){
                    fetch_user_login_data();
                }, 3000);
        //ĐÓng mở danh sách bạn bè
        $('#openFriendsList').on("click", function(){
            alert("Hello");
            $('#friends_table').css("display", "block");

                updateTimeOnline = setInterval(function(){
                    test();
                }, 3000);

                userOnline = setInterval(function(){
                    fetch_user_login_data();
                }, 3000);
        });
        $('#closeFriendsList').on("click", function(){
            $('#friends_table').css("display", "none");
            clearInterval(updateTimeOnline);
            clearInterval(userOnline);
        });
        Pusher.logToConsole = true;
        var pusher = new Pusher('ed3cf9bac608e3b56afa', {
          cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          // alert(JSON.stringify(data));
          // alert(typeof(data["from"]) + data["from"]);
          // alert(typeof(my_id) + my_id);
          if(data["from"] == my_id)
          {
            if(chutro_id == 0)
            {
                $('#addClass').click(); 
            }
            else
            {
                // friendClass.click();
                $('#' + friend_id).click();
            }
            
          }
          else if(my_id == data["to"])
          {
            // alert(user_id); // 1
            // alert(my_id);
            if(data["from"] == friend_id)
            {
                $('#' + friend_id).click();
            }
            else
            {
                if(data["name"] == "admin")
                {
                    alert("Bạn có tin nhắn mới từ Chủ phòng trọ."); 

                }
                else
                {
                    // alert("Bạn có tin nhắn mới từ " + data["name"] + '.'); 
                //     var pending = parseInt($("#" + data["from"]).find($("#alert_" + data["from"])).html());
                // if(pending)
                // {
                //     $("#" + data["from"]).find("#alert_" + data["from"]).html(pending + 1);
                //     alert(pending);
                // }
                // else
                // {
                //     $("#" + data["from"]).append('<span class="pending">1</span>');
                // }
                var alertMessage = parseInt($('#countNoReadFrom_' + data["from"]).html());
                if(alertMessage)
                {
                    $('#alert-message').html('<div id="'+data["from"]+'"><h5>Bạn có tin nhắn mới từ '+ data["name"] +'</h5><span id="countNoReadFrom_'+data["from"]+'">'+(alertMessage+1) + '</span></div>');    
                    
                }
                else
                {
                    $('#alert-message').append('<div id="'+data["from"]+'"><h5>Bạn có tin nhắn mới từ '+ data["name"] +'</h5><span id="countNoReadFrom_'+data["from"]+'">1</span></div>');
                }

                }
                
            }
            // else
            // {
            //     var pending = parseInt($("#" + data["from"]).find(".pending").html());
            //     alert(pending);
            //     if(pending)
            //     {
            //         $("#" + data["from"]).find(".pending").html(pending + 1);
            //     }
            //     else
            //     {
            //         $("#" + data["from"]).append('<span class="pending">1</span>');
            //     }
            // }
          }
        });



        // $("#addClass").on('click', function () {
  //         $('#qnimate').addClass('popup-box-on');
  //         $('.popup-head-left').html("Chủ trọ");
  //         user_id = $(this).attr("data-userId");
  //         $.get("ChatRealtime/chatWith/" + 1, function(data){
        //      $(".messages").html(data);
  //               scrollToBottomFunc();
        //  });
  //           });
          
            
            $(document).on("keyup", ".input-text input", function(e){
                let message = $(this).val();
                if(e.keyCode == 13)
                {
                    if(chutro_id == 0)
                    {
                        enterToSendMessage(message, 0);
                    }
                    else
                    {
                        enterToSendMessage(message, friend_id);
                    }
                    
                }
            });

            $('#addClass').on('click', function(){
                chutro_id = 0;
                openMiniBoxChat(0);
            });

            $("#removeClass").click(function () {
                $('#qnimate').removeClass('popup-box-on');
                $('#addClass').css("display", "block");
            });

            

            function enterToSendMessage(message, sendto_id){
                $('#typeMessage').val('');
                if(message != '')
                {
                    // alert(message);
                    var dataStr = "received_id=" + sendto_id + "&message=" + message;
                    $.ajax({
                                    type: "post",
                                    url: "ChatRealtime/sendMessage",
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
                
            }

            

            

            

                

                

    });