<?php
$this->pageTitle = 'Change Password';
?>
<ol class="breadcrumb">
		<li><a href='<?php echo url('/')?>'>Dashboard</a></li>
		<li class="active">Change Password</li>
</ol>
<div class="row">
	<div class="col-lg-8">
		<?php echo CHtml::errorSummary($model, '<div class="alert alert-dismissable alert-warning"> Errors', '</div>'); ?>
		<?php
			if (user()->hasFlash('messages'))
			{
				$messages = user()->getFlash('messages');
				echo '<div class="alert alert-dismissable alert-success">'. hsp($messages). '</div><br>';
			}
			?>
		<?php
			$form = $this->beginWidget('TbActiveForm', array(
				'id' => 'form',
				'action'=>sslUrl('/changePassword'),
				'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class' => 'formBox')
			));
		?>
		<fieldset>
		<div class="form-group">
			<?php echo $form->labelEx($model,'old_password'); ?>
				<?php echo $form->passwordField($model,'old_password', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'new_password'); ?>
				<?php echo $form->passwordField($model,'new_password', array('class' => 'form-control')); ?>
		</div>

		<button type="submit" class="btn btn-default">Save</button>
		<button type="reset" class="btn btn-default">Cancel</button>

		</fieldset>
		<?php
			$this->endWidget();
		?>

	</div>
</div>