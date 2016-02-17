<?php

class Controller_Unsubscribe extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $msisdn = empty($_POST['msisdn']) ? '' : $_POST['msisdn'];
        unset($_POST['msisdn']);
        
        $telco = isset($_GET['o']) ? htmlspecialchars($_GET['o']) : "";
        unset($_GET['o']);
        
        if (!empty($msisdn)) {
            $telco = isset($_POST['o']) ? htmlspecialchars($_POST['o']) : "";
            unset($_POST['o']);
            
            if (!empty($telco)) {
                $model = new Model_Profile();
                $utilz = new Utilz();
                $result = $utilz->unsubscribe($msisdn, $telco);
                $model->removeProfile($msisdn);
                
                unset($_SESSION['idu']);
                header('Location:' . WEB_APP);
            } else {
                $this->template->view('error', $idu > 0);
            }
        } else {
            $model = new Model_Profile();
            $profiles = $model->getProfile($idu);
            
            if (count($profiles) > 0) {
                $profile = $profiles[0];
                
                if (!empty($profile)) {
                    $msisdn = $profile['msisdn'];
                }
            }
            
            $this->template->vars('msisdn', $msisdn);
            $this->template->vars('telco', $telco);
            $this->template->view('index', $idu > 0);
        }
    }
}