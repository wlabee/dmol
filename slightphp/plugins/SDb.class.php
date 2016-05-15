<?php
/*{{{LICENSE
+-----------------------------------------------------------------------+
| SlightPHP Framework                                                   |
+-----------------------------------------------------------------------+
| This program is free software; you can redistribute it and/or modify  |
| it under the terms of the GNU General Public License as published by  |
| the Free Software Foundation. You should have received a copy of the  |
| GNU General Public License along with this program.  If not, see      |
| http://www.gnu.org/licenses/.                                         |
| Copyright (C) 2008-2009. All Rights Reserved.                         |
+-----------------------------------------------------------------------+
| Supports: http://www.slightphp.com                                    |
+-----------------------------------------------------------------------+
}}}*/

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."db/DbData.php");
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."db/DbObject.php");
/**
 * @package SlightPHP
 */
class SDb{
	static $engines=array("mysql","pdo_mysql");

	static $_DbConfigFile;
	static $_DbdefaultZone="default";
	static $_DbConfigCache;
	/**
	 * @param string $engine enum("mysql");
	 * @return DbObject
	 */
	static function getDbEngine($engine){
		$engine = strtolower($engine);
		if(!in_array($engine,SDb::$engines)){
			return false;
		}
		if($engine=="mysql" && extension_loaded("mysql")){
			require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."db/Db_Mysql.php");
			return new Db_Mysql;
		}elseif($engine=="pdo_mysql"){
			require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."db/Db_PDO.php");
			return new Db_PDO("mysql");

		}
	}
	static function setConfigFile($file){
		SDb::$_DbConfigFile = $file;
	}
	static function getConfigFile(){
		return SDb::$_DbConfigFile;
	}
	/**
	 * @param string $zone
	 * @param string $type	main|query
	 * @return array
	 */
	static function getConfig($zone,$type="main"){
		if(!SDb::$_DbConfigFile){return;}


		$cache = &SDb::$_DbConfigCache;
		if(isset($cache[$zone]) && isset($cache[$zone][$type])){
			$i =  array_rand($cache[$zone][$type]);
			return $cache[$zone][$type][$i];
		}

		$file_data = parse_ini_file(realpath(SDb::$_DbConfigFile),true);
		if(isset($file_data[$zone])){
				$db = $file_data[$zone];
		}elseif(isset($file_data[SDb::$_DbdefaultZone])){
				$db = $file_data[SDb::$_DbdefaultZone];
		}else{
				return;
		}
		foreach($db as $key=>$row){

		}

		//no query to direct to main
		$query_flag = false;
		foreach($db as $key =>$row){
				if(strpos($key,"main")!==false){
						$index = "main";
				}elseif(strpos($key,"query")!==false){
						$index = "query";
				}else{
						continue;
				}
				$row = str_replace(":","=",$row);
				$row = str_replace(",","&",$row);
				parse_str($row,$out);
				if(!empty($out)){
					if(strpos($key,"query")!==false)$query_flag = true;
					$cache[$zone][$index][]=$out;
				}

		}
		if(!$query_flag){
			$type = "main";
		}
		$i =  array_rand($cache[$zone][$type]);
		return $cache[$zone][$type][$i];
	}
}
?>
