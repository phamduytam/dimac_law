<!--=====================Content======================-->
<section class="content">
	<div class="container">
		<div class="row">
			<?php if($content):?>
			<?php foreach($content as $i => $value):?>
			<div class="grid_5 <?php echo $i%2 == 0 ? '' : 'fright'?>">
				<?php if($i == 0):?><h3 class="head__2"><img src="<?php echo app()->baseUrl;?>/images/key_img.png" alt=""><br><?php lang('room')?></h3><?php endif;?>
				<div <?php echo $i != 0 ? 'class="pad1"' : ''?>>
					<strong>
						<a href="<?php echo url($this->baseUrl.'room/view/'.$value->id.'/'.$value->alias)?>"><?php echo $value->name?></a>
					</strong><br>
				</div>
				<?php echo $value->description;?>
			</div>
			<div class="grid_7">
				<a href="<?php echo url($this->baseUrl.'room/view/'.$value->id.'/'.$value->alias)?>">
					<img src="<?php echo app()->baseUrl;?>/uploads/<?php echo $value->image?>" alt="" class="img_inner inn__1">
				</a>
			</div>

			<div class="grid_12">
				<div class="sep__1"></div>
			</div>
			<?php endforeach;?>
			<?php endif;?>
<?php
/*
			<div class="grid_12">
				<h3>Other Rooms</h3>
				<div id="owl1">
					<div class="item">
						<div class="box1"><img src="images/page3_img3.jpg" alt="">
						<div class="owl_number">125</div>
						<div class="text1"><a href="#">Vestibulum sed ante</a></div>
						</div>
						<div class="box1"><img src="images/page3_img7.jpg" alt="">
						<div class="owl_number">129</div>
						<div class="text1"><a href="#">elementum vel</a></div>
						</div>
					</div>
					<div class="item">
						<div class="box1"><img src="images/page3_img4.jpg" alt="">
						<div class="owl_number">126</div>
						<div class="text1"><a href="#">Sed in lacus</a></div>
						</div>
						<div class="box1"><img src="images/page3_img8.jpg" alt="">
						<div class="owl_number">130</div>
						<div class="text1"><a href="#">aoreet aliquam leo</a></div>
						</div>
					</div>
					<div class="item">
						<div class="box1"><img src="images/page3_img5.jpg" alt="">
						<div class="owl_number">127</div>
						<div class="text1"><a href="#">Nulla venenatis</a></div>
						</div>
						<div class="box1"><img src="images/page3_img9.jpg" alt="">
						<div class="owl_number">131</div>
						<div class="text1"><a href="#">fermentum</a></div>
						</div>
					</div>
					<div class="item">
						<div class="box1"><img src="images/page3_img6.jpg" alt="">
						<div class="owl_number">128</div>
						<div class="text1"><a href="#">Praesent justo dol</a></div>
						</div>
						<div class="box1"><img src="images/page3_img10.jpg" alt="">
						<div class="owl_number">132</div>
						<div class="text1"><a href="#">meleifend elit</a></div>
						</div>
					</div>
					<div class="item">
						<div class="box1"><img src="images/page3_img3.jpg" alt="">
						<div class="owl_number">125</div>
						<div class="text1"><a href="#">Vestibulum sed ante</a></div>
						</div>
						<div class="box1"><img src="images/page3_img7.jpg" alt="">
						<div class="owl_number">129</div>
						<div class="text1"><a href="#">elementum vel</a></div>
						</div>
					</div>
				</div>
			</div>
			*/
			?>
		</div>
	</div>
</section>
