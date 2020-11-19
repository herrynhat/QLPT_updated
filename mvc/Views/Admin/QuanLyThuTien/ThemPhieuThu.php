<!-- Content Wrapper. Contains page content -->
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: '../QuanLyThuTien/ajax',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("ajax").innerHTML=response; 
 }
 });
}
</script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm phiếu thu tiền</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="post" action="../QuanLyThuTien/getThemPhieuThu">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin phòng</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">Tên phòng thu tiền</label>
                <select class="form-control custom-select" onchange="fetch_select(this.value);" id="maphong" name="maphong">
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
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
        <div class="col-md-5">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Thông tin thu tiền</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Số điện</label>
                <input type="number" id="sodien" class="form-control" placeholder="Nhập số điện (kW)" onchange="tinhTien();" name="sodien">
              </div>
              <div class="form-group">
                <label for="inputName">Giá điện</label>
                <input type="number" id="giadien" name="giadien" class="form-control" placeholder="" value="2000" step="100" onchange="tinhTien();">
              </div>
              <div class="form-group">
                <label for="inputName">Số nước</label>
                <input type="number" id="sonuoc" class="form-control" placeholder="Nhập số nước (khối)" onchange="tinhTien();" name="sonuoc">
              </div>
              <div class="form-group">
                <label for="inputName">Giá nước</label>
                <input type="number" id="gianuoc" name="gianuoc" class="form-control" placeholder="" value="6000" step="100" onchange="tinhTien();">
              </div>
              <div class="form-group">
                <label for="inputName">Giá phòng</label>
                <input type="number" id="giaphong" name="giaphong" class="form-control" placeholder="Nhập giá phòng"  step="100000" onchange="tinhTien();">
              </div>
              <div class="form-group">
                <label for="tongtien">Tổng tiền</label>
                <input type="number" id="tongtien" class="form-control" required="" name="tongtien">
              </div>
              <div class="form-group">
                <label for="ngaythue">Ngày ghi</label>
                <input type="date" id="ngayghi" class="form-control" placeholder="" required="" name="ngayghi">
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
        <div class="col-md-4" id="ajax">
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <input type="submit" value="Lưu phiếu thu" class="btn btn-success">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  function tinhTien(){
  var sodien = document.getElementById("sodien").value;
  var giadien = document.getElementById("giadien").value;
  var sonuoc = document.getElementById("sonuoc").value;
  var gianuoc = document.getElementById("gianuoc").value;
  var giaphong = document.getElementById("giaphong").value;
  var tongtien=parseFloat(sodien)*parseFloat(giadien) + parseFloat(sonuoc)*parseFloat(gianuoc) + parseFloat(giaphong);
  document.getElementById("tongtien").value=tongtien;   
}
  </script>

