<?php 
	class AdminController extends BaseController
	{
		public $Model_phieuthu;
		public $Model_phongtro;
		public $Model_thietbi;
		public $Model_khachthue;
		public function __construct(){
			$this->Model_phieuthu = $this->model("phieuthu");
			$this->Model_phongtro = $this->model("phongtro");
			$this->Model_thietbi = $this->model("thietbi");
			$this->Model_khachthue = $this->model("khachthue");
		}

		public function Home(){
			$this->view("Admin/Master",[
				"page"=>"Home/Home",
				"dsphieuthu"=>$this->Model_phieuthu->XemDsPhieuThu_Limit_5(),
				"sokhachthue"=>$this->Model_khachthue->Count_khachthue(),
				"sothietbi"=>$this->Model_thietbi->Count_thietbi(),
				"sophongtro"=>$this->Model_phongtro->Count_phongtro(),
				"sophongtrothue"=>$this->Model_phongtro->Count_phongtro_thue(),

			]);
			//$this->Model_khachthue->Count_khachthue();
		}
	}
 ?>