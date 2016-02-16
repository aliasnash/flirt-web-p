<?php

class Model_Profile {

    public function __construct() {}

    public function getProfile($id) {
        $userDao = new UsersDao();
        $userDao->updateVisitUsersById($id);
        $data = $userDao->getProfileById($id);
        return $data;
    }
    
    public function getCityList() {
        $userDao = new UsersDao();
        $data = $userDao->getCityList();
        return $data;
    }
}