<?php
define('DS', DIRECTORY_SEPARATOR);
define('SITE_PATH', realpath(dirname(__FILE__) . DS));

define('DB_HOST', '188.226.193.115');
define('DB_PORT', '5432');
define('DB_NAME', 'flirt_mvc');
define('DB_USER', 'postgres');
define('DB_PASS', 'postgres');

define('WEB_APP', dirname($_SERVER['PHP_SELF']));
define('BRAND', 'TEST');
define('MIN_TIMEOUT_ONLINE', 10);
define('SEARCH_YEAR_DIFF', 5);
define('REC_ON_PAGE', 6);

