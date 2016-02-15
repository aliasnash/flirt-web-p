<?php

class Controller_Index extends Controller_Base {

	function index() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
// 		$idu=1;
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
}