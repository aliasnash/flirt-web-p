<?php

class Model_Profile {

    public function __construct() {}

    public function getProfile($id) {
        $userDao = new UsersDao();
        $data = $userDao->getUsersById($id);
        return $data;
    }
}