jQuery(document).ready(function($) {

    $('.sticky-menu a[href^="#"], .scroll-click').on('click', function(event) {

        var target = $( $(this).attr('href') );

        if( target.length ) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }

    });
    var _width = jQuery('#header').width();
    jQuery(window).scroll(function(){
    	if  (jQuery(window).scrollTop() >= 70){
    		if(!jQuery('body').hasClass('admin-bar')){
    			jQuery('.sticky-menu').css({'position': 'fixed', 'z-index':'999', 'top': '0', 'margin-top': '0', 'width' : _width});
    		}
    		else{
    			jQuery('.sticky-menu').css({'position': 'fixed', 'z-index':'999', 'top': '0', 'margin-top': '30px', 'width' : _width});
    		}
    	} else {
    		jQuery('.sticky-menu').removeAttr('style');
    	}
    });

});
