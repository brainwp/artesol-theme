<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<?php if(has_post_thumbnail() && $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', false )):?>
<div class="col-md-12 page-thumbnail-bg" style="background:url(<?php echo $img[0];?>) no-repeat center center; background-size:cover;">
	<div class="page-thumbnail-full">
		<div class="container">
			<div class="row">
				<div class="page-thumbnail-content">
			        <h1 class="entry-title"><?php the_title();?></h1><!-- .entry-title -->
		            <div class="col-md-12 text-center resumo">
			            <?php if(has_excerpt()) the_excerpt();?>
		            </div><!-- .col-md-12 text-center resumo -->
	            </div><!-- .page-thumbnail-content -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .page-thumbnail-full -->
</div><!-- .col-md-12 page-thumbnail-full -->
<?php endif;?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<div class="container">
		<div class="row">
		    <?php if(!has_post_thumbnail()): ?>
	            <?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
            <?php endif;?>
	        <div class="entry-content">
		        <?php
			    the_content();
			    wp_link_pages( array(
				    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
				    'after'       => '</div>',
				    'link_before' => '<span>',
				    'link_after'  => '</span>',
			    ) );
		        ?>
	        </div><!-- .entry-content -->
	        <?php if ( comments_open() || get_comments_number() ) comments_template();?>
		</div><!-- .row -->
	</div><!-- .container -->
</article><!-- #post-## -->
<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
