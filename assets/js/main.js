jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */
	jQuery(function($) {
		$('#search-toggle').on('click',function(e){
			var open = $(this).attr('data-open');
			if(open == 'false'){
				$('#search-input').fadeIn('slow');
				$('#search-input').focus();
				$(this).attr('data-open','true');
			}
			if(open == 'true'){
				$('#search-input').fadeOut('slow');
				$(this).attr('data-open','false');
			}
		});
		$(window).load(function(e){
			if(window.location.hash == '#goto-query-noticias'){
				$('html, body').animate({
					scrollTop: parseInt($('#forma-noticias').offset().top) - 130
				}, 1300);
			}
		});
		$('.close-reveal-modal').click(function() {
			$('#fundo-modal').css('width', '0');
			$('#reveal-modal-id').css('visibility', 'hidden');

		});
	})

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
			$('#menu-top .menu-top').fadeIn('medium');
			$(this).attr('data-open','true');
		}
		else{
			$('#menu-top .menu-top').fadeOut('medium');
			$(this).attr('data-open','false');
		}

	});
	$('#search-click').on('click',function(e){
		var open = $(this).attr('data-open');
		if(open == 'false'){
			$('#search-form').fadeIn('medium');
			$('#search-form input').focus();
			$(this).attr('data-open','true');
		}
		else{
			$('#search-form').fadeOut('medium');
			$(this).attr('data-open','false');
		}

	});
	if(localStorage.getItem('slider_mult') !== 'true' || !localStorage.getItem('slider_mult')){
		$('#slider-ctrl span').css('margin-left','0');
		$('#slider-home').slick({
			  slidesToShow: 1,
		});
		$('#slider-home').addClass('single');
	}
	else if(localStorage.getItem('slider_mult') == 'true'){
		$('#slider-ctrl span').css('margin-left','73%');
		$('#slider-home').slick({
			slidesToShow: 3,
			infinite: true,
		});
		$('#slider-home').addClass('mult');
	}
	$('#slider-ctrl').on('click',function(){
		if(localStorage.getItem('slider_mult') !== 'true' || !localStorage.getItem('slider_mult')){
			$('#slider-home').addClass('mult').removeClass('single');
			$(this).children('span').css('margin-left','73%');
			$('#slider-home').unslick();
			$('#slider-home').slick({
			  slidesToShow: 3,
			  infinite: true,
			});
			localStorage.setItem('slider_mult','true');
	    }
	    else if(localStorage.getItem('slider_mult') == 'true'){
	    	$(this).children('span').css('margin-left','0');
			$('#slider-home').unslick();
			$('#slider-home').slick();
			$('#slider-home').addClass('single').removeClass('mult');
			localStorage.removeItem('slider_mult');
	    }
	});
	$('#aceleracao-footer-margin').css('height',$('#aceleracao-footer').outerHeight(false) + 'px');

	$('.page-template-page-comercio-justo section#atuacao').css('padding-bottom',$('#como-apoiar').outerHeight(false) + 'px');
});

