<?php
/* Template name: Serviços */
get_header( 'servicos' );
?>

<?php $capacitacao = get_page_by_path( 'servicos/projetos-de-capacitacao', OBJECT, 'page' );?>
<?php $projetos_culturais = get_page_by_path( 'servicos/projetos-culturais', OBJECT, 'page' );?>
<?php $consultorias = get_page_by_path( 'servicos/consultorias', OBJECT, 'page' );?>
<?php $projetos_personalizados = get_page_by_path( 'servicos/projetos-personalizados', OBJECT, 'page' );?>
<?php $contrataram = get_page_by_path( 'servicos/ja-nos-contrataram', OBJECT, 'page' );?>
<?php $fale_conosco = get_page_by_path( 'servicos/fale-com-a-artesol', OBJECT, 'page' );?>

<div class="container">

<section id="titulo" class="col-md-12">
	<h1><?php echo get_the_title(); ?></h1>
	<div class="col-md-8 desc">
		A artesol presta serviços para empresa, governos, associações e fundações desde o início. Conheça melhor as frente de nossa atuação.
	</div>
</section>

<?php if ( !empty( $capacitacao ) ): ?>

<section id="capacitacao" class="col-md-12" <?php thumbnail_bg( $capacitacao->ID, 'full' ); ?>>
	<div class="desc">
		<h1><?php echo $capacitacao->post_title; ?></h1>
		<?php echo $capacitacao->post_excerpt; ?>
	</div>
</section><!-- #capacitacao -->
	
<?php endif ?>

<?php if ( !empty( $projetos_culturais ) ): ?>

<section id="projetos-culturais" class="col-md-12" <?php thumbnail_bg( $projetos_culturais->ID, 'full' ); ?>>
	<div class="desc">
		<h1><?php echo $projetos_culturais->post_title; ?></h1>
		<?php echo $projetos_culturais->post_excerpt; ?>
	</div>
</section><!-- #projetos-culturais -->

<?php endif ?>
	
<?php if ( !empty( $consultorias ) ): ?>

<section id="consultorias" class="col-md-12" <?php thumbnail_bg( $consultorias->ID, 'full' ); ?>>
	<div class="desc">
		<h1><?php echo $consultorias->post_title; ?></h1>
		<?php echo $consultorias->post_excerpt; ?>
	</div>
</section><!-- #consultorias -->

<?php endif ?>

<?php if ( !empty( $projetos_personalizados ) ): ?>

<section id="personalizados" class="col-md-12" <?php thumbnail_bg( $projetos_personalizados->ID, 'full' ); ?>>
	<div class="desc">
		<h1><?php echo $projetos_personalizados->post_title; ?></h1>
		<?php echo $projetos_personalizados->post_excerpt; ?>
	</div>
</section><!-- #personalizados -->

<?php endif ?>

<?php if ( !empty( $contrataram ) ): ?>

<section id="contrataram" class="col-md-12">
	<div class="desc">
		<h1><?php echo $contrataram->post_title; ?></h1>
		<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $contrataram->ID ) ); ?>" alt="">
		<?php the_post_thumbnail(); ?>
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

<iframe src="http://a.brasawp.art.br/artesol/?embed" id="section-mapa"></iframe>

</div>

<?php get_footer('rede');?>
