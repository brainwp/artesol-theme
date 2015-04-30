<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header('noticias'); ?>
<div class="col-md-8 pull-right" id="single-noticias-container">
	<?php if(have_posts()): ?>
	<h2 class="search-term-for">
		<?php _e('Resultados da busca para:','odin');?>
	</h2><!-- .search-term-for -->
	<h1 class="search-term">
        <?php if(!empty($_GET['s'])) echo $_GET['s'];?>
	</h1><!-- .search-term -->
    <?php else: ?>
    <h1 class="search-term">
        <?php _e('Sua busca não obteve resultados, tente novamente usando outro termo.','odin');?>
	</h1><!-- .search-term -->
    <?php endif;?>
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', 'search' );

			// If comments are open or we have at least one comment, load up the comment template.
			//if ( comments_open() || get_comments_number() ) :
			//	comments_template();
			//		endif;
		endwhile;
		echo '<div class="text-center noticias-pagination">';
		brasa_noticias_pagination();
		echo '</div>';
	?>
</div><!-- #single-noticias-container.col-md-4 pull-right -->
<?php
get_footer('noticias');
