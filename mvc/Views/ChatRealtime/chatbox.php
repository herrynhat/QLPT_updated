<?php 
    
 ?>
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
              require_once "mvc/Views/".$data["page"].".php"; // trangchu.php
             ?>
            <?php require_once "mvc/Views/ChatRealtime/chatElements.php"; ?>
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