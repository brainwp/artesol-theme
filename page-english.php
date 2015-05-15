<?php
/* Template name: English */
get_header( 'institucional' );
?>
<aside class="col-md-4 col-xs-12 pull-left sidebar">
	<?php get_sidebar('english');?>
</aside><!-- .col-md-4 pull-left sidebar -->
<?php
// Start the Loop.
while ( have_posts() ) : the_post();
	// Include the page content template.
	get_template_part( 'content', 'institucional' );
endwhile;
?>
<?php get_sidebar('english');?>
<?php get_footer('aceleracao');?>
