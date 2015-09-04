<?php
/**
 * The template for displaying Single Membros
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'projetos' ); ?>

	<section id="primary" class="col-md-12">
		<div id="content" class="site-content" role="main">

				<header class="page-header">
					<h1 class="publicacoes-archive-title">
						<?php
							_e( 'Membros da Rede', 'odin' );
						?>
					</h1>
					<div class="pull-right">
						<img src="<?php echo get_template_directory_uri();?>/assets/images/logo-rede-home.png">
					</div><!-- .pull-right -->
				</header><!-- .page-header -->
				<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
				<div class="nav-history">
				   <?php if(isset($wp_query->query_vars['membros']) && get_user_by( 'login', $wp_query->query_vars['membros']) ) $user = get_user_by( 'login', $wp_query->query_vars['membros']);?>
				   <?php if($user && $type_pin = get_user_meta( $user->ID, 'type_pin', true)):?>
					    <?php if($type_pin == 'artesao') $type = __('Artesão ou Mestre','odin');?>
					    <?php if($type_pin == 'associacoes') $type = __('Associações ou Cooperativas','odin');?>
					    <?php if($type_pin == 'lojistas') $type = __('Lojistas','odin');?>
					    <?php if($type_pin == 'agentes') $type = __('Agentes de Apoio','odin');?>
					    <?php printf(__('Membros >> <a href="%s">%s</a>','odin'),get_post_type_archive_link('membros') . '?type_pin='.$type_pin, $type);?>
				    <?php endif;?>
				</div><!-- .nav-history -->

				<?php
					global $wp_query;
					if( isset($wp_query->query_vars['membros']) && get_user_by( 'slug', $wp_query->query_vars['membros']) ):

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'single-membros' );
					else:
						get_template_part( 'content', 'none' );
					endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->
	<div class="map-margin-top"></div><!-- .col-md-12 clear -->
	<section id="patrimonio">
		<div class="container">
			<div class="row">
				<h1 class="section-title">
					<?php _e('Artesanato Brasileiro <br>e o<br>Patrimônio Imaterial','odin');?>
				</h1><!-- .section-title -->
				<div class="col-md-12 text-center">
					<a href="<?php echo home_url('/artesanato-brasileiro'); ?>" class="btn-trabalhar">
						<?php _e('Saiba Mais','odin');?>
					</a>
				</div><!-- .col-md-12 text-center -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #patrimonio -->
	<div class="footer-margin"></div><!-- .footer-margin -->

<?php
get_footer('aceleracao'); ?>
