<tr>
	<td><?php echo $data->id;?></td>
	<td><?php echo $data->subject;?></td>
	<td><?php echo $data->name;?></td>
	<td><?php echo $data->email;?></td>
	<td><?php echo $data->status == 1 ? 'Chưa xem ' : 'Đã xem ';?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($data->created));?></td>
	<td>
		<a href="<?php echo url('contact/view/'.$data->id);?>">Xem <i class="fa fa-eye"></i></a><span> | </span>
		<a href="" class='bt_del' id="<?php echo $data->id?>">Xoá <i class="fa fa-trash-o"></i></a>
	</td>
</tr>