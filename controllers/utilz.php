<?php

class Controller_Utilz extends Controller_Base {

    protected $layouts = "empty_layouts";

    function index() {}

    function msgcnt() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        $count = 0;
        
        if ($idu > 0) {
            $model = new Model_Message();
            $count = $model->getCountUnreadedMessages($idu);
        }
        
        $this->template->vars('count', $count);
        $this->template->view('msgcnt');
    }

    function visit() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        if ($idu > 0) {
            $model = new Model_Profile();
            $model->updateLastVisit($idu);
        }
    }

    function newmsg() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        $iduser = isset($_POST['iduser']) ? $_POST['iduser'] : 0;
        $idmessage = isset($_POST['idmessage']) ? $_POST['idmessage'] : 0;
        
        if ($idu > 0 && $iduser > 0) {
            $model = new Model_Message();
            $data = $model->getMessagesById($idu, $iduser, $idmessage);
            $this->template->vars('data', json_encode($data));
            $this->template->view('newmsg');
        }
    }

    function addmsg() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        $iduser = isset($_POST['iduser']) ? $_POST['iduser'] : 0;
        $message = isset($_POST['message']) ? $_POST['message'] : 0;
        
        if ($idu > 0 && $iduser > 0 && !empty($message)) {
            $model = new Model_Message();
            $model->createMessage($idu, $iduser, $message);
        }
    }
}