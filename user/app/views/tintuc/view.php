<div class="row" style="padding-top: 15px;">
<div class="col-md-3 category">
	<?php if($category):?>
	<?php foreach($category as $v):?>
	<div <?php if($v->id == $content->id) echo 'class="active"'?>><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a></div>
	<?php endforeach;?>
	<?php endif;?>
</div>
<div class="col-md-9 content">
	<?php if($content):?>
	<h3 class="title"><?php echo $content->name?></h3>
	<div class="description"><?php echo html_entity_decode($content->content, ENT_QUOTES, 'UTF-8')?></div>
	<?php endif;?>
	<?php if($other):?>
	<div class="row list_other">
		<h3 class="title"><?php lang('other_blog')?></h3>
		<ul class="">
			<?php foreach ($other as $value):?>
			<li><a href="<?php echo url($this->baseUrl.getCol($category[1]->category,'alias').'/view/'.$value->alias.'.html')?>"><?php echo $value->name?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php endif;?>
</div>
</div>

