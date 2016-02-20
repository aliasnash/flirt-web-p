<?php

class Model_Message {

    private $userDao;

    public function __construct() {
        $this->userDao = new UsersDao();
    }

    public function getMessages($id, $iduser) {
        $this->userDao->updateMessageAsReaded($id, $iduser);
        return $this->userDao->getMessages($id, $iduser);
    }

    public function createMessage($id, $iduser, $msg) {
        $msg = htmlspecialchars($msg);
        $this->userDao->createMessage($id, $iduser, $msg);
    }

    public function getCountUnreadedMessages($id) {
        return $this->userDao->getCountUnreadedMessages($id);
    }

    public function getMessagesById($id, $iduser, $idmessage) {
        return $this->userDao->getMessagesById($id, $iduser, $idmessage);
    }

    public function getMessagesAll($id, &$unreadedMessage, &$restMessage) {
        $unreadedMessage = $this->userDao->getMessagesAllUnreaded($id);
        $restMessage = $this->userDao->getMessagesAll($id);
        
        $existedKeys = array();
        foreach($unreadedMessage as $value) {
            $existedKeys[$value['idus']] = true;
        }
        
        foreach($restMessage as $key => $value) {
            if (array_key_exists($value['idus'], $existedKeys)) {
                unset($restMessage[$key]);
            }
        }
    }
}