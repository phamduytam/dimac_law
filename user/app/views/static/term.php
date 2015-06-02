<div class="row" style="padding-top: 15px;">
<div class="col-md-3 category">
	<div <?php if(app()->controller->action->id == 'link') echo 'class="active"'?>><a href="<?php echo url($this->baseUrl.'link.html')?>">Link</a></div>
	<div <?php if(app()->controller->action->id == 'sitemap') echo 'class="active"'?>><a href="<?php echo url($this->baseUrl.'sitemap.html')?>">Sitemap</a></div>
	<div <?php if(app()->controller->action->id == 'terms') echo 'class="active"'?>><a href="<?php echo url($this->baseUrl.'terms-of-use.html')?>">Terms of use</a></div>

</div>
<div class="col-md-9 content">
	<?php if($content):?>
	<h3 class="title"><?php echo $content->name?></h3>
	<div class="description"><?php echo html_entity_decode($content->content, ENT_QUOTES, 'UTF-8')?></div>
	<?php endif;?>
</div>
</div>