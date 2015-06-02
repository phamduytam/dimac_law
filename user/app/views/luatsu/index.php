<!--=====================
Content
======================-->
<section class="content">
	<div class="container lienhe">
		<div class="row">
			<div style="margin-bottom: 10px;">
				<h3 class="title"><?php lang('luatsu')?></h3>
			</div>
			<div class="row">
				<div class="description col-md-12"><?php echo $luatsu ? html_entity_decode($luatsu->content, ENT_QUOTES, 'UTF-8') : ''?></div>
				<?php
					$form = $this->beginWidget('TbActiveForm', array(
						'action'=>sslUrl($this->baseUrl.'luat-su.html'),
						'id' => 'form',
						'method' => 'GET',
						'htmlOptions'=>array('enctype' => 'multipart/form-data')
					));
				?>
	 				<div class="form-group col-md-6">
	 					<input type="text" name="name" value="<?php echo $get_name?>" class="form-control" placeholder="<?php lang('search_name')?>">
					</div>
					<div class="form-group col-md-6">
						<select name="linhvuc" class="form-control">
							<option value="0"><?php lang('search_linhvuc')?></option>
							<?php foreach($linhvuc as $v):?>
							<option value="<?php echo $v->id?>" <?php if($get_linhvuc == $v->id) echo 'selected'?>><?php echo $v->name;?></option>	
							<?php endforeach;?>
						</select>	
						
					</div>
					<div class="form-group col-md-6">
						<select name="chucdanh" class="form-control">
							<option value="0"><?php lang('search_chucdanh')?></option>
							<?php foreach($chucdanh as $v):?>
							<option value="<?php echo $v->id?>" <?php if($get_chucdanh == $v->id) echo 'selected'?>><?php echo $v->name;?></option>	
							<?php endforeach;?>
						</select>	
					</div>
					<div class="form-group col-md-6">
						<select name="vanphong" class="form-control">
							<option value="0"><?php lang('search_vanphong')?></option>
							<?php foreach($vanphong as $v):?>
							<option value="<?php echo $v->id?>" <?php if($get_vanphong == $v->id) echo 'selected'?>><?php echo $v->name;?></option>	
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
			<div class="row">
				<?php
					$listView = $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$content,
						'summaryText'=>'',
						'itemView'=>'_index',
						'template'=>"{items}",
					));
				?>
				<?php
					$pagerCssClass	=	'span12';
					$pager			=	array(
												'class'=>'TbPager',
												'prevPageLabel'=>'Prev',
												'maxButtonCount'=>5,
												'nextPageLabel'=>'Next',
												'htmlOptions' => array('class' => 'pagination'),
												'header' => false,
											);
					$listView->pagerCssClass = $pagerCssClass;
					$listView->pager = $pager;
					$listView->renderPager();
				?>
			</div>
			<?php endif;?>	

		</div>
	</div>
</section>
