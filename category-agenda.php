<?php
/* Template to display category */
get_header('rede');
?>
<div class="col-md-12 header-agenda">
	<div class="container">
		<div class="row">
			<h1 class="col-md-4 pull-left cat-title">
				<?php single_cat_title( null, true );?>
			</h1>
			<div class="col-md-6 pull-right description">
				<?php echo category_description();?>
			</div><!-- .col-md-5 pull-right description -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .col-md-12 header-agenda -->
<div class="col-md-12 list-agenda">
	<div class="container">
		<div class="row">
			<?php if(have_posts()): ?>
			     <?php while ( have_posts() ) : the_post(); ?>
			        <?php get_template_part('content','agenda');?>
			     <?php endwhile;?>
			     	<div class="text-center noticias-pagination agenda-pagination">
					    <?php brasa_noticias_pagination(); ?>
					</div>
		    <?php endif;?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .col-md-12 list-agenda -->
<div class="col-md-12">
	<div class="container home">
		<div class="row boxes">
			<div class="col-md-4">
				<a href="http://www.artesol.org.br/site/projetos/" class="projetos">
				    <div class="icon"></div>
			        <h3><?php _e('Projetos da Artesol','odin');?></h3>
				    <p><?php _e('Conheça todos os projetos já realizados','odin');?></p>
				</a>
			</div>
			<div class="col-md-4">
				<a href="http://www.artesol.org.br/site/rede/" class="projetos" style="background:transparent url(<?php echo get_bloginfo('template_url');?>/assets/images/bg-rede-widget.jpg) no-repeat scroll center center;background-size:cover;">
				    <div class="icon" style="background:url(<?php echo get_bloginfo('template_url');?>/assets/images/logo-rede-home.png) no-repeat scroll center top;width:100%"></div>
				    	<h3>
				    		<?php _e('Conheça o trabalho de aceleração social da Artesol','odin');?>
				    	</h3>
				</a>
			</div>
			<div class="col-md-4">
				<a href="http://www.artesol.org.br/site/comercio-justo/" class="projetos" style="background:transparent url(<?php echo get_bloginfo('template_url');?>/assets/images/bg-comercio-justo-widget.jpg) no-repeat scroll center center;background-size:cover;">
				    <div class="icon" style="background:url(<?php echo get_bloginfo('template_url');?>/assets/images/icon-comercio-justo.png) no-repeat scroll center top;"></div>
				    <h3><?php _e('Comércio Justo','odin');?></h3>
				    <p><?php _e('Fair Trade','odin');?></p>
				</a>
			</div><!-- .col-md-4 -->
		</div><!-- .row boxes -->
	</div><!-- .container home -->
</div><!-- .col-md-12 -->
<?php get_footer('agenda');
