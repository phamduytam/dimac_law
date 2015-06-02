<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="<?php echo hsp($this->getMetaDescription()); ?>">
		<meta name="keywords" content="<?php echo hsp($this->getMetaKeywords()); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<link rel="apple-touch-icon-precomposed" href="/favicon.ico" />
		<title><?php echo hsp($this->getTitle()); ?></title>
		<?php
		echo Yii::app ()->bootstrap->init ();
		?>
		<link href="<?php echo app()->baseUrl;?>/css/sb-admin.css" rel="stylesheet">
	</head>
	<body>
		<div class="login">
			<form method="post" role="form">
				<div class="form-group">
					<label>Username</label>
					<input class="form-control" name="username" place-holder="Vui long nhap username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="username" place-holder="Vui long nhap password">
				</div>
				<input type="submit" class="btn btn-primary" value="submit">
			</form>
		</div>
	</body>
</html>
