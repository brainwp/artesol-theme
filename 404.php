<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Odin
 * @since 2.2.0
 */
global $page_default;
$page_default = true;
get_header( 'rede' ); ?>
<div class="col-md-12 page-404">
	<div class="container">
		<div class="row">
			<h1 class="entry-title">404</h1>
			<h2 class="error-subtitle">
				<?php _e('Página não encontrada','odin');?>
			</h2><!-- .error -->
			<div class="error-text">
				<?php _e( 'Parece que não encontramos o que você está procurando. <br>Talvez a busca, ou um dos links abaixo, possa ajudar.', 'odin' ); ?>
			</div><!-- .error-text -->
			<div class="col-md-8 col-md-offset-2">
				<form action="<?php echo home_url('/');?>" class="col-md-offset-2 col-md-8 search-form-404">
					<input type="text" class="col-md-9 search-text" name="s" placeholder="<?php _e('Digite e aperte enter','odin');?>" />
			        <button class="col-md-2 pull-right"></button>
			    </form><!-- #search-form-404 -->
			</div><!-- .col-md-8 col-md-offset-2 -->
			<div id="error404-padding"></div><!-- #error404-padding -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .col-md-12 page-404 -->

<?php
get_footer( 'artesanato' ); ?>
