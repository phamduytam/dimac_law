<tr>
	<td><a href="<?php echo url('contact/view/'.$data->id);?>"><?php echo $data->id;?></a></td>
	<td><?php echo $data->subject;?></td>
	<td><?php echo $data->name;?></td>
	<td><?php echo $data->email;?></td>
	<td><?php echo date('d-m-Y',strtotime($data->created));?></td>
	<td><?php echo $data->status == 1 ? 'Unread ' : 'Readed ';?></td>
	<td class="action">
		<a href="<?php echo url($this->baseUrl.'contact/view/'.$data->id);?>" class="ico ico-edit" title="Edit"><i class="fa fa-edit"> View</i></a>
		<a href="" id="<?php echo $data->id?>" class="ico ico-delete bt_del" title="Delete"><i class="fa fa-trash-o"> Delete</i></a>
	</td>
</tr>