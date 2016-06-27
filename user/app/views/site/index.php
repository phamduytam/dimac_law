<div class="gioithieu">
	<div class="row" style="position:relative;">
		<div class="col-md-9">
			<div class="title">DIMAC</div>
			<div class="description">
			<?php if($gioithieu):?>
			<?php echo html_entity_decode($gioithieu->content, ENT_QUOTES, 'UTF-8')?>
			<?php endif;?>
			</div>
		</div>
		<div class="col-md-3" style="position:absolute;right:0px;bottom:10px;">
			<img src="<?php echo app()->baseUrl?>/<?php echo $img_gioithieu ? 'uploads/'.$img_gioithieu->image : 'images/img.png'?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-7">
		<?php if($dichvu):?>
		<div class="dichvu">
			<h3 class="title"><?php lang('site_dichvu')?></h3>
			<div class="row">
				<?php $i = 1;?>
				<div class="col-md-4">
					<?php foreach($dichvu as $v):?>
					<div><a href="<?php echo $this->baseUrl;?><?php echo getCol($v->category, 'alias')?>/<?php echo $v->alias?>.html" title="<?php echo $v->name?>"><?php echo $v->name?></a></div>
					<?php
						if($i % 4 == 0) echo '</div><div class="col-md-4">';
						$i++;
					?>
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<?php endif;?>
	</div>
	<div class="col-md-5">
		<?php if($tintuc):?>
		<div class="tintuc">
			<h3 class="title"><?php lang('site_tintuc')?></h3>
			<?php foreach($tintuc as $v):?>
					<div class="news_title"><a href="<?php echo $this->baseUrl;?><?php echo getCol($v->category, 'alias')?>/view/<?php echo $v->alias?>.html" title="<?php echo $v->name?>"><?php echo $v->name?></a></div>
					<?php endforeach;?>
		</div>
		<?php endif;?>
	</div>
</div>
<br>
<?php if($giaithuong):?>
<div class="list_carousel">
				<ul id="foo3">
					<?php foreach($giaithuong as $v):?>
					<li><img src="/uploads/<?php echo $v->image?>"></li>
				<?php endforeach;?>

				</ul>	
				<div class="clearfix"></div>
			</div>
<style>
.list_carousel {
				
			}
			.list_carousel ul {
				
				margin: 0;
				padding: 0;
				list-style: none;
				display: block;
			}
			.list_carousel li {
				
				text-align: center;
				width: 180px;
				height: 180px;
				padding: 0;
				margin-right: 10px;
				display: block;
				float: left;
			}
			.list_carousel li:last-child {
				
				text-align: center;
				width: 180px;
				height: 178px;
				padding: 0;
				margin-right: 0px;
				display: block;
				float: left;
			}

			.clearfix {
				float: none;
				clear: both;
			}
			.prev {
				float: left;
				margin-left: 10px;
			}
			.next {
				float: right;
				margin-right: 10px;
			}
			.pager {
				float: left;
				width: 300px;
				text-align: center;
			}
			.pager a {
				margin: 0 5px;
				text-decoration: none;
			}
			.pager a.selected {
				text-decoration: underline;
			}
			.timer {
				background-color: #999;
				height: 6px;
				width: 0px;
			}
</style>			
<script src="/js/jquery.carouFredSel-4.2.3.js"></script>			
<script>
$('#foo3').carouFredSel({
					width: 'auto',
					height:190,
					scroll:
					{
						items:1,
						duration:500
					},
					next: '#next3',
					prev: '#prev3',
					auto:{
						pauseOnHover: 'resume'
					},
					wrap:'circular'
				});
</script>
<?php endif;?>
