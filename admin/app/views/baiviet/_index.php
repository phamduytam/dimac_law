<tr>
	<td><?php echo $data->id;?></td>
	<td><?php echo $data->name;?></td>
	<td><?php echo $data->ordering;?></td>
	<td><?php echo $data->status == 1 ? 'Hiện' : 'Ẩn';?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($data->created));?></td>
	<td>
		<a href="<?php echo url($this->baseUrl.'baiviet/edit/'.$data->id.'?cat_id='.$data->cat_id);?>">Sửa <i class="fa fa-edit"></i></a><span> | </span>
		<a href="" class='bt_del' id="<?php echo $data->id?>">Xoá <i class="fa fa-trash-o"></i></a>
	</td>
</tr>