<div class="blog">
	<div class="text1"><a href="<?php echo url($this->baseUrl.'blog/view/'.$data->id.'/'.$data->alias)?>" title="<?php echo $data->name?>"><?php echo $data->name?></a></div>
	<div class="blog_links"><time datetime="<?php echo date('Y-m-d', strtotime($data->created))?>"><?php echo date('D, d/m/Y - H:i', strtotime($data->created))?></time></div>
	<a href="<?php echo url($this->baseUrl.'blog/view/'.$data->id.'/'.$data->alias)?>">
		<img src="<?php echo app()->baseUrl?>/uploads/<?php echo $data->image?>" alt="" class="img_inner">
	</a>
	<?php echo $data->description?><br>
	<a href="<?php echo url($this->baseUrl.'blog/view/'.$data->id.'/'.$data->alias)?>" class="btn"><?php lang('more')?></a>
</div>
