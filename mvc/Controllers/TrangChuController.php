<?php 
	class TrangChuController extends BaseController
	{
		// public $Model;
		// public $Model1;
		// public $userModel;
		// public $messageModel;
		// public function __construct(){
		// 	$this->userModel = $this->model("User");
		// 	$this->Model = $this->model("phongtro");
		// 	$this->Model1 = $this->model("thietbi");
		// 	$this->messageModel = $this->model("Message");
		// }

		public function Home(){
			$user_login = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';
			$getFriends = $this->userModel->getFriendsOfUser($user_login);
			$getNoFriends = $this->userModel->getUserAreNotFriends($user_login);
			$this->view("TrangChu",[
				'getFriends' => $getFriends,
				"page"=>"TrangChu/DSPT-TrangChu",
				"data"=>$this->Model->XemDSPhong_Them_PhongTrong(),
				'getNoFriends' => $getNoFriends
			]);
		}
		public function XemChiTiet($maphong){
					$this->view("TrangChu",[
				"page"=>"TrangChu/XemChiTiet",  
				"data"=>$this->Model->XemChiTietPhong($maphong),
				"data1"=>$this->Model1->DSThietBi($maphong)
			]);
				
			
		}

				public function TimKiem(){
			$quan =($_POST["quan"]);
			$gia =($_POST["gia"]);
			$this->view("TrangChu",[
				"page"=>"TrangChu/DSPT-TrangChu",
				"data"=>$this->Model->TimKiem($quan,$gia)
			]);
			
		}


	}
 ?>
