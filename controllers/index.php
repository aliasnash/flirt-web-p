<?php

class Controller_Index extends Controller_Base {

	function index() {
		$model = new Model_Index();
		$userList = $model->getRandomUsers();
		$this->template->vars('userList', $userList);
		$this->template->view('index');
	}
}