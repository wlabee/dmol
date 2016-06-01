<?php
require_once("global.php");

switch (true) {
    case preg_match('/^admin\./i', $_SERVER['HTTP_HOST']):
        $zone = '/admin/';
        break;
    default:
        $zone = '/controller/';
        break;
}
if (preg_match('/^\/controller\/admin\/(.*)?/', $_SERVER['PATH_INFO'])) {
	$_SERVER['PATH_INFO'] = str_replace('admin/', '', $_SERVER['PATH_INFO']);
	$zone = '/admin/';
}
$_SERVER['PATH_INFO'] = str_replace('/controller/', $zone, $_SERVER['PATH_INFO'] ?: '/controller/main', $count = 1);

/*echo error info*/
SlightPHP::setDebug(true);
SlightPHP::setAppDir("app");
SlightPHP::setDefaultZone("controller");
SlightPHP::setDefaultPage("main");
SlightPHP::setDefaultEntry("index");
//SlightPHP::setSplitFlag("/");
SlightPHP::setUrlFormat("-");
SlightPHP::setUrlSuffix("html");

define('APP_DIR', __DIR__ . '/' . SlightPHP::$appDir);

define('DEV', 1);

require_once(SlightPHP::$appDir . "/components/config.php");
require_once(SlightPHP::$appDir . "/components/constants.php");
SDb::setConfigFile(SlightPHP::$appDir . "/components/db.ini.php");

SlightPHP::setSplitFlag("-_.");
#SError::$CONSOLE= true;

if (($r = SlightPHP::run()) === false) {
    die("404 error");
} else {
    echo $r;
}
?>
