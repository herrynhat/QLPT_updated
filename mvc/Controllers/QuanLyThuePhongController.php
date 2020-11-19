<?php 
	class QuanLyThuePhongController extends BaseController
	{
		public $Model;
		public $Model_pt;
		public $Model_kt;
		public function __construct(){
			$this->Model = $this->model("phieuthue");
			$this->Model_pt = $this->model("phongtro");
			$this->Model_kt = $this->model("khachthue");
		}
		public function ThemPhieuThue(){
			//$this->Model->ajax();
			$this->view("Admin/Master",[
				"page"=>"QuanLyThuePhong/ThemPhieuThue",
				"data"=>$this->Model_pt->XemDSPhong_Them_PhongTrong()
			]);
		}

		public function getThemPhieuThue(){
			$maPhong =($_POST["maphong"]);
			$ngayThue = ($_POST["ngaythue"]);
			$tienCoc = ($_POST["tiencoc"]);
			$ghiChu =($_POST["ghichu"]);
			$hoTen =($_POST["hoten"]);
			$cMT =($_POST["cmt"]);
			$gioiTinh =($_POST["gioitinh"]);
			$ngheNghiep =($_POST["nghenghiep"]);
			$sDT =($_POST["sdt"]);
			$diaChi =($_POST["diachi"]);
			$this->Model_kt->ThemKhachThue($cMT, $hoTen, $gioiTinh, $ngheNghiep, $sDT, $diaChi,$maPhong);
			$this->Model->ThemPhieuThue($maPhong, $cMT, $ngayThue, $tienCoc, $ghiChu);
			$this->Model_pt->CapNhatTrangThai($maPhong);
		}
		
	}
 ?>