<?php

class Model_Utilz {

	private $userDao;

	public function __construct() {
		$this->userDao = new UsersDao();
	}

	public function getCountUnreadedMessages($id) {
		return $this->userDao->getCountUnreadedMessages($id);
	}

	public function getUpdateLastVisit($id) {
		$this->userDao->updateVisitUsersById($id);
	}

}