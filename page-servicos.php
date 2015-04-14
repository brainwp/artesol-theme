<?php
/* Template name: Serviços */
get_header('rede');
?>

<section id="titulo" class="col-md-12">
	<h1><?php echo get_the_title(); ?></h1>
	<div class="col-md-8 desc">
		A artesol presta serviços para empresa, governos, associações e fundações desde o início. Conheça melhor as frente de nossa atuação.
	</div>
</section>


<?php $page = get_page_by_path( 'servicos/projetos-de-captacao', OBJECT, 'page' );?>
<?php if ( !empty( $page ) ): ?>

<section id="captacao" class="col-md-12" <?php thumbnail_bg( $page->ID, 'full' ); ?>>
	<div class="desc">
		<h1><?php echo $page->post_title; ?></h1>
		<?php echo $page->post_excerpt; ?>
	</div>
</section><!-- #captacao -->
	
<?php endif ?>

<?php $page = get_page_by_path( 'servicos/projetos-culturais', OBJECT, 'page' );?>
<?php if ( !empty( $page ) ): ?>

<section id="projetos-culturais" class="col-md-12" <?php thumbnail_bg( $page->ID, 'full' ); ?>>
	<div class="desc">
		<h1><?php echo $page->post_title; ?></h1>
		<?php echo $page->post_excerpt; ?>
	</div>
</section><!-- #projetos-culturais -->
	
<?php endif ?>

<?php $page = get_page_by_path( 'servicos/ja-nos-contrataram', OBJECT, 'page' );?>
<?php if ( !empty( $page ) ): ?>

<section id="contrataram" class="col-md-12">
	<div class="desc">
		<h1><?php echo $page->post_title; ?></h1>
		<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $page->ID ) ); ?>" alt="">
		<?php the_post_thumbnail(); ?>
	</div>
</section><!-- #contrataram -->
	
<?php endif ?>

<iframe src="http://a.brasawp.art.br/artesol/?embed" id="section-mapa"></iframe>

<?php get_footer('rede');?>
