/*
* Plugin for pagination generation for tmMultimediaGallery 
*Version: 1.0;
*Author: Smart;
*/

(function($){
	$.fn.tmPaginationGenerator = function(o){
		return this.each(function(){
			var $this = $(this),
				data = $this.data('tmPaginationGenerator'),
				options = {
					urlList: {urlThumb: [], urlFull: []}, // url of images

					// constructor of plugin
					constructor: function () {
						if (!options.urlList.urlThumb.length || !options.urlList.urlFull.length) {
							return false;
						}

						$this
					    	.empty()
					    	.append('<ul></ul>');

					    var length = Math.min(options.urlList.urlThumb.length, options.urlList.urlFull.length),
					    	$ul = $this.find('ul');
					    for (var i = 0; i < length; i++){
					    	$ul.append('<li><a href="' + options.urlList.urlFull[i] + '"><img src="' + options.urlList.urlThumb[i] + '" alt/></a></li>');
					    }

					    var images=$ul.find('img')
					    	,num_of_images=images.length

					    images.on('load abort error',function(){
					    	--num_of_images
					    	if(num_of_images===0)
					    		options.generateComplete($ul);
					    })
					},
					// function called when building html tree complete
					generateComplete: function(ul){
					}
				}			
			
			data?$this=data:$this.data({tmPaginationGenerator: options});
    		typeof o=='object' && $.extend(options, o);
    		options.me || options.constructor(options.me=$this);
		});
	}
})(jQuery);