<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container home">
		<header id="header" role="banner" class="header-home">

			<div class="col-md-4 col-sm-4">
				<div class="logo col-md-12">
					<?php if( get_page_by_title( 'Apresentação' ) && is_home() ) : ?>
						<a href="<?php echo esc_url( home_url() ); ?>/apresentacao" class="link">
						</a><!-- link -->
				    <?php endif; ?>

				    <div class="icon-search" id="search-click" data-open="false"></div><!-- icon-search -->
				    <div class="icon-menu" id="menu-click" data-open="false"></div><!-- icon-menu -->

				</div><!-- .logo col-md-12 -->
			</div>
			<nav id="menu-top">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'depth'          => 2,
						'container'      => false,
						'menu_class'     => 'nav navbar-nav menu-top',
						'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
						'walker'         => new Odin_Bootstrap_Nav_Walker()
						)
				);
				?>
			</nav><!-- #menu -->
			<form action="<?php echo home_url('/');?>" id="search-form">
				<input type="text" placeholder="<?php _e('Digite a frase e pressione enter!','odin');?>" class="col-md-12" />
			</form><!-- #search-form -->

		</header><!-- #header -->
