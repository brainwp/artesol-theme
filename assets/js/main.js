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
	})
	$('#search-interno-click').on('click',function(e){
		var open = $(this).attr('data-open');
		if(open == 'false'){
			$('form#search-interno').fadeIn('slow');
			$('form#search-interno input').focus();
			$(this).attr('data-open','true');
		}
		if(open == 'true'){
			$('form#search-interno').fadeOut('slow');
			$(this).attr('data-open','false');
		}
	});
	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});
	$(document).on('close.fndtn.reveal', '[data-reveal]', function () {
		var modal = $(this);
		console.log('ta chamando?');
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
			  slidesToScroll: 1,
			  autoplay: true,
			  speed: 1300,
			  autoplaySpeed: 2000,
		});
		$('#slider-home').addClass('single');
	}
	else if(localStorage.getItem('slider_mult') == 'true'){
		$('#slider-ctrl span').css('margin-left','73%');
		$('#slider-home').slick({
			slidesToShow: 3,
			infinite: true,
			slidesToScroll: 3,
			autoplay: true,
			speed: 1300,
			autoplaySpeed: 2000,
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
				slidesToScroll: 3,
				infinite: true,
				autoplay: true,
				speed: 1300,
				autoplaySpeed: 2000,
			});
			localStorage.setItem('slider_mult','true');
	    }
	    else if(localStorage.getItem('slider_mult') == 'true'){
	    	$(this).children('span').css('margin-left','0');
			$('#slider-home').unslick();
			$('#slider-home').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 1300,
			  	autoplay: true,
			  	autoplaySpeed: 2000,
			});
			$('#slider-home').addClass('single').removeClass('mult');
			localStorage.removeItem('slider_mult');
	    }
	});
	$('#aceleracao-footer-margin').css('height',$('#aceleracao-footer').outerHeight(false) + 'px');
	$('#error404-padding').css('height',$('#aceleracao-footer').outerHeight(false) + 'px');


	$('.page-template-page-comercio-justo section#atuacao').css('padding-bottom',$('#como-apoiar').outerHeight(false) + 'px');
	$('.page-template-page-como-apoiar-pessoa-juridica section#trabalhar').css('padding-bottom',$('#como-apoiar').outerHeight(false) + 'px');
	$('.page-template-page-como-apoiar-pessoa-fisica section#pat').css('padding-bottom',$('#como-apoiar').outerHeight(false) + 'px');
	$('.page-thumbnail-bg').css('height',$('.page-thumbnail-full').outerHeight(true) + 'px');

	if($('body').hasClass('search')){
		var size = $('.container.home').outerWidth(false) - $('#header').outerWidth(false) + 'px';
		$('#menu-top>ul').css('width',size);
	}

	$('.tipo-open-modal').on('click',function(e){
		$('#reveal-modal-id').foundation('reveal', 'open', {
			url: ajax_object.ajax_url,
			method: 'POST',
			data: {action: 'tipologia_content', id: $(this).attr('data-id') }
		});
	});

	if($('.map-margin').length > 0){
		var margin = $('.iframe-container-map').outerHeight(true) - 100;
		$('.map-margin').css('height', margin + 'px');
	}
	if($('.footer-margin').length > 0){
		var margin = $('#patrimonio').outerHeight(true) - 200;
		$('.footer-margin').css('height', margin + 'px');
	}
	$('.product-list a').on('click',function(e){
		e.preventDefault();
		var img_url = $(this).attr('data-reveal-img');
		var img = '<img src="'+img_url+'" class="reveal-modal-data-img">';
		$('#reveal-modal-id').append(img);
		$('#reveal-modal-id').append('<a class="close-reveal-modal">×</a>');
		$('#reveal-modal-id').foundation('reveal', 'open');
	});
	$('.product-list-archive a').on('click',function(e){
		e.preventDefault();
		var img_url = $(this).attr('data-reveal-img');
		var img = '<img src="'+img_url+'" class="reveal-modal-data-img">';
		$('#reveal-modal-id').append(img);
		$('#reveal-modal-id').append('<a class="close-reveal-modal">×</a>');
		$('#reveal-modal-id').foundation('reveal', 'open');
	});

});

