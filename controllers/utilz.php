<?php

class Controller_Utilz extends Controller_Base {

	protected $layouts = "empty_layouts";

	function index() {}

	function msgcnt() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		$count = 0;
		
		if ($idu > 0) {
			$model = new Model_Utilz();
			$count = $model->getCountUnreadedMessages($idu);
		}
		
		$this->template->vars('count', $count);
		$this->template->view('msgcnt');
	}

	function visit() {
		$idu = isset($_SESSION['idu']) ? $_SESSION['idu'] : 0;
		
		if ($idu > 0) {
			$model = new Model_Utilz();
			$model->getUpdateLastVisit($idu);
		}
	}
}