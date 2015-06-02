// initialize tmMultimediaGallery
var pathThumb = pathFull = '';

$(window).load(function(){
    // get file list
    $('.inner').tmFileList({
        pathThumb: pathThumb,
        pathFull: pathFull,
        output: function(urlThumbList, urlFullList){
            buildPagination({urlThumb: urlThumbList, urlFull: urlFullList});
        }
    });

    // build pagination function
    function buildPagination(urlList){
        // automatic build pagination
        $('.inner').tmPaginationGenerator({
            paginationClass: 'inner',
            urlList: urlList,
            generateComplete: function($ul){                
                // apply isotope for items                
                
                $ul.isotope({
                    itemSelector : '.inner>ul>li',
                    resizable: true,
                    layoutMode: 'masonry',
                    itemPositionDataEnabled: true
                });  
                initFullGallery();
            },
            loadComplete: function(){

            }
        });
    }

    function initFullGallery(){
        var id = 0,
        $gallery = $('.galleryHolder'),
        $description = $('.galleryDescription li');
        
        $gallery.tmMultimediaGallery({
            startIndex: 0, // initial postion for gallery
            showOnInit: false, // show gallery after init
            autoPlayState: false, // on/off autoplay
            autoPlayTime: 12, // autoplay timeout
            alignIMG:"center", // align of image (center, top, bottom, right, left, top_left, top_right, bottom_roght, bottom_left)
            alignMode: 'fit', // mode of align 'fill' or 'fit'
            controlDisplay: true, // on/off controls display
            paginationDisplay: true, // on/off pagination display
            dragEnable: false, // on/off enable dragging pagination holder
            animationSpeed:'0', // speed of animation
            mobile: false, // if mobile
            resizableContainer: true, // change the size of the container on the size of the window
            container: '.galleryContainer', // container of gallery (window or other DOM element)
            imageHolder: '.imageHolder', // imageHolder selector
            pagination: '.inner', // pagination selector
            outerPagination: true, // outer pagination
            description: '.galleryDescription', // description selector
            descriptionActiveClass: '.active', // active class for current description item
            descriptionShowClass: '.showDescription', // show class for description holder
            outerNavigation: false, // outer navigation
            mouseMove: false, // mouse move reaction of image 
            next: '.nextButton', // next button selector
            prev: '.prevButton', // prev button selector
            play: '.playButton', // play button selector
            pause: '.pauseButton', // pause button selector
            spinner: '.imgSpinner', // prev button selector
            backClass: '.backImg', // back class
            frontClass: '.frontImg', // front class
            animationClass: 'flip', // class for main animation
            animationClassSub: 'scale', // class for secondary animation 
            noAnimationClass: '.animationDisable', // class for quick image changing 
            onShowActions: function(){
                id = setTimeout(function(){                    
                    // $('#inner').removeClass('hideFromScreen');
                    $gallery.trigger('showControls');

                    $(window).trigger('resize');
                }, 2000);
            },
            onHideActions: function(){
                clearTimeout(id);
                // $('#inner').addClass('hideFromScreen');
                $gallery.trigger('hideControls');
            },
            onBeforeChange: function(){
            },
            onAfterChange: function(){
            },
            onHideControls: function(){
                $('.prevButton, .nextButton, .close-icon, .info-icon').removeClass('showButton');
                $('.galleryDescription').removeClass('show');
            },
            onShowControls: function(){
                $('.prevButton, .nextButton, .close-icon').addClass('showButton');
                if ($description.length) {
                    $('.info-icon').addClass('showButton');
                }
            }
        });
        
        // click function for close button
        $('.close-icon').click(function(){
            $gallery.trigger('hideGallery');
            return false;
        });
        $(document).keyup(function(e){
            if(e.keyCode === 27)
                $gallery.trigger('hideGallery');
                return false;
        });

        // click function for info button
        if ($description.length) {
            $('.info-icon').on('click', function(){
                $(this).removeClass('showButton');
                $('.galleryDescription').addClass('show');
                return false;
            });

            // click function for close-details button
            $('.close-info-icon').on('click', function(){
                $('.info-icon').addClass('showButton');
                $('.galleryDescription').removeClass('show');
                return false;
            });
        }
    }
});