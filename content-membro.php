<?php
/* Content membro */
global $user;
?>
<div class="each-publicacao-container col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 each-projeto each-publicacao each-membro' ); ?>>
		<header class="bg row"></header>
	    <h3 class="entry-title">
	    	<?php echo apply_filters('the_title',$user->display_name);?>
	    </h3><!-- .entry-title -->
		<div class="col-md-4 pull-left image-container">
			<?php if($avatar = get_user_meta( $user->ID, 'user_avatar', true)): ?>
			    <?php echo wp_get_attachment_image($avatar, 'medium');?>
			<?php else: ?>
			    <?php echo get_avatar( $user->ID, '300');?>
		    <?php endif;?>
	    </div><!-- .col-md-4 pull-left image-container -->
	    <div class="col-md-8 pull-right">
	    	<?php if($content = get_user_meta($user->ID, 'user_content', true )): ?>
	    	    <span class="content"><?php echo apply_filters('the_content',brasa_resumo($content,150));?></span>
	        <?php endif;?>
	    </div><!-- .col-md-8 -->
	   <div class="clear"></div>
	   <div class="download-container">
	    	<a href="<?php echo home_url('/membros/'.$user->user_login);?>" class="btn download-btn pull-right btn-membro">
	    		<?php _e('Saiba Mais','odin');?>
	    	</a>
	    </div><!-- .col-md-12 download-container -->
	</article><!-- #post-## -->
</div><!-- .each-publicacao-container col-md-6 -->
