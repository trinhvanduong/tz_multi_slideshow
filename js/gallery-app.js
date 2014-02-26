$(function(){
	var gallery = $('.swiper-container').swiper({
		slidesPerView:'auto',
		watchActiveIndex: true,
		centeredSlides: true,
		pagination:'.pagination',
		paginationClickable: true,
		resizeReInit: true,
		keyboardControl: true,
		grabCursor: true,
		onImagesReady: function(){
			changeSize()
		}
	})
	function changeSize() {
		//Unset Width
//        var tz = jQuery.noConflict();
        jQuery('.swiper-slide').css('width','')
		//Get Size
		var imgWidth = jQuery('.swiper-slide img').width();
		if (imgWidth+40>jQuery(window).width()) imgWidth = jQuery(window).width()-40;
		//Set Width
        jQuery('.swiper-slide').css('width', imgWidth+40);
	}
	
	changeSize()

	//Smart resize
//    var tz = jQuery.noConflict();
    jQuery(window).resize(function(){
		changeSize()
		gallery.resizeFix(true)
	})
})
