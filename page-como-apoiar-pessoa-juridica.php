<?php
/* Template name: Como Apoiar Pessoa Juridica */
get_header('rede');
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="col-md-12 header-como-apoiar">
		<div class="container">
			<div class="row">
				<h1 class="col-md-7 post-title">
					<?php the_title();?>
				</h1><!-- .col-md-8 -->
				<div class="col-md-4 pull-right icon-como-apoiar">
					<h3><?php _e('Como Apoiar','odin');?></h3>
					<h5><?php _e('Pessoa Jurídica','odin');?></h5>
				</div><!-- .col-md-4 pull-right icon-como-apoiar -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .col-md-12 header-como-apoiar -->
	<div class="col-md-8 col-md-offset-2 como-apoiar-post-content">
		<?php the_content();?>
	</div><!-- .col-md-8 col-md-offset-2 content -->
<?php endwhile; ?>
<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
<section id="trabalhar">
	<div class="container">
		<div class="row">
			<h1 class="section-title">
				<?php _e('Vamos trabalhar juntos?','odin');?>
			</h1><!-- .section-title -->
			<div class="col-md-8 col-md-offset-2 content">
				<?php _e('Conheça os serviços que oferecemos. Nós podemos fazer um projeto sob medida para as suas necessidades.','odin');?>
			</div><!-- .content -->
			<div class="col-md-12 text-center">
				<a href="<?php echo home_url('/servicos'); ?>" class="btn-trabalhar">
					<?php _e('Saiba Mais','odin');?>
				</a>
			</div><!-- .col-md-12 text-center -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #trabalhar -->
<?php get_footer('como-apoiar');?>
