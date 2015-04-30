<?php
/* reveal modal template file */
global $wp_query;
if(is_object($wp_query) && is_object($wp_query->post) && !empty($wp_query->post->ID)){
	if(has_category('agenda',$wp_query->post->ID)){
		get_template_part('modal','agenda');
	}
}
