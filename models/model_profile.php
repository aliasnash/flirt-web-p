<?php

class Model_Profile {

	private $userDao;

	public function __construct() {
		$this->userDao = new UsersDao();
	}

	public function getProfile($id) {
		$data = $this->userDao->getProfileById($id);
		return $data;
	}

	public function getPhotoList($id) {
		$data = $this->userDao->getPhotoList($id);
		return $data;
	}

	public function removeProfile($msisdn) {
		$this->userDao->removeUserByMsisdn($msisdn);
	}

	public function updateProfile($profile) {
		$this->userDao->updateProfile($profile);
	}

	public function getCityList() {
		$data = $this->userDao->getCityList();
		return $data;
	}

}