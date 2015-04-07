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
<?php get_footer('rede');?>
