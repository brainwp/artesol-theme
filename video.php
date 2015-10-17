<?php
/**
 * The template for displaying video attachments.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header('noticias'); ?>
<?php get_sidebar();?>
<div class="col-md-8" id="single-noticias-container">

			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<div class="entry-content entry-attachment">
						<?php echo wp_video_shortcode( array( 'src' => wp_get_attachment_url() ) ); ?>

						<p><strong><?php _e( 'URL:', 'odin' ); ?></strong> <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><span><?php echo basename( wp_get_attachment_url() ); ?></span></a></p>

						<?php the_content(); ?>

						<?php if ( ! empty( $post->post_parent ) ) : ?>
							<ul class="pager page-title">
								<li class="previous"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php echo esc_attr( sprintf( __( 'Back to %s', 'odin' ), strip_tags( get_the_title( $post->post_parent ) ) ) ); ?>"><?php printf( __( '<span class="meta-nav">&larr;</span> %s', 'odin' ), get_the_title( $post->post_parent ) ); ?></a></li>
							</ul><!-- .pager -->
						<?php endif; ?>
					</div><!-- .entry-content -->
				</article>
			<?php endwhile; ?>

		</div><!-- #col-md-8 -->

<?php
get_footer('noticias');
