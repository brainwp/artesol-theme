<?php
/* Template name: Rede */
get_header('rede');
?>
<section id="entenda" class="col-md-12">
	<div class="col-md-8 col-md-offset-2">
		<div class="icon"></div><!-- .icon -->
		<a class="col-md-12 entenda-btn-txt scroll-click" href="#conheca">Entenda</a>
		<a class="col-md-12 entenda-btn scroll-click" href="#conheca"></a>
	</div><!-- .col-md-8 col-md-offset-2 -->
</section><!-- #entenda -->
<section id="conheca" class="col-md-12">
	<div class="container">
		<div class="row">
			<?php $page = get_page_by_path( 'rede/conheca-a-rede', OBJECT, 'page' );?>
			<h2 class="section-title">
				<?php echo $page->post_title;?>
			</h2><!-- .section-title -->
			<div class="col-md-12 content"><?php echo $page->post_content;?></div><!-- .col-md-12 content -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $page->ID,
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
		    <?php $page = get_page_by_path( 'rede', OBJECT, 'page' );?>
		    <?php if($btn_txt = get_post_meta( $page->ID, 'conheca_btn_txt', true )): ?>
		        <div class="col-md-12 text-center">
				<a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'conheca_btn', true ));?>" class="btn btn-primary btn-lg">
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

			<h2 class="section-title"><?php _e('Saberes e Fazeres | Técnicas','odin');?></h2><!-- .section-title -->
			<?php $tipos = get_categories(
				array(
				'taxonomy' => 'tipos',
				'hide_empty' => 0,
				'parent' => 0,
				)
			);?>
			<?php foreach ($tipos as $tipo):?>
			     <a class="col-md-4 post-container tipo-open-modal" href="#tipo_modal" data-id="<?php echo $tipo->term_id;?>">
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
			<?php $page = get_page_by_path( 'rede/membros', OBJECT, 'page' );?>
			<h2 class="section-title"><?php echo $page->post_title;?></h2><!-- .section-title -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<div class="col-md-6">
				<a href="<?php echo get_post_type_archive_link('membros');?>?type_pin=artesao" class="col-md-12 membros-each">
					<?php if($img = get_field('rede_artesao_img', get_the_ID())):?>
					    <img src="<?php echo $img['sizes']['medium'];?>">
				    <?php endif;?>
				    <span><?php _e('Artesão <br><small>ou Mestre</small>','odin');?></span>
			    </a>
			</div><!-- .col-md-6 -->
			<div class="col-md-6">
				<a href="<?php echo get_post_type_archive_link('membros');?>?type_pin=associacoes" class="col-md-12 membros-each">
					<?php if($img = get_field('rede_associacoes_img', get_the_ID())):?>
					    <img src="<?php echo $img['sizes']['medium'];?>">
				    <?php endif;?>
				    <span><?php _e('Associações <br><small>ou Cooperativas</small>','odin');?></span>
			    </a>
			</div><!-- .col-md-6 -->
			<div class="col-md-6">
				<a href="<?php echo get_post_type_archive_link('membros');?>?type_pin=lojistas" class="col-md-12 membros-each">
					<?php if($img = get_field('rede_lojistas_img', get_the_ID())):?>
					    <img src="<?php echo $img['sizes']['medium'];?>">
				    <?php endif;?>
				    <span><?php _e('Lojistas','odin');?></span>
			    </a>
			</div><!-- .col-md-6 -->
			<div class="col-md-6">
				<a href="<?php echo get_post_type_archive_link('membros');?>?type_pin=aceleradoras" class="col-md-12 membros-each">
					<?php if($img = get_field('rede_aceleradoras_img', get_the_ID())):?>
					    <img src="<?php echo $img['sizes']['medium'];?>">
				    <?php endif;?>
				    <span><?php _e('Agentes de Apoio','odin');?></span>
			    </a>
			</div><!-- .col-md-6 -->
			<?php if($link = get_field('rede_membros_participe', get_the_ID())):?>
			<div class="col-md-12 text-center">
				<a href="<?php echo esc_url($link);?>" class="btn btn-primary btn-lg btn-rede-leia">
					<?php _e('Participe da rede','odin');?>
				</a>
			</div><!-- .col-md-12 text-center -->
		    <?php endif;?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #participe.col-md-12 -->
<section id="beneficios" class="col-md-12">
	<div class="container">
		<div class="row">
			<?php $page = get_page_by_path( 'rede/beneficios', OBJECT, 'page' );?>
			<h2 class="section-title"><?php echo $page->post_title;?></h2><!-- .section-title -->
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
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #beneficios -->
<section id="destaques" class="col-md-12">
	<div class="container home">
		<div class="row">
			<?php if ( $background1 = get_field( 'background_destaque_1', $page->ID ) ) : ?>
				    <div style="background: url(' <?php echo $background1; ?>' ) center center / cover" class="destaque destaque-3 col-md-4 col-sm-4">
				    	<?php if ( $url1 = get_field( 'link_destaque_1', $page->ID ) ) : ?>
				            <a class="link" href="<?php echo $url1; ?>">
			            <?php endif; ?>

			           <?php if ( $title1 = get_field( 'titulo_destaque_1', $page->ID ) ) : ?>
					        <h2><?php echo $title1; ?></h2>
			            <?php endif; ?>
			            <?php if ( $subtitle1 = get_field( 'sub_titulo_destaque_1', $page->ID ) ) : ?>
				            <h3><?php echo $subtitle1; ?></h3>
			            <?php endif; ?>

			            <?php if ( $url1 = get_field( 'link_destaque_1', $page->ID ) ) : ?>
			                </a>
			            <?php endif; ?>

		            </div><!-- destaque-1 -->

                <?php endif; ?>

	        <?php if ( $background2 = get_field( 'background_destaque_2', $page->ID ) ) : ?>

		        <div style="background: url(' <?php echo $background2; ?>' ) center center / cover" class="destaque destaque-3 col-md-4 col-sm-4">

			        <?php if ( $url2 = get_field( 'link_destaque_2', $page->ID ) ) : ?>
			            <a class="link" href="<?php echo $url2; ?>">
			        <?php endif; ?>

			       <?php if ( $title2 = get_field( 'titulo_destaque_2', $page->ID ) ) : ?>
				        <h2><?php echo $title2; ?></h2>
			        <?php endif; ?>
		            <?php if ( $subtitle2 = get_field( 'sub_titulo_destaque_2', $page->ID ) ) : ?>
			            <h3><?php echo $subtitle2; ?></h3>
			        <?php endif; ?>

			        <?php if ( $url2 = get_field( 'link_destaque_2', $page->ID ) ) : ?>
				        </a>
			        <?php endif; ?>

		        </div><!-- destaque-2 -->

	        <?php endif; ?>
	        <?php if ( $background3 = get_field( 'background_destaque_3', $page->ID ) ) : ?>

		        <div style="background: url(' <?php echo $background3; ?>' ) center center / cover" class="destaque destaque-3 col-md-4 col-sm-4">

			        <?php if ( $url3 = get_field( 'link_destaque_3', $page->ID ) ) : ?>
			            <a class="link" href="<?php echo $url3; ?>">
			        <?php endif; ?>

			       <?php if ( $title3 = get_field( 'titulo_destaque_3', $page->ID ) ) : ?>
				        <h2><?php echo $title3; ?></h2>
			        <?php endif; ?>
		            <?php if ( $subtitle3 = get_field( 'sub_titulo_destaque_3', $page->ID ) ) : ?>
			            <h3><?php echo $subtitle3; ?></h3>
			        <?php endif; ?>

			        <?php if ( $url3 = get_field( 'link_destaque_3', $page->ID ) ) : ?>
				        </a>
			        <?php endif; ?>

		        </div><!-- destaque-3 -->

	        <?php endif; ?>
		<div class="col-md-12 clear" style="height:50px;"></div><!-- .col-md-12 clear -->
	        <h2 class="section-title">
	        	<?php _e('Destaques da Rede','odin');?>
	        </h2><!-- .section-title -->
	        <?php echo do_shortcode('[brasa_slider name="Destaques Rede"]');?>
	        <div class="col-md-12 clear" style="height:30px"></div><!-- .col-md-12 clear -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #destaques -->
<section id="map" class="col-md-12">
	<div class="container home">
		<h2 class="section-title">
	        	<?php _e('A Rede no Brasil','odin');?>
	        </h2><!-- .section-title -->
	</div><!-- .container -->
</section><!-- #map -->
<iframe src="http://mapa.artesol.org.br/?embed" id="section-mapa"></iframe>
<?php get_footer('rede');?>
