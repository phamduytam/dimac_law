<li class="item term-1">
	<div class="portfolio-item">
		<div class="portfolio-item-preview">
			<a href="<?php echo url('/hoa-mai/detail/' . $data->id . '/' . $data->alias)?>"> <img src="<?php echo app()->baseUrl?>/uploads/<?php echo $data->image?>" class="img_product" alt="<?php echo $data->name?>"> </a>
			<a href="<?php echo url('/hoa-mai/detail/' . $data->id . '/' . $data->alias)?>"><div class="portfolio-item-overlay"></div></a>
		</div>

		<div class="portfolio-item-description">
			<h4><a href="<?php echo url('/hoa-mai/detail/' . $data->id . '/' . $data->alias)?>"><?php echo $data->name?></a></h4>
			<div class="description"><?php echo $data->description;?></div>
		</div>
	</div>
</li>