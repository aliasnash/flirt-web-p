<?php
define('DS', DIRECTORY_SEPARATOR);
define('SITE_PATH', realpath(dirname(__FILE__) . DS));

define('WEB_APP', dirname($_SERVER['PHP_SELF']));
define('MIN_TIMEOUT_ONLINE', 10);
define('SEARCH_YEAR_DIFF', 5);
define('REC_ON_PAGE', 6);

define('REQ_TIMEOUT_MESSAGE_COUNT', 1000 * 12);
define('REQ_TIMEOUT_UPDATE_VISIT', 1000 * 91);
define('REQ_TIMEOUT_SHOW_NEW_MSG', 1000 * 5);

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    define('BRAND', 'TEST');
    
    define('DB_HOST', '188.226.225.95');
    define('DB_PORT', '5432');
    define('DB_NAME', 'mobiflirt');
    define('DB_USER', 'postgres');
    define('DB_PASS', 'boroboro40gb');
} else {
    define('BRAND', 'Mobi-Flirt');
    
    define('DB_HOST', '127.0.0.1');
    define('DB_PORT', '5432');
    define('DB_NAME', 'mobiflirt');
    define('DB_USER', 'postgres');
    define('DB_PASS', 'postgres');
}