<?php

define('ROOT_DIR', dirname(__FILE__));
define('SLIGHTPHP_DIR', dirname(__FILE__) . "/slightphp");
define("PLUGINS_DIR", SLIGHTPHP_DIR . "/plugins");
define("UPLOAD_DIR", "/upfile");

date_default_timezone_set('Asia/Chongqing');

function __autoload($class) {
	if ($class{0} == "S") {// slightphp class
		$file = PLUGINS_DIR . "/$class.class.php";
	} elseif ($class{0} == "T") {//tools class
		$file = SLIGHTPHP_DIR . "/tools/$class.class.php";
	} else {//other class
		$file = SlightPHP::$appDir . "/" . str_replace("_", "/", $class) . ".class.php";
	}
	if (file_exists($file)) {
		return require_once($file);
	}else{
//		pf( $file);
	}
}

spl_autoload_register('__autoload');

require_once("slightphp/SlightPHP.php");
require_once("slightphp/tool.php");
?>
