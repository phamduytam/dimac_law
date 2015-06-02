<?php
class BaseComponent extends CComponent
{
	const ERROR_SYSTEM ='9999';

	public $errorCode;

	protected function error($code = ''){
		if(!$code) $code = self::ERROR_SYSTEM;
		$this->errorCode = $code;
		return false;
	}

	public function getErrorCode(){
		return $this->errorCode;
	}
	
}
?>