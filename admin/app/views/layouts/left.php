
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span> <span
				class="icon-bar"></span> <span class="icon-bar"></span> <span
				class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo app()->baseUrl;?>">SB Admin</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li <?php echo isset($_GET['cat_id']) && $_GET['cat_id'] == '1' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'baiviet?cat_id=1')?>" class="link"><i class="fa fa-book"></i> Giới thiệu</a></li>
			<li <?php echo isset($_GET['cat_id']) && $_GET['cat_id'] == '2' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'baiviet?cat_id=2')?>" class="link"><i class="fa fa-book"></i> Văn phòng</a></li>
			<li <?php echo isset($_GET['cat_id']) && $_GET['cat_id'] == '3' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'baiviet?cat_id=3')?>" class="link"><i class="fa fa-book"></i> Giá trị cốt lõi</a></li>
			<li <?php echo isset($_GET['cat_id']) && $_GET['cat_id'] == '4' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'baiviet?cat_id=4')?>" class="link"><i class="fa fa-book"></i> Lĩnh vực hoạt động</a></li>
			<li <?php echo isset($_GET['cat_id']) && $_GET['cat_id'] == '5' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'baiviet?cat_id=5')?>" class="link"><i class="fa fa-book"></i> Khách hàng</a></li>
			<li <?php echo $this->id == 'tintuc' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'tintuc?cat_id=6')?>" class="link"><i class="fa fa-book"></i> Tin tức và cập nhật</a></li>
			<li <?php echo isset($_GET['cat_id']) && $_GET['cat_id'] == '7' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'baiviet?cat_id=7')?>" class="link"><i class="fa fa-book"></i> Nghề nghiệp</a></li>
			<li <?php echo $this->id == 'dichvu' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'dichvu')?>" class="link"><i class="fa fa-book"></i> Các dịch vụ chuyên nghiệp</a></li>
			<li <?php echo $this->id == 'dichvu' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'luatsu')?>" class="link"><i class="fa fa-book"></i> Luật sư</a></li>
			<li <?php echo $this->id == 'dichvu' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'chucdanh')?>" class="link"><i class="fa fa-book"></i> Chức danh</a></li>
			<li <?php echo $this->id == 'static' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'static')?>" class="link"><i class="fa fa-envelope-o"></i> Trang đơn</a></li>
			<?php if(isset($_GET['name']) && $_GET['name'] == 'tam'):?><li <?php echo $this->id == 'category' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'category')?>"><i class="fa fa-sliders"></i> Category</a></li><?php endif;?>			
			<li <?php echo $this->id == 'advertise' ? 'class="active"' : '';?>><a href="<?php echo url($this->baseUrl . 'advertise')?>"><i class="fa fa-image"></i> Danh sách hình ảnh</a></li>
			
		</ul>
<?php


	//Contact
	$message_con = ContactAR::model()->messageUnRead();
	$count_con = ContactAR::model()->countAllUnRead();
?>
		<ul class="nav navbar-nav navbar-right navbar-user">
			<li <?php echo $this->langtype == 'vn' ? 'class="active"' : ''?>><a href="<?php echo url('vn')?>">Vietnam</a></li>
			<li <?php echo $this->langtype == 'en' ? 'class="active"' : ''?>><a href="<?php echo url('en')?>">English</a></li>

			<li class="dropdown messages-dropdown"><a href="<?php if($count_con == 0) echo url($this->baseUrl.'contact')?>"
				<?php if($count_con > 0) {?>class="dropdown-toggle" data-toggle="dropdown" <?php }?>><i
					class="fa fa-envelope"></i> Contact <?php echo $count_con > 0 ? '<span class="badge">'.$count_con.'</span><b class="caret"></b>' : '';?>
					</a>

					<?php if($count_con > 0):?>
					<ul class="dropdown-menu">
						<li class="dropdown-header"><?php echo $count_con;?> New Message</li>
						<?php foreach ($message_con as $value):?>
						<li class="message-preview"><a href="<?php echo url($this->baseUrl . 'contact/view/'.$value->id)?>"> <span class="avatar"><img
									src="http://placehold.it/50x50"></span> <span class="name"><?php echo $value->name;?></span>
									<span class="message"><?php echo substr($value->content, 0, 40);?>...</span> <span class="time"><i
									class="fa fa-clock-o"></i> <?php echo date('d-m-Y', strtotime($value->created))?></span>
						</a></li>
						<li class="divider"></li>
						<?php endforeach;?>
						<li><a href="<?php echo url($this->baseUrl . 'contact')?>">View Inbox <span class="badge"><?php echo $count_con?></span></a></li>
					</ul>
					<?php endif;?>
			</li>
			<li class="dropdown user-dropdown"><a href="#"
				class="dropdown-toggle" data-toggle="dropdown"><i
					class="fa fa-user"></i> <?php echo !user()->isGuest ? user()->name : ''?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo app()->baseUrl?>/profile"><i class="fa fa-user"></i> Profile</a></li>
					<li><a href="<?php echo app()->baseUrl?>/changePassword"><i class="fa fa-gear"></i> Change Password</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo sslUrl('/logout');?>"><i class="fa fa-power-off"></i> Log Out</a></li>
				</ul></li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>