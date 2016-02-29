<?php

class Controller_Search extends Controller_Base {

    function index() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $this->stat->saveStat($idu, "search/index");
        
        unset($_SESSION['sex']);
        unset($_SESSION['bage']);
        unset($_SESSION['aage']);
        unset($_SESSION['idcity']);
        
        $model = new Model_Search();
        
        if ($idu > 0) {
            $this->template->vars('cities', $model->getCityList());
            $this->template->view('index', true);
        } else {
            header('Location:' . WEB_APP);
        }
    }

    function show() {
        $idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
        
        $this->stat->saveStat($idu, "search/show");
        
        $model = new Model_Search();
        
        if ($idu > 0) {
            $p = intval(isset($_GET['p']) ? $_GET['p'] : 1);
            
            $sex = intval(isset($_POST['sex']) ? $_POST['sex'] : (isset($_SESSION['sex']) ? $_SESSION['sex'] : 0));
            $bage = intval(isset($_POST['bage']) ? $_POST['bage'] : (isset($_SESSION['bage']) ? $_SESSION['bage'] : 0));
            $aage = intval(isset($_POST['aage']) ? $_POST['aage'] : (isset($_SESSION['aage']) ? $_SESSION['aage'] : 0));
            $idcity = intval(isset($_POST['idcity']) ? $_POST['idcity'] : (isset($_SESSION['idcity']) ? $_SESSION['idcity'] : 0));
            
            $_SESSION['sex'] = $sex;
            $_SESSION['bage'] = $bage;
            $_SESSION['aage'] = $aage;
            $_SESSION['idcity'] = $idcity;
            
            $userCount = $model->getUsersCount($idu, $sex, $bage, $aage, $idcity);
            $pageCount = $this->getPageCount($userCount, REC_ON_PAGE);
            $p = $this->getPage($p, $pageCount);
            
            $userList = $model->getUsersList($idu, $sex, $bage, $aage, $idcity, $p);
            $this->template->vars('p', $p);
            
            $this->template->vars('blockleft', $p <= 1);
            $this->template->vars('blockright', $p >= $pageCount);
            $this->template->vars('userCount', $userCount);
            $this->template->vars('userList', $userList);
            $this->template->view('show', true);
        } else {
            header('Location:' . WEB_APP);
        }
    }

    private function getPageCount($recordsCount, $recordsOnPage) {
        $pageCount = 1;
        if ($recordsCount > -1) {
            $pageCount = intval($recordsCount / $recordsOnPage);
            if ($recordsCount % $recordsOnPage > 0)
                $pageCount++;
        }
        return $pageCount;
    }

    private function getPage($page, $pageCount) {
        if ($page > $pageCount)
            return $pageCount;
        if ($page < 1)
            return 1;
        return $page;
    }
}