<?php

$setting = getSetting();
require_once(__DIR__ . '/global_functions.php');


Yii::setPathOfAlias('bootstrap', dirname(__DIR__) . '/extensions/bootstrap');

$enableCsrfValidation = preg_match('@/api/@' , getenv('REQUEST_URI'))?false:true;


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>$setting['app_name'],
	'language'=>'en',
	'runtimePath'=> dirname(BASE_DIR) . '/runtime_admin',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.bootstrap.components.*',
		'ext.bootstrap.widgets.*',
		'ext.bootstrap.widgets.input.*',
	),

	'modules'=>array(
	),

	// application components
	'components'=>array(
		'request'=>array(
			'enableCsrfValidation'=>$enableCsrfValidation,
			'enableCookieValidation'=>true,
		),

		'session'=>$setting['session'],

		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'login'=>'site/login',
				'logout'=>'site/logout',
				'profile' => 'site/profile',
				'changePassword' => 'site/changePassword',
				'<langtype:vn|en|cn>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<langtype:vn|en|cn>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<langtype:vn|en|cn>/<controller:\w+>/*'=>'<controller>/index',
				'<langtype:vn|en|cn>/*'=>'site/index',
				'api/<controller:\w+>/<action:\w+>'=>'api_<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<prm1:\w+>/<prm2:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>$setting['db_master'],
		'db_slave'=>$setting['db_slave'],

		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>$setting['log'],

		'coreMessages'=>array (
			'class' => 'CPhpMessageSource',
			'language' => 'en_us',
			'basePath'=> dirname(__DIR__ ) . '/messages',
		),
		'user'=>array (
			'class' => 'MallAdminUser',
		),
		'bootstrap'=>array (
			'class' => 'bootstrap.components.Bootstrap',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=> $setting,
);