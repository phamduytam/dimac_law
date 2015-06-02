
<!--=====================
          Content
======================-->
<section class="content">
	<div class="container">
		<div class="row">
			<div class="grid_12">
				<h3><?php lang('our_gallery')?></h3>
			</div>
			<?php
				$listView = $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$content,
					'summaryText'=>'',
					'itemView'=>'_index',
					'template'=>"{items}",
				));
			?>
		</div>
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
</section>