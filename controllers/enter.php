<?php

class Controller_Enter extends Controller_Base {

	function index() {
		$msisdn = empty($_POST['msisdn']) ? '' : $_POST['msisdn'];
		unset($_POST['msisdn']);
		
		if (!empty($msisdn)) {
			$model = new Model_Enter();
			$users = $model->getUser($msisdn);
			
			if (count($users) > 0) {
				$user = $users[0];
			}
			
			if (!empty($user)) {
				$_SESSION['idu'] = $user['id'];
				$model->updateVisit($user['id']);
				header('Location:' . WEB_APP);
			} else {
				header('Location:' . WEB_APP . '/enter');
			}
		} else {
			$this->template->view('index', false);
		}
	}
}