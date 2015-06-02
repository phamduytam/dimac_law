
<!--=====================
          Content
======================-->
<section class="content">
	<div class="container">
		<div class="row">
			<div class="grid_8">
				<h3><?php lang('blog')?></h3>
				<?php
					$listView = $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$content,
						'summaryText'=>'',
						'itemView'=>'_index',
						'template'=>"{items}",
					));
				?>
			</div>
			<div class="grid_4">
				<?php if($advertise):?>
					<h3><?php lang('advertise')?></h3>
					<?php foreach ($advertise as $value):?>
					<p><a href="<?php echo $value->url != '' ? $value->url : ''?>">
						<img alt="Hotel Bến Lức" src="<?php echo app()->baseUrl;?>/uploads/<?php echo $value->image?>">
					</a></p>
					<?php endforeach;?>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>
