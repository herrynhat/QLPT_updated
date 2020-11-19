  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php
                    foreach ($data["data"] as $b) 
                    {
                    
                   ?>
                       
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Phòng <?php echo $b->tenphong; ?></h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img src="../../public/img/<?php echo $b->anh; ?>" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Thông tin phòng <?php echo $b->tenphong; ?></h3>
              <hr>
              <h4>Giá phòng</h4>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  <?php echo $b->gia; ?> VND/tháng
                </h2>
              </div>
              <hr>
              <h4>Địa chỉ</h4>
              <div class="py-2 px-3 mt-4">
                <h2 class="mb-0">
                  <?php echo $b->diachi; ?>
                </h2>
              </div>
              <hr>
              <h4>Trạng thái</h4>
              <div class="py-2 px-3 mt-4">
                <h2 class="mb-0">
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
                </h2>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $b->mota; ?></div>
            </div>
          </div>
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
                      <th style="width: 10%" class="text-center">
                          Số lượng
                      </th>
                      <th style="width: 10%" class="text-center">
                          Tình trạng
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                    $i=1;
                    foreach ($data["data1"] as $a) 
                    {
                   ?>
                  <tr>
                      <td  class="text-center">
                         <?php echo $i;
                              $i++;
                           ?>
                      </td>
                      <td  class="text-center">
                          <?php echo $a->tenthietbi; ?>
                      </td>
                      <td  class="text-center">
                          <?php echo $a->soluong; ?>
                      </td>
                      <td class="project-state text-center">
                          <?php 
                              if($a->tinhtrang=='Mới')
                              {
                                    echo '<span class="badge badge-success">'.$a->tinhtrang.'</span>';
                              }
                              elseif($a->tinhtrang=='Đã sử dụng')
                              {
                                    echo '<span class="badge badge-primary">'.$a->tinhtrang.'</span>';
                              }
                              else
                              {
                                    echo '<span class="badge badge-secondary">'.$a->tinhtrang.'</span>';
                              }
                            ?>
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
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    <?php
                   }
                  ?>
  </div>
  <!-- /.content-wrapper -->