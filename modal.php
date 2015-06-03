<?php
/* Modal Geral */
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="col-md-12 agenda-modal">
		<div class="col-md-12 title-container">
			<h1 class="post-title"><?php the_title();?></h1><!-- .post-title -->
		</div><!-- .col-md-9 pull-right title-container -->
		<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
		<div class="col-md-12 content">
			<?php the_content();?>
		</div><!-- .col-md-12 content -->
	</div><!-- .col-md-12 agenda-modal -->
<?php endwhile;?>
<a class="close-reveal-modal">&#215;</a>
