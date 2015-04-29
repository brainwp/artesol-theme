<?php
/* Template name: Comercio Justo */
get_header('rede');
?>
<?php $comercio_justo = get_page_by_path('comercio-justo');?>
<?php $principios = get_page_by_path('comercio-justo/principios');?>
<?php $cadeia_produtiva = get_page_by_path('comercio-justo/cadeia-produtiva');?>
<?php $historico = get_page_by_path('comercio-justo/historico');?>
<?php $articulacao_internacional = get_page_by_path('comercio-justo/articulacao-internacional');?>
<?php $atuacao = get_page_by_path('comercio-justo/atuacao');?>
<section id="entenda" class="col-md-12">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="section-title"><?php echo get_the_title($comercio_justo->ID);?></h1><!-- .section-title -->
	    <div class="content">
	    	<?php echo $comercio_justo->post_content;?>
	    </div><!-- .col-md-12 content -->
		<a class="col-md-12 entenda-btn-txt">
			<?php _e('Saiba Mais','odin');?>
		</a>
		<a class="col-md-12 entenda-btn" href="#principios"></a>
	</div><!-- .col-md-8 col-md-offset-2 -->
</section><!-- #entenda -->
<?php if(!empty($principios)): ?>
<section id="principios">
	<div class="container">
		<div class="row">
			<h2 class="section-title"><?php echo $principios->post_title;?></h2><!-- .section-title -->
			<div class="content"><?php echo $principios->post_content;?></div><!-- .content -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #principios -->
<?php endif;?>
<?php if(!empty($cadeia_produtiva)):?>
<section id="cadeia-produtiva" class="col-md-12">
	<div class="container">
		<div class="row">
			<h2 class="section-title">
				<?php echo $cadeia_produtiva->post_title;?>
			</h2><!-- .section-title -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $cadeia_produtiva->ID,
				'orderby'    => 'menu_order',
				'order'   => 'ASC',

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
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #conheca.col-md-12 -->
<?php endif;?>
<?php if(!empty($historico)):?>
<section id="historico">
	<div class="container">
		<div class="row">
			<h2 class="section-title"><?php echo $historico->post_title;?></h2><!-- .section-title -->
			<div class="col-md-12 content"><?php echo $historico->post_content;?></div><!-- .col-md-12 content -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #historico -->
<?php endif;?>
<?php if(!empty($articulacao_internacional)):?>
<section id="articulacao-internacional">
	<div class="container">
		<div class="row">
			<?php if(has_post_thumbnail($articulacao_internacional->ID)): ?>
			    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($articulacao_internacional->ID), 'full' );?>
			    <div class="col-md-12 image" style="background:url(<?php echo $thumb[0];?>) center no-repeat;height:<?php echo $thumb[2];?>px;">
			    </div><!-- .col-md-12 image -->
			<?php endif;?>
			<h2 class="section-title"><?php echo $articulacao_internacional->post_title;?></h2><!-- .section-title -->
			<div class="col-md-8 col-md-offset-2 content"><?php echo $articulacao_internacional->post_excerpt;?></div><!-- .col-md-12 content -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #articulacao-internacional -->
<?php endif;?>
<?php if(!empty($atuacao)):?>
<section id="atuacao">
	<div class="container">
		<div class="row">
			<h2 class="col-md-8 col-md-offset-2 section-title"><?php echo $atuacao->post_title;?></h2><!-- .section-title -->
			<div class="col-md-8 col-md-offset-2 content"><?php echo $atuacao->post_excerpt;?></div><!-- .col-md-12 content -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #atuacao -->
<?php endif;?>
<?php get_footer('rede');?>
