<?php

class Model_Index {

	public function __construct() {}

	public function getRandomUsers() {
		$userDao = new UsersDao();
		$data = $userDao->getRandomUsers();
		return $data;
	}
}