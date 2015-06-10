<?php
/**
 * The Header page for our theme.
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

<div id="menu-mobile">

			<nav id="main-navigation" class="navbar navbar-default" role="navigation">

				<a class="logo-mobile" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				</a>

				<div class="navbar-header">
					<button class="navbar-toggle icon-menu" data-toggle="collapse" data-target=".navbar-main-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
					</button>

					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'odin' ); ?>"><?php _e( 'Skip to content', 'odin' ); ?></a>
					<a href="#" id="search-interno-click" data-open="false"></a>

				</div>

				<div class="collapse navbar-collapse navbar-main-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
				</div><!-- .navbar-collapse -->
			</nav><!-- #main-menu -->
			<form action="<?php echo home_url('/');?>" id="search-interno" class="col-md-4 pull-right">
				<input name="s" type="text" placeholder="<?php _e('Digite a frase e pressione enter!','odin');?>" class="col-md-12" />
			</form><!-- #search-interno.col-md-4 pull-right -->

</div><!-- end #menu-mobile -->

			<div class="logo col-sm-4">

				<a href="<?php echo esc_url( home_url() ); ?>" class="link">
				</a><!-- link -->

				<div class="icon-search" id="search-click" data-open="false"></div><!-- icon-search -->
				<div class="icon-menu" id="menu-click" data-open="false"></div><!-- icon-menu -->

			</div><!-- logo -->
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
				<input name="s" type="text" placeholder="<?php _e('Digite a frase e pressione enter!','odin');?>" class="col-md-12" />
			</form><!-- #search-form -->
			<?php while ( have_posts() ) : the_post(); ?>
			        <?php $style = '';?>
					<?php if ( has_post_thumbnail() ) : ?>
					    <?php $style = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
					    <?php $style = 'background: url('.$style[0].') center center no-repeat';?>
					<?php endif;?>
				    <div style="<?php echo $style;?>" class="destaque-1 col-md-8 col-sm-12 page-thumbnail">
					    <a class="link" href="#">
					    	<h2><?php the_excerpt(); ?></h2>
					    </a>
					</div><!-- destaque-1 -->
			<?php endwhile; ?>
			<div class="clear"></div>

		</header><!-- #header -->

		<div id="main" class="site-main row">
