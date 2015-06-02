/*
* Plugin for getting list of files from directory
*Version: 1.0;
*Author: Smart;
*/

(function($){
	$.fn.tmFileList = function(o){
		return this.each(function(){
			var $this = $(this),
				data = $this.data('tmFileList'),
				options = {
					relativePath: '../../', // relative path of script, this value will be added to pathThumb, pathFull for getting file list
					pathThumb: 'img/full-gallery/',  // path to thumbnails relatively index.html
					pathFull: 'img/full-gallery/full/',  // path to full images relatively index.html
					url: '',  //  url to php file 
					urlThumb: [],  // array for thumbnails
					urlFull: [],  // array for full images

					// constructor of plugin
					constructor: function () {
					    options.getData(options.pathThumb, options.setUrlThumb, output1);

					    // get data from ajax request #1
					    function output1(){
					    	options.getData(options.pathFull, options.setUrlFull, output2);
					    }
					    // get data from ajax request #2
					    function output2(){
					    	options.output(options.urlThumb, options.urlFull);
					    }   
					},
					// setters
					setUrlThumb: function(inData){
						options.urlThumb = inData;
					},
					setUrlFull: function(inData){
						options.urlFull = inData;
						
					},
					// get file list from php via ajax
					getData: function(inData, callback, output){
						$.ajax({
							type: "POST",
							url: options.url,
							data: {path: options.relativePath + inData},
							success: function(results){
								results = results.split(';');
								results.length && results.pop();

								$.each(results, function(i){
									results[i] = inData + results[i];
								});

								callback(results.sort());
								output && output();
							}
						});
					},
					// return file lists
					output: function (urlThumbList, urlFullList){

					}
				}			
			
			data?$this=data:$this.data({tmFileList: options});
    		typeof o=='object' && $.extend(options, o);
    		options.me || options.constructor(options.me=$this);
		});
	}
})(jQuery);