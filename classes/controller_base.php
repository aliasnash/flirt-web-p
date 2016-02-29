<?php

abstract class Controller_Base {

    protected $template;

    protected $layouts = "main_layouts";

    protected $stat;

    function __construct() {
        $this->template = new Template($this->layouts, get_class($this));
        $this->stat = new Model_Utilz();
    }

    abstract function index();
}