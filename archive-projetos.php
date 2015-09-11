<?php
/**
 * The template for displaying Archive Projetos.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'projetos' ); ?>

	<section id="primary" class="col-md-12">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="publicacoes-archive-title col-md-1">
						<?php
							_e( 'Projetos', 'odin' );
						?>
					</h1>
					<span>
						<?php if($content = get_field('project_content','options')): ?>
						    <?php echo esc_textarea($content);?>
					    <?php endif;?>
					</span>
				</header><!-- .page-header -->
				<div class="col-md-6 pull-right filter-membros">
					<span class="filter-title"><?php _e('Filtros','odin');?></span>
					<div class="dropdown">
				    	<button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    		<?php _e('Saberes e Fazeres','odin');?>
				    		<span class="caret"></span>
				    	</button>
				    	<ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
				            <?php $link = get_projetos_link();?>
						    <?php $tipos = get_terms('tipos', array('hide_empty' => 0));?>
						    <?php foreach($tipos as $tipo):?>
						        <?php $link['by_type'] = $tipo->slug;?>
						        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('projetos'));?>
						        <li>
						        	<a href="<?php echo esc_url($filter_link);?>">
						        		<?php echo apply_filters('the_title',$tipo->name);?>
						        	</a>
						        </li>
					        <?php endforeach;?>
					        <?php $link['by_type'] = '';?>
					        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
					        <li>
						        <a href="<?php echo esc_url($filter_link);?>">
						        	<?php _e('Todos','odin');?>
						        </a>
						    </li>
					    </ul>
					</div>
					<div class="dropdown">
				    	<button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    		<?php _e('Categorias','odin');?>
				    		<span class="caret"></span>
				    	</button>
				    	<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
				            <?php $link = get_projetos_link();?>
						    <?php $tipos = get_terms('membros_category', array('hide_empty' => 0));?>
						    <?php foreach($tipos as $tipo):?>
						        <?php $link['projetos_category'] = $tipo->slug;?>
						        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('projetos'));?>
						        <li>
						        	<a href="<?php echo esc_url($filter_link);?>">
						        		<?php echo apply_filters('the_title',$tipo->name);?>
						        	</a>
						        </li>
					        <?php endforeach;?>
					        <?php $link['projetos_category'] = '';?>

					        <?php $filter_link = add_query_arg($link, get_projetos_link());?>
					        <li>
						        <a href="<?php echo esc_url($filter_link);?>">
						        	<?php _e('Todos','odin');?>
						        </a>
						    </li>
					    </ul>
					</div>
				    <div class="dropdown">
				    	<button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    		<?php _e('Estado','odin');?>
				    		<span class="caret"></span>
				    	</button>
				    	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				            <?php $link = get_projetos_link();?>
						    <?php $tipos = get_terms('membros_state', array('hide_empty' => 0));?>
						    <?php foreach($tipos as $tipo):?>
						        <?php $link['state'] = $tipo->slug;?>
						        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('projetos'));?>
						        <li>
						        	<a href="<?php echo esc_url($filter_link);?>">
						        		<?php echo apply_filters('the_title',$tipo->name);?>
						        	</a>
						        </li>
					        <?php endforeach;?>
					        <?php $link['state'] = '';?>
					        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
					        <li>
						        <a href="<?php echo esc_url($filter_link);?>">
						        	<?php _e('Todos','odin');?>
						        </a>
						    </li>
					    </ul>
					</div>

				</div><!-- .col-md-4 pull-right -->

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'projetos' );

					endwhile;

					// Page navigation.
					echo '<div class="text-center noticias-pagination">';
					brasa_noticias_pagination();
					echo '</div>';


				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->
<div class="col-md-12 separator"></div><!-- .col-md-12 clear -->
<?php
get_footer('aceleracao');
