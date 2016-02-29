<?php

class Model_Payment {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }

    public function payHistory($channelid, $clickid, $pay, $op, $msisdn) {
        $this->userDao->payHistory($channelid, $clickid, $pay, $op, $msisdn);
    }
}