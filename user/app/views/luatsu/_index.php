<div class='col-md-6'>
	<div class="col-md-3">
		<a href="<?php echo url($this->baseUrl.'luat-su/'.$data->id.'/'.$data->alias.'.html')?>">
			<img src="<?php echo app()->baseUrl;?>/uploads/<?php echo $data->image?>">
		</a>
	</div>
	<div class="col-md-9">
		<?php lang('luatsu_name')?>: <a href="<?php echo url($this->baseUrl.'luat-su/'.$data->id.'/'.$data->alias.'.html')?>">
		<?php echo $data->name;?>
		</a><br>
		Email: <?php echo $data->email?><br>
		<?php lang('luatsu_phone')?>: <?php echo $data->phone?><br>
		<?php lang('luatsu_diachi')?>: <?php echo $data->address?><br>
		<?php lang('luatsu_vanphong')?>: <?php echo getCol($data->vanphong, 'name')?><br>
	</div>
</div>