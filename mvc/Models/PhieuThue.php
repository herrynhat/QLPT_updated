<?php 
	class PhieuThue extends DB
	{
		public function ThemPhieuThue($maPhong, $cMT, $ngayThue, $tienCoc, $ghiChu)
		{
			$collection = (new MongoDB\Client)->phongtrodb->phieuthuephong;
			$data=$collection->find([],['limit' => 1,'sort' => ['maphieuthue' => -1],]);
			$maphieuthue;
			foreach ($data as $row) {
				$maphieuthue=$row->maphieuthue;
			}
			$document = $collection->insertOne([
				"maphieuthue" => $maphieuthue+1,
				"maphong" =>  $maPhong,
				"cmt" => $cMT,
				"ngaythue" => $ngayThue,
				"tiencoc" => $tienCoc,
				"ghichu" => $ghiChu,
			]);
		}
		public function ajax($maphong)
		{
			//$maphong=(int)$maphong;
			$collection = (new MongoDB\Client)->phongtrodb->phieuthuephong;
			$ops = [
						[
							'$lookup' => [
								'from' => 'khachthue',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'khachthue'
										]
						],
						[
							'$match' => [
								'maphong' => $maphong
										]
						],
						['$sort' => ['maphieuthue' => -1]],
   						['$limit' => 1]
		
					];
				$data = $collection->aggregate($ops);
				foreach($data as $r)
				{
					 foreach($r->khachthue as $a)
					 {
					 ?>	
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Thông tin khách trả phòng</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
              	<input type="hidden" id="maphieuthue" name="maphieuthue" value="<?php echo  $r->maphieuthue; ?>">
              	<input type="hidden" id="cmt" name="cmt" value="<?php echo $r->cmt; ?>">
                <label for="hoten">Họ và tên</label>
                <input type="text" id="hoten" class="form-control" placeholder="Nhập tên khách thuê" disabled="" value="<?php echo $a->hoten; ?>">
              </div>
              <div class="form-group">
                <label for="cmt">Chứng minh thư</label>
                <input type="number" id="cmt" class="form-control" placeholder="Nhập chứng minh thư" required="" name="cmt" disabled="" value="<?php echo $a->cmt; ?>">
              </div>
              <div class="form-group">
                <label for="gioitinh">Giới tính</label>
                <select class="form-control custom-select" id="gioitinh" name="gioitinh" disabled>
                  <option ><?php echo $a->gioitinh; ?></option>
                </select>
                </div>
              <div class="form-group">
                <label for="nghenghiep">Nghề nghiệp</label>
                <input type="text" id="nghenghiep" class="form-control" placeholder="Nhập nghề nghiệp" name="nghenghiep" disabled value="<?php echo $a->nghenghiep; ?>">
              </div>
              <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="number" id="sdt" class="form-control" placeholder="Nhập số điện thoại" required="" name="sdt" disabled value="<?php echo $a->sdt; ?>">
              </div>
              <div class="form-group">
                <label for="diachi">Địa chỉ thường trú</label>
                <input type="text" id="diachi" class="form-control" placeholder="Nhập địa chỉ" required="" name="diachi" disabled value="<?php echo $a->diachi; ?>">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <?php
        
					 }
				}
		}

	}
 ?>