<?php

class Controller_Profile extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $model = new Model_Profile();
        $profiles = $model->getProfile($idu);
        
        if (count($profiles) > 0) {
            $profile = $profiles[0];
        }
        
        $monthList = array(1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь');
        
        if (!empty($profile)) {
            $this->template->vars('cities', $model->getCityList());
            $this->template->vars('profile', $profile);
            $this->template->vars('monthList', $monthList);
            $this->template->view('index', true);
        } else {
            unset($_SESSION['idu']);
            header('Location:' . WEB_APP);
        }
    }
    
    function edit() {
    	$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
    
    	$model = new Model_Profile();
    	$profiles = $model->getProfile($idu);
    
    	if (count($profiles) > 0) {
    		$profile = $profiles[0];
    	}
    
    	$monthList = array(1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь');
    
    	if (!empty($profile)) {
    		$this->template->vars('cities', $model->getCityList());
    		$this->template->vars('profile', $profile);
    		$this->template->vars('monthList', $monthList);
    		$this->template->view('edit', true);
    	} else {
    		unset($_SESSION['idu']);
    		header('Location:' . WEB_APP);
    	}
    }
}