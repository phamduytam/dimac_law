<div class="grid_4" style="margin-bottom: 20px;">
	<?php $image = json_decode($data->image);?>
	<a href="<?php echo url($this->baseUrl.'gallery/view/'.$data->id.'/'.$data->alias)?>" class="lightbox" title="Hotel Bến Lức - <?php echo $data->name?>">
		<img src="<?php echo app()->baseUrl;?>/uploads/thumbs/<?php echo $image[0];?>" alt="<?php echo $data->name?>">
	</a>
	<div class="text1">
		<a href="<?php echo url($this->baseUrl.'gallery/view/'.$data->id.'/'.$data->alias)?>"><?php echo $data->name?></a>
	</div>
</div>
