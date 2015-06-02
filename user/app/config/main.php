<?php

$setting = getSetting();
require_once(__DIR__ . '/global_functions.php');


Yii::setPathOfAlias('bootstrap', dirname(__DIR__) . '/extensions/bootstrap');

$enableCsrfValidation = preg_match('@/api/@' , getenv('REQUEST_URI'))?false:true;


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>$setting['app_name'],
	'language'=>'vn',
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
				//'<langtype:vn|en|cn>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<langtype:vn|en|cn>/<controller:\w+>/<action:\w+>/<id:\d+>/<alias:[\s\S]+>'=>'<controller>/<action>',
				//'<langtype:vn|en|cn>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				//'<langtype:vn|en|cn>/<controller:\w+>/*'=>'<controller>/index',
				'<langtype:vn|en|cn>'=>'site/index',
				'<langtype:vn|en|cn>/lien-he.html'=>'contact/index',
				'lien-he.html'=>'contact/index',

				// luat su
				'<langtype:vn|en|cn>/luat-su/<id:\d+>/<alias:[\s\S]+>'=>'luatsu/detail',
				'luat-su/<id:\d+>/<alias:[\s\S]+>'=>'luatsu/detail',
				'<langtype:vn|en|cn>/luat-su.html'=>'luatsu/index',
				'luat-su.html'=>'luatsu/index',
				


				// terms of use
				'<langtype:vn|en|cn>/terms-of-use.html'=>'static/terms',
				'terms-of-use.html'=>'static/terms',

				// link
				'<langtype:vn|en|cn>/link.html'=>'static/link',
				'link.html'=>'static/link',

				// sitemap
				'<langtype:vn|en|cn>/sitemap.html'=>'static/sitemap',
				'sitemap.html'=>'static/sitemap',

				// gioi thieu
				'gioi-thieu.html'=>'gioithieu/index',
				'<langtype:vn|en|cn>/gioi-thieu.html'=>'gioithieu/index',
				'<langtype:vn|en|cn>/gioi-thieu/<alias:[\s\S]+>'=>'gioithieu/index',
				'gioi-thieu/<alias:[\s\S]+>'=>'gioithieu/index',

				// vanphong
				'<langtype:vn|en|cn>/van-phong.html'=>'vanphong/index',
				'van-phong.html'=>'vanphong/index',
				'<langtype:vn|en|cn>/van-phong/<alias:[\s\S]+>'=>'vanphong/index',
				'van-phong/<alias:[\s\S]+>'=>'vanphong/index',

				// gia tri cot loi
				'<langtype:vn|en|cn>/gia-tri-cot-loi.html'=>'giatri/index',
				'gia-tri-cot-loi.html'=>'giatri/index',
				'<langtype:vn|en|cn>/gia-tri-cot-loi/<alias:[\s\S]+>'=>'giatri/index',
				'gia-tri-cot-loi/<alias:[\s\S]+>'=>'giatri/index',

				// linh-vuc-hoat-dong
				'<langtype:vn|en|cn>/linh-vuc-hoat-dong.html'=>'linhvuc/index',
				'linh-vuc-hoat-dong.html'=>'linhvuc/index',
				'<langtype:vn|en|cn>/linh-vuc-hoat-dong/<alias:[\s\S]+>'=>'linhvuc/index',
				'linh-vuc-hoat-dong/<alias:[\s\S]+>'=>'linhvuc/index',

				// khach-hang
				'<langtype:vn|en|cn>/khach-hang.html'=>'khachhang/index',
				'khach-hang.html'=>'khachhang/index',
				'<langtype:vn|en|cn>/khach-hang/<alias:[\s\S]+>'=>'khachhang/index',
				'khach-hang/<alias:[\s\S]+>'=>'khachhang/index',

				// tin tuc va cap nhat
				'<langtype:vn|en|cn>/tin-tuc-va-cap-nhat.html'=>'tintuc/index',
				'tin-tuc-va-cap-nhat.html'=>'tintuc/index',

				'<langtype:vn|en|cn>/tin-tuc-va-cap-nhat/view/<alias:[\s\S]+>'=>'tintuc/view',
				'tin-tuc-va-cap-nhat/view/<alias:[\s\S]+>'=>'tintuc/view',
				'<langtype:vn|en|cn>/tin-tuc-va-cap-nhat/<alias:[\s\S]+>'=>'tintuc/index',
				'tin-tuc-va-cap-nhat/<alias:[\s\S]+>'=>'tintuc/index',

				// nghe nghiep
				'<langtype:vn|en|cn>/nghe-nghiep.html'=>'nghenghiep/index',
				'nghe-nghiep.html'=>'nghenghiep/index',
				'<langtype:vn|en|cn>/nghe-nghiep/<alias:[\s\S]+>'=>'nghenghiep/index',
				'nghe-nghiep/<alias:[\s\S]+>'=>'nghenghiep/index',

				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>/<alias:[\s\S]+>'=>'<controller>/<action>',
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
			'language' => 'vn',
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