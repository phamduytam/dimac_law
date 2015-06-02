<?php $this->beginContent('/layouts/main'); ?>
<!-- content -->
<div id="content">

<a name ="top"></a>

<?php echo $this->renderPartial('//elements/header'); ?>

<!-- main -->
<div class="container-fluid main_theme">

	<?php echo $content; ?>

<?php echo $this->renderPartial('//elements/copyright' . Category::changeLayout($this,'')); ?>


</div>
<!-- /main -->

</div>
<!-- /content -->

<?php echo $this->renderPartial('//elements/global_menu' . Category::changeLayout($this,'')); ?>

<?php $this->endContent(); ?>

