<?php
/* Register post types */
if ( ! function_exists('artesol_custom_post_type') ) {

// Register Custom Post Type
function artesol_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Projetos', 'Post Type General Name', 'odin' ),
		'singular_name'       => _x( 'Projeto', 'Post Type Singular Name', 'odin' ),
		'menu_name'           => __( 'Projetos', 'odin' ),
		'name_admin_bar'      => __( 'Projetos', 'odin' ),
		'parent_item_colon'   => __( 'Projeto parente', 'odin' ),
		'all_items'           => __( 'Todos projetos', 'odin' ),
		'add_new_item'        => __( 'Adicionar novo Projeto', 'odin' ),
		'add_new'             => __( 'Adicionar novo', 'odin' ),
		'new_item'            => __( 'Adicionar Projeto', 'odin' ),
		'edit_item'           => __( 'Editar Projeto', 'odin' ),
		'update_item'         => __( 'Atualizar Projeto', 'odin' ),
		'view_item'           => __( 'Ver Projeto', 'odin' ),
		'search_items'        => __( 'Buscar Projeto', 'odin' ),
		'not_found'           => __( 'Não encontrado', 'odin' ),
		'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'odin' ),
	);
	$args = array(
		'label'               => __( 'projetos', 'odin' ),
		'description'         => __( 'Projetos', 'odin' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-clipboard',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'projetos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'artesol_custom_post_type', 0 );

}
