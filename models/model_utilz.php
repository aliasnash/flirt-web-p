<?php

class Model_Utilz {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }

    public function saveStat($iduser, $page) {
        $this->userDao->saveStat($iduser, $page);
    }

    public function saveOperator($msisdn, $request, $response) {
        $this->userDao->saveOperator($msisdn, $request, $response);
    }
}