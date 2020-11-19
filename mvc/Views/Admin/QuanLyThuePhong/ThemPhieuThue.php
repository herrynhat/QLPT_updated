  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm phiếu thuê</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    	<form method="post" action="../QuanLyThuePhong/getThemPhieuThue">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin phiếu thuê</h3>
            </div>
            <div class="card-body">
            	
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
                <label for="ngaythue">Ngày thuê phòng</label>
                <input type="date" id="ngaythue" class="form-control" placeholder="" required="" name="ngaythue">
              </div>
              <div class="form-group">
                <label for="tiencoc">Tiền cọc</label>
                <input type="number" id="tiencoc" class="form-control" placeholder="Nhập tiền cọc" required="" name="tiencoc">
              </div>
              <div class="form-group">
                <label for="ghichu">Ghi chú</label>
                <textarea id="ghichu" class="form-control" rows="4" placeholder="Nhập ghi chú" name="ghichu"></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Thông tin khách thuê phòng</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="hoten">Họ và tên</label>
                <input type="text" id="hoten" class="form-control" placeholder="Nhập tên khách thuê" required="" name="hoten">
              </div>
              <div class="form-group">
                <label for="cmt">Chứng minh thư</label>
                <input type="number" id="cmt" class="form-control" placeholder="Nhập chứng minh thư" required="" name="cmt">
              </div>
              <div class="form-group">
                <label for="gioitinh">Giới tính</label>
                <select class="form-control custom-select" id="gioitinh" name="gioitinh" required="">
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
                </div>
              <div class="form-group">
                <label for="nghenghiep">Nghề nghiệp</label>
                <input type="text" id="nghenghiep" class="form-control" placeholder="Nhập nghề nghiệp" name="nghenghiep">
              </div>
              <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="text" id="sdt" class="form-control" placeholder="Nhập số điện thoại (+84 xxx xxx xxxx)" required="" name="sdt">
              </div>
              <div class="form-group">
                <label for="diachi">Địa chỉ thường trú</label>
                <input type="text" id="diachi" class="form-control" placeholder="Nhập địa chỉ" required="" name="diachi">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <input type="submit" value="Lưu phiếu thuê" class="btn btn-success">
        </div>  
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->