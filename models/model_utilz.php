<?php

class Model_Utilz {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }
}