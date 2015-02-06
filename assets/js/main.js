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
});

