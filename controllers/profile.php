<?php

class Controller_Profile extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $model = new Model_Profile();
        $profiles = $model->getProfile($idu);
        
        if (count($profiles) > 0) {
            $profile = $profiles[0];
        }
        
        if (!empty($profile)) {
            $cities = $model->getCityList();
            $profile['cityCaption'] = '';
            foreach($cities as $key => $value) {
                if ($value['id'] == $profile['idcity']) {
                    $profile['cityCaption'] = $value['caption'];
                    break;
                }
            }
            
            $this->template->vars('profile', $profile);
            $this->template->view('index', $idu > 0);
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
            $this->template->view('edit', $idu > 0);
        } else {
            unset($_SESSION['idu']);
            header('Location:' . WEB_APP);
        }
    }

    function update() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $nick = $_POST['nick'];
        $sex = $_POST['my_sex'];
        $bday = $_POST['bday'];
        $bmonth = $_POST['bmonth'];
        $byear = $_POST['byear'];
        $idcity = $_POST['idcity'];
        $desc = $_POST['description'];
        $birthday = date($byear . '-' . $bmonth . '-' . $bday);
        
        $model = new Model_Profile();
        $profiles = $model->getProfile($idu);
        
        if (count($profiles) > 0) {
            $profile = $profiles[0];
            
            $profile['nickname'] = $nick;
            $profile['sex'] = $sex;
            $profile['birthday'] = $birthday;
            $profile['idcity'] = $idcity;
            $profile['description'] = $desc;
            
            $model->updateProfile($profile);
        }
        
        header('Location:' . WEB_APP . '/profile/');
    }
}