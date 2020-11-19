<?php 
	class QuanLyKhachThueController extends BaseController
	{
		public $Model;
		public $Model_pt;
		public $Model_kt;
		public function __construct(){
			$this->Model = $this->model("khachthue");
		}

		public function XemDSKhachThue(){
			$this->view("Admin/Master",[
				"page"=>"QuanLyKhachThue/XemDSKhachThue",
				"data"=>$this->Model->XemDSKhachThue()
			]);
			//$this->Model->XemDSKhachThue();
		}
		public function XemChiTiet($cmt){
			$this->view("Admin/Master1",[
				"page"=>"QuanLyKhachThue/XemChiTiet",
				"data"=>$this->Model->XemChiTiet($cmt)
			]);
			//$this->Model->XemChiTiet($cmt);
		}

	}
 ?>