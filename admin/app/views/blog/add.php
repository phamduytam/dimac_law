<?php
$this->pageTitle = 'Blog';
?>
<ol class="breadcrumb">
	<li><a href='<?php echo url($this->baseUrl)?>'>Home</a></li>
	<li><a href='<?php echo url($this->baseUrl.'blog')?>'>Blog</a></li>
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
				'action'=>sslUrl($this->baseUrl.'blog/add'),
				'id' => 'add-form',
				'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class' => 'formBox')
			));
		?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập tiêu đề ')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php echo $form->textArea($model,'description', array('class' => 'form-control', 'rows' => '5')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'image'); ?>
			<?php echo $form->fileField($model,'image'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'content'); ?>
			<?php echo $form->textArea($model,'content', array('class' => '')); ?>
			<script>
			editor = CKEDITOR.replace( 'BlogAR_content', {
				filebrowserBrowseUrl: '/browser/browse.php',
				filebrowserUploadUrl: '/uploader/upload.php',
				filebrowserWindowWidth: '640',
				filebrowserWindowHeight: '480',
				width: '100%'
			});
			CKFinder.setupCKEditor( editor, '<?php echo app()->baseUrl?>/js/ckfinder/' );
			</script>
		</div>


		<div class="form-group checkbox">
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->checkBox($model,'status', array('checked' => 'checked')); ?>
		</div>

		<div class="form-group checkbox">
			<?php echo $form->labelEx($model,'selected'); ?>
			<?php echo $form->checkBox($model,'selected'); ?>
			<span> ( Chọn để hiển thị bài này ra trang chủ.) </span>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'order'); ?>
			<?php echo $form->textField($model,'order', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập thứ tự')); ?>
		</div>

		<button type="submit" class="btn btn-default">Save</button>
		<button type="reset" class="btn btn-default">Cancel</button>


		<?php
			$this->endWidget();
		?>
	</div>
</div>

