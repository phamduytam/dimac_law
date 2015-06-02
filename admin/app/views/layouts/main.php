<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="/favicon.ico" />
<title><?php echo $this->pageTitle; ?></title>
		<?php
		echo Yii::app ()->bootstrap->init ();
		?>
		<link href="<?php echo app()->baseUrl;?>/css/sb-admin.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/font-awesome/css/font-awesome.min.css">
		<!-- Page Specific CSS -->
		<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/morris-0.4.3.min.css">

	<script src="<?php echo app()->baseUrl;?>/js/ckeditor/ckeditor.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/ckfinder/ckfinder.js"></script>
</head>
<body>
	<div id="wrapper">
		<?php echo $content; ?>
	</div>

	<!-- Page Specific Plugins -->
	<script src="<?php echo app()->baseUrl;?>/js/raphael-min.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/tablesorter/jquery.tablesorter.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/tablesorter/tables.js"></script>
</body>
</html>