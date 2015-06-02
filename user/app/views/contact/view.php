<?php
$this->pageTitle = 'Contact';
?>
<div class="row">
<ol class="breadcrumb">
	<li><i class="fa fa-envelope-o"></i> <a href='<?php echo url('/contact')?>'>Contact</a></li>
	<li class="active"><i class="fa fa-eye"></i> View</li>
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
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email', array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'subject'); ?>
	<?php echo $form->textField($model,'subject', array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'content'); ?>
	<?php echo $form->textArea($model,'content', array('class' => 'form-control', 'rows' => '5')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'status'); ?>
	<?php echo $form->checkBox($model,'status', array('checked' => $model->status)); ?>
</div>

<?php
	$this->endWidget();
?>

</div>
</div>