<?php
$this->pageTitle = 'Advertise';
?>

<ol class="breadcrumb">
	<li><a href='<?php echo url($this->baseUrl)?>'>Home</a></li>
	<li><a href='<?php echo url($this->baseUrl.'advertise')?>'>List Image</a></li>
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
				'action'=>sslUrl($this->baseUrl.'advertise/edit/' . $model->id),
				'id' => 'add-form',
				'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class' => 'formBox')
			));
		?>
		<div class="form-group alert-warning alert">
			<p> - Logo: width = 200, height = 102</p>
			<p> - Giải thưởng: width = 180, height = 180</p>
			<p> - Image giới thiệu: width = 274</p>
			<p> - Còn lại những mục khác: width = 1200, height: 360 </p>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'cat_id'); ?>
			<select name="AdvertiseAR[cat_id]" class="form-control">
				<option value="logo" <?php if($model->cat_id == 'logo') echo 'selected'?>>Logo</option>
				<option value="giaithuong" <?php if($model->cat_id == 'giaithuong') echo 'selected'?>>Giải thưởng</option>
				<option value="gioithieu" <?php if($model->cat_id == 'gioithieu') echo 'selected'?>>Image giới thiệu</option>
				<?php $baiviet = new BaiVietAR(); $baiviet1 = new BaiVietAR();?>
				<?php foreach($category as $v):?>
				<option value="<?php echo $v->id?>" <?php if($model->cat_id == $v->id) echo 'selected'?>><?php echo $v->name?></option>
				<?php
					$baiviet->cat_id = $v->id;
					$baiviet->parent_id = 0;
					$sub = $baiviet->get_parent();
					if($sub):
						foreach ($sub as $v1) {
							$selected = $model->cat_id == $v1->id ? 'selected' : '';
							echo '<option value="'.$v1->id.'" '.$selected.'> - '.$v1->name.'</option>';
							$baiviet1->cat_id = $v->id;
							$baiviet1->lang = $this->langtype;
							$baiviet1->parent_id = $v1->id;
							$sub1 = $baiviet1->get_parent();
							if($sub1):
								foreach ($sub1 as $v2) {
									$selected = $model->cat_id == $v2->id ? 'selected' : '';
									echo '<option value="'.$v2->id.'" '.$selected.'> -- '.$v2->name.'</option>';
								}
							endif;

						}
					endif;
				?>
				<?php endforeach;?>
			</select>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập tên')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'url'); ?>
			<?php echo $form->textField($model,'url', array('class' => 'form-control', 'placeholder' => 'Vui lòng nhập link')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'image'); ?>
			<?php echo $form->fileField($model,'image'); ?>
			<?php echo CHtml::image('/uploads/'.$model->image, 'image', array('width' => '50px', 'height' => '50px'))?>
			<?php echo Chtml::hiddenField('hd_img', $model->image); ?>
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
