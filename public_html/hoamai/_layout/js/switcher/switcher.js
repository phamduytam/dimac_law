/* Style Switcher */

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();

$(document).ready(function(){ 

	var styleswitcherstr = ' \
		<h3>Style Switcher <a href="#"><i class="ifc-settings"></i></a></h3> \
		<div class="content"> \
		<h5>Choose Layout Style</h5> \
		<div class="layout-switcher fixed"> \
		<a id="wide" class="layout">Wide</a> \
		<a id="boxed" class="layout">Boxed</a> \
		</div> \
		<h5>Choose Skin Color</h5> \
		<div class="switcher-box fixed"> \
		<a id="default" class="styleswitch color"></a> \
		<a id="dark" class="styleswitch color"></a> \
		<a id="blue" class="styleswitch color"></a> \
		<a id="green" class="styleswitch color"></a> \
		<a id="grey" class="styleswitch color"></a> \
		<a id="orange" class="styleswitch color"></a> \
		<a id="violet" class="styleswitch color"></a> \
		</div><!-- End switcher-box --> \
		<h5>Patterns for Boxed</h5>  \
		<div class="fixed"> \
		<a id="bg" class="pattern"></a> \
		<a id="bg2" class="pattern"></a> \
		<a id="bg3" class="pattern"></a> \
		<a id="bg4" class="pattern"></a> \
		<a id="bg5" class="pattern"></a> \
		<a id="bg6" class="pattern"></a> \
		<a id="bg7" class="pattern"></a> \
		<a id="bg8" class="pattern"></a> \
		<a id="bg9" class="pattern"></a> \
		<a id="bg10" class="pattern"></a> \
		<a id="bg11" class="pattern"></a> \
		<a id="bg12" class="pattern"></a> \
		<a id="bg13" class="pattern"></a> \
		<a id="bg14" class="pattern"></a> \
		<a id="bg15" class="pattern"></a> \
		<a id="bg16" class="pattern"></a> \
		<a id="bg17" class="pattern"></a> \
		<a id="bg18" class="pattern"></a> \
		<a id="bg19" class="pattern"></a> \
		<a id="bg20" class="pattern"></a> \
		</div> \
		<h5>Image for Boxed</h5>  \
		<a id="bg21" class="pattern alt"></a> \
		<a id="bg22" class="pattern alt"></a> \
		<a id="bg23" class="pattern alt"></a> \
		<br> \
		</div><!-- End content --> \
		';
	
	$(".switcher").prepend( styleswitcherstr );

});

/* boxed & wide syle */
$(document).ready(function(){ 

	var cookieName = 'businessid-layout';
	function changeLayout(layout) {
		$.cookie(cookieName, layout);
		/*$('#businessid-layout').attr('href', '_layout/css/' + layout + '.css');
		$('.portfolio-items').imagesLoaded( function() {
			$('.portfolio-items').isotope({ });
		});*/
		document.location.reload();
	}

	//if( $.cookie(cookieName)) {
	//	changeLayout($.cookie(cookieName));
	//}

	$("#wide").click( function(){ $
		changeLayout('wide');
	});

	$("#boxed").click( function(){ $
		changeLayout('boxed');
	});

});


/* background images */
$(document).ready(function(){ 
  
	// var startClass = $.cookie('businessid-bg');
	// $("body").addClass("bg");
	
	$(".pattern").click( function(){
		var id = $(this).attr('id');
		$("body").removeClass().addClass(id);
		$.cookie('businessid-bg',id);
	});

});

/* Skins Style */
$(document).ready(function(){ 

	var cookieName = 'businessid-skin';

	function changeSkin(skin) {
		$.cookie(cookieName, skin);
		//$('#businessid-skin').attr('href', '_layout/css/skins/' + skin + '.css');
		document.location.reload();
	}

	/*if( $.cookie(cookieName)) {
		changeSkin($.cookie(cookieName));
	}*/

	$("#default").click( function(){ changeSkin('default'); });
	$("#dark").click( function(){ changeSkin('dark'); });
	$("#blue").click( function(){ changeSkin('blue'); });
	$("#green").click( function(){ changeSkin('green'); });
	$("#grey").click( function(){ changeSkin('grey'); });
	$("#orange").click( function(){ changeSkin('orange'); });
	$("#violet").click( function(){ changeSkin('violet'); });

});

/* Reset Switcher */
$(document).ready(function(){ 

	// Style Switcher	
$('.switcher').animate({
		left: '-200px'
});

	$('.switcher h3 a').click(function(e){
		e.preventDefault();
		var div = $('.switcher');
		if (div.css('left') === '-200px') {
			$('.switcher').animate({
				left: '20px'
			},300); 
		} else {
			$('.switcher').animate({
				left: '-200px'
			},300);
		}
	});
	
});						   

