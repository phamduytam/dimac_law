<tr>
	<td><?php echo $data->id;?></td>
	<td><?php echo $data->name;?></td>
	<td><?php echo $data->ordering;?></td>
	<td><?php echo getCol($data->linhvuc, 'name');?></td>
	<td><?php echo getCol($data->chucdanh, 'name');?></td>
	<td>
		<a href="<?php echo url('luatsu/edit/'.$data->id);?>">Sửa <i class="fa fa-edit"></i></a><span> | </span>
		<a href="" class='bt_del' id="<?php echo $data->id?>">Xoá <i class="fa fa-trash-o"></i></a>
	</td>
</tr>