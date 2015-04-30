<?php
/* Template name: Artesanato Brasileiro */
get_header('rede');
?>
<?php $artesanato_brasileiro = get_page_by_path('artesanato-brasileiro');?>
<?php $valor_da_tradicao = get_page_by_path('artesanato-brasileiro/valor-da-tradicao');?>
<?php $patrimonio_imaterial = get_page_by_path('artesanato-brasileiro/patrimonio-imaterial');?>
<?php $patrimonio_imaterial_reconhecido = get_page_by_path('artesanato-brasileiro/patrimonio-imaterial-reconhecido');?>
<?php $formas_de_olhar = get_page_by_path('artesanato-brasileiro/formas-de-olhar-o-artesanato');?>

<section id="entenda" class="col-md-12">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="section-title">
			<?php echo apply_filters('the_content',$artesanato_brasileiro->post_content);?>
		</h1>
		<a class="col-md-12 entenda-btn-txt">
			<?php _e('Saiba Mais','odin');?>
		</a>
		<a class="col-md-12 entenda-btn" href="#principios"></a>
	</div><!-- .col-md-8 col-md-offset-2 -->
</section><!-- #entenda -->
<?php if(!empty($valor_da_tradicao)): ?>
<section id="valor-da-tradicao" class="col-md-12">
	<div class="container">
		<div class="row">
			<h2 class="section-title">
				<?php echo $valor_da_tradicao->post_title;?>
			</h2><!-- .section-title -->
			<div class="col-md-12 content">
				<?php echo $valor_da_tradicao->post_content;?>
			</div><!-- .col-md-12 content -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $valor_da_tradicao->ID,
				'orderby'    => 'menu_order',
				'order'   => 'ASC',

			);

			$parent = new WP_Query( $args );
			if ( $parent->have_posts() ) : ?>
			<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
			    <a class="post-container col-md-6" href="<?php the_permalink();?>">
			    	<h3 class="post-title"><?php the_title();?></h3><!-- .post-title -->
			    	<div class="post-content"><?php the_excerpt();?></div><!-- .content -->
			    </a>
		    <?php endwhile; ?>
		    <?php wp_reset_postdata();  endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #valor-da-tradicao.col-md-12 -->
<?php endif;?>
<?php if(!empty($patrimonio_imaterial)): ?>
<section id="patrimonio-imaterial" class="col-md-12">
	<div class="container">
		<div class="row">
			<h2 class="col-md-8 col-md-offset-2 section-title">
				<?php echo $patrimonio_imaterial->post_title;?>
			</h2><!-- .section-title -->
			<div class="col-md-12 content">
				<?php echo $patrimonio_imaterial->post_content;?>
			</div><!-- .col-md-12 content -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #patrimonio-imaterial.col-md-12 -->
<?php endif;?>
<?php if(!empty($patrimonio_imaterial_reconhecido)): ?>
<section id="patrimonio-imaterial-reconhecido" class="col-md-12">
	<div class="container home">
		<div class="row">
			<h2 class="section-title">
				<?php echo $patrimonio_imaterial_reconhecido->post_title;?>
			</h2><!-- .section-title -->
			<div class="col-md-12 content">
				<?php echo $patrimonio_imaterial_reconhecido->post_content;?>
			</div><!-- .col-md-12 content -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $patrimonio_imaterial_reconhecido->ID,
				'orderby'    => 'menu_order',
				'order'   => 'ASC',

			);

			$parent = new WP_Query( $args );
			if ( $parent->have_posts() ) : ?>
			<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
			    <?php $style = 'background:#7F7F7F;'?>
			    <?php if(has_post_thumbnail()): ?>
			        <?php $style = wp_get_attachment_image_src( get_post_thumbnail_id(), false );?>
			        <?php $style = 'background:url('.$style[0].');';?>
			    <?php endif;?>
			    <div class="col-md-4">
			    	<a class="post-container col-md-12 destaque-3" href="<?php the_permalink();?>" style="<?php echo $style;?>">
			    	    <h2 class="post-title"><?php the_title();?></h2><!-- .post-title -->
			    	    <h3 class="post-content"><?php the_excerpt();?></h3><!-- .content -->
			        </a>
			    </div><!-- .col-md-4 -->
		    <?php endwhile; ?>
		    <?php wp_reset_postdata();  endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #patrimonio-imaterial.col-md-12 -->
<?php endif;?>
<section id="tipos" class="col-md-12">
	<div class="container">
		<div class="row">
			<h2 class="section-title"><?php _e('Tipologia','odin');?></h2><!-- .section-title -->
			<?php $tipos = get_categories(array('taxonomy' => 'tipos', 'hide_empty' => 0));?>
			<?php foreach ($tipos as $tipo):?>
			     <div class="col-md-4 post-container" href="<?php echo get_term_link($tipo);?>">
			     		<?php if($thumb = get_field('tipo_thumb', 'tipos_'.$tipo->term_id)): ?>
			     		    <div class="img-container">
			     		    	<img class="tipo-thumb" src="<?php echo $thumb['sizes']['medium'];?>">
			                </div><!-- .img-container -->
			            <?php endif;?>
			        <h3 class="post-title"><?php echo $tipo->name;?></h3><!-- .post-title -->
			     </div><!-- .col-md-4 post-container -->
			<?php endforeach;?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #tipos.col-md-12 -->
<?php if(!empty($formas_de_olhar)): ?>
<section id="formas-de-olhar-o-artesanato" class="col-md-12">
	<div class="container">
		<div class="row">
			<h2 class="col-md-8 col-md-offset-2 section-title">
				<?php echo $formas_de_olhar->post_title;?>
			</h2><!-- .section-title -->
			<div class="col-md-12 content">
				<?php echo $formas_de_olhar->post_content;?>
			</div><!-- .col-md-12 content -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $formas_de_olhar->ID,
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
</section><!-- #valor-da-tradicao.col-md-12 -->
<?php endif;?>
<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
<?php get_footer('artesanato');
