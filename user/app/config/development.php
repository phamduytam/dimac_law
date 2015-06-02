<?php
error_reporting(0);
ini_set('display_errors', 0);
define('YII_DEBUG',true);
define('YII_TRACE_LEVEL',3);
//ini_set('mbstring.internal_encoding' , 'UTF8');

define('_NOW' , strtotime('2013-12-26 ' . date("H:i:s")));
//if(!defined('_NOW') ) define('_NOW' , time());
define('USE_SSL' , false);

function getSetting(){

$setting = array();

$setting['app_name'] = 'DIMAC PROFESSIONAL CORPORATE LAWYERS';
$setting['adminEmail'] = '';
$setting['enableMail'] = false;
$setting['enableDeviceCheck'] = false;
$setting['enableDateFrom'] = true;
$setting['enableDateTo'] = true;

$setting['db_enable_slave'] = false;
$setting['db_master'] = array(
	'connectionString' => 'mysql:host=127.0.0.1;dbname=dimac_law',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',//
	'charset' => 'utf8',
	'enableProfiling' => true,    //
	'enableParamLogging' => true, //
);

$setting['db_slave'] = array(
	'class'=>'CDbConnection',
	'connectionString' => 'mysql:host=localhost;dbname=dimac_law',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
	'enableProfiling' => true,    // SQL文
	'enableParamLogging' => true, // パラメータ表示に必要
);


$setting['log']=array(
	'class'=>'CLogRouter',
	'routes'=>array(
		array('class'=>'CFileLogRoute','levels'=>'error,alert,warning,info,notice',),
//		array('class'=>'CProfileLogRoute',),
//		array('class'=>'CWebLogRoute',),
	),
);

$setting['session']=array(
	'class'=>'CDbHttpSession',
	'sessionTableName'=>'sessions_admin',
	'connectionID'=>'db',
	'timeout'=>3600,//second
	'gCProbability'=>10,//1～100
);

$setting['cache']=array(
	'categoryTop'=>array('duration' => 0),//単位：秒
	'special'=>array('enable' => true),
);

return $setting;
}


