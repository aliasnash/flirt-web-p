<?php

class Controller_Info extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $section = isset($_GET['i']) ? htmlspecialchars($_GET['i']) : "";
        $idoperator = intval(isset($_GET['o']) ? htmlspecialchars($_GET['o']) : 0);
        unset($_GET['i']);
        unset($_GET['o']);
        
        $utils = new Utilz();
        $operator = $utils->parseIdOperator($idoperator);
        
        if ($section == "offer")
            $description = file_get_contents("./resources/footer/offer_$operator.txt", true);
        if ($section == "price")
            $description = file_get_contents("./resources/footer/footer_$operator.txt", true);
        
        if (!empty($description)) {
            $this->template->vars('description', $description);
            $this->template->view('index', $idu > 0);
        } else {
            header('Location:' . WEB_APP);
        }
    }
}