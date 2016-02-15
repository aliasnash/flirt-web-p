<?php

class Model_Index {

    public function __construct() {}

    public function getUsersList($id) {
        $userDao = new UsersDao();
        $data = $userDao->getUsersList($id);
        return $data;
    }

    public function getRandomUsers() {
        $userDao = new UsersDao();
        $data = $userDao->getRandomUsers();
        return $data;
    }

}