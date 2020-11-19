<?php 
	class QuanLyTraPhongController extends BaseController
	{
		public $Model;
		public $Model_pt;
		public $Model_kt;
		public function __construct(){
			$this->Model = $this->model("phieutra");
			$this->Model_pt = $this->model("phongtro");
			$this->Model_ptp = $this->model("phieuthue");
		}
		public function ThemPhieuTraPhong(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyTraPhong/ThemPhieuTra",
				"data"=>$this->Model_pt->XemDSPhong_Them_DaThue()
			]);
		}

		public function getThemPhieuTra(){
			$maPhieuThue =($_POST["maphieuthue"]);
			$maPhong = ($_POST["maphong"]);
			$cMT = ($_POST["cmt"]);
			$ngayTra =($_POST["ngaytra"]);
			$tienCoc =($_POST["tiencoc"]);
			$ghiChu =($_POST["ghichu"]);
			$this->Model->ThemPhieuTra($maPhieuThue,$maPhong, $cMT, $ngayTra, $tienCoc, $ghiChu);
			$this->Model_pt->CapNhatTrangThai_TP($maPhong);
		}
		public function ajax(){
			if(isset($_POST['get_option']))
			{
				$this->Model_ptp->ajax($_POST["get_option"]);
			}
		}
	}
 ?>