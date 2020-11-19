<?php 
	class KhachThue extends DB
	{
		public function ThemKhachThue($cMT, $hoTen, $gioiTinh, $ngheNghiep, $sDT, $diaChi,$maPhong)
		{
			$collection = (new MongoDB\Client)->phongtrodb->khachthue;
			$data=$collection->find([],['limit' => 1,'sort' => ['makhachthue' => -1],]);
			$makhachthue;
			foreach ($data as $row) {
				$makhachthue=$row->makhachthue;
			}
			$maPhong=(int)$maPhong;
			$document = $collection->insertOne([
				"makhachthue" =>$makhachthue+1,
				"cmt" => $cMT,
				"hoten" =>  $hoTen,
				"gioitinh" => $gioiTinh,
				"nghenghiep" => $ngheNghiep,
				"sdt" => $sDT,
				"diachi" => $diaChi,
				"maphong" => $maPhong
			]);

		}
		public function XemDSKhachThue()
		{
			$collection = (new MongoDB\Client)->phongtrodb->khachthue;
			$ops = [
						[
							'$lookup' => [
								'from' => 'phieuthuephong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieuthue_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'phieutraphong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieutra_doc'
										]
						],
						['$sort' => ['makhachthue' => -1]]
		
					];
			$data = $collection->aggregate($ops);
			return $data;

					
			}
			public function XemChiTiet($cmt)
		{
			$collection = (new MongoDB\Client)->phongtrodb->khachthue;
			$ops = [
						[
							'$lookup' => [
								'from' => 'phieuthuephong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieuthue_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'phieutraphong',
								'localField' => 'cmt',
								'foreignField' => 'cmt',
								'as' => 'phieutra_doc'
										]
						],
						[
							'$lookup' => [
								'from' => 'phongtro',
								'localField' => 'maphong',
								'foreignField' => 'maphong',
								'as' => 'phongtro_doc'
										]
						],
						[
							'$match' => [
								'cmt' => $cmt
										]
						]
		
					];
			$data = $collection->aggregate($ops);
			return $data;
			}
			public function Count_khachthue()
			{
				$collection = (new MongoDB\Client)->phongtrodb->khachthue;
				$ops = [
						['$count' => 'dem']
						];
				
				$data = $collection->aggregate($ops);
				return $data;	
				// foreach ($data as $r ) {
				// 	echo '<hr>';
				// 	echo $r->dem;
				// }
			}	
		}

 ?>