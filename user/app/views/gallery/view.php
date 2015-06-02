<?php if($content):?>
<?php $this->pageTitle = $content->name?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
<section class="content">
	<div class="container">
		<div class="row">
			<h3><?php echo $content->name?></h3>
			<?php $image = json_decode($content->image);?>
			<?php foreach ($image as $value):?>
			<div class="grid_4" style="margin-bottom: 20px;">
				<a href="<?php echo app()->baseUrl;?>/uploads/<?php echo $value?>" class="lightbox fancybox" data-fancybox-group="gallery" title="Hotel Bến Lức - <?php echo $content->name?>">
					<img src="<?php echo app()->baseUrl;?>/uploads/thumbs/<?php echo $value;?>" alt="<?php echo $content->name?>">
				</a>
			</div>
			<?php endforeach;?>
			<?php if($other):?>
			<div class="grid_12">
				<h3><?php lang('other_gallery')?></h3>
				<div id="owl1">
					<?php foreach ($other as $value):?>
					<?php $image = json_decode($value->image);?>
					<div class="item">
						<div class="box1">
							<a href="<?php echo url($this->baseUrl.'gallery/view/'.$value->id.'/'.$value->alias)?>" title="Hotel Bến Lức - <?php echo $value->name?>">
								<img src="<?php echo app()->baseUrl;?>/uploads/thumbs/<?php echo $image[0]?>" alt="<?php echo $value->name?>">
							</a>
							<div class="text1" style="margin-top: 20px;">
								<a href="<?php echo url($this->baseUrl.'gallery/view/'.$value->id.'/'.$value->alias)?>"><?php echo $value->name?></a>
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
<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/jquery.fancybox.css">
<script src="<?php echo app()->baseUrl;?>/js/jquery.fancybox.js"></script>

