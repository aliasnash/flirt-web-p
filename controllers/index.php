<?php

class Controller_Index extends Controller_Base {

	protected $layouts = "main_with_footer_layouts";

	function index() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		// $idu=1;
		$model = new Model_Index();
		
		if ($idu > 0) {
			$userList = $model->getUsersList($idu);
			$this->template->vars('userList', $userList);
			$this->template->view('index', true);
		} else {
			$userList = $model->getRandomUsers();
			$this->template->vars('userList', $userList);
			$this->template->view('index', false);
		}
	}

	function test() {
		$model = new Model_Message();
		
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		

// 		new Imagick();
		
		$this->template->view('test', $idu > 0);
	}

	function test2() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		
		$this->template->view('test2', $idu > 0);
	}
}