<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin khách thuê</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
                    $i=1;
                    foreach ($data['data'] as $r) {
                   ?>
    <section class="content">
      <form method="post" action="">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Thông tin khách thuê</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="hoten">Họ và tên</label>
                <input type="text" class="form-control" disabled value="<?php echo $r->hoten; ?>">
              </div>
              <div class="form-group">
                <label for="cmt">Chứng minh thư</label>
                <input type="text" class="form-control" disabled value="<?php echo $r->cmt; ?>">
              </div>
              <div class="form-group">
                <label for="gioitinh">Giới tính</label>
                <input type="text" class="form-control" disabled value="<?php echo $r->gioitinh; ?>">
                </div>
              <div class="form-group">
                <label for="nghenghiep">Nghề nghiệp</label>
                <input type="text" class="form-control" disabled value="<?php echo $r->nghenghiep; ?>">
              </div>
              <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="text" class="form-control" disabled value="<?php echo $r->sdt; ?>">
              </div>
              <div class="form-group">
                <label for="diachi">Địa chỉ thường trú</label>
                <input type="text" class="form-control" disabled value="<?php echo $r->diachi; ?>">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
        <div class="col-md-4">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Thông tin thuê phòng</h3>
            </div>
            <?php 
                          foreach ($r->phieuthue_doc as $a) { 
                            
                          ?>
            <div class="card-body">
              
              <div class="form-group">
                <label for="inputStatus">Tên phòng</label>
                <input type="text" class="form-control" disabled value="<?php
                      foreach ($r->phongtro_doc as $c) { 
                          echo $c->tenphong; 
                    }

                 ?>">
                </div>

              <div class="form-group">
                <label for="ngaythue">Ngày thuê phòng</label>
                <input type="text" class="form-control" disabled value="<?php echo $a->ngaythue; ?>">
              </div>
              <div class="form-group">
                <label for="tiencoc">Tiền cọc</label>
               <input type="text" class="form-control" disabled value="<?php echo $a->tiencoc; ?>">
              </div>
              <div class="form-group">
                <label for="ghichu">Ghi chú</label>
                <input type="text" class="form-control" disabled value="<?php echo $a->ghichu; ?>">
              </div>
            </div>
            <?php
              }
                  ?>
            <!-- /.card-body -->
          </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="col-md-4">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Thông tin trả phòng</h3>
            </div>
             <?php 
                          foreach ($r->phieutra_doc as $b) { 
                          ?>
            <div class="card-body">
              <div class="form-group">
                <label for="ngaythue">Ngày trả phòng</label>
                <input type="text" class="form-control" disabled value="<?php echo $b->ngaytra; ?>">
              </div>
              <div class="form-group">
                <label for="tiencoc">Tiền cọc hoàn trả</label>
                <input type="text" class="form-control" disabled value="<?php echo $b->tiencoc; ?>">
              </div>
              <div class="form-group">
                <label for="ghichu">Ghi chú</label>
                <input type="text" class="form-control" disabled value="<?php echo $b->ghichu; ?>">
              </div>
            </div>
            <?php
              }
                  ?>
            <!-- /.card-body -->
          </div>
            <!-- /.card-body -->
          </div>
        </div>
                </div>
      </div>
    </form>
    </section>
    <?php
              }
                  ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


