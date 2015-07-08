<?php
/* Template name: Serviços */
get_header( 'servicos' );
?>

<?php $projetos_institucionais = get_page_by_path( 'servicos/projetos-institucionais', OBJECT, 'page' );?>
<?php $consultorias = get_page_by_path( 'servicos/consultorias', OBJECT, 'page' );?>
<?php $disseminacao = get_page_by_path( 'servicos/disseminacao', OBJECT, 'page' );?>
<?php $portfolio = get_post_meta( get_queried_object_id(), 'servicos_portfolio', true);?>

<?php $projetos_personalizados = get_page_by_path( 'servicos/projetos-personalizados', OBJECT, 'page' );?>
<?php $contrataram = get_page_by_path( 'servicos/ja-nos-contrataram', OBJECT, 'page' );?>
<?php $fale_conosco = get_page_by_path( 'servicos/fale-com-a-artesol', OBJECT, 'page' );?>

<section id="titulo" class="col-md-12">
	<div class="container">
		<div class="row">
			<?php while ( have_posts() ) : the_post();?>
			    <h1><?php echo get_the_title(); ?></h1>
			    <div class="col-md-8 desc">
			    	<?php the_content();?>
			    </div>
		        <div class="col-md-12 text-center">
		        <a class="col-md-12 entenda-btn-txt scroll-click" href="#projetos-institucionais">
		        	<?php _e('Saiba Mais','odin');?>
		        </a>
		        <a class="col-md-12 entenda-btn scroll-click" href="#projetos-institucionais"></a>
		        </div><!-- .col-md-12 text-center -->
		    <?php endwhile;?>
		</div><!-- .row -->
	</div><!-- .container -->
</section>

<?php if ( !empty( $projetos_institucionais ) ): ?>
	<section id="projetos-institucionais" class="col-md-12">
		<div class="container">
			<div class="row">
				<h3 class="section-title col-md-6 pull-right text-right">
					<?php echo get_the_title( $projetos_institucionais->ID );?>
				</h3><!-- .section-title col-md-12 -->
				<div class="col-md-7 pull-right desc text-right">
					<?php echo apply_filters('the_excerpt', $projetos_institucionais->post_excerpt);?>
				</div><!-- .col-md-12 desc -->
				<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
				<div class="col-md-12">
				    <a href="<?php echo get_permalink($projetos_institucionais->ID);?>" class="btn btn-primary btn-more pull-right">
				    	<?php _e('Leia Mais','odin');?>
				    </a>
				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #projetos-institucionais.col-md-12 -->
<?php endif; ?>
<?php if ( !empty( $consultorias ) ): ?>
	<section id="consultorias" class="col-md-12">
		<div class="container">
			<div class="row">
				<h3 class="section-title col-md-6">
					<?php echo get_the_title( $consultorias->ID );?>
				</h3><!-- .section-title col-md-12 -->
				<div class="col-md-7 desc">
					<?php echo apply_filters('the_excerpt', $consultorias->post_excerpt);?>
				</div><!-- .col-md-7 desc -->
				<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
				<div class="col-md-12">
				    <a href="<?php echo get_permalink($consultorias->ID);?>" class="btn btn-primary btn-more">
				    	<?php _e('Leia Mais','odin');?>
				    </a>
				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #consultorias.col-md-12 -->
<?php endif; ?>
<?php if ( !empty( $disseminacao ) ): ?>
	<section id="disseminacao" class="col-md-12">
		<div class="container">
			<div class="row">
				<h3 class="section-title col-md-6 pull-right text-right">
					<?php echo get_the_title( $disseminacao->ID );?>
				</h3><!-- .section-title col-md-12 -->
				<div class="col-md-7 pull-right desc text-right">
					<?php echo apply_filters('the_excerpt', $disseminacao->post_excerpt);?>
				</div><!-- .col-md-12 desc -->
				<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
				<div class="col-md-12">
				    <a href="<?php echo get_permalink($disseminacao->ID);?>" class="btn btn-primary btn-more pull-right">
				    	<?php _e('Leia Mais','odin');?>
				    </a>
				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #projetos-institucionais.col-md-12 -->
<?php endif; ?>
<?php if ( $portfolio && !empty( $portfolio ) ): ?>
	<section id="portfolio" class="col-md-12">
		<div class="container">
			<div class="row">
				<h3 class="section-title col-md-6">
					<?php if($title = get_post_meta( get_queried_object_id(), 'servicos_portfolio_title', true)):?>
					   <?php echo apply_filters('the_title', $title);?>
					<?php endif;?>
				</h3><!-- .section-title col-md-12 -->
				<div class="col-md-7 desc">
					<?php if($content = get_post_meta( get_queried_object_id(), 'servicos_portfolio_content', true)):?>
					    <?php echo apply_filters('the_content', $content);?>
					<?php endif;?>
				</div><!-- .col-md-12 desc -->
				<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
				<div class="col-md-12">
					<?php $download = new DLM_Download($portfolio[0]);?>
				    <a href="<?php echo $download->get_the_download_link();?>" class="btn btn-primary btn-more">
				    	<?php printf(__('Baixar [%s]','odin'), $download->get_the_filesize());?>
				    </a>
				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #projetos-institucionais.col-md-12 -->
<?php endif; ?>
<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
<div class="container">
	<div class="row">
		<?php if ( !empty( $contrataram ) ): ?>
		    <section id="contrataram" class="col-md-12">
		    	<div class="desc">
		    		<h1><?php echo $contrataram->post_title; ?></h1>
		    		<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $contrataram->ID ) ); ?>" alt="">
		    	</div>
		    </section><!-- #contrataram -->
		<?php endif ?>
		<?php if ( !empty( $fale_conosco ) ): ?>
		    <section id="fale-conosco" class="col-md-8">
		    	<div class="desc">
		    		<h1><?php echo $fale_conosco->post_title; ?></h1>
		    		<?php echo apply_filters('the_content', $fale_conosco->post_content); ?>
		    	</div>
		    </section><!-- #fale-conosco -->
		<?php endif ?>
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer('aceleracao');?>
