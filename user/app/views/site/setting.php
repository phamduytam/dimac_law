<?php
$this->pageTitle = 'Settings';
?>
<div class="row">
<ol class="breadcrumb">
	<li><i class="fa fa-dashboard"></i> <a href='<?php echo url('/')?>'>Dashboard</a></li>
	<li class="active"><i class="fa fa-setting"></i> Settings</li>
</ol>
<div class="col-lg-6">

<?php
	$form = $this->beginWidget('TbActiveForm', array(
		'id' => 'add-form',
		'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
?>

<div class="form-group">
	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'username'); ?>
	<?php echo $form->textField($model,'username', array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'old_password'); ?>
	<?php echo $form->passwordField($model,'password', array('class' => 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model,'new_password'); ?>
	<?php echo $form->passwordField($model,'password', array('class' => 'form-control')); ?>
</div>

<?php
	$this->endWidget();
?>

</div>
</div>