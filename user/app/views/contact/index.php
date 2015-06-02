<!--=====================
Content
======================-->
<section class="content">
	<div class="container lienhe">
		<div class="row">
			<div style="margin-bottom: 30px;">
				<h3 class="title"><?php lang('contact_us')?></h3>
			</div>
			<div class="col-md-4">
			<?php if($address):?>
			<?php echo html_entity_decode($address->content, ENT_QUOTES, 'UTF-8')?>
			<?php endif;?>
			</div>
			<div class="col-md-8">
				<div class="description"><?php echo $contact ? html_entity_decode($contact->content, ENT_QUOTES, 'UTF-8') : ''?></div>
				<?php
					$form = $this->beginWidget('TbActiveForm', array(
						'action'=>sslUrl('contact'),
						'id' => 'form',
						'htmlOptions'=>array('enctype' => 'multipart/form-data')
					));
				?>
					<?php
						if (user()->hasFlash('messages'))
						{
							$messages = user()->getFlash('messages');
							echo '<div id="formstatus"><div class="alert alert-success"><i class="fa fa-check-circle-o"></i>	'. hsp($messages). '</div></div>';
						}
					?>
	 				<div class="form-group">
						<?php echo $form->textField($model,'name', array('placeholder' => lang('name', false), 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'name'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->textField($model,'email', array('placeholder' => lang('email', false), 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->textField($model,'phone', array('placeholder' => lang('phone', false), 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'phone'); ?>
					</div>
					<div class="form-group">
						<select class="form-control" name='ContactAR[subject]' style="font-weight: 500; font-size: 15px; ">
								<option value="<?php lang('contact_subject1')?>"><?php lang('contact_subject1')?></option>
								<option value="<?php lang('contact_subject2')?>"><?php lang('contact_subject2')?></option>
								<option value="<?php lang('contact_subject3')?>"><?php lang('contact_subject3')?></option>
								<option value="<?php lang('contact_subject4')?>"><?php lang('contact_subject4')?></option>
						</select>
						<?php echo $form->error($model,'subject'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->textArea($model,'content', array('placeholder' => lang('message_contact', false), 'class' => 'form-control', 'rows' => 10)); ?>
						<?php echo $form->error($model,'content'); ?>
					</div>
					<div class="clear"></div>
					<input class="btn btn-green" id="submit" name="submit" value="<?php lang('send')?>" type="submit" style="border:0">

				<?php
					$this->endWidget();
				?>
			</div>
		</div>
	</div>
</section>
