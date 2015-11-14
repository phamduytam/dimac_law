<div class="row" style="padding-top: 15px;">
<div class="col-md-3 category">
	<?php if($category):?>
	<?php
		$i = 0;
		$total = count($category);
	?>
	<?php foreach($category as $v):?>
	<div class="<?php echo "showSub_".$i;?><?php if($v->id == $content->id && $content->alias != 'linh-vuc-hoat-dong-mo-dau') echo 'active'?>" >
		<a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
	</div>
	<?php
		$category1 = $this->getSubMenu($v->cat_id, $v->id);
		if($category1 && count($category1) > 0) :
			foreach($category1 as $v1):
	?>
		<div class="<?php echo "showSub_".$i." sub_".$i;?> category1 <?php if($v1->id == $content->id && $content->alias != 'linh-vuc-hoat-dong-mo-dau') echo 'active'?>"><a href="<?php echo url($this->baseUrl.getCol($v1->category, 'alias').'/'.$v1->alias.'.html')?>" title="<?php echo $v1->name?>"><?php echo $v1->name?></a></div>
	<?php
			endforeach;
		endif;
	?>
	<?php $i++;?>
	<?php endforeach;?>
	<?php endif;?>
</div>
<div class="col-md-9 content">
	<?php if($content):?>
	<?php if(isset($content->parent_id) && $content->parent_id == 0){?>
	<?php if($content->alias != 'linh-vuc-hoat-dong-mo-dau' && $content->parent_id == 0){?><h3 class="title"><?php echo $content->name?></h3><?php }?>
	<?php } else{?>
	<p style="padding:0; margin:0;"><strong><?php echo $content->name?></strong></p>
	<?php }?>
	<div class="description <?php if($content->alias == 'linh-vuc-hoat-dong-mo-dau') echo 'linhvuc' ?>"><?php echo html_entity_decode($content->content, ENT_QUOTES, 'UTF-8')?></div>
	<?php endif;?>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.category1').hide();
		<?php for($i = 0; $i < $total; $i++):?>
		$('.showSub_<?php echo $i?>').mouseover(function(){
			$('.sub_<?php echo $i?>').show();
		});
		$('.showSub_<?php echo $i?>').mouseout(function(){
			$('.sub_<?php echo $i?>').hide();
		});
		<?php endfor;?>
	});
</script>