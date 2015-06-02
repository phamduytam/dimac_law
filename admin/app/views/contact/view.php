<?php
$this->pageTitle = 'Contact';
?>
<ol class="breadcrumb">
	<li><a href='<?php echo url($this->baseUrl)?>'>Home</a></li>
	<li><a href='<?php echo url($this->baseUrl.'contact')?>'>Contact</a></li>
	<li class="active">View</li>
</ol>

<div class="row">
	<div class="col-lg-8">
		<?php
			$form = $this->beginWidget('TbActiveForm', array(
				'id' => 'add-form',
				'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class' => 'formBox')
			));
		?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'subject'); ?>
			<?php echo $form->textField($model,'subject', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'created'); ?>
			<?php echo $form->textField($model,'created', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'content'); ?>
			<?php echo $form->textArea($model,'content', array('class' => 'form-control')); ?>
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