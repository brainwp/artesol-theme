jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

	$('#menu-click').on('click',function(e){
		var open = $(this).attr('data-open');
		if(open == 'false'){
			$('#menu-top').fadeIn('medium');
			$(this).attr('data-open','true');
		}
		else{
			$('#menu-top').fadeOut('medium');
			$(this).attr('data-open','false');
		}

	});
	if(localStorage.getItem('slider_mult') !== 'true' || !localStorage.getItem('slider_mult')){
		$('#slider-ctrl span').css('float','left');
		$('#slider-home').slick({
			  slidesToShow: 1,
		});
		$('#slider-home').addClass('single');
	}
	else if(localStorage.getItem('slider_mult') == 'true'){
		$('#slider-ctrl span').css('float','right');
		$('#slider-home').slick({
			slidesToShow: 3,
			infinite: true,
		});
		$('#slider-home').addClass('mult');
	}
	$('#slider-ctrl').on('click',function(){
		if(localStorage.getItem('slider_mult') !== 'true' || !localStorage.getItem('slider_mult')){
			$('#slider-home').addClass('mult').removeClass('single');
			$(this).children('span').css('float','right');
			$('#slider-home').unslick();
			$('#slider-home').slick({
			  slidesToShow: 3,
			  infinite: true,
			});
			localStorage.setItem('slider_mult','true');
	    }
	    else if(localStorage.getItem('slider_mult') == 'true'){
	    	$(this).children('span').css('float','left');
			$('#slider-home').unslick();
			$('#slider-home').slick();
			$('#slider-home').addClass('single').removeClass('mult');
			localStorage.removeItem('slider_mult');
	    }
	});
});

