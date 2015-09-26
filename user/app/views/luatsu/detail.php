<!--=====================
Content
======================-->
<section class="content">
	<div class="container lienhe">
		<div class="row">
			<div style="margin-bottom: 10px;">
				<h3 class="title"><?php lang('luatsu_thongtin')?></h3>
			</div>
			<div class="row">
				<div class="description col-md-12"><?php echo $luatsu ? html_entity_decode($luatsu->content, ENT_QUOTES, 'UTF-8') : ''?></div>
				<?php
					$form = $this->beginWidget('TbActiveForm', array(
						'action'=>sslUrl($this->baseUrl.'luat-su.html#result'),
						'id' => 'form',
						'method' => 'GET',
						'htmlOptions'=>array('enctype' => 'multipart/form-data')
					));
				?>
	 				<div class="form-group col-md-6">
	 					<input type="text" name="name" class="form-control" placeholder="<?php lang('search_name')?>">
					</div>
					<div class="form-group col-md-6">
						<select name="linhvuc" class="form-control">
							<option value="0"><?php lang('search_linhvuc')?></option>
							<?php foreach($linhvuc as $v):?>
							<option value="<?php echo $v->id?>"><?php echo $v->name;?></option>	
							<?php endforeach;?>
						</select>	
						
					</div>
					<div class="form-group col-md-6">
						<select name="chucdanh" class="form-control">
							<option value="0"><?php lang('search_chucdanh')?></option>
							<?php $con_chucdanh = "";?>
							<?php foreach($chucdanh as $v):?>
							<?php if($v->id == $content->chucdanh_id) $con_chucdanh = $v->name;?>
							<option value="<?php echo $v->id?>"><?php echo $v->name;?></option>	
							<?php endforeach;?>
						</select>	
					</div>
					<div class="form-group col-md-6">
						<select name="vanphong" class="form-control">
							<option value="0"><?php lang('search_vanphong')?></option>
							<?php $con_vanphong = "";?>
							<?php foreach($vanphong as $v):?>
							<?php if($v->id == $content->vanphong_id) $con_vanphong = $v->name;?>
							<option value="<?php echo $v->id?>"><?php echo $v->name;?></option>	
							<?php endforeach;?>
						</select>		
					</div>
					<div class="clear"></div>
					<div class="col-md-6"><input class="btn btn-green" id="submit" value="<?php lang('search')?>" type="submit" style="border:0"></div>

				<?php
					$this->endWidget();
				?>
			</div>
			<?php if($content):?>
			<hr>
			<div class="row" id="content">
				<div class="col-md-3">
					<p align="center"><img src="<?php echo app()->baseUrl;?>/uploads/<?php echo $content->image?>" align="center"></p>
					<?php lang('luatsu_diachi')?>: <?php echo $content->address?><br>
					<?php lang('luatsu_phone')?>: <?php echo $content->phone?><br>	
					<?php lang('luatsu_vanphong')?>: <?php echo $con_vanphong?><br>

					<br>
					<?php echo html_entity_decode($content->content1, ENT_QUOTES, 'UTF-8'); ?>
				</div>
				<div class="col-md-9">
					<?php lang('luatsu_name')?>: <?php echo $content->name?><br>
					Email: <?php echo $content->email?><br>
					<?php lang('luatsu_chucdanh')?>: <?php echo $con_chucdanh;?><br>
					<?php echo html_entity_decode($content->content, ENT_QUOTES, 'UTF-8'); ?>
				</div>
				
			</div>
			<?php endif;?>	

		</div>
	</div>
</section>
