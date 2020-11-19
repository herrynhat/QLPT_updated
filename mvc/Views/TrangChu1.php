
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Trang chủ</title>
    <base href="http://localhost:88/QuanLyPhongTro/">

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Baggage Responsive " />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->

    <link rel="stylesheet" href="public/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="public/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="public/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <!-- Theme style -->
     <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>
    <div class="main-sec inner-page">
        <!-- //header -->
        <header class="py-sm-3 pt-3 pb-2" id="home">
            <div class="container">
                <!-- nav -->
                <div class="top-w3pvt d-flex">
                    <div id="logo">
                        <h1> <a href="index.html"><span class="log-w3pvt">P</span>hòng trọ</a> <label class="sub-des">Tìm kiếm Online</label></h1>
                    </div>

                    <div class="forms ml-auto">
                         <?php if(!isset($_SESSION["user_id"])){ ?>
                         <a href="Login/getFormLogin" class="btn"><span class="fa fa-user-circle-o"></span> Đăng nhập</a>
                        <a href="Register/getFormRegister" class="btn"><span class="fa fa-pencil-square-o"></span> Đăng kí</a>
                    <?php }else{ ?>
                        <a class="btn"><span class="fa fa-user-circle-o"></span> Xin chào <?php echo $_SESSION['name']; ?></a>
                        <a href="Login/logout" class="btn">Đăng xuất</a>
                    <?php } ?>
                    </div>
                </div>
                <div class="nav-top-wthree">
                    <nav>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li><a href="contact.html">Về chúng tôi</a></li>
                        </ul>
                    </nav>
                    <!-- //nav -->
                    <div class="search-form ml-auto">
                        <div class="form-w3layouts-grid">
                            <form action="#" method="post" class="newsletter">
                                &nbsp;&nbsp;&nbsp;
                                <select>
                                    <option selected disabled>Chọn quận</option>
                                      <option value="Quận 1">Quận 1</option>
                                      <option value="Quận 2">Quận 2</option>
                                      <option value="Quận 3">Quận 3</option>
                                      <option value="Quận 4">Quận 4</option>
                                      <option value="Quận 5">Quận 5</option>
                                      <option value="Quận 6">Quận 6</option>
                                      <option value="Quận 7">Quận 7</option>
                                      <option value="Quận 8">Quận 8</option>
                                      <option value="Quận 9">Quận 9</option>
                                      <option value="Quận 10">Quận 10</option>
                                      <option value="Quận 11">Quận 11</option>
                                      <option value="Quận 12">Quận 12</option>
                                      <option value="Quận Bình Tân">Quận Bình Tân</option>
                                      <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                                      <option value="Quận Gò Vấp">Quận Gò Vấp</option>
                                      <option value="Quận Phú Nhuận">Quận Phú Nhuận</option>
                                      <option value="Quận Tân Bình">Quận Tân Bình</option>
                                      <option value="Quận Tân phú">Quận Tân phú</option>
                                      <option value="Quận Thủ Đức">Quận Thủ Đức</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;
                                <select>
                                    <option selected disabled>Chọn giá</option>
                                    <option>Dưới 500k</option>
                                    <option>500k - 700k</option>
                                    <option>Trên 700k</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;
                                <button class="form-control btn" value=""><span class="fa fa-search"></span></button>

                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>
        <!-- //header -->
    </div>
    <!-- //banner-->
    <!--/banner-bottom -->
    <?php 
      require_once "mvc/Views/".$data["page"].".php";
     ?>
    <!--//shipping-->
    <!-- footer -->
    <div class="footer_agileinfo_topf py-5">
        <div class="container py-md-5">


            <div class="w3ls-fsocial-grid">
                <h3 class="sub-w3ls-headf">Follow Us</h3>
                <div class="social-ficons">
                    <ul>
                        <li><a href="https://www.facebook.com/profile.php?id=100005221303731"><span class="fa fa-facebook"></span> Facebook</a></li>
                    </ul>
                </div>
            </div>
            <div class="move-top text-center mt-lg-4 mt-3">
                <a href="#home"><span class="fa fa-angle-double-up" aria-hidden="true"></span></a>
            </div>
        </div>
    </div>
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p>© 2020 Phòng trọ. All rights reserved | Design by 
            <a href="#"> Herry.</a>
        </p>
    </div>
    <!-- //copyright -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->

<!-- overlayScrollbars -->
<script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.js"></script>
</body>
</html>
