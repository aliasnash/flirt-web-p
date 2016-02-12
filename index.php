<?php
error_reporting(E_ALL);
include ('config.php');
$db = new PDO('pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';user=' . DB_USER);
include (SITE_PATH . DS . 'core' . DS . 'core.php');
include (SITE_PATH . DS . 'classes/dao' . DS . 'dao.inc.php');

Dao::setPdo($db);

$router = new Router();
$router->setPath(SITE_PATH . DS . 'controllers');
$router->start();
