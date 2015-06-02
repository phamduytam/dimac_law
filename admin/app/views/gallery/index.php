<?php
$this->pageTitle = 'Gallery';
?>


<ol class="breadcrumb">
	<li><a href='<?php echo url($this->baseUrl)?>'>Home</a></li>
	<li class="active">Gallery</li>
</ol>
<!-- box -->
<div class="table-responsive">
	<div class="row">
		<div class="col-lg-6">
			<form method="get" id="form" action="<?php echo url($this->baseUrl.'gallery')?>">
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
				<a href="<?php echo url($this->baseUrl.'gallery/add')?>"><button class="btn btn-primary" type="button">Add</button></a>
			</p>
		</div><!-- /input-group -->
	</div>
	<!-- table -->
	<table class="table table-bordered table-hover table-striped tablesorter">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Created</th>
				<th>Status</th>
				<th class="action">Action</th>
			</tr>
		</thead>
		<?php
		$listView = $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$content,
					'summaryText'=>'',
					'itemView'=>'_index',
					'template'=>"{items}",
		));
		?>
	</table>
	<!-- /table -->
	<!-- /box-action -->
	<!-- /pagination -->
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
	<!-- /pagination -->
</div>
<!-- /box -->

<script type="text/javascript">
	$(document).ready(function(){
		var url = "<?php echo url($this->baseUrl)?>";
		$('.bt_del').click(function(){
			id = $(this).attr('id');
			var r = confirm("Are you sure delete?");
			if(r == true)
			{
				$.ajax({
					'url': url + "/gallery/delete/" + id,
					success:function(msg){
						location.reload();
					}
					});
			}
		});

	});
</script>