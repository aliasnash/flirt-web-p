<?php

class Controller_Users extends Controller_Base {
	
	function index() {
		$model = new Model_AllUsers();
		$userInfo = $model->getUsers();
		$this->template->vars('userInfo', $userInfo);
		$this->template->view('show');
	}

	function dick() {
		$model = new Model_AllUsers();
		$userInfo = $model->getUsers();
		
		$this->template->vars('userInfo', $userInfo);
		$this->template->view('showdick');
	}
}