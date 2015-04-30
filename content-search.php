<?php
/* Content search */
?>
<a href="<?php the_permalink();?>" class="search-link">
	<h3 class="col-md-12 post-title"><?php the_title();?></h3><!-- .col-md-12 post-title -->
</a>
<div class="col-md-12 meta-search">
	<?php if($cat = get_the_category(get_the_ID())): ?>
	    <a href="<?php echo get_category_link($cat[0]->term_id);?>" class="search-category">
	    	<?php echo $cat[0]->name;?>
	    </a>
	    <span class="cat-separator"> | </span>
    <?php endif;?>
    <span class="date">
    	<?php echo sprintf(__('%s de %s de %s','odin'), get_the_time('d',get_the_ID()),get_the_time('F',get_the_ID()),get_the_time('Y'));?>
    </span>
</div><!-- .col-md-12 meta-search -->
<a href="<?php the_permalink();?>" class="col-md-12 content-search">
	<?php the_excerpt();?>
</a>
