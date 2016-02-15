<?php

class Controller_Logout extends Controller_Base {

	function index() {
		if (isset($_SESSION['idu']))
			unset($_SESSION['idu']);
		
		header('Location:' . WEB_APP);
	}
}