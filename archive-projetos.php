<?php
/**
 * The template for displaying Archive Projetos.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'projetos' ); ?>

	<section id="primary" class="col-md-12">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<div class="page-header">
					<h1 class="page-title">
						<?php
							_e( 'Projetos', 'odin' );
						?>
					</h1>
					<span>
						<?php if($content = get_field('project_content','options')): ?>
						    <?php echo esc_textarea($content);?>
					    <?php endif;?>
					</span>
				</div><!-- .page-header -->

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'projetos' );

					endwhile;

					// Page navigation.
					echo '<div class="text-center noticias-pagination">';
					brasa_noticias_pagination();
					echo '</div>';


				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->
<div class="col-md-12 separator"></div><!-- .col-md-12 clear -->
<?php
get_footer();
