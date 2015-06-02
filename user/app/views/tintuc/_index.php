<div class="row">
	<div class="col-md-2">
		<div class="box_time">
			<?php echo date('M d Y', strtotime($data->created))?>
		</div>
	</div>
	<div class="col-md-10">
		<div class="title"><a href="<?php echo url($this->baseUrl.getCol($data->category, 'alias').'/view/'.$data->alias.'.html')?>" title="<?php echo $data->name?>"><?php echo $data->name?></a></div>
		<div class="description"><?php echo $data->description?></div>
	</div>
</div>
