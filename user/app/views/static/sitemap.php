<div class="row" style="padding-top: 15px;">
	<div class="col-md-3 category">
		<div
		<?php if(app()->controller->action->id == 'link') echo 'class="active"'?>>
			<a href="<?php echo url($this->baseUrl.'link.html')?>">Link</a>
		</div>
		<div
		<?php if(app()->controller->action->id == 'sitemap') echo 'class="active"'?>>
			<a href="<?php echo url($this->baseUrl.'sitemap.html')?>">Sitemap</a>
		</div>
		<div
		<?php if(app()->controller->action->id == 'terms') echo 'class="active"'?>>
			<a href="<?php echo url($this->baseUrl.'terms-of-use.html')?>">Terms
				of use</a>
		</div>

	</div>
	<div class="col-md-9 content">
		<h3 class="title">Sitemap</h3>
		<ul id="red" class="treeview-red">
				<?php $menu = $this->getMenu();?>
				<li><a href="<?php echo url($this->baseUrl)?>">Trang chủ</a></li>
				<li><a href="<?php echo url($this->baseUrl.'gioi-thieu.html')?>">Giới Thiệu</a>
					<?php if(isset($menu['gioithieu']) && !empty($menu['gioithieu'])):?>
					<ul>
						<?php foreach ($menu['gioithieu'] as $v):?>
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
				<li><a href="<?php echo url($this->baseUrl.'van-phong.html')?>">Văn Phòng</a>
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
				<li><a href="<?php echo url($this->baseUrl.'gia-tri-cot-loi.html')?>">Giá Trị Cốt Lõi</a>
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
				<li><a href="<?php echo url($this->baseUrl.'linh-vuc-hoat-dong.html')?>">Lĩnh Vực Hoạt Động</a>
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
									<li><a href="<?php echo url($this->baseUrl.getCol($v->category, 'alias').'/'.$v->alias.'.html')?>" title="<?php echo $v->name?>"><?php echo $v1->name?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</li>
				<li><a href="<?php echo url($this->baseUrl.'khach-hang.html')?>">Khách Hàng</a>
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
				<li><a href="<?php echo url($this->baseUrl.'tin-tuc-va-cap-nhat.html')?>">Tin tức và Cập nhật</a>
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
				<li><a href="<?php echo url($this->baseUrl.'nghe-nghiep.html')?>">Nghề Nghiệp</a>
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
</div>


