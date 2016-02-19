<?php

class Controller_Msg extends Controller_Base {

	function index() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		
		if ($idu > 0) {
			$iduser = isset($_POST['s']) ? $_POST['s'] : 0;
			
			if ($iduser > 0) {
				unset($_POST['s']);
				$model = new Model_Message();
				$messages = $model->getMessages($idu, $iduser);
				
				$this->template->vars('iduser', $iduser);
				$this->template->vars('messages', $messages);
				$this->template->view('index', true, true);
			} else {
				header('Location:' . WEB_APP);
			}
		} else {
			unset($_SESSION['idu']);
			header('Location:' . WEB_APP);
		}
	}

	function all() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		
		if ($idu > 0) {
			$model = new Model_Message();
			$msgdata = $model->getMessagesAll($idu);
			
			$this->template->vars('msgdata', $msgdata);
			$this->template->view('all', true);
		} else {
			unset($_SESSION['idu']);
			header('Location:' . WEB_APP);
		}
	}
}