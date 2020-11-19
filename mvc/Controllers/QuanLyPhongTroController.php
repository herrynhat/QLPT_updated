<?php 
	class QuanLyPhongTroController extends BaseController
	{
		public $Model;
		public $Model1;
		public function __construct(){
			$this->Model = $this->model("phongtro");
			$this->Model1 = $this->model("thietbi");
		}
		public function ThemPhongTro(){
			$this->view("Admin/Master",["page"=>"QuanLyPhongTro/ThemPhongTro"]);
		}


		public function getThemPhongTro(){
			$tenPhong =($_POST["tenPhong"]);
			$tieuDe =($_POST["tieude"]);
			$quan = ($_POST["quan"]);
			$diaChi = ($_POST["diaChi"]);
			$moTa =($_POST["moTa"]);
			$gia = ($_POST["gia"]);
			$img= $_FILES['img']['name'];
			$temp= $_FILES['img']['tmp_name'];
			$this->Model->ThemPhong($tenPhong,$tieuDe, $quan, $diaChi, $moTa, $gia, $img, $temp);
		}
		public function XemDSPhong(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyPhongTro/XemDSPhong",
				"data"=>$this->Model->XemDSPhong()
			]);
		}
		public function XemChiTiet($maphong){
			$this->view("Admin/Master1",[
				"page"=>"QuanLyPhongTro/XemChiTiet",
				"data"=>$this->Model->XemChiTietPhong($maphong),
				"data1"=>$this->Model1->DSThietBi($maphong)

			]);
		}
		public function XoaPhong($maphong){
			$this->Model->XoaPhong($maphong);
		}

	}
 ?>