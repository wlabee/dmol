<?php

require_once 'nusoap/nusoap.php';

class SWebService {

	public $wsdl = true;
	private $error=null;

	function __construct() {
		
	}

	public function get($url, $functionName, $parameters=array()) {
		$client = new nusoap_client($url, $this->wsdl);
		$client->soap_defencoding = 'utf-8';
		$client->decode_utf8 = false;
		$client->xml_encoding = 'utf-8';
		$result = $client->call($functionName, $parameters);
		if (!$this->error = $client->getError()) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function getError(){
		return $this->error;
	}

}

?>