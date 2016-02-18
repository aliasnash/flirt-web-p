<?php

class Model_Enter {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }

    public function getUser($msisdn) {
        $data = $this->userDao->getUsersByMsisdn($msisdn);
        return $data;
    }

    public function updateVisit($id) {
        $this->userDao->updateVisitUsersById($id);
    }
}