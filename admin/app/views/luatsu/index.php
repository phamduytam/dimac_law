<?php
$this->pageTitle = 'Luật sư';
?>

<ol class="breadcrumb">
	<li class="active"><i class="fa fa-star-o"></i> <a><?php echo $this->pageTitle;?></a></li>
</ol>
<div class="table-responsive">
<div class="row">
	<div class="col-lg-6">
		<form method="get" id="form" action="/admin/luatsu">
		<div class="input-group">
			<input type="text" name="word" class="form-control" value="<?php echo $word;?>">
			<span class="input-group-btn">
				<input class="btn btn-default" value="Search" type="submit">
			</span>

		</div><!-- /input-group -->
		</form>
	</div><!-- /.col-lg-6 -->
	<div class="col-lg-3 pull-right">
		<p class="text-right">
			<a href="<?php echo url('luatsu/add')?>"><button class="btn btn-primary" type="button">Add</button></a>
		</p>
	</div><!-- /input-group -->
</div><!-- /.col-lg-6 -->
</div>

<div class="message"></div>
<table class="table table-bordered table-hover table-striped tablesorter">
	<thead>
		<tr>
			<th>Id <i class="fa fa-sort"></i></th>
			<th>Tên luật sư <i class="fa fa-sort"></i></th>
			<th>Thứ tự <i class="fa fa-sort"></i></th>
			<th>Lĩnh vực <i class="fa fa-sort"></i></th>
			<th>Chức danh <i class="fa fa-sort"></i></th>
			<th>Tuỳ chỉnh </th>
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
		$('.bt_del').click(function(){
			id = $(this).attr('id');
			var r = confirm("Bạn thực sự muốn xoá");
			if(r == true)
			{
				$.ajax({
					'url': url + "/luatsu/delete/" + id,
					success:function(msg){
					}
					});
			}
		});

	});
</script>