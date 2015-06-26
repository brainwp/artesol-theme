<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' ),
				'menu-institucional' => __( 'Menu Institucional', 'odin' ),
				'rede-submenu' => __( 'Menu Rede', 'odin' ),
				'servicos-submenu' => __( 'Menu Serviços', 'odin' ),
				'comercio-justo-submenu' => __( 'Menu Comercio Justo', 'odin' ),
				'artesanato-brasileiro-submenu' => __( 'Menu Artesanato Brasileiro', 'odin' ),
				'menu-english' => __( 'Menu English', 'odin' ),
				'footer-menu-1' => __( 'Footer Menu 1', 'odin' ),
				'footer-menu-2' => __( 'Footer Menu 2', 'odin' ),
				'footer-menu-3' => __( 'Footer Menu 3', 'odin' ),
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		add_post_type_support( 'page', 'excerpt' );
		/**
		 * Support The Excerpt on posts.
		 */
		add_post_type_support( 'post', 'excerpt' );

	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'fonticon-style', $template_url . '/assets/css/genericons.css', array(), null, 'all' );
	wp_enqueue_style( 'istok-font-css', 'http://fonts.googleapis.com/css?family=Istok+Web:400,700italic,700,400italic', array(), null, 'all' );
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

	// General scripts.
	// FitVids.
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

	// Main jQuery.
	wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );
	wp_localize_script( 'odin-main', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	wp_enqueue_script( 'scroll', $template_url . '/assets/js/scroll.js', array(), null, true );
	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'brasa_slider_jqueryui_js',
			$template_url . '/assets/js/slick.min.js',
			array('jquery')
		);
	wp_enqueue_style( 'brasa_slider_css_frontend', $template_url . '/assets/css/slick.css' );
	// Grunt main file with Bootstrap, FitVids and others libs.
	// wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/plugins-support.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Advanced Custom Fields and Fields.
 */
require_once get_template_directory() . '/inc/advanced-custom-fields/acf.php';
require_once get_template_directory() . '/inc/acf-options-page/acf-options-page.php';
require_once get_template_directory() . '/fields.php';
require_once get_template_directory() . '/inc/options.php';

/**
 * Custom post types
 */
require_once get_template_directory() . '/inc/cpts.php';

/**
 * Agenda Functions
 */
require_once get_template_directory() . '/inc/agenda-class.php';

/**
 * Tipologia functions
 */
require_once get_template_directory() . '/inc/tipologia-class.php';

function modal() {
    	$option_home = get_option('home_cfg');
		if ($option_home['modal_na_home'] != ""){?>
			<div id="fundo-modal"
			id="fundo-modal"></div>
			<div id="reveal-modal-id" class="reveal-modal open" data-reveal="" >
				<?php echo $option_home['modal_na_home']?>
				<a style="position: absolute;
				  top: 30px;
				  right: 30px;
				  font-size: 25px;"class="close-reveal-modal">
					×
				</a>
			</div>
	<?php }
}
//add_action('wp_footer', 'modal');

function thumbnail_bg( $id = '', $tamanho = 'thumbnail' ) {
	global $post;
    $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $tamanho, false, '' );
    echo 'style="background: url(' . $get_post_thumbnail[0] . ' )"';
}

function brasa_change_slug_dlm($args){
	$args['rewrite'] = array(
		'slug'                => 'publicacoes',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args['publicly_queryable'] = true;
	$args['has_archive'] = true;
	return $args;
}
add_filter('dlm_cpt_dlm_download_args','brasa_change_slug_dlm');

function artesol_map_user_fields($args){
	$selected = get_user_meta( $args['user'], 'type_pin', true );
	$map_table = '';
    $map_table .= '<h3>'.__( "Tipo de usuário", "odin" ).'</h3>';
    $map_table .= '<table class="form-table">';
    $map_table .= '<tr>';

    $map_table .= '<div style="float:left;display:inline-block;padding:10px">';
    $map_table .= '<label>';
    //$map_table .= '<img width="32" height="32" src="' . plugins_url( 'images/pins/big-blue.png', __FILE__ ) . '">';
    $map_table .= '<div style="clear:both;width:100%;height:5px;padding-top:10px;"></div>';
    $map_table .= __( "<b>Artesão ou Mestre</b>", "odin" ).'</label>';
    $map_table .= '<div style="clear:both;width:100%;height:5px"></div>';
    $map_table .= '<input type="radio" name="type_pin" value="artesao" '.checked("artesao",$selected,false).' />';
    $map_table .= '</div>';

    $map_table .= '<div style="float:left;display:inline-block;padding:10px">';
    $map_table .= '<label>';
    //$map_table .= '<img width="32" height="32" src="' . plugins_url( 'images/pins/big-blue.png', __FILE__ ) . '">';
    $map_table .= '<div style="clear:both;width:100%;height:5px;padding-top:10px;"></div>';
    $map_table .= __( "<b>Associações ou Cooperativas</b>", "odin" ).'</label>';
    $map_table .= '<div style="clear:both;width:100%;height:5px"></div>';
    $map_table .= '<input type="radio" name="type_pin" value="associacoes" '.checked("associacoes",$selected,false).' />';
    $map_table .= '</div>';

    $map_table .= '<div style="float:left;display:inline-block;padding:10px">';
    $map_table .= '<label>';
    //$map_table .= '<img width="32" height="32" src="' . plugins_url( 'images/pins/big-blue.png', __FILE__ ) . '">';
    $map_table .= '<div style="clear:both;width:100%;height:5px;padding-top:10px;"></div>';
    $map_table .= __( "<b>Lojistas</b>", "odin" ).'</label>';
    $map_table .= '<div style="clear:both;width:100%;height:5px"></div>';
    $map_table .= '<input type="radio" name="type_pin" value="lojistas" '.checked("lojistas",$selected,false).' />';
    $map_table .= '</div>';

    $map_table .= '<div style="float:left;display:inline-block;padding:10px">';
    $map_table .= '<label>';
    //$map_table .= '<img width="32" height="32" src="' . plugins_url( 'images/pins/big-blue.png', __FILE__ ) . '">';
    $map_table .= '<div style="clear:both;width:100%;height:5px;padding-top:10px;"></div>';
    $map_table .= __( "<b>Aceleradoras e Governos</b>", "odin" ).'</label>';
    $map_table .= '<div style="clear:both;width:100%;height:5px"></div>';
    $map_table .= '<input type="radio" name="type_pin" value="aceleradoras" '.checked("aceleradoras",$selected,false).' />';
    $map_table .= '</div>';
    $map_table .= '</td>';
    $map_table .= '</tr>';
    $map_table .= '</table>';

    $args['html'] = $map_table;
    return $args;
}
add_filter('geouser_map_pins','artesol_map_user_fields');

function artesol_geouser_save($user_id){
	if(isset($_POST['type_pin'])){
		update_user_meta($user_id, 'type_pin', $_POST['type_pin']);
	}
}
add_action('geouser_save','artesol_geouser_save');

function brasa_save_tipos($tt_id = null,  $taxonomy = null){
	$tipos = get_terms('tipos', array('hide_empty' => 0));

	$terms = array();
	if(is_array($tipos)){
		foreach($tipos as $tipo){
			$terms[$tipo->slug] = $tipo->name;
		}
		update_option('brasa_save_tipos',$terms);
	}

}
add_action('edited_term_taxonomy','brasa_save_tipos');
function brasa_template_redirect( $template ){
	global $wp_query;

    if( isset($wp_query->query_vars['membros']) && get_user_by( 'login', $wp_query->query_vars['membros']) ){
    	echo 'true';
    	status_header(200);
        $wp_query->is_404 = false;

    	return locate_template( array( 'single-membros.php' ) );
    }
    return $template;
}
add_filter( 'template_include', 'brasa_template_redirect' );
