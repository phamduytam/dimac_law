<?php

//delete this function if you have Xdebug installed.
function xdebug_get_headers(){
	return array();
}

define('BASE_DIR' , preg_replace('@/mall.+@' , '' , __DIR__) . '/mall') ;
define('APPLICATION_ENV' , $_SERVER['APPLICATION_ENV']); 
require_once(BASE_DIR . '/app/config/conf_' . strtolower(APPLICATION_ENV) .  '.php');

$yiit=BASE_DIR.'/framework/yiit.php';
$config=BASE_DIR.'/app/config/test.php';

require_once($yiit);

require(BASE_DIR . '/app/extensions/wunit/WUnit.php');
WUnit::createWebApplication($config);

