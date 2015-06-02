<?php
$this->pageTitle = 'Liên hệ';
?>
<div id="page-header">
	<div class="row">
		<div class="span12"><i class="fa fa-book fa-3"></i>
			<h3><?php echo $this->pageTitle;?></h3>
		</div><!-- end .span12 -->
	</div>
</div>
<div class="row">
<div class="span8">
<?php
	$form = $this->beginWidget('TbActiveForm', array(
		'action'=>sslUrl('lien-he'),
		'id' => 'contact-form',
		'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
?>
	<fieldset>
		<?php
			if (user()->hasFlash('messages'))
			{
				$messages = user()->getFlash('messages');
				echo '<div id="formstatus"><div class="alert success"><i class="fa fa-check-circle-o"></i>	'. hsp($messages). '</div></div>';
			}
		?>
			<div class="row">
				<div class="span4">
					<?php echo $form->textField($model,'name', array('placeholder' => 'Họ tên', 'class' => 'span4')); ?>
					 <?php echo $form->error($model,'name'); ?>
				</div>
				<!-- end .span4 -->
				<div class="span4">
					<?php echo $form->textField($model,'email', array('placeholder' => 'e-mail', 'class' => 'span4')); ?>
					 <?php echo $form->error($model,'email'); ?>
				</div>
				<!-- end .span4 -->
			</div>
			<!-- end .row -->

			<p><?php echo $form->textField($model,'subject', array('placeholder' => 'Tiêu đề', 'class' => 'span8')); ?></p>
			 <?php echo $form->error($model,'subject'); ?>
			<p><?php echo $form->textArea($model,'content', array('class' => 'span8', 'placeholder' => 'Viết tin nhắn', 'cols' => '25', 'rows' => '10')); ?></p>
			 <?php echo $form->error($model,'content'); ?>
			<p class="text-right"><input class="btn btn-green" id="submit" name="submit" value="Send" type="submit"></p>

	</fieldset>
<?php
	$this->endWidget();
?>

</div>
<!-- end .span8 -->
<div class="span4">
<?php echo $contact->content?>

</div>
<!-- end .span4 --></div>
