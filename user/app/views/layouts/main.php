<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="<?php echo $this->getKeyWord();?>" name="keywords">
<meta content="<?php echo $this->getDescription();?>" name="description">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<title><?php echo $this->pageTitle;?></title>

<meta name="format-detection" content="telephone=no" />
<link rel="shortcut icon" href="<?php echo app()->baseUrl;?>/images/icon.ico" />
<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/style.css">
<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/default.css">
<link rel="stylesheet" href="<?php echo app()->baseUrl;?>/css/nivo-slider.css">
<link href="<?php echo app()->baseUrl;?>/css/jquery.treeview.css" rel="stylesheet">
<script src="<?php echo app()->baseUrl;?>/js/jquery.js"></script>

<!--[if lt IE 9]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<script src="<?php echo app()->baseUrl;?>/js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">


<![endif]-->
</head>

<body>
	<div class="container-fluid header">
		<div class="container">
			<?php $logo = $this->getLogo();?>
			<div class="logo fleft visible-lg"><a href="<?php echo url($this->baseUrl);?>"><img src="<?php echo app()->baseUrl?><?php echo $logo ? '/uploads/'.$logo->image : 'images/logo.png'?>"></a></div>
			<div class="logo_mobile fleft hidden-lg"><a href="<?php echo url($this->baseUrl);?>"><img src="<?php echo app()->baseUrl?><?php echo $logo ? '/uploads/'.$logo->image : 'images/logo.png'?>"></a></div>
			<div class="fright">
				<div class="lang visible-lg">
					<a href="<?php echo url('en')?>">English</a><span style="padding:0 13px">|</span><a href="<?php echo url('vn')?>">Vietnamese</a><span style="padding:0 13px">|</span><a href="<?php echo url($this->baseUrl.'lien-he.html')?>" class="lienhe"><?php lang('contact')?></a>
				</div>
				<div class="lang_mobile hidden-lg"><a href="<?php echo url('en')?>">English</a> | <a href="<?php echo url('vn')?>">Vietnamese</a> | <a href="<?php echo url($this->baseUrl.'lien-he.html')?>" class="lienhe"><?php lang('contact')?></a></div>
				<div class="search visible-lg">
					<form>
						<div class="clear">
							<div class="fleft"><input type="text" class="input_search"></div>
							<div class="fright"><input type="button" class="bt_search"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<!-- // Mobile menu trigger // -->
			<a href="#" id="mobile-menu-trigger">
				<i class="fa fa-bars"></i>
			</a>
			<ul class="sf-menu" id="menu">
				<?php $menu = $this->getMenu();?>
				<li><a href="<?php echo url($this->baseUrl.'gioi-thieu.html')?>" style="padding-left: 5px;"><?php lang('gioithieu')?></a>
					<?php if(isset($menu['gioithieu']) && !empty($menu['gioithieu'])):?>
					<ul>
						<?php foreach ($menu['gioithieu'] as $v):?>
						<?php if($v->alias == 'doi-tac-kinh-doanh' || $v->alias == 'ethics-and-conducts'):?>
										<li>
											<a href="<?php echo url($this->baseUrl.'luat-su.html')?>" title="Luật sư">
												<?php lang('luatsu')?>
											</a>
										</li>
									<?php endif;?>
						<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
							<?php
								$sub = $this->getSubMenu($v->cat_id, $v->id);
								if(isset($sub) && !empty($sub)):
							?>
								<ul>
								<?php foreach ($sub as $v1):?>
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
				<li><a href="<?php echo url($this->baseUrl.'van-phong.html')?>"><?php lang('vanphong')?></a>
					<?php if(isset($menu['vanphong']) && !empty($menu['vanphong'])):?>
					<ul>
						<?php foreach ($menu['vanphong'] as $v):?>
						<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
							<?php
								$sub = $this->getSubMenu($v->cat_id, $v->id);
								if(isset($sub) && !empty($sub)):
							?>
								<ul>
								<?php foreach ($sub as $v1):?>
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
				<li><a href="<?php echo url($this->baseUrl.'gia-tri-cot-loi.html')?>"><?php lang('giatri')?></a>
					<?php if(isset($menu['giatri']) && !empty($menu['giatri'])):?>
					<ul>
						<?php foreach ($menu['giatri'] as $v):?>
						<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
							<?php
								$sub = $this->getSubMenu($v->cat_id, $v->id);
								if(isset($sub) && !empty($sub)):
							?>
								<ul>
								<?php foreach ($sub as $v1):?>
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
				<li><a href="<?php echo url($this->baseUrl.'linh-vuc-hoat-dong.html')?>"><?php lang('linhvuc')?></a>
					<?php if(isset($menu['linhvuc']) && !empty($menu['linhvuc'])):?>
					<ul>
						<?php foreach ($menu['linhvuc'] as $v):?>
						<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
							<?php
								$sub = $this->getSubMenu($v->cat_id, $v->id);
								if(isset($sub) && !empty($sub)):
							?>
								<ul>
								<?php foreach ($sub as $v1):?>
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v1->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
				<li><a href="<?php echo url($this->baseUrl.'khach-hang.html')?>"><?php lang('khachhang')?></a>
					<?php if(isset($menu['khachhang']) && !empty($menu['khachhang'])):?>
					<ul>
						<?php foreach ($menu['khachhang'] as $v):?>
						<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
							<?php
								$sub = $this->getSubMenu($v->cat_id, $v->id);
								if(isset($sub) && !empty($sub)):
							?>
								<ul>
								<?php foreach ($sub as $v1):?>
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
				<li><a href="<?php echo url($this->baseUrl.'tin-tuc-va-cap-nhat.html')?>"><?php lang('tintuc')?></a>
					<?php if(isset($menu['tintuc']) && !empty($menu['tintuc'])):?>
					<ul>
						<?php foreach ($menu['tintuc'] as $v):?>
						<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
							<?php
								$sub = $this->getSubMenu($v->cat_id, $v->id);
								if(isset($sub) && !empty($sub)):
							?>
								<ul>
								<?php foreach ($sub as $v1):?>
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
				<li><a href="<?php echo url($this->baseUrl.'nghe-nghiep.html')?>"><?php lang('nghenghiep')?></a>
					<?php if(isset($menu['nghenghiep']) && !empty($menu['nghenghiep'])):?>
					<ul>
						<?php foreach ($menu['nghenghiep'] as $v):?>
						<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
							<?php
								$sub = $this->getSubMenu($v->cat_id, $v->id);
								if(isset($sub) && !empty($sub)):
							?>
								<ul>
								<?php foreach ($sub as $v1):?>
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
			</ul>
	</div>
	<?php
	$advertise = $this->getBanner();
	if($advertise):?>
	<div class="container">
		<?php if($advertise):?>
		<div class="slider-wrapper theme-default">
			<div class="slider nivoSlider" id="slider">
			<?php foreach ($advertise as $value):?>
				<img alt="" src="<?php echo app()->baseUrl?>/uploads/<?php echo $value->image?>" width="auto">
			<?php endforeach;?>
			</div>
		</div>
		<?php endif;?>
	</div>
	<?php endif;?>
	<div class="container">
		<?php echo $content ?>
	</div>
	<div class="container-fluid footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">Copyright &copy 2015 DIMAC. All Rights Reserved.</div>
				<div class="col-md-4">
					<ul class="menu_footer">
						<li><a href="<?php echo url($this->baseUrl)?>">Home</a>&nbsp|&nbsp</li>
						<li><a href="<?php echo url($this->baseUrl.'lien-he.html')?>">Contact Us</a>&nbsp|&nbsp</li>
						<li><a href="<?php echo url($this->baseUrl.'link.html')?>">Link</a>&nbsp|&nbsp</li>
						<li><a href="<?php echo url($this->baseUrl.'sitemap.html')?>">Sitemap</a>&nbsp|&nbsp</li>
						<li><a href="<?php echo url($this->baseUrl.'terms-of-use.html')?>">Terms of Use</a></li>
					</ul>
				</div>
				<div class="col-md-4 fright" style="text-align: right; color: #252525; font-family:Roboto; font-size: 12px; font-weight: 300">
					<span style="padding-top: 1px;">FOLLOW US ON</span>
					<?php $follow = $this->getFollow();?>
					<a href="<?php echo $follow['google']?>"><img src="<?php echo app()->baseUrl?>/images/icon_google.jpg"></a>
					<a href="<?php echo $follow['facebook']?>"><img src="<?php echo app()->baseUrl?>/images/icon_facebook.jpg"></a>
					<a href="<?php echo $follow['twitter']?>"><img src="<?php echo app()->baseUrl?>/images/icon_tweet.jpg"></a>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo app()->baseUrl;?>/js/bootstrap.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/superfish.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/hoverIntent.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/jquery.viewport.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/plugins.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/scripts.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/jquery_cookie.js"></script>
	<script src="<?php echo app()->baseUrl;?>/js/jquery.treeview.js"></script>

	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				controlNav: false,
			});
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){

		// third example
		$("#red").treeview({
			animated: "fast",
			collapsed: true,
			control: "#treecontrol"
		});
	});
	</script>
	<script src="<?php echo app()->baseUrl;?>/js/jquery.nivo.slider.js"></script>
</body>
</html>

