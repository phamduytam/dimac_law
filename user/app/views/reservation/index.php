
<!--=====================
          Content
======================-->
<section class="content">
	<div class="container">
		<div class="row">
			<div class="grid_8">
				<h3><?php lang('term_condition')?></h3>
				<?php if($condition):?>
				<ul class="list">
					<?php foreach ($condition as $i => $value):?>
					<li>
						<div class="count <?php echo $i == 0 ? '' : 'bt__'.$i;?>"><?php echo $i+1?></div>
						<div class="extra_wrapper">
						<div class="text1"><a href="#"><?php echo $value->name?></a></div>
						<?php echo $value->content?>
						</div>
					</li>
					<?php endforeach;?>
				</ul>
				<?php endif;?>
				<?php if($hour):?>
				<h3 class="head__1"><?php echo $hour->name?></h3>
				<?php echo $hour->content?>
				<?php endif;?>

				<?php if($phone):?>
				<h3><?php echo $phone->name?></h3>
				<?php echo $phone->content?>
				<?php endif;?>
			</div>
			<div class="grid_4">
			<?php
				$form = $this->beginWidget('TbActiveForm', array(
					'id' => 'bookingForm',
					'action' => '/reservation',
					'htmlOptions'=>array('enctype' => 'multipart/form-data')
				));

			?>
			<div class="tmInput" style="display:none">
				<?php echo CHtml::hiddenField('YII_CSRF_TOKEN',Yii::app()->request->csrfToken);?>
			</div>
			<div class="form_title"><?php lang('your_reservation')?></div>
			<span><?php lang('checkIn')?></span>
			<div class="tmDatepicker">
				<?php echo $form->textField($model, 'checkIn', array('placeholder' => '10/05/2014', 'data-constraints' => '@NotEmpty @Required @Date')); ?>
				<?php echo $form->error($model,'checkIn', array('class' => 'error-message', 'style' => 'display: inline-block;')); ?>
			</div>
			<span><?php lang('checkOut')?></span>

			<div class="tmDatepicker">
			<?php echo $form->textField($model, 'checkOut', array('placeholder' => '20/05/2014', 'data-constraints' => '@NotEmpty @Required @Date')); ?>
			<?php echo $form->error($model,'checkOut', array('class' => 'error-message', 'style' => 'display: inline-block;')); ?>
			</div>
			<span><?php lang('firstName')?></span>
			<div class="tmInput">
			<?php echo $form->textField($model, 'firstName', array('placeholder' => '', 'data-constraints' => '@NotEmpty @Required @AlphaSpecial')); ?>
			<?php echo $form->error($model,'firstName', array('class' => 'error-message', 'style' => 'display: inline-block;')); ?>
			</div>
			<span><?php lang('lastName')?></span>
			<div class="tmInput">
			<?php echo $form->textField($model, 'lastName', array('placeholder' => '', 'data-constraints' => '@NotEmpty @Required @AlphaSpecial')); ?>
			<?php echo $form->error($model,'lastName', array('class' => 'error-message', 'style' => 'display: inline-block;')); ?>
			</div>
			<span><?php lang('email')?></span>
			<div class="tmInput">
			<?php echo $form->textField($model, 'email', array('placeholder' => '', 'data-constraints' => '@NotEmpty @Required @Email')); ?>
			<?php echo $form->error($model,'email', array('class' => 'error-message', 'style' => 'display: inline-block;')); ?>
			</div>
			<span><?php lang('phone')?></span>
			<div class="tmInput">
			<?php echo $form->textField($model, 'phone', array('placeholder' => '', 'data-constraints' => '@NotEmpty @Required @Phone')); ?>
			<?php echo $form->error($model,'phone', array('class' => 'error-message', 'style' => 'display: inline-block;')); ?>
			</div>
			<span></span><span></span>
			<div class="tmTextarea">
			<?php echo $form->textArea($model,'content', array('placeholder' => lang('message', false), 'data-constraints' => '@Required @Length(min=20,max=999999)')); ?>
			<?php echo $form->error($model,'content', array('class' => 'error-message', 'style' => 'display: inline-block;')); ?>
			</div>
			<div class="clear"></div>
			<a href="#" class="btn" data-type="submit"><?php lang('book')?></a>
			<div class="clear"></div>
			<?php
				$this->endWidget();
			?>
			</div>
		</div>
	</div>
</section>
<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/booking/css/booking.css">
<script src="<?php echo app()->baseUrl;?>/booking/js/booking.js"></script>
<script>
  $(function (){
        $('#bookingForm').bookingForm({
            ownerEmail: '#'
        });
    })
    $(function() {
 $('#bookingForm input, #bookingForm textarea').placeholder();
});
</script>
