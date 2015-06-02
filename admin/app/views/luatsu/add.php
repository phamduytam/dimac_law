<?php
$this->pageTitle = 'Luật sư';
?>
<div class="row">
<ol class="breadcrumb">
	<li><i class="fa fa-star-o"></i> <a href='<?php echo url('/luatsu')?>'><?php echo $this->pageTitle;?></a></li>
	<li class="active"><i class="fa fa-plus-square-o"></i> Add</li>
</ol>
<div class="col-lg-8">


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
		'action'=>sslUrl('luatsu/add'),
		'id' => 'add-form',
		'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
?>

<div class="form-group">
	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập tên luật sư')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập email')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'phone'); ?>
	<?php echo $form->textField($model,'phone', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập số điện thoại')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'address'); ?>
	<?php echo $form->textField($model,'address', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập địa chỉ')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'linhvuc_id'); ?>
	<?php echo $form->dropDownList($model,'linhvuc_id', CHtml::listData($linhvuc, 'id', 'name'), array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'chucdanh_id'); ?>
	<?php echo $form->dropDownList($model,'chucdanh_id', CHtml::listData($chucdanh, 'id', 'name'), array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'vanphong_id'); ?>
	<?php echo $form->dropDownList($model,'vanphong_id', CHtml::listData($vanphong, 'id', 'name'), array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'image'); ?>
	<?php echo $form->fileField($model,'image'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'content'); ?>
	<?php echo $form->textArea($model,'content', array('class' => 'form-control')); ?>
	<script>
	editor = CKEDITOR.replace( 'LuatSuAR_content', {
		filebrowserBrowseUrl: '/browser/browse.php',
		filebrowserUploadUrl: '/uploader/upload.php',
		filebrowserWindowWidth: '640',
		filebrowserWindowHeight: '480',
	});
	CKFinder.setupCKEditor( editor, '<?php echo app()->baseUrl?>/js/ckfinder/' );
	</script>
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

