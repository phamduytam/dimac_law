<?php
	$this->layout = '//layouts/main';
	$this->pageTitle = 'Login';
?>
<div class="login">
	<?php
	if (user()->hasFlash('messages'))
	{
		$messages = user()->getFlash('messages');
		foreach ($messages as $value)
		{
			echo '<div class="alert alert-dismissable alert-warning">'. hsp($value). '</div>';
		}
		echo '<br>';
	}
	?>
	<?php
	$form = $this->beginWidget('TbActiveForm', array(
		'action'=>sslUrl('/login'),
		'id' => 'login-form'
	));
	?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập username')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập password')); ?>
		</div>
		<div class="form-group">
			<?php echo CHtml::submitButton('Login', array('name' => 'login', 'class' => 'btn btn-primary')); ?>
		</div>
	<?php
	$this->endWidget();
	?>
</div>
