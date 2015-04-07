<?php
/* Template name: Rede */
get_header('rede');
?>
<section id="entenda" class="col-md-12">
	<div class="col-md-8 col-md-offset-2">
		<div class="icon"></div><!-- .icon -->
		<a class="col-md-12 entenda-btn-txt">Entenda</a>
		<a class="col-md-12 entenda-btn"></a>
	</div><!-- .col-md-8 col-md-offset-2 -->
</section><!-- #entenda -->
<section id="conheca" class="col-md-12">
	<div class="container">
		<div class="row">
			<?php $page = get_page_by_path( 'rede/conheca-a-rede', OBJECT, 'page' );?>
			<h2 class="section-title">
				<?php echo $page->post_title;?>
			</h2><!-- .section-title -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $page->ID,
			);

			$parent = new WP_Query( $args );
			if ( $parent->have_posts() ) : ?>
			<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
			    <a class="post-container col-md-4" href="<?php the_permalink();?>">
			    	<h3 class="post-title"><?php the_title();?></h3><!-- .post-title -->
			    	<div class="post-content"><?php the_excerpt();?></div><!-- .content -->
			    </a>
		    <?php endwhile; ?>
		    <?php wp_reset_postdata();  endif; ?>
		    <?php $page = get_page_by_path( 'rede', OBJECT, 'page' );?>
		    <?php if($btn_txt = get_post_meta( $page->ID, 'conheca_btn_txt', true )): ?>
		         <div class="col-md-12 text-center">
		         	<a href="<?php echo esc_url(get_post_meta( $page->ID, 'conheca_btn', true ));?>" class="btn btn-primary btn-lg">
		         		<?php echo esc_textarea($btn_txt);?>
		         	</a>
		         </div><!-- .col-md-12 text-center -->
		    <?php endif;?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #conheca.col-md-12 -->
<section id="tipos" class="col-md-12">
	<div class="container">
		<div class="row">
			<?php $page = get_page_by_path( 'rede/tipologia', OBJECT, 'page' );?>
			<h2 class="section-title"><?php echo $page->post_title;?></h2><!-- .section-title -->
			<?php $tipos = get_categories(array('taxonomy' => 'tipos', 'hide_empty' => 0));?>
			<?php foreach ($tipos as $tipo):?>
			     <a class="col-md-4 post-container" href="<?php echo get_term_link($tipo);?>">
			     		<?php if($thumb = get_field('tipo_thumb', 'tipos_'.$tipo->term_id)): ?>
			     		    <div class="img-container">
			     		    	<img class="tipo-thumb" src="<?php echo $thumb['sizes']['medium'];?>">
			                </div><!-- .img-container -->
			            <?php endif;?>
			        <h3 class="post-title"><?php echo $tipo->name;?></h3><!-- .post-title -->
			     </a><!-- .col-md-4 post-container -->
			<?php endforeach;?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #tipos.col-md-12 -->
<section id="participe" class="col-md-12">
	<div class="container">
		<div class="row">
			<?php $page = get_page_by_path( 'rede/participe', OBJECT, 'page' );?>
			<h2 class="section-title"><?php echo $page->post_title;?></h2><!-- .section-title -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<?php if(get_field('rede_participe_repeater')): ?>
			<?php while(has_sub_field('rede_participe_repeater')): ?>
			    <div class="col-md-3 each">
			        <a href="<?php the_sub_field('link');?>">
			        	<?php the_sub_field('text');?>
			        </a>
			    </div><!-- .col-md-3 -->
	        <?php endwhile; ?>
            <?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #participe.col-md-12 -->
<?php get_footer('rede');?>
