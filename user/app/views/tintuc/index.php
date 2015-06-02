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
	<h3 class="title"><?php echo $parent->name?></h3>
	<?php
		$listView = $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$content,
			'summaryText'=>'',
			'itemView'=>'_index',
			'template'=>"{items}",
		));
	?>
	<div class="row">

	<?php
	$pagerCssClass	=	'col-md-12';
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