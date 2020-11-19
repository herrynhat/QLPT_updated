  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div>
    </section>
    <!-- Main content -->
      <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Danh sách phòng trọ</h2>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%" class="text-center">
                          #
                      </th>
                      <th style="width: 19%" class="text-center">
                          Chứng minh thư
                      </th>
                      <th style="width: 25%" class="text-center">
                          Tên khách thuê
                      </th>
                      <th style="width: 20%" class="text-center">
                          Ngày thuê phòng
                      </th>
                      <th style="width: 20%" class="text-center">
                          Ngày trả phòng
                      </th>
                      <th style="width: 15%" class="text-center">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                    $i=1;
                    foreach ($data['data'] as $r) {
                   ?>
                  <tr>
                      <td class="text-center">
                          <?php echo $i;
                              $i++;
                           ?>
                      </td>
                      <td class="text-center">
                          <?php echo $r->cmt; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $r->hoten; ?>
                      </td>
                      <td class="text-center">
                          <?php 
                          foreach ($r->phieuthue_doc as $a) {
                                 echo $a->ngaythue; 
                           }
                          ?>
                      </td>
                      <td class="text-center">
                          <?php 
                          foreach ($r->phieutra_doc as $b) {
                                if(isset($b->ngaytra)){
                                  echo $b->ngaytra;
                                }
                                else{
                                  echo 'ko tra';
                                }
                          }
                          ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" 
                          href="../QuanLyKhachThue/XemChiTiet/<?php echo $r->cmt; ?>">
                              <i class="fas fa-folder">
                              </i>
                              Xem chi tiết
                          </a>
                      </td>
                  </tr>
                  <?php
              }
                  ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
