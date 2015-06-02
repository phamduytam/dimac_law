<?php
$this->pageTitle = 'Bài viết';
?>

<ol class="breadcrumb">
	<li class="active"><i class="fa fa-star-o"></i> <a><?php echo $this->pageTitle?></a></li>
</ol>
<div class="table-responsive">
<div class="row">
	<div class="col-lg-6">
		<form method="get" id="form" action="<?php echo url($this->baseUrl.'baiviet')?>">
		<div class="input-group">
			<input type="text" name="word" class="form-control" value="<?php echo $word;?>">
			<input type="hidden" name="cat_id" class="form-control" value="<?php echo $cat_id;?>">
			<span class="input-group-btn">
				<input class="btn btn-default" value="Search" type="submit">
			</span>

		</div><!-- /input-group -->
		</form>
	</div><!-- /.col-lg-6 -->
	<div class="col-lg-3 pull-right">
		<p class="text-right">
			<a href="<?php echo url($this->baseUrl.'baiviet/add?cat_id='.$cat_id)?>"><button class="btn btn-primary" type="button">Add</button></a>
		</p>
	</div><!-- /input-group -->
</div><!-- /.col-lg-6 -->
</div>

<div class="message"></div>
<table class="table table-bordered table-hover table-striped tablesorter">
	<thead>
		<tr>
			<th>Id <i class="fa fa-sort"></i></th>
			<th>Tiêu đề <i class="fa fa-sort"></i></th>
			<th>Thứ tự <i class="fa fa-sort"></i></th>
			<th>Chọn <i class="fa fa-sort"></i></th>
			<th>Ẩn / Hiện <i class="fa fa-sort"></i></th>
			<th>Ngày tạo <i class="fa fa-sort"></i></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$listView = $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$content,
				'summaryText'=>'',
				'itemView'=>'_index',
				'template'=>"{items}",
			));
		?>
	</tbody>
</table>
</div>
<?php
$pagerCssClass	=	'bs-example';
$pager			=	array(
							'class'=>'TbPager',
							'prevPageLabel'=>'Prev',
							'maxButtonCount'=>5,
							'nextPageLabel'=>'Next',
							'htmlOptions' => array('class' => 'pagination'),
							'header' => false
						);
$listView->pagerCssClass = $pagerCssClass;
$listView->pager = $pager;
$listView->renderPager();
?>
<script type="text/javascript">
	$(document).ready(function(){
		var url = "<?php echo app()->baseUrl?>";
		$('.order').keyup(function() {
			value = $(this).val();
			id = $(this).attr('id');
			$.ajax({
				url: url + '/dichvu/update/'+id,
				method: 'GET',
				data: { order_select: value },
				success:function(msg){
				}
				});
		});
		$('.selected').click(function() {
			
			if ($(this).is(':checked') ) {
			    value = 1;
			} else
			{
				value = 0;
			}

			id = $(this).attr('id');
			$.ajax({
				url: url + '/dichvu/update/'+id,
				method: 'GET',
				data: { selected: value },
				success:function(msg){
				}
				});
		});
		$('.bt_del').click(function(){
			id = $(this).attr('id');
			var r = confirm("Bạn thực sự muốn xoá");
			if(r == true)
			{
				$.ajax({
					'url': url + "/baiviet/delete/" + id,
					success:function(msg){
					}
					});
			}
		});

	});
</script>