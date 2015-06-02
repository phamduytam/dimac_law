<tr>
	<td><?php echo $data->cat_id;?></td>
	<td><?php echo $data->name;?></td>
	<td><?php echo $data->status == 1 ? 'Hiện' : 'Ẩn';?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($data->created));?></td>
	<td>
		<a href="<?php echo url('category/edit/'.$data->cat_id);?>">Sửa <i class="fa fa-edit"></i></a><span> | </span>
		<a href="" class='bt_del' id="<?php echo $data->cat_id?>">Xoá <i class="fa fa-trash-o"></i></a>
	</td>
</tr>