<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <?php
                  foreach ($data['data'] as $r) {
                    foreach ($r->phongtro_doc as $a) {
                              foreach ($r->khachthue_doc as $b) {
              ?>
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Phòng <?php echo $a->tenphong; ?>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-12 invoice-col">
                  <b>Phiếu thu #<?php echo $r->maphieuthu; ?></b><br>
                  <br>
                  <h3>Thông tin khách thuê</h3>
                  <b>Chứng minh thư: </b><?php echo $b->cmt; ?><br>
                  <b>Họ tên: </b><?php echo $b->hoten; ?><br>
                  <b>Số điện thoại: </b><?php echo $b->sdt; ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Dịch vụ</th>
                      <th>Số  lượng</th>
                      <th>Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Tiền phòng</td>
                      <td>1 tháng</td>
                      <td><?php echo $r->giaphong; ?> /tháng</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Tiền điện</td>
                      <td><?php echo $r->sodien; ?> kW</td>
                      <td><?php echo $r->giadien; ?>  VNĐ/kW</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Tiền nước</td>
                      <td><?php echo $r->sonuoc; ?> khối</td>
                      <td><?php echo $r->gianuoc; ?> VNĐ/khối</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Ghi chú: <?php echo $r->ghichu; ?></p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Ngày ghi <?php echo $r->ngayghi; ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Tổng tiền:</th>
                        <td><?php echo $r->tongtien; ?> VNĐ</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <?php
            }
          }
        }
              ?>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                 <button type="button" class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> In
                  </button> 
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function f_in(){
        window.print();
      }
</script>