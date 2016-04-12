<?php
define('DS', DIRECTORY_SEPARATOR);
define('SITE_PATH', realpath(dirname(__FILE__) . DS));

define('MIN_TIMEOUT_ONLINE', 7);
define('SEARCH_YEAR_DIFF', 5);
define('REC_ON_PAGE', 6);

define('REQ_TIMEOUT_MESSAGE_COUNT', 1000 * 12);
define('REQ_TIMEOUT_UPDATE_VISIT', 1000 * 91);
define('REQ_TIMEOUT_SHOW_NEW_MSG', 1000 * 5);

define('PHOTO_SIZE', 500);

define('MTS_REDIRECT', 'http://api.mopromo.ru/stream/subs.php?content_id=b29b44f1-6966-4adf-aba7-b99de37c9690&back_url=http://mobi-flirt.ru/?SubscribeResult=true&click_id={click_id}&tds_id={tds_id}&channel_id=666');
define('BEELINE_REDIRECT', '#');
define('TELE2_REDIRECT', '#');
define('MEGAFON_REDIRECT', '#');

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	define('WEB_APP', dirname($_SERVER['PHP_SELF']));
	define('BRAND', 'TEST');
	define('PHOTO_URL_PREFIX', 'http://localhost:8090');
	define('LOCAL_DIR_PHOTO', 'd:/develop/Eclipse Workspace/Eclipse PHP Learning/flirt/images/');
	
	define('DB_HOST', '188.226.225.95');
	define('DB_PORT', '5432');
	define('DB_NAME', 'mobiflirt');
	define('DB_USER', 'postgres');
	define('DB_PASS', 'boroboro40gb');
} else {
	define('WEB_APP', 'http://mobi-flirt.ru');
	define('BRAND', 'Mobi-Flirt');
	define('PHOTO_URL_PREFIX', '/p');
	define('LOCAL_DIR_PHOTO', '/opt/photo/');
	
	define('DB_HOST', '127.0.0.1');
	define('DB_PORT', '5432');
	define('DB_NAME', 'mobiflirt');
	define('DB_USER', 'postgres');
	define('DB_PASS', 'postgres');
}

