<?php
/* Content produtos */
global $user;
?>
<div class="each-publicacao-container col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 each-projeto each-publicacao each-membro each-produto' ); ?>>
		<header class="bg row"></header>
	    <h3 class="entry-title">
	    	<?php echo apply_filters('the_title',$user->display_name);?>
	    </h3><!-- .entry-title -->
	    <div class="product-list-archive">
	    	<?php $i = 1;?>
	        <?php while(has_sub_field('user_produtos', 'user_'.$user->ID)): ?>
	            <?php if($i == 6) break;?>
		        <?php $img = get_sub_field('product_img');?>
		    	<a class="col-md-4" data-reveal-img="<?php echo $img['sizes']['large'];?>" href="#">
		    	    <img src="<?php echo $img['sizes']['thumbnail'];?>" />
		    	    <span class="caption-product col-md-12">
		    	    	<?php $img = wp_prepare_attachment_for_js($img['id']);?>
		    	    	<?php echo apply_filters('the_title', $img['caption']);?>
		    	    </span>
		        </a><!-- .col-md-12 meta-content -->
		        <?php $i++;?>
		    <?php endwhile;?>
	    </div><!-- .col-md-12 product-list-archive -->
	   <div class="clear"></div>
	   <div class="download-container">
	    	<a href="<?php echo home_url('/membros/'.$user->user_login);?>" class="btn download-btn pull-right btn-membro">
	    		<?php _e('Saiba Mais','odin');?>
	    	</a>
	    </div><!-- .col-md-12 download-container -->
	</article><!-- #post-## -->
</div><!-- .each-publicacao-container col-md-6 -->
