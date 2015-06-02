<?php if($content):?>
<?php $this->pageTitle = $content->name?>
<section class="content">
	<div class="container">
		<div class="row">
			<h3 class="head__2"><?php echo $content->name?></h3>
			<?php echo $content->content;?>
			<?php if($other):?>
			<div class="grid_12">
				<h3><?php lang('other_room')?></h3>
				<div id="owl1">
					<?php foreach ($other as $i => $value):?>
					<div class="item">
						<div class="box1">
							<a href="<?php echo url($this->baseUrl.'room/view/'.$value->id.'/'.$value->alias)?>">
								<img src="<?php echo app()->baseUrl;?>/uploads/thumbs/<?php echo $value->image?>" alt="<?php echo $value->name?>">
							</a>
							<div class="text1" style="margin-top: 20px;">
								<a href="<?php echo url($this->baseUrl.'room/view/'.$value->id.'/'.$value->alias)?>"><?php echo $value->name?></a>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>
<?php endif;?>