<?php

class Model_User {

    public function __construct() {}

    public function getProfileWithCityById($id, $iduser) {
        $userDao = new UsersDao();
        if (!empty($id))
            $userDao->updateVisitUsersById($id);
        $data = $userDao->getProfileWithCityById($iduser);
        return $data;
    }

    public function getCityList() {
        $userDao = new UsersDao();
        $data = $userDao->getCityList();
        return $data;
    }
}