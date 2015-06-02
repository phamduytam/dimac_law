<?php if($content):?>
<?php $this->pageTitle = $content->name?>
<section class="content">
	<div class="container">
		<div class="row">
			<h3><?php echo $content->name?></h3>
			<?php echo $content->content;?>
			<?php if($other):?>
			<div class="grid_12">
				<h3><?php lang('other_blog')?></h3>
				<ul class="list1">
					<?php foreach ($other as $value):?>
					<li><a href="<?php echo url($this->baseUrl.'blog/view/'.$value->id.'/'.$value->alias)?>"><?php echo $value->name?></a></li>
					<?php endforeach;?>
				</ul>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>
<?php endif;?>