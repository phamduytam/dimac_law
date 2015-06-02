<?php $this->pageTitle = 'Errors';?>
<?php
$defaultMessages = array(
	400=>'Bad request.',
	404=>'Page not found.',
	500=>'Internal server error.',
);
?>
<!--=====================Content======================-->
<section class="content">
	<div class="container">
		<div class="row">
			<div class="grid_8">
				<h3>
				<?php
				if(!empty($Cmessage)){
					$out = explode("\n", $Cmessage);
					echo hsp($out[0]);
					for($i = 1; $i < count($out); $i++){
						echo '<br>' , hsp($out[$i]);
					}
				}else{
					if(!empty($defaultMessages[$code])){
						$Cmessage = $defaultMessages[$code];
					}else{
						$Cmessage = $defaultMessages[500];
					}
					echo hsp($Cmessage);
				}
				?>
				</h3>
			</div>
		</div>
	</div>
</section>