<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách thiết bị</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách thiết bị</h3>

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
                          Tên thiết bị
                      </th>
                      <th style="width: 34%" class="text-center">
                          Thuộc phòng
                      </th>
                      <th style="width: 10%" class="text-center">
                          Số lượng
                      </th>
                      <th style="width: 10%" class="text-center">
                          Tình trạng
                      </th>
                      <th style="width: 10%">
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
                      <td  class="text-center">
                         <?php echo $i;
                              $i++;
                           ?>
                      </td>
                      <td  class="text-center">
                          <?php echo $b->tenthietbi; ?>
                      </td>
                      <td  class="text-center">
                          <?php echo $b->maphong; ?>
                      </td  class="text-center">
                      <td  class="text-center">
                          <?php echo $b->soluong; ?>
                      </td>
                      <td class="project-state text-center">
                          
                            <?php 
                              if($b->tinhtrang=='Mới')
                              {
                                    echo '<span class="badge badge-success">'.$b->tinhtrang.'</span>';
                              }
                              elseif($b->tinhtrang=='Đã sử dụng')
                              {
                                    echo '<span class="badge badge-primary">'.$b->tinhtrang.'</span>';
                              }
                              else
                              {
                                    echo '<span class="badge badge-secondary">'.$b->tinhtrang.'</span>';
                              }
                            ?>
                      </td>
                      <td class="project-actions text-center ">
                          <a class="btn btn-danger btn-sm" href="../QuanLyThietBi/XoaThietBi/<?php echo $b->mathietbi; ?>">
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
  <!-- /.content-wrapper -->