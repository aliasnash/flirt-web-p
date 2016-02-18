<?php

class Model_User {

	private $userDao;

	public function __construct() {
		$this->userDao = new UsersDao();
	}

	public function getUserProfile($id, $iduser) {
		$data = $this->userDao->getProfileById($iduser);
		return $data;
	}

	public function getPhotoList($id) {
		$data = $this->userDao->getPhotoList($id);
		return $data;
	}

	public function getCityList() {
		$data = $this->userDao->getCityList();
		return $data;
	}
}