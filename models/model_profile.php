<?php

class Model_Profile {

    public function __construct() {}

    public function getProfile($id) {
        $userDao = new UsersDao();
        $userDao->updateVisitUsersById($id);
        $data = $userDao->getProfileById($id);
        return $data;
    }
    
    public function removeProfile($msisdn) {
        $userDao = new UsersDao();
        $userDao->removeUserByMsisdn($msisdn);
    }
    
    public function updateProfile($profile) {
        $userDao = new UsersDao();
        $userDao->updateProfile($profile);
    }
    
    public function getCityList() {
        $userDao = new UsersDao();
        $data = $userDao->getCityList();
        return $data;
    }
}