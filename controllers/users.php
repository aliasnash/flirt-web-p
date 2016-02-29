<?php

class Controller_Users extends Controller_Base {

    function index() {
        header('Location:' . WEB_APP);
    }

    function profile() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $iduser = isset($_GET['id']) ? $_GET['id'] : 0;
        
        $this->stat->saveStat($idu, "users/profile [$iduser]");
        
        if (!empty($idu)) {
            if (!empty($iduser)) {
                $model = new Model_User();
                $profiles = $model->getUserProfile($idu, $iduser);
                
                if (count($profiles) > 0) {
                    $profile = $profiles[0];
                }
                
                if (!empty($profile)) {
                    $photos = $model->getPhotoList($iduser);
                    
                    $this->template->vars('photos', $photos);
                    $this->template->vars('profile', $profile);
                    $this->template->view('index', $idu > 0);
                } else {
                    header('Location:' . WEB_APP);
                }
            } else {
                header('Location:' . WEB_APP);
            }
        } else {
            header('Location:' . WEB_APP . '/enter');
        }
    }
}