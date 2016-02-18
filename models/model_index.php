<?php

class Model_Index {

	private $userDao;

	public function __construct() {
		$this->userDao = new UsersDao();
	}

	public function getUsersList($id) {
		$data = $this->userDao->getUsersList($id);
		return $data;
	}

	public function getRandomUsers() {
		$data = $this->userDao->getRandomUsers();
		return $data;
	}

}