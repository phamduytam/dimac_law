<tr>
	<td><?php echo $data->id;?></td>
	<td><?php echo $data->name;?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($data->created));?></td>
	<td><?php echo $data->status == 1 ? 'Enable' : 'Disable';?></td>
	<td class="action">
		<a href="<?php echo url($this->baseUrl.'category/edit/'.$data->id);?>" class="ico ico-edit" title="Edit"><i class="fa fa-edit"> Edit</i></a>
		<?php if(isset($_GET['name']) && $_GET['name'] == 'tam'):?><a href="" id="<?php echo $data->id?>" class="ico ico-delete bt_del" title="Delete"><i class="fa fa-trash-o"> Delete</i></a><?php endif;?>
	</td>
</tr>