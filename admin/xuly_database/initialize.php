<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'milktea');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'admin/xuly_database');

require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."function.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."accounts.php");
require_once(LIB_PATH.DS."products.php");
require_once(LIB_PATH.DS."categories.php");
require_once(LIB_PATH.DS."locations.php");
require_once(LIB_PATH.DS."news.php");


require_once(LIB_PATH.DS."database.php");
?>