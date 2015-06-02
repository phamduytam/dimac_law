
<tr>
	<td><?php echo $data->id;?></td>
	<td><?php echo $data->name;?></td>
	<td><?php echo getCol($data->category, 'name');?></td>
	<td><?php echo $data->order;?></td>
	<td><?php echo $data->status == 1 ? 'Hiện' : 'Ẩn';?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($data->created));?></td>
	<td>
		<a href="<?php echo url('advertise/edit/'.$data->id);?>">Sửa <i class="fa fa-edit"></i></a><span> | </span>
		<a href="" class='bt_del' id="<?php echo $data->id?>">Xoá <i class="fa fa-trash-o"></i></a>
	</td>
</tr>