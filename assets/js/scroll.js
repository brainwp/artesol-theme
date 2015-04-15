jQuery(document).ready(function($) {

    $('#servicos-submenu a[href^="#"]').on('click', function(event) {

        var target = $( $(this).attr('href') );

        if( target.length ) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }

    });

});

jQuery(window).scroll(function(){
    if  (jQuery(window).scrollTop() >= 70){
		 jQuery('#servicos-submenu').css({'position': 'fixed', 'z-index':'999', 'top': '0', 'margin-top': '0'});
    } else {
         jQuery('#servicos-submenu').css({'position': 'relative', 'z-index': 'auto', 'margin-top': '0'});
    }
});
