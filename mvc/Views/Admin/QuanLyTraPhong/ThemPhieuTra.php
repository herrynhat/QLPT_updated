  <!-- Content Wrapper. Contains page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: '../QuanLyTraPhong/ajax',
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
            <h1>Thêm phiếu trả phòng</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    	<form method="post" action="../QuanLyTraPhong/getThemPhieuTra">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin phiếu trả phòng</h3>
            </div>
            <div class="card-body">
            	
              <div class="form-group">
                <label for="inputStatus">Tên phòng</label>
                <select class="form-control custom-select" id="maphong" name="maphong" onchange="fetch_select(this.value);" required="">
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
                <label for="ngaythue">Ngày trả phòng</label>
                <input type="date" id="ngaytra" class="form-control" placeholder="" required="" name="ngaytra">
              </div>
              <div class="form-group">
                <label for="tiencoc">Tiền cọc hoàn trả</label>
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
        <div class="col-md-6" id="ajax">
        </div>
        
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <input type="submit" value="Lưu phiếu trả phòng" class="btn btn-success">
        </div>  
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
