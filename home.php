<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that display Home.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'home' ); ?>

	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<div id="content" class="site-content" role="main">

			<h1 class="entry-title"><?php _e( 'Destaques', 'odin' ); ?></h1>
			<div class="boxes">
				<div class="col-md-4">
					Serviços
				</div>
				<div class="col-md-4">
					Aceleração Social
				</div>
				<div class="col-md-4">
					Projetos
				</div>
			</div><!-- boxes -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
