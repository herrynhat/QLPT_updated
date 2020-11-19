<?php 
	class RegisterController extends BaseController
	{
		// public $userModel;
		// public function __construct(){
		// 	$this->userModel = $this->model("User");
		// }
		public function getFormRegister(){
			$this->view("Register/registerForm");
		}
		public function postFormRegister(){
			$userName = $_POST["username"];
			$password = $_POST["password"];
			$this->userModel->createNewUser($userName, $password);
		}
	}
 ?>