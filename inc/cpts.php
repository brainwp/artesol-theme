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

	// register taxonomy tipo
	$labels = array(
		'name'                       => _x( 'Tipologia', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Tipologia', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Tipologia', 'odin' ),
		'all_items'                  => __( 'Todos tipos', 'odin' ),
		'parent_item'                => __( 'Tipo parente', 'odin' ),
		'parent_item_colon'          => __( 'Tipo parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar nova Tipologia', 'odin' ),
		'add_new_item'               => __( 'Adicionar nova Tipologia', 'odin' ),
		'edit_item'                  => __( 'Editar tipo', 'odin' ),
		'update_item'                => __( 'Atualizar tipo', 'odin' ),
		'view_item'                  => __( 'Ver tipo', 'odin' ),
		'separate_items_with_commas' => __( 'Tipos separados por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover tipos', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Tipos populares', 'odin' ),
		'search_items'               => __( 'Buscar tipo', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tipos', array( 'projetos' ), $args );

	// register taxonomy membros_category
	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Categorias', 'odin' ),
		'all_items'                  => __( 'Todas Categorias', 'odin' ),
		'parent_item'                => __( 'Categoria parente', 'odin' ),
		'parent_item_colon'          => __( 'Categoria parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar nova Categoria', 'odin' ),
		'add_new_item'               => __( 'Adicionar nova Categoria', 'odin' ),
		'edit_item'                  => __( 'Editar categoria', 'odin' ),
		'update_item'                => __( 'Atualizar Categoria', 'odin' ),
		'view_item'                  => __( 'Ver categoria', 'odin' ),
		'separate_items_with_commas' => __( 'Categorias separadas por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categorias', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Categorias populares', 'odin' ),
		'search_items'               => __( 'Buscar Categorias', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'membros_category', array( 'projetos' ), $args );
    // register taxonomy membros_perfil
	$labels = array(
		'name'                       => _x( 'Perfil', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Perfil', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Perfil', 'odin' ),
		'all_items'                  => __( 'Todas os Perfis', 'odin' ),
		'parent_item'                => __( 'Perfil parente', 'odin' ),
		'parent_item_colon'          => __( 'Perfil parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar novo Perfil', 'odin' ),
		'add_new_item'               => __( 'Adicionar novo Perfil', 'odin' ),
		'edit_item'                  => __( 'Editar Perfil', 'odin' ),
		'update_item'                => __( 'Atualizar Perfil', 'odin' ),
		'view_item'                  => __( 'Ver perfil', 'odin' ),
		'separate_items_with_commas' => __( 'Perfis separados por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Perfis', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Perfis populares', 'odin' ),
		'search_items'               => __( 'Buscar Perfis', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'membros_perfil', array( 'projetos' ), $args );
	// register taxonomy membros_perfil
	$labels = array(
		'name'                       => _x( 'Estados', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Estado', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Estados', 'odin' ),
		'all_items'                  => __( 'Todas os Estados', 'odin' ),
		'parent_item'                => __( 'Estado parente', 'odin' ),
		'parent_item_colon'          => __( 'Estado parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar novo Estado', 'odin' ),
		'add_new_item'               => __( 'Adicionar novo Estado', 'odin' ),
		'edit_item'                  => __( 'Editar Estado', 'odin' ),
		'update_item'                => __( 'Atualizar Estado', 'odin' ),
		'view_item'                  => __( 'Ver estado', 'odin' ),
		'separate_items_with_commas' => __( 'Estados separados por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Estados', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Estados populares', 'odin' ),
		'search_items'               => __( 'Buscar Estados', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'membros_state', array( 'projetos' ), $args );
	$labels = array(
		'name'                => _x( 'Membros da Rede', 'Post Type General Name', 'odin' ),
		'singular_name'       => _x( 'Membros da Rede', 'Post Type Singular Name', 'odin' ),
		'menu_name'           => __( 'Membros da Rede', 'odin' ),
		'name_admin_bar'      => __( 'Membros da Rede', 'odin' ),
		'parent_item_colon'   => __( 'Item parente', 'odin' ),
		'all_items'           => __( 'Todos membros', 'odin' ),
		'add_new_item'        => __( 'Adicionar novo membro', 'odin' ),
		'add_new'             => __( 'Adicionar novo', 'odin' ),
		'new_item'            => __( 'Novo membro', 'odin' ),
		'edit_item'           => __( 'Editar membro', 'odin' ),
		'update_item'         => __( 'Atualizar membro', 'odin' ),
		'view_item'           => __( 'Ver membro', 'odin' ),
		'search_items'        => __( 'Buscar membro', 'odin' ),
		'not_found'           => __( 'Não encontrado', 'odin' ),
		'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'odin' ),
	);
	$args = array(
		'label'               => __( 'membros', 'odin' ),
		'description'         => __( 'Membros da Rede', 'odin' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'          => array( 'tipos', 'membros_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => false,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-networking',
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'can_export'          => false,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'membros', $args );
}

// Hook into the 'init' action
add_action( 'init', 'artesol_custom_post_type', 0 );

}
