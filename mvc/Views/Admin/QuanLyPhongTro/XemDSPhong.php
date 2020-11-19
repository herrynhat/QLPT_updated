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
                      <th style="width: 35%" class="text-center">
                          Tên phòng trọ
                      </th>
                      <th style="width: 20%" class="text-center">
                          Giá phòng
                      </th>
                      <th style="width: 15%" class="text-center">
                          Trạng thái
                      </th>
                      <th style="width: 20%" class="text-center">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                    $i=1;
                    foreach ($data["data"] as $b) 
                    {
                   ?>
                  <tr>
                      <td class="text-center">
                          <?php echo $i;
                              $i++;
                           ?>
                      </td>
                      <td class="text-center">
                          <?php echo $b->tenphong; ?>
                      </td>
                      <td class="text-center">
                          <?php echo $b->gia; ?> VNĐ/tháng
                      </td>
                      <td class="project-state text-center">
                            <?php 
                            if($b->trangthai=="Còn trống")
                            {
                                echo '<span class="badge badge-success">'.$b->trangthai.'</span>';
                            }
                            else
                            {
                                echo '<span class="badge badge-primary">'.$b->trangthai.'</span>';
                            }
                            ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" 
                          href="../QuanLyPhongTro/XemChiTiet/<?php echo $b->maphong; ?>">
                              <i class="fas fa-folder">
                              </i>
                              Xem
                          </a>
                          <a class="btn btn-danger btn-sm" href="../QuanLyPhongTro/XoaPhong/<?php echo $b->maphong; ?>">
                              <i class="fas fa-trash">
                              </i>
                              Xóa
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
