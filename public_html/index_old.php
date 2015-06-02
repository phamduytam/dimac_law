<?php
define('BASE_DIR', dirname(dirname(__DIR__)) . '/user') ;
$yii = dirname(BASE_DIR) . '/framework/yii.php';

$env = BASE_DIR . '/app/config/env.php';

$config = BASE_DIR . '/app/config/main.php';

require_once($env);

require_once($yii);

Yii::createWebApplication($config)->run();
function myWriteFile($class, $code = "", $message = NULL, $check = TRUE) {
	/*if($check && !isAndroidDevice()){
		return;
	}*/

	$file_path = APK_LOG_DIR . 'server/spmobile_test_cookie_' . @date('Ymd');
	$uri = $_SERVER['REQUEST_URI'];

	if(!$message){
		$message = '';
	}elseif(is_string($message)){
		$message = ' -> ' . $message;
	}

	if (!is_string($message)) {
		if($message == NULL)
			$message = '';
		elseif(gettype($message) == 'object')
			$message = "\n" . serialize($message);
		else
			$message = "\n" . var_export($message, true);

		$message = preg_replace('/\n/', '$0    ', $message);
	} else {
		if (isset($_COOKIE['PHPSESSID'])) {
			$prefix_msg = 'PHPSESSID';
			if(isset($_COOKIE['YII_CSRF_TOKEN'])) $prefix_msg .= ' (YII_CSRF_TOKEN exists)';
			$prefix_msg .= ': ' . $_COOKIE['PHPSESSID'];
		} else {
			$prefix_msg = "No SessionID";
		}
		$message = "\n    " . $prefix_msg . $message;
	}

	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
	} else {
		$user_agent = "--";
	}

	$log_msg = @date('Y-m-d H:i:s') . ' ' . $uri . ' [' . $class . '] ' . $code . "\n  (" . $user_agent . ") " . $message . "\n";

	$handle = @fopen($file_path, 'a');
	@fwrite($handle, $log_msg);
	@fclose($handle);
}
