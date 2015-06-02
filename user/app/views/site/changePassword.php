<?php
$this->pageTitle = 'Change Password';
?>
<div class="row">
<ol class="breadcrumb">
	<li><i class="fa fa-dashboard"></i> <a href='<?php echo url('/')?>'>Dashboard</a></li>
	<li class="active"><i class="fa fa-setting"></i> Change Password</li>
</ol>
<div class="col-lg-6">
<?php echo CHtml::errorSummary($model, '<div class="alert alert-dismissable alert-warning"> Loi', '</div>'); ?>
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
		'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
?>

<div class="form-group">
	<?php echo $form->labelEx($model,'old_password'); ?>
	<?php echo $form->passwordField($model,'old_password', array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'new_password'); ?>
	<?php echo $form->passwordField($model,'new_password', array('class' => 'form-control')); ?>
</div>



<button type="submit" class="btn btn-default">Save</button>

<?php
	$this->endWidget();
?>

</div>
</div>