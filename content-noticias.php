<?php
/* content noticias */
?>
<div class="col-md-4 noticias-loop-container">
	<a class="col-md-12 img-container" href="<?php the_permalink();?>">
		<?php the_post_thumbnail('medium');?>
	</a><!-- .col-md-12 img-container -->
	<div class="col-md-12 inside">
		<a href="<?php the_permalink();?>" class="col-md-12">
			<h4 class="post-title"><?php the_title();?></h4>
		</a>
		<?php if($cat = get_the_category()): ?>
		    <a href="<?php echo get_category_link($cat[0]->term_id);?>" class="col-md-12 text-center">
		    	<h5 class="cat-title"><?php echo $cat[0]->cat_name;?></h5>
		    </a>
	   <?php endif;?>
	   <a href="<?php the_permalink();?>" class="col-md 12 post-content"><?php the_excerpt();?></a>
	   <a href="<?php the_permalink();?>" class="col-md-5 btn btn-leia pull-right"><?php _e('Leia Mais');?></a>
	</div><!-- .col-md-12 inside -->
</div><!-- #noticias-loop-container.col-md-4 -->
