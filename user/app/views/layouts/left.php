
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
					<li <?php echo $this->id == 'site' ? 'class="active"' : ''?>><a href="<?php echo app()->baseUrl?>"><i class="fa fa-dashboard"></i>
							Dashboard</a></li>
					<li <?php echo $this->id == 'product' ? 'class="active"' : ''?>><a href="<?php echo app()->baseUrl?>/product"><i class="fa fa-star-o"></i> Product</a></li>
					<li <?php echo $this->id == 'contact' ? 'class="active"' : ''?>><a href="<?php echo app()->baseUrl?>/contact"><i class="fa fa-envelope-o"></i> Contact</a></li>
					<li <?php echo $this->id == 'static' ? 'class="active"' : ''?>><a href="<?php echo app()->baseUrl?>/static"><i class="fa fa-life-ring"></i> Trang đơn</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>
							Advertise <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo app()->baseUrl?>/category"><i class="fa fa-sliders"></i> Category</a></li>
							<li><a href="<?php echo app()->baseUrl?>/advertise"><i class="fa fa-image"></i> List Image</a></li>
						</ul></li>
				</ul>
<?php
	$message = ContactAR::model()->messageUnRead();
	$count = ContactAR::model()->countAllUnRead();
?>
				<ul class="nav navbar-nav navbar-right navbar-user">
					<li class="dropdown messages-dropdown"><a href="#"
						class="dropdown-toggle" data-toggle="dropdown"><i
							class="fa fa-envelope"></i> Messages <?php echo $count > 0 ? '<span class="badge">'.$count.'</span><b class="caret"></b>' : '';?>
							</a>
						<?php if($count > 0):?>
						<ul class="dropdown-menu">
							<li class="dropdown-header"><?php echo $count;?> New Messages</li>
							<?php foreach ($message as $value):?>
							<li class="message-preview"><a href="#"> <span class="avatar"><img
										src="http://placehold.it/50x50"></span> <span class="name"><?php echo $value->name;?>:</span>
										<span class="message"><?php echo substr($value->content, 0, 40);?>...</span> <span class="time"><i
										class="fa fa-clock-o"></i> <?php echo date('d-m-Y H:i', strtotime($value->created))?></span>
							</a></li>
							<li class="divider"></li>
							<?php endforeach;?>
							<li><a href="<?php echo app()->baseUrl?>/contact">View Inbox <span class="badge"><?php echo $count?></span></a></li>
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