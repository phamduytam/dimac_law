<?php
$this->pageTitle = 'Reservation';
?>
<ol class="breadcrumb">
	<li><a href='<?php echo url($this->baseUrl)?>'>Home</a></li>
	<li><a href='<?php echo url($this->baseUrl.'reservation')?>'>Reservation</a></li>
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
			<?php echo $form->labelEx($model,'firstName'); ?>
			<?php echo $form->textField($model,'firstName', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'lastName'); ?>
			<?php echo $form->textField($model,'lastName', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'phone'); ?>
			<?php echo $form->textField($model,'phone', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'checkIn'); ?>
			<?php echo $form->textField($model,'checkIn', array('class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'checkOut'); ?>
			<?php echo $form->textField($model,'checkOut', array('class' => 'form-control')); ?>
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