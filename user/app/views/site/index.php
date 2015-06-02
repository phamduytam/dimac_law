<div class="gioithieu">
	<div class="row">
		<div class="col-md-9">
			<div class="title">DIMAC</div>
			<div class="description">
			<?php if($gioithieu):?>
			<?php echo html_entity_decode($gioithieu->content, ENT_QUOTES, 'UTF-8')?>
			<?php endif;?>
			</div>
		</div>
		<div class="col-md-3"><img src="<?php echo app()->baseUrl?>/<?php echo $img_gioithieu ? 'uploads/'.$img_gioithieu->image : 'images/img.png'?>"></div>
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
					<div><a href="<?php echo $this->baseUrl;?><?php echo getCol($v->category, 'alias')?>/view/<?php echo $v->alias?>.html" title="<?php echo $v->name?>"><?php echo $v->name?></a></div>
					<?php endforeach;?>
		</div>
		<?php endif;?>
	</div>
</div>
