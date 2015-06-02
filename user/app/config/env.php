<?php
define('APPLICATION_ENV' , 'development');
//if(!defined('APPLICATION_ENV')) define('APPLICATION_ENV' , 'development');

// 環境定数定義
/*if (!APPLICATION_ENV) {
	header("HTTP/1.0 500 Internal Server Error");
	die('Internal Server Error');
}*/

require_once(__DIR__ . '/' . strtolower(APPLICATION_ENV) .  '.php');
