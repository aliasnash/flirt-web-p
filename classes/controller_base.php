<?php

abstract class Controller_Base {

	protected $template;

	protected $layouts = "main_layouts";

	function __construct() {
		$this->template = new Template($this->layouts, get_class($this));
	}

	abstract function index();
}