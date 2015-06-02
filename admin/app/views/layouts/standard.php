<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name='robots' content='all, follow' />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<link rel="apple-touch-icon-precomposed" href="/favicon.ico" />
		<title>Great admin</title>
		<?php
		echo Yii::app ()->bootstrap->init ();
		?>
		<link href="<?php echo app()->baseUrl;?>/css/login.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo app()->baseUrl;?>/css/login-blue.css" rel="stylesheet" type="text/css" /><!-- color skin: blue / red / green / dark -->
	</head>
	<body>
		<div id="main">
			<?php echo $content;?>
		</div>
	</body>
</html>