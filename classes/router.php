<?php

class Router {

	private $path;

	private $args = array();

	public function __construct() {}

	public function setPath($path) {
		$path .= DS;
		// $path = trim($path, '/\\') . DS;
		
		if (!is_dir($path))
			throw new Exception('Invalid controller path:' . $path);
		$this->path = $path;
	}

	public function getController(&$file, &$controller, &$action, &$agrs) {
		$route = empty($_GET['route']) ? 'index' : $_GET['route'];
		unset($_GET['route']);
		
		$route = trim($route, '/\\');
		$parts = explode('/', $route);
		
		$cmd_path = $this->path;
		
		foreach($parts as $part) {
			$fullpath = $cmd_path . $part;
			
			if (is_dir($fullpath)) {
				$cmd_path = $cmd_path . $part . DS;
				array_shift($parts);
				continue;
			}
			
			if (is_file($fullpath . '.php')) {
				$controller = $part;
				array_shift($parts);
				break;
			}
		}
		
		if (empty($controller))
			$controller = 'index';
		
		$action = array_shift($parts);
		if (empty($action))
			$action = 'index';
		$file = $cmd_path . $controller . '.php';
		$args = $parts;
	}

	public function start() {
		$this->getController($file, $controller, $action, $agrs);
		if (!is_readable($file))
			die('404 not found');
		
		include ($file);
		
		$class = 'Controller_' . $controller;
		$controller = new $class();
		
		if (!is_callable(array($controller, $action)))
			die('404 not found');
		$controller->$action();
	}
}