<?php

class Model_Message {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }

    public function getMessages($id, $iduser) {
        $data = $this->userDao->getMessages($id, $iduser);
        return $data;
    }

    public function createMessage($id, $iduser, $msg) {
        $this->userDao->createMessage($id, $iduser, $msg);
    }

}