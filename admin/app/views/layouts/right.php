<?php $this->beginContent('/layouts/main'); ?>
	<?php echo $this->renderPartial("//layouts/left");?>
	<div id="page-wrapper">
		<div class="col-lg-12">
			<h1><?php echo $this->pageTitle?></h1>
		</div>
		<?php echo $content; ?>
	</div>
<?php $this->endContent(); ?>
