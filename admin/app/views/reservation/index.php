<?php
$this->pageTitle = 'Reservation';
?>

<ol class="breadcrumb">
	<li><a>Home</a></li>
	<li class="active">Dashboard</li>
</ol>

<div class="table-responsive">
	<div class="row">
	<div class="col-lg-6">
		<form method="get" id="form" action="<?php echo url($this->baseUrl.'reservation')?>">
		<div class="input-group">
			<input type="text" name="word" class="form-control" value="<?php echo $word;?>">
			<span class="input-group-btn">
				<input class="btn btn-default" value="Search" type="submit">
			</span>

		</div><!-- /input-group -->
		</form>
	</div><!-- /.col-lg-6 -->
	</div>
	<table class="table table-bordered table-hover table-striped tablesorter">
		<thead>
			<tr>
				<th>Id</th>
				<th>FirstName</th>
				<th>LastName</th>
				<th>Email</th>
				<th>Phone</th>
				<th>CheckIn</th>
				<th>CheckOut</th>
				<th>Status</th>
				<th class="action">Action</th>
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
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var url = "<?php echo url($this->baseUrl)?>";
		$('.bt_del').click(function(){
			id = $(this).attr('id');
			var r = confirm("Are you sure delete?");
			if(r == true)
			{
				$.ajax({
					'url': url + "/reservation/delete/" + id,
					success:function(msg){
						location.reload();
					}
					});
			}
		});

	});
</script>
