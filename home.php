<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that display Home.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'home' ); ?>

	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<div id="content" class="site-content" role="main">

			<h1 class="entry-title"><?php _e( 'Destaques', 'odin' ); ?></h1>
			<div class="boxes">
				<div class="col-md-4">

					<div class="servicos">

						<h3>Serviços</h3>
						<span>Seja bem vind@ ao site da ArteSol, se está procurando nossos serviços.</span>

						<a class="btn-artesol bg-marrom-artesol" href="">Clique Aqui</a>

					</div><!-- servicos -->

					<div class="agenda">
						
						<h3>Agenda</h3>
						<span>Participamos e realizamos de diversos eventos e feiras</span>

						<a class="btn-artesol bg-azul-artesol" href="">Veja a Agenda</a>

					</div><!-- agenda -->

				</div>

				<div class="col-md-4">

					<a href="" class="aceleracao">
						<div class="icon"></div>
						<h3>Conheça o trabalho de aceleração social da Artesol</h3>
					</a><!-- aceleracao -->

				</div>

				<div class="col-md-4">
					Projetos
				</div>
			</div><!-- boxes -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
