<?php
	$this->layout = '//layouts/standard';
	$this->pageTitle = 'Login';
?>
<div id="content" class="container">
	<div class="col-md-4"></div>
	<div id="login" class="col-md-5">
		<div id="logo"><span>Great Admin</span></div>
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
			'id' => 'form-login',
			'htmlOptions' => array('class' => 'formBox')
		));
		?>
		<fieldset>
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-md-5">
				<label for="username" class="lab">Username <span class="warning"></span></label>
				<?php echo $form->textField($model,'username', array('class' => 'input col-md-5', 'placeholder' => 'Vui lòng nhập username')); ?>
			</div>
			<div class="col-md-2">&nbsp</div>
			<div class="col-md-5">
				<label for="password" class="lab">Password <span class="warning"></span></label>
				<?php echo $form->passwordField($model,'password', array('class' => 'input col-lg-5', 'placeholder' => 'Vui lòng nhập password')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<?php echo CHtml::submitButton('Login', array('name' => 'login', 'class' => 'submit')); ?>
			</div>
		</div>
		</fieldset>
		<?php
		$this->endWidget();
		?>
	</div>
	<div class="col-md-4"></div>
</div>

