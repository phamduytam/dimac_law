<?php
$this->pageTitle = 'Terms & Conditions';
?>
<ol class="breadcrumb">
	<li><a href='<?php echo url($this->baseUrl)?>'>Home</a></li>
	<li><a href='<?php echo url($this->baseUrl.'condition')?>'>Terms & Conditions</a></li>
	<li>Add</li>
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
				'action'=>sslUrl($this->baseUrl.'condition/add'),
				'id' => 'add-form',
				'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class' => 'formBox')
			));
		?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập tiêu đề ')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'content'); ?>
			<?php echo $form->textArea($model,'content', array('class' => '')); ?>
			<script>
			editor = CKEDITOR.replace( 'ConditionAR_content', {
				filebrowserBrowseUrl: '/browser/browse.php',
				filebrowserUploadUrl: '/uploader/upload.php',
				filebrowserWindowWidth: '640',
				filebrowserWindowHeight: '480',
				width: '100%'
			});
			CKFinder.setupCKEditor( editor, '<?php echo app()->baseUrl?>/js/ckfinder/' );
			</script>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->checkBox($model,'status', array('checked' => 'checked')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'ordering'); ?>
			<?php echo $form->textField($model,'ordering', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập thứ tự')); ?>
		</div>

		<button type="submit" class="btn btn-default">Save</button>
		<button type="reset" class="btn btn-default">Cancel</button>

		<?php
			$this->endWidget();
		?>
	</div>
</div>

