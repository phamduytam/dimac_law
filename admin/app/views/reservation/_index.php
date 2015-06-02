
<tr>
	<td><a href="<?php echo url('reservation/view/'.$data->id);?>"><?php echo $data->id;?></a></td>
	<td><?php echo $data->firstName;?></td>
	<td><?php echo $data->lastName;?></td>
	<td><?php echo $data->email;?></td>
	<td><?php echo phoneFormat($data->phone);?></td>
	<td><?php echo date('d-m-Y',strtotime($data->checkIn));?></td>
	<td><?php echo date('d-m-Y',strtotime($data->checkOut));?></td>
	<td><?php echo $data->status == 1 ? 'Unread ' : 'Readed ';?></td>
	<td class="action">

		<a href="<?php echo url($this->baseUrl.'reservation/view/'.$data->id);?>" class="ico ico-edit" title="Edit" alt="Edit"><i class="fa fa-edit"> View</i></a>
		<a href="" id="<?php echo $data->id?>" class="ico ico-delete bt_del" title="Delete" alt="Delete"><i class="fa fa-trash-o"> Delete</i></a>
	</td>
</tr>