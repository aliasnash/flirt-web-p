<?php

class Controller_Index extends Controller_Base {

    protected $layouts = "main_with_footer_layouts";

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $this->stat->saveStat($idu, "index/index [" . $_SERVER["QUERY_STRING"] . "]");
        
        $model = new Model_Index();
        
        if ($idu > 0) {
            $userList = $model->getUsersList($idu);
            $this->template->vars('userList', $userList);
            $this->template->view('index', true);
        } else {
            $SubscribeResult = isset($_GET['SubscribeResult']) ? $_GET['SubscribeResult'] : '';
            $clickid = intval(isset($_GET['click_id']) ? $_GET['click_id'] : 0);
            
            if (!empty($SubscribeResult) && $clickid > 0) {
                $model_p = new Model_Profile();
                $id = $model_p->generateProfile($clickid);
                $_SESSION['idu'] = $id;
                
                header('Location:' . WEB_APP . '/profile/edit');
            } else {
                $userList = $model->getRandomUsers();
                $this->template->vars('userList', $userList);
                $this->template->view('index', false);
            }
        }
    }

    function test() {
        $model = new Model_Message();
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        $this->template->view('test', $idu > 0);
    }

    function test2() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        $this->template->view('test2', $idu > 0);
    }
}