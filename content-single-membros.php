<?php
/* content single membros */
global $wp_query;
$user = get_user_by( 'slug', $wp_query->query_vars['membros']);
?>
<article id="projetos-post" class="col-md-12">
	<h1 class="post-title col-md-12">
		<?php echo apply_filters('the_title',$user->display_name);?>
	</h1><!-- .post-title col-md-12 -->
	<h3 class="col-md-12">
		<?php if($cat = get_user_meta($user->ID, 'user_type', true)): ?>
		    <?php $cat = get_term_by('slug', $cat, 'tipos');?>
			<?php echo apply_filters('the_title',$cat->name);?>
		<?php endif;?>
	</h3>
	<div class="col-md-4 pull-left thumbnail-projetos">
		<?php if($avatar = get_user_meta( $user->ID, 'user_avatar', true)): ?>
			<?php echo wp_get_attachment_image($avatar, 'medium');?>
	    <?php else: ?>
			<?php echo get_avatar( $user->ID, '300');?>
		<?php endif;?>
	</div><!-- .col-md-4 pull-left thumbnail-projetos -->
	<div class="col-md-3 projetos-meta">
		<h4 class="col-md-12"><?php _e('Localização:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_user_meta($user->ID, 'user_local', true ));?>
		</div><!-- .col-md-12 meta-content -->
	    <h4 class="col-md-12"><?php _e('Artesãos Beneficiados:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_user_meta($user->ID, 'user_beneficiados', true ));?>
		</div><!-- .col-md-12 meta-content -->
	</div><!-- .col-md-3 projetos-meta -->
	<div class="col-md-5 projetos-meta">
		<?php if(get_field('user_financiadores', 'user_'.$user->ID)): ?>
		    <h4 class="col-md-12"><?php _e('Parceiro Financiador:','odin');?></h4>
		    <div class="col-md-12 meta-content">
		    	<?php while(has_sub_field('user_financiadores', 'user_'.$user->ID)): ?>
		    	    <a class="repeater-projetos" href="<?php echo the_sub_field('project_repeater_link');?>" target="_blank">
		    	    	<?php $img = get_sub_field('project_repeater_img');?>
		    	    	<img src="<?php echo $img['sizes']['large'];?>" />
		            </a><!-- .col-md-12 meta-content -->
		        <?php endwhile;?>
		    </div><!-- .col-md-12 meta-content -->
		<?php endif;?>
		<h4 class="col-md-12"><?php _e('Gênero:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_user_meta($user->ID, 'user_genero', true ));?>
		</div><!-- .col-md-12 meta-content -->
	</div><!-- .col-md-5 projetos-meta -->
	<div class="col-md-12 projetos-content">
		<?php if($content = get_user_meta($user->ID, 'user_content', true)):?>
		    <?php echo apply_filters('the_content',$content);?>
	    <?php endif;?>
	</div><!-- .col-md-12 projetos-content -->
	<?php if(get_field('user_produtos', 'user_'.$user->ID)): ?>
	    <h1 class="post-title col-md-12">
	    	<?php _e('Produtos','odin');?>
	    </h1><!-- .post-title col-md-12 -->
	    <div class="col-md-12 product-list">
		    <?php while(has_sub_field('user_produtos', 'user_'.$user->ID)): ?>
		        <?php $img = get_sub_field('product_img');?>
		    	<a class="col-md-4" data-reveal-img="<?php echo $img['sizes']['large'];?>" href="#">
		    	    <img src="<?php echo $img['sizes']['thumbnail'];?>" />
		        </a><!-- .col-md-12 meta-content -->
		    <?php endwhile;?>
	    </div><!-- .col-md-12 product-list -->
	<?php endif;?>
</article><!-- #projetos-post -->
