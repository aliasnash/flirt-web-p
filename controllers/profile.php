<?php

class Controller_Profile extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $model = new Model_Profile();
        $profile = $model->getProfile($idu);
        
        var_dump($profile);
        
        $this->template->vars('profile', $profile);
        $this->template->view('index', true);
    }
}