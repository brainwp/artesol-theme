<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */

	$domain = 'odin';
?>
<div class="each-publicacao-container col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 each-projeto each-publicacao' ); ?>>
		<header class="bg row"></header>
		<div class="col-md-4 pull-left image-container">
			<?php the_post_thumbnail();?>
	    </div><!-- .col-md-4 pull-left image-container -->
	    <div class="col-md-8 pull-right">
	    	<?php the_title( '<h1 class="entry-title">', '</h1>' );	?>
	    	<span class="content"><?php the_excerpt();?></span>
	    </div>
	    <div class="col-md-12 download-container">
	    	<?php brasa_download_link(get_the_ID(), 'download-btn',__('Download'));?>
	    </div><!-- .col-md-12 download-container -->
	</article><!-- #post-## -->
</div><!-- .each-publicacao-container col-md-6 -->
