<?php

define('BASE_DIR', dirname(dirname(dirname(__DIR__))) . '/hoamai/user') ;
$yii = dirname(BASE_DIR) . '/framework/yii.php';
$env = BASE_DIR . '/app/config/env.php';
$config = BASE_DIR . '/app/config/main.php';

require_once($env);

require_once($yii);

Yii::createWebApplication($config)->run();