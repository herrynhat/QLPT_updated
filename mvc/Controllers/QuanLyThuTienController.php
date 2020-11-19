<?php 
	class QuanLyThuTienController extends BaseController
	{
		public $Model;
		public $Model_pt;
		public $Model_kt;
		public function __construct(){
			$this->Model = $this->model("phieuthu");
			$this->Model_pt = $this->model("phongtro");
			$this->Model_ptp = $this->model("phieuthue");
		}
		public function ThemPhieuThu(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThuTien/ThemPhieuThu",
				"data"=>$this->Model_pt->XemDSPhong_Them_DaThue()
			]);
		}

		public function getThemPhieuThu(){
			$maPhong = ($_POST["maphong"]);
			$cMT = ($_POST["cmt"]);
			$soDien =($_POST["sodien"]);
			$giaDien =($_POST["giadien"]);
			$soNuoc =($_POST["sonuoc"]);
			$giaNuoc =($_POST["gianuoc"]);
			$giaPhong =($_POST["giaphong"]);
			$tongTien =($_POST["tongtien"]);
			$ngayGhi =($_POST["ngayghi"]);
			$ghiChu =($_POST["ghichu"]);
			$this->Model->ThemPhieuThu($maPhong, $cMT, $soDien, $giaDien, $soNuoc, $giaNuoc, $giaPhong, $tongTien, $ngayGhi, $ghiChu );
		}
		public function ajax(){
			if(isset($_POST['get_option']))
			{
				$this->Model_ptp->ajax($_POST["get_option"]);
			}
		}
		public function XemDSPhieuThu(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyThuTien/XemDSPhieuThu",
				"data"=>$this->Model->XemDSPhieuThu()
			]);
			//$this->Model->XemDSPhieuThu();
		}
		public function XemChiTiet($maphieuthu){
			$this->view("Admin/Master1",[
				"page"=>"QuanLyThuTien/XemChiTiet",
				"data"=>$this->Model->XemChiTiet($maphieuthu)
			]);
			//$this->Model->XemChiTiet($maphieuthu);
		}

	}
 ?>