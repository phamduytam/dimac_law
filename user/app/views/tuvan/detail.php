<?php
$this->pageTitle = $tuvan->name;
$this->keyword = $tuvan->name .', '. $tuvan->alias;
$this->description = $tuvan->name .', '. $tuvan->alias;
?>
<div id="page-header">
	<div class="row">
		<div class="span12"><i class="fa fa-star fa-3"></i>
			<h3><?php echo $this->pageTitle?></h3>
		</div><!-- end .span12 -->
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<?php echo $tuvan->content?>
	</div>
</div>
<?php if($ortherList):?>
<div class="row">
	<div class="headline"><h1>Bài viết khác</h1></div>
	<ul class="fill-circle">
		<?php foreach ($ortherList as $value):?>
		<li><a href="<?php echo app()->baseUrl?>/tu-van/detail/<?php echo $value->id?>/ <?php echo $value->alias;?>"><?php echo $value->name?></a></li>
		<?php endforeach;?>
	</ul>

</div>
<?php endif;?>