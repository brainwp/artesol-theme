<?php
function my_register_fields(){
	include_once get_template_directory() . '/inc/acf-repeater/repeater.php';
}
add_action('acf/register_fields', 'my_register_fields');
if(function_exists("register_field_group")){
}
