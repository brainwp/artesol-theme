<?php
function my_register_fields(){
	include_once get_template_directory() . '/inc/acf-repeater/repeater.php';
}
add_action('acf/register_fields', 'my_register_fields');
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_rodape',
		'title' => 'Rodapé',
		'fields' => array (
			array (
				'key' => 'field_54de093924e7c',
				'label' => 'Endereço',
				'name' => 'endereço',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54de0ecd9c1f7',
				'label' => 'Link Artesol + Iguatemi',
				'name' => 'parceiro-iguatemi',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54de12109b2b9',
				'label' => 'Link Todos os Parceiros',
				'name' => 'todos-parceiros',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54de3d1d58b73',
				'label' => 'Link Imprensa',
				'name' => 'link-imprensa',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54de3dbb58b74',
				'label' => 'Link Download Release',
				'name' => 'link-release',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54de44fbf4813',
				'label' => 'Social',
				'name' => 'social_repeater',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_54de451cf4814',
						'label' => 'Nome da rede social',
						'name' => 'social_repeater_name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54de4535f4815',
						'label' => 'Link',
						'name' => 'social_repeater_link',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => 1,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_slider-home',
		'title' => 'Slider home',
		'fields' => array (
			array (
				'key' => 'field_54d8be6f23184',
				'label' => 'Deseja exibir essa página no slider da página inicial?',
				'name' => 'slider_home',
				'type' => 'radio',
				'choices' => array (
					'true' => 'Sim',
					'false' => 'Não',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'false',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
