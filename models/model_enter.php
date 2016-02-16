<?php

class Model_Enter {

    public function __construct() {}

    public function getUser($msisdn) {
        $userDao = new UsersDao();
        $data = $userDao->getUsersByMsisdn($msisdn);
        return $data;
    }

    public function updateVisit($id) {
        $userDao = new UsersDao();
        $userDao->updateVisitUsersById($id);
    }
}