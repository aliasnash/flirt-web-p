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

	public function removeProfileByClickId($click_id) {
		$this->userDao->removeUserByClickId($click_id);
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

	public function updateLastVisit($id) {
		$this->userDao->updateVisitUsersById($id);
	}

	public function uploadPhoto($iduser, $photopath) {
		$this->userDao->uploadPhoto($iduser, $photopath);
	}

	public function updateMainPhoto($idu, $idphoto) {
		$this->userDao->updateMainPhoto($idu, $idphoto);
	}
	
	public function removePhoto($idu, $idphoto) {
		$this->userDao->removePhoto($idu, $idphoto);
	}

	public function activateProfile($clickid, $msisdn, $idoperator) {
		$this->userDao->activateProfile($clickid, $msisdn, $idoperator);
	}

	public function generateProfile($clickid) {
		$data = $this->userDao->getUsersByClickId($clickid);
		
		if (count($data) == 0) {
			$this->userDao->generateProfile($clickid);
			$data = $this->userDao->getUsersByClickId($clickid);
			if (count($data) > 0) $id = $data[0]['id'];
		} else
			$id = $data[0]['id'];
		return $id;
	}
}