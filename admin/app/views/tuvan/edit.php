<?php
$this->pageTitle = 'Bài viết ';
?>
<div class="row">
<ol class="breadcrumb">
	<li><i class="fa fa-star-o"></i> <a href='<?php echo url($this->baseUrl.'bai-viet?cat_id='.$model->cat_id)?>'><?php echo $this->pageTitle?></a></li>
	<li class="active"><i class="fa fa-edit"></i> Edit</li>
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
		'action'=>sslUrl($this->baseUrl.'bai-viet/edit/'.$model->id.'?cat_id='.$model->cat_id),
		'id' => 'add-form',
		'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
?>

<div class="form-group">
			<?php echo $form->labelEx($model,'parent_id'); ?>
			<?php echo $form->dropDownList($model,'parent_id',array('0'=>'Chọn nếu bài viết thuộc một danh mục') + CHtml::listData($category, 'id', 'name'), array('class' => 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'content'); ?>
	<?php echo $form->textArea($model,'content', array('class' => 'form-control')); ?>
	<script>
	editor = CKEDITOR.replace( 'TuVanAR_content', {
		filebrowserBrowseUrl: '/browser/browse.php',
		filebrowserUploadUrl: '/uploader/upload.php',
		filebrowserWindowWidth: '640',
		filebrowserWindowHeight: '480',
		width: '800'
	});
	CKFinder.setupCKEditor( editor, '<?php echo app()->baseUrl?>/js/ckfinder/' );
	</script>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'status'); ?>
	<?php echo $form->checkBox($model,'status', array('checked' => $model->status)); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'order'); ?>
	<?php echo $form->textField($model,'order', array('class' => 'form-control')); ?>
</div>

<button type="submit" class="btn btn-default">Save</button>
<button type="reset" class="btn btn-default">Cancel</button>

<?php
	$this->endWidget();
?>

</div>
</div>

