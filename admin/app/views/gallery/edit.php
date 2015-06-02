<?php
$this->pageTitle = 'Gallery';
?>

<ol class="breadcrumb">
	<li><a href='<?php echo url($this->baseUrl)?>'>Home</a></li>
	<li><a href='<?php echo url($this->baseUrl.'gallery')?>'>Gallery</a></li>
	<li>Edit</li>
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
				'action'=>sslUrl($this->baseUrl.'gallery/edit/' . $model->id),
				'id' => 'add-form',
				'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class' => 'formBox')
			));
		?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập tên image')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'image'); ?>
			<?php //echo $form->fileField($model,'image'); ?>
			<?php
			$this->widget('CMultiFileUpload', array(
				'model' => $model,
				'attribute' => 'image',
				'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
				'duplicate' => 'Duplicate file!', // useful, i think
				'denied' => 'Invalid file type', // useful, i think
			));
			?>
			<div class="row">

				<?php
				foreach ($model->image as $i => $value):
				?>
				<?php if($i %5 == 0 && $i != 0) echo '</div><div class="row">';?>
				<div class="col-lg-2" style="margin-top: 10px;">
				<?php
				 echo CHtml::image('/uploads/thumbs/'.$value, 'image', array('width' => '50px', 'height' => '50px')) ;
				?>
				<a data="<?php echo $value;?>" class="del_img">[ x ] </a>
				</div>
				<?php endforeach;?>

			</div>
			<?php echo Chtml::hiddenField('hd_img', json_encode($model->image), array('class' => 'arr_img')); ?>
		</div>

		<div class="form-group checkbox">
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->checkBox($model,'status', array('checked' => $model->status)); ?>
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
<script type="text/javascript">
	$(document).ready(function(){
		var url = "<?php echo app()->baseUrl?>";
		var csrf = "<?php echo Yii::app()->request->csrfToken;?>";
		$('.del_img').bind('click',function(){
			img = $(this).attr('data');
			arr_img = $('.arr_img').val();
			var r = confirm("Are you sure delete?");
			if(r == true)
			{
				$.ajax({
					'type': 'POST',
					'url': url + "/gallery/deleteImage",
					'data' : { imageDel: img, arrImage: arr_img, YII_CSRF_TOKEN: csrf },
					success:function(msg){
						$('.arr_img').attr('value', msg);

					}
				});

				del = $(this).parent();
				del.remove();
			}
		});

	});
</script>
