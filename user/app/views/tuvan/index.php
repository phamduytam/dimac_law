<?php
$this->pageTitle = 'Tư vấn';
?>
<div id="page-header">
	<div class="row">
		<div class="span12"><i class="fa fa-star fa-3"></i>
			<h3><?php echo $this->pageTitle?></h3>
		</div><!-- end .span12 -->
	</div>
</div>
<div class="container">
			<?php
				$listView = $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$content,
					'summaryText'=>'',
					'itemView'=>'_index',
					'template'=>"{items}",
				));
			?>

</div>
<div class="row">

	<?php
	$pagerCssClass	=	'span12';
	$pager			=	array(
								'class'=>'TbPager',
								'prevPageLabel'=>'Prev',
								'maxButtonCount'=>5,
								'nextPageLabel'=>'Next',
								'htmlOptions' => array('class' => 'pagination1'),
								'header' => false,
							);
	$listView->pagerCssClass = $pagerCssClass;
	$listView->pager = $pager;
	$listView->renderPager();
	?>

</div>