 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm phòng trọ</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form method="post" action="../QuanLyPhongTro/getThemPhongTro" enctype="multipart/form-data">
      <div class="row">
       <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin phòng trọ</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên phòng trọ</label>
                <input type="text" id="tenPhong" name="tenPhong" class="form-control" placeholder="Nhập tên phòng trọ" required="">
              </div>
              <div class="form-group">
                <label for="inputName">Tiêu đề</label>
                <input type="text" id="tieude" name="tieude" class="form-control" placeholder="Nhập tiêu đề" required="" maxlength="50">
              </div>
              <div class="form-group">
                <label for="inputStatus">Quận</label>
                <select class="form-control custom-select" required="" id="quan" name="quan">
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
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Địa chỉ</label>
                <input type="text" id="diaChi" name="diaChi" class="form-control" placeholder="Nhập địa chỉ phòng trọ" required="">
              </div>
              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea id="moTa" name="moTa" class="form-control" rows="4" placeholder="Nhập mô tả về phòng trọ" required=""></textarea>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Giá phòng</label>
                <input type="number" id="gia" name="gia" class="form-control" placeholder="Nhập giá phòng" required="">
              </div>
              <div class="form-group">
                    <label for="exampleInputFile">Thêm ảnh phòng trọ</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="img" required="">
                        <label class="custom-file-label" for="img"></label>
                      </div>
                      
                    </div>
                  </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <input type="submit" value="Lưu phòng trọ" class="btn btn-success">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

