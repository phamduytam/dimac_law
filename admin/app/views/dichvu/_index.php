<tr>
	<td><?php echo $data->id;?></td>
	<td><?php echo $data->name;?></td>
	<td><input type="text" name="order_select" class="order" id="<?php echo $data->id?>" value="<?php echo $data->order_select;?>"></td>
	<td><input type="checkbox" value="<?php echo $data->selected;?>" id="<?php echo $data->id?>" <?php echo $data->selected == 1 ? 'checked="checked"' : ''?> class='selected'></td>
	<td><?php echo $data->status == 1 ? 'Hiện' : 'Ẩn';?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($data->created));?></td>
</tr>