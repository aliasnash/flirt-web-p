<?php

class Controller_Msg extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        if ($idu > 0) {
            $iduser = isset($_POST['s']) ? $_POST['s'] : 0;
            
            if ($iduser > 0) {
                unset($_POST['s']);
                $model = new Model_Message();
                
                $msg = isset($_POST['msg']) ? $_POST['msg'] : '';
                if (!empty($msg)) {
                    unset($_POST['msg']);
                    $model->createMessage($idu, $iduser, $msg);
                }
                
                $messages = $model->getMessages($idu, $iduser);
                
                $this->template->vars('iduser', $iduser);
                $this->template->vars('messages', $messages);
                $this->template->view('index', true);
            } else {
                header('Location:' . WEB_APP);
            }
        } else {
            unset($_SESSION['idu']);
            header('Location:' . WEB_APP);
        }
    }

}