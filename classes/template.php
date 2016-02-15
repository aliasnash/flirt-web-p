<?php

class Template {

	private $layouts;

	private $controller;

	private $vars = array();

	function __construct($layout, $controllerName) {
		$this->layouts = $layout;
		$arr = explode('_', $controllerName);
		$this->controller = strtolower($arr[1]);
	}

	function vars($varname, $value) {
		if (isset($this->vars[$varname])) {
			trigger_error('Unable to set var `' . $varname . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);
			return false;
		}
		$this->vars[$varname] = $value;
		return true;
	}

	function view($name, $logged = false) {
		$pathLayout = SITE_PATH . DS . 'layouts' . DS . $this->layouts . '.php';
		$contentPage = SITE_PATH . DS . 'views' . DS . $this->controller . DS . $name . '.php';
		
		if (!file_exists($pathLayout)) {
			trigger_error('Layout `' . $this->layouts . '` does not exist. [' . $pathLayout . ']', E_USER_NOTICE);
			return false;
		}
		if (!file_exists($contentPage)) {
			trigger_error('Template `' . $name . '` does not exist.', E_USER_NOTICE);
			return false;
		}
		foreach($this->vars as $key => $value) {
			$$key = $value;
		}
		include ($pathLayout);
	}
}