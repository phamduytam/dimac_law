<?php $this->pageTitle = ' 通知';?>

	<!-- spacer -->
	<div class="m_spacer"></div>
	<!-- /spacer -->


	<!-- white_theme -->
	<div class="container-fluid white_theme">

		<div class="row-fluid">
			<div class="s_spacer"></div>
		</div>


 <div class="alert alert-block m_padding" style="border-radius:0px;">
<?php
if(!empty($Cmessage)){
	echo hsp($Cmessage);
}else{
	echo hsp('');
}
?>
</div>
		<!-- spacer -->
		<div class="l_spacer"></div>
		<!-- /spacer -->

		<!-- spacer -->
		<div class="l_spacer"></div>
		<!-- /spacer -->

	</div>
	<!-- /white_theme -->
