<?php 
	class BaseController
	{
		public $Model;
		public $Model1;
		public $userModel;
		public $messageModel;
		public function __construct(){
			$this->userModel = $this->model("User");
			$this->Model = $this->model("PhongTro");
			$this->Model1 = $this->model("ThietBi");
			$this->messageModel = $this->model("Message");
		}
		public function model($model)
		{
			require_once "./mvc/Models/".$model.".php";
			return new $model;
		}
		public function view($view, $data = [])
		{
			require_once "./mvc/Views/".$view.".php";
		}
	}
 ?>