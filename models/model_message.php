<?php

class Model_Message {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }

    public function getMessages($id, $iduser) {
        $this->userDao->updateMessageAsReaded($id, $iduser);
        $data = $this->userDao->getMessages($id, $iduser);
        return $data;
    }

    public function createMessage($id, $iduser, $msg) {
        $msg = htmlspecialchars($msg);
        $this->userDao->createMessage($id, $iduser, $msg);
    }

    public function getCountUnreadedMessages($id) {
        return $this->userDao->getCountUnreadedMessages($id);
    }

    public function getMessagesById($id, $iduser, $idmessage) {
        $data = $this->userDao->getMessagesById($id, $iduser, $idmessage);
        return $data;
    }
}