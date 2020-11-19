<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm thiết bị</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="post" action="../QuanLyThietBi/getThemThietBi">
      <div class="row">
       <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin thiết bị</h3>
            </div> 
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên thiết bị</label>
                <input type="text" id="tenthietbi" name="tenthietbi" class="form-control" placeholder="Nhập tên thiết bị" required="">
              </div>
              <div class="form-group">
                <label for="inputStatus">Tên phòng</label>
                <select class="form-control custom-select" id="maphong" name="maphong" required="">
                  <option selected disabled>Chọn phòng</option>
                  <?php
                    $i=1;
                    foreach ($data["data"] as $b) 
                    {
                      ?>
                  <option value="<?php echo $b->maphong; ?>"><?php echo $b->tenphong; ?></option>
                  <?php
                   }
                  ?>
                </select>
                </div>
                <div class="form-group">
                <label for="inputStatus">Tình trạng thiết bị</label>
                <select class="form-control custom-select" id="tinhtrang" name="tinhtrang" required="">
                  <option selected disabled>Chọn tình trạng</option>
                  <option value="Mới">Mới</option>
                  <option value="Đã sử dụng">Đã sử dụng</option>
                  <option value="Cũ">Cũ</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Số lượng</label>
                <input type="number" id="inputSpentBudget" class="form-control" value="1" step="1" id="soluong" name="soluong" required="">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <input type="submit" value="Lưu thiết bị" class="btn btn-success">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->