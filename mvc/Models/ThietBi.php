<?php 
	class ThietBi extends DB
	{
		public function ThemThietBi($tenThietBi, $maPhong, $tinhTrang, $soLuong)
		{
			$collection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$collection->find([],['limit' => 1,'sort' => ['mathietbi' => -1],]);
			$mathietbi;
			foreach ($data as $row) {
				$mathietbi=$row->mathietbi;
			}
			$document = $collection->insertOne([
				"mathietbi" => $mathietbi+1,
				"tenthietbi" =>  $tenThietBi,
				"maphong" => $maPhong,
				"tinhtrang" => $tinhTrang,
				"soluong" => $soLuong,
			]);
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Thêm thiết bị thành công.");
					window.location="../QuanLyThietBi/ThemThietBi";
				</script>
			</body>
			</html>
		<?php
		}

		public function XemDSThietBi()
		{
			$collection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$collection->find();
			return $data;
		}
		public function DSThietBi($maphong)
		{
			$collection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$collection->find(['maphong'=>$maphong],['sort' => ['tenthietbi' => 1],]);
			return $data;
		}
		public function XoaThietBi($mathietbi)
		{
			$mathietbi=(int)$mathietbi;
			$collection = (new MongoDB\Client)->phongtrodb->thietbi;
			$data=$collection->deleteOne(['mathietbi'=>$mathietbi]);
			?>
			<html><head>
			  <meta charset="UTF-8">
			</head>
			<body>
				<script type="text/javascript">
					alert("Xóa thiết bị thành công.");
					window.location="../../QuanLyThietBi/XemDSThietBi";
				</script>
			</body>
			</html>
		<?php
		}
		public function Count_thietbi()
			{
				$collection = (new MongoDB\Client)->phongtrodb->thietbi;
				$ops = [
						['$count' => 'dem']
						];
				
				$data = $collection->aggregate($ops);
				return $data;	
			}	
	}
 ?>