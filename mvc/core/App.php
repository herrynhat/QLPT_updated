<?php 
	// error_reporting(0);
	class App{
		//http://localhost:88/QuanLyPhongTro/Home/SayHi/1/2/3
		protected $controller="TrangChu";
		protected $action = "Home";
		protected $param = []; 

		function __construct(){
			//Array ( [0] => Home [1] => SayHi [2] => 1 [3] => 2 [4] => 3 )
			$arr = $this->UrlProcess();
			//Xử lý controller
			if(isset($arr))
			{
				if(file_exists("./mvc/Controllers/".$arr[0]."Controller.php"))
				{
					$this->controller = $arr[0];
					unset($arr[0]); // xóa đi phần tử thứ 0 của mảng $arr
				}
				require_once "./mvc/Controllers/".$this->controller."Controller.php";
				$homeobj = $this->controller . "Controller"; // Tên Controller
				$this->controller = new $homeobj;
				//Xử lý action
				if(isset($arr[1]))
				{
					if(method_exists($this->controller, $arr[1]))
					{
						$this->action = $arr[1];
					}
					unset($arr[1]);
				}

				//Xử lý Param
				$this->param = $arr ? array_values($arr) : [];
				call_user_func_array([$this->controller, $this->action], $this->param);
			}
			
		}

		public function UrlProcess(){
			if(isset($_GET['url']))
			{
				return explode("/", filter_var(trim($_GET['url'], '/')));
				// chuyển chuỗi thành mảng
			}
			else
			{
				require_once "./mvc/Controllers/".$this->controller."Controller.php";
				$homeobj = $this->controller . "Controller"; // Tên Controller
				$this->controller = new $homeobj;
				call_user_func_array([$this->controller, $this->action], $this->param);
			}
		}
	}
 ?>