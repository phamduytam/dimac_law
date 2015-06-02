(function($){

	"use strict";

/* ==========================================================================
   When document is ready, do
   ========================================================================== */
   
	$(document).ready(function(){

		// simplePlaceholder - polyfill for mimicking the HTML5 placeholder attribute using jQuery
		// https://github.com/marcgg/Simple-Placeholder/blob/master/README.md
		
		if(typeof $.fn.simplePlaceholder != 'undefined'){
			
			$('input[placeholder], textarea[placeholder]').simplePlaceholder();
		
		}
		
		// Fitvids - fluid width video embeds
		// https://github.com/davatron5000/FitVids.js/blob/master/README.md
		
		if(typeof $.fn.fitVids != 'undefined'){
			
			$('.fitvids').fitVids();
		
		}
		
		// Superfish - enhance pure CSS drop-down menus
		// http://users.tpg.com.au/j_birch/plugins/superfish/options/
		
		if(typeof $.fn.superfish != 'undefined'){
			
			$('#menu').superfish({
				delay: 100,
				animation: {opacity:'show',height:'show'},
				speed: 100,
				cssArrows: false
			});
			
		}
		
		// Revolution Slider
		
		if(typeof $.fn.revolution != 'undefined'){
			
			$('.fullwidthbanner').revolution({
				delay:9000,
				startheight:600,
				startwidth:940,
				hideThumbs:10,
				thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				thumbHeight:50,
				thumbAmount:5,
				navigationType:"both",					//bullet, thumb, none, both		(No Thumbs In FullWidth Version !)
				navigationArrows:"verticalcentered",	//nexttobullets, verticalcentered, none
				navigationStyle:"round",				//round,square,navbar
				touchenabled:"on",						// Enable Swipe Function : on/off
				onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off
				navOffsetHorizontal:0,
				navOffsetVertical:20,
				stopAtSlide:-1,
				stopAfterLoops:-1,
				shadow:0,								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
				fullWidth:"on"							// Turns On or Off the Fullwidth Image Centering in FullWidth Modus
			});
				
		}
		
		// bxSlider - responsive slider
		// http://bxslider.com/options
		
		if(typeof $.fn.bxSlider != 'undefined'){
			
			$('#bxslider .slides').bxSlider({
				 mode: 'horizontal',
				 useCSS:false, 							// fix bug with Jquery 2.1 and mode Horizontal
				 speed: 500,
				 slideMargin: 0,
				 infiniteLoop: true,
				 hideControlOnEnd: false,
				 adaptiveHeight: false,
				 adaptiveHeightSpeed: 500,
				 video: false,
				 pager: true,
				 pagerType: 'full' ,
				 controls: false,
				 //pagerSelector: "#pager",
				 //nextSelector: "#controls", 
				 //prevSelector: "#controls", 
				 auto: true,
				 pause: 4000,
				 autoHover: true
			});
			
			// Testimonial slider
			
			$('#testimonial-slider .slides').bxSlider({
				 mode: 'horizontal',
				 useCSS:false, 							// fix bug with Jquery 2.1 and mode Horizontal
				 speed: 500,
				 slideMargin: 0,
				 infiniteLoop: true,
				 hideControlOnEnd: false,
				 adaptiveHeight: false,
				 adaptiveHeightSpeed: 500,
				 video: false,
				 pager: true,
				 pagerType: 'full' ,
				 controls: false, 
				 auto: true,
				 pause: 4000,
				 autoHover: true
			});
			
			$('#testimonial-slider-2 .slides').bxSlider({
				 mode: 'horizontal',
				 useCSS:false, 							// fix bug with Jquery 2.1 and mode Horizontal
				 speed: 500,
				 slideMargin: 0,
				 infiniteLoop: true,
				 hideControlOnEnd: false,
				 adaptiveHeight: false,
				 adaptiveHeightSpeed: 500,
				 video: false,
				 pager: true,
				 pagerType: 'full' ,
				 controls: false, 
				 auto: true,
				 pause: 4000,
				 autoHover: true
			});
			
			// Client Logos slider
			
			$('#client-logos-slider .slides').bxSlider({
				 mode: 'horizontal',
				 useCSS:false, 							// fix bug with Jquery 2.1 and mode Horizontal
				 speed: 700,
				 infiniteLoop: true,
				 hideControlOnEnd: false,
				 adaptiveHeight: false,
				 adaptiveHeightSpeed: 500,
				 video: false,
				 pager: false,
				 pagerType: 'full' ,
				 controls: true,
				 auto: true, // autostart slider
				 pause: 4000,
				 autoHover: true,
				 slideWidth: 180,
				 minSlides: 2,
				 maxSlides: 5,
				 moveSlides: 1,
				 slideMargin: 5,
			});
			
		}
				
		// Magnific PopUp - responsive lightbox
		// http://dimsemenov.com/plugins/magnific-popup/documentation.html
		
		if(typeof $.fn.magnificPopup != 'undefined'){
		
			$('.magnificPopup').magnificPopup({
				disableOn: 400,
				closeOnContentClick: true,
				type: 'image'
			});
			
			$('.magnificPopup-gallery').magnificPopup({
				disableOn: 400,
				type: 'image',
				gallery: {
					enabled: true
				}
			});
		
		}

		// EasyTabs - tabs plugin
		// https://github.com/JangoSteve/jQuery-EasyTabs/blob/master/README.markdown
		
		if(typeof $.fn.easytabs != 'undefined'){
			
			$('div[id^="tab-"]').easytabs({
				animationSpeed: 300,
				updateHash: false
			});
		
		}
		
		// gMap -  embed Google Maps into your website; uses Google Maps v3
		// http://labs.mario.ec/jquery-gmap/
		
		if(typeof $.fn.gMap != 'undefined'){
		
			$('#google-map').gMap({
				maptype: 'ROADMAP',
				scrollwheel: false,
				zoom: 14,
				markers: [{
						address: 'New York, United States',
						html: '',
						popup: false
					}
				]
			});
		
		}
		
		// Isotope
		// http://isotope.metafizzy.co/beta/
		
		if(typeof $.fn.isotope != 'undefined'){
			
			$('.portfolio-items').imagesLoaded( function() {
				
				var container = $('.portfolio-items');
					
				container.isotope({
					itemSelector: '.item',
					layoutMode: 'fitRows',
				});
		
				$('.portfolio-filter li a').click(function () {
					$('.portfolio-filter li a').removeClass('active');
					$(this).addClass('active');
		
					var selector = $(this).attr('data-filter');
					container.isotope({
						filter: selector
					});
		
					return false;
				});
		
				$(window).resize(function () {	
					container.isotope({ });
				});
			
			});		
			
		}
		
		// Charts and Graphs
		// http://www.chartjs.org/
		
		if (typeof Chart != 'undefined') {
			
			// bar chart
			
			if ($("#canvas-bar-chart-data").length > 0) {

				var barChartData = {
					labels : ["Design","Social Media","Wordpress","Experience","JavaScript","Developement","Strategy","Clients","Webdesign"],
					datasets : [
						{
							fillColor : "#f98b6e",
							strokeColor : "#f98b6e",
							data : [99,75,39,53,40,45,69,87,95]
						}
					]	
				}
	
				var myLine = new Chart(document.getElementById("canvas-bar-chart-data").getContext("2d")).Bar(barChartData);
			
			}
			
			// lineChartData
			
			if ($("#canvas-line-chart-data").length > 0) {
			
				var lineChartData = {
					labels : ["2013","Black Friday","Christmas Sale","Winter Campaign","2014"],
					datasets : [
						{
							fillColor : "#fccdc0",
							strokeColor : "#fccdc0",
							pointColor : "#ef8e74",
							pointStrokeColor : "#fff",
							data : [30,60,80,45,60]
						},
						{
							fillColor : "#fa9c83",
							strokeColor : "#fa9c83",
							pointColor : "#ef8e74",
							pointStrokeColor : "#fff",
							data : [60,30,40,50,30]
						},
						{
							fillColor : "#ef8468",
							strokeColor : "#ef8468",
							pointColor : "#ef8e74",
							pointStrokeColor : "#fff",
							data : [30,50,40,35,20]
						}
					]
					
				}
			
				var myLine = new Chart(document.getElementById("canvas-line-chart-data").getContext("2d")).Line(lineChartData);
			
			}
		
		}
		
		//
		
		

	});
	
/* ==========================================================================
   When the window is scrolled, do
   ========================================================================== */
   	
	$(window).scroll(function () {
							   
		
		
	});

})(window.jQuery);

// non jQuery plugins below

