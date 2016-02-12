<?php

class Registry {

	private $vars = array();

	public function set($key, $value) {
		if (isset($this->vars[$key])) throw new Exception('Exception: ' . $key . ' has already exist');
		$this->vars[$key] = $value;
		return true;
	}

	public function get($key) {
		if (!isset($this->vars[$key])) return null;
		return $this->vars[$key];
	}

	public function remove($key) {
		unset($this->vars[$key]);
	}
}