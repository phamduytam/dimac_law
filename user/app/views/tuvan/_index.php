
<div class="row">
	<div class="span4">
		<a href="<?php echo url('/tu-van/detail/' . $data->id . '/' . $data->alias)?>"> <img src="<?php echo app()->baseUrl?>/uploads/<?php echo $data->image?>" class="img_product" alt="<?php echo $data->name?>"> </a>
	</div>
	<div class="span8">
		<h4><a href="<?php echo url('/tu-van/detail/' . $data->id . '/' . $data->alias)?>"><?php echo $data->name?></a></h4>
		<div class="description"><?php echo $data->description;?></div>
	</div>
</div>