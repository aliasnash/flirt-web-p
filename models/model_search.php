<?php

class Model_Search {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }

    public function getUsersList($id, $sex, $bage, $aage, $idcity, $page) {
        $this->userDao->updateVisitUsersById($id);
        $data = $this->userDao->getUsersListByFilter($id, $sex, $bage, $aage, $idcity, $page);
        return $data;
    }

    public function getUsersCount($id, $sex, $bage, $aage, $idcity) {
        return $this->userDao->getUsersCountByFilter($id, $sex, $bage, $aage, $idcity);
    }

    public function getCityList() {
        $data = $this->userDao->getCityList();
        return $data;
    }
}