<?php
if(!isset($_SESSION["admin"]))
{
  echo '<script>window.location.href="../../Login/getFormLogin"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nhà trọ | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block float-right">
        <a href="../../Admin/Home" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block float-right">
        <a href="../../Login/logout" class="nav-link">Đăng xuất</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block float-right">
        <a href="../../ChatRealtime/getChatView" class="nav-link">Message</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Nhà Trọ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Herry</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý phòng trọ
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../QuanLyPhongTro/ThemPhongTro" class="nav-link">
                  <p>Thêm phòng trọ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../QuanLyPhongTro/XemDSPhong" class="nav-link">
                  <p>Xem danh sách phòng trọ</p>
                </a>
              </li>
              
            </ul>
          </li> 
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý thiết bị
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../QuanLyThietBi/ThemThietBi" class="nav-link">
                  <p>Thêm thiết bị</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../QuanLyThietBi/XemDSThietBi" class="nav-link">
                  <p>Xem danh sách thiết bị</p>
                </a>
              </li>
            </ul>
          </li> 
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý khách thuê
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../QuanLyKhachThue/XemDSKhachThue" class="nav-link">
                  <p>Xem danh sách khách thuê</p>
                </a>
              </li>
              
            </ul>
          </li> 
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý thuê phòng
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../QuanLyThuePhong/ThemPhieuThue" class="nav-link">
                  <p>Thêm phiếu thuê phòng</p>
                </a>
              </li> 
            </ul>
          </li> 
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý trả phòng
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../QuanLyTraPhong/ThemPhieuTraPhong" class="nav-link">
                  <p>Thêm phiếu trả phòng</p>
                </a>
              </li>
            </ul>
          </li> 
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý thu tiền
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../QuanLyThuTien/ThemPhieuThu" class="nav-link">
                  <p>Thêm phiếu thu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../QuanLyThuTien/XemDSPhieuThu" class="nav-link">
                  <p>Xem danh sách phiếu thu</p>
                </a>
              </li>
              
            </ul>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <?<?php 
      require_once "./mvc/Views/Admin/".$data["page"].".php";
     ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="#">Herry</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- overlayScrollbars -->
<script src="../../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

</body>
</html>
