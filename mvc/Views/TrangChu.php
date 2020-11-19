<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
    <style type="text/css">
    </style>
    <?php require_once "mvc/Views/setup-link-and-script.php"; ?>
    
</head>
<body>

    <!-- Nhật -->
    <div class="main-sec inner-page">
        <!-- //header -->
        <?php require_once "mvc/Views/Layout/header.php"; ?>
        <!-- //header -->
    </div>
    <!-- //banner-->
    <!--/banner-bottom -->
    <div class="container-fluid">
            <?php
              require_once "mvc/Views/".$data["page"].".php"; // nếu trang Home sẽ load DSPT-TRangChu.php, nêú bấm xem chi tiết thì sẽ load TrangChu/XemChiTiet.php
             ?>
            <?php if(isset($_SESSION["user_id"])){ ?>
                <?php require_once "mvc/Views/ChatRealtime/chatElements.php"; ?>
            <?php } ?>
    </div>

    <div class="popup-box chat-popup" id="qnimate" style="border: 3px solid black;">
                  <div class="popup-head">
                    
                    <div class="popup-head-left pull-left">
                    </div>
                
                          <div class="popup-head-right pull-right">
                            <div class="btn-group">
                                          <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                                           <i class="glyphicon glyphicon-cog"></i> </button>
                                          <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="#">Media</a></li>
                                            <li><a href="#">Block</a></li>
                                            <li><a href="#">Clear Chat</a></li>
                                            <li><a href="#">Email Chat</a></li>
                                          </ul>
                            </div>
                            
                            <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
                          </div>
                  </div>
                <div class="popup-messages" style="overflow: auto">
                <?php 
                    $a = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
                 ?>
                <input type="hidden" name="my_id" id="my_id" value="<?php echo $a; ?>"> 
                <div class="col-md-12" id="messages" style="margin-top: 5px; margin-bottom: 15px;">
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

                        

                    </div>
                
                
                
                
                
                
                
                
                
                
                
                </div>
                <div class="popup-messages-footer">
                <!-- <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea> -->
                
                            <!-- <input type="submit" name="submit" value="Gửi"> -->
                        
                <div class="btn-footer">
                    <div class="input-text col-md-12">
                            <input type="text" name="message" class="submit col-md-12" style="border: 3px solid black;" id="typeMessage" placeholder="Enter to send Message">
                            <!-- <input type="submit" name="submit" value="Gửi" class="col-md-2 btn btn-primary" style="margin-left: 10px; margin-top: 9px; width: 100%; height: 100%;"> -->
                    </div>
                <!-- <button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
                <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button> -->
                </div>
                </div>
          </div>
     
    <!--//shipping
     footer -->
    <?php require_once "mvc/Views/Layout/footer.php"; ?>
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p>© 2020 Phòng trọ. All rights reserved | Design by 
            <a href="#"> Herry.</a>
        </p>
    </div>
    <!-- //copyright -->
    <!-- Nhật -->

    <!-- Hải -->
    
</body>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
</script>
<script type="text/javascript" src="public/js/chatbox.js"></script>
</html>