<?php
/**
 * The template for displaying Archive Produtos.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */
get_header( 'servicos' );
$args = array(
	'role' => 'Subscriber',
	'meta_query' => array(
		array(
			'key'     => 'type_pin',
			'compare' => 'EXISTS'
		),
	)
);
if(isset($_GET['type_pin']) && !empty($_GET['type_pin'])){
	$args = array(
		'meta_query' => array(
			array(
				'key'     => 'type_pin',
				'value'   => $_GET['type_pin'],
				'compare' => '='
			),
		)
	);
}
if(isset($_GET['filter_type']) && !empty($_GET['filter_type'])){
	$meta_query = array(
		'key'     => 'user_type',
	    'value'   => $_GET['filter_type'],
		'compare' => '='
	);
	$args['meta_query'][] = $meta_query;
}
if(isset($_GET['state']) && !empty($_GET['state'])){
	$args['meta_query'][] = array(
		'key'     => 'user_state',
	    'value'   => $_GET['state'],
		'compare' => '='
	);
}
if(isset($_GET['user_category']) && !empty($_GET['user_category'])){
	$args['meta_query'][] = array(
		'key'     => 'user_category',
	    'value'   => $_GET['user_category'],
		'compare' => '='
	);
}
if(isset($_GET['user_perfil']) && !empty($_GET['user_perfil'])){
	$args['meta_query'][] = array(
		'key'     => 'membros_perfil',
	    'value'   => $_GET['user_perfil'],
		'compare' => '='
	);
}
$count_query = new WP_User_Query($args);
$per_page = 8; // número de registros por página
$page = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$pages = ceil($count_query->total_users/$per_page);
$offset = ($per_page*$page)-$per_page;
$args = array(
	'role' => 'Subscriber',
	'number' => $per_page,
	'offset' => $offset,
	'meta_query' => array(
		array(
			'key'     => 'type_pin',
			'compare' => 'EXISTS'
		),
	)
);
if(isset($_GET['type_pin']) && !empty($_GET['type_pin'])){
	$args = array(
		'number' => $per_page,
		'offset' => $offset,
		'meta_query' => array(
			array(
				'key'     => 'type_pin',
				'value'   => $_GET['type_pin'],
				'compare' => '='
			),
		)
	);
}
if(isset($_GET['filter_type']) && !empty($_GET['filter_type'])){
	$args['meta_query'][] = array(
		'key'     => 'user_type',
	    'value'   => $_GET['filter_type'],
		'compare' => '='
	);
}
if(isset($_GET['state']) && !empty($_GET['state'])){
	$args['meta_query'][] = array(
		'key'     => 'user_state',
	    'value'   => $_GET['state'],
		'compare' => '='
	);
}
if(isset($_GET['user_category']) && !empty($_GET['user_category'])){
	$args['meta_query'][] = array(
		'key'     => 'user_category',
	    'value'   => $_GET['user_category'],
		'compare' => '='
	);
}
if(isset($_GET['user_perfil']) && !empty($_GET['user_perfil'])){
	$args['meta_query'][] = array(
		'key'     => 'membros_perfil',
	    'value'   => $_GET['user_perfil'],
		'compare' => '='
	);
}
?>
<header class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="publicacoes-archive-title">
					<a href="<?php echo home_url('/produtos'); ?>">
					<?php _e( 'Produtos dos Membros', 'odin' );?>
					</a>
				</h1>
				<div class="pull-right">
					<a href="<?php echo home_url('/rede'); ?>">
						<img src="<?php echo get_template_directory_uri();?>/assets/images/logo-rede-home.png">
					</a>
				</div><!-- .pull-right -->
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</header><!-- .page-header -->
<div class="col-md-12 produtos-container">
	<div class="container">
		<div class="row">
			<div class="col-md-6 pull-right filter-membros">
					<span class="filter-title"><?php _e('Filtros','odin');?></span>
				<div class="dropdown">
					<button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    	<?php if( ! isset($_GET['filter_type']) ) :?>
				    		<?php _e('Técnicas','odin');?>
				    	<?php else: ?>
				    		<?php $term = get_term_by('slug', $_GET['filter_type'], 'tipos');?>
				    		<?php echo apply_filters('the_title', $term->name);?>
				    	<?php endif;?>
				    	<span class="caret"></span>
			        </button>
			        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				        <?php $link = array();?>
						<?php $tipos = get_terms('tipos', array('hide_empty' => 0, 'parent' => 0));?>
						<?php foreach($tipos as $tipo):?>
							<?php $link['filter_type'] = $tipo->slug;?>
						    <?php $filter_link = add_query_arg($link,get_post_type_archive_link('produtos'));?>
						    <li>
						        <a href="<?php echo esc_url($filter_link);?>">
						        	<?php echo apply_filters('the_title',$tipo->name);?>
						        </a>
						    </li>
					    <?php endforeach;?>
					    <?php $link['filter_type'] = '';?>
					    <?php $filter_link = add_query_arg($link,get_post_type_archive_link('produtos'));?>
					    <li>
						    <a href="<?php echo esc_url($filter_link);?>">
						        <?php _e('Todos','odin');?>
						    </a>
						</li>
					</ul>
				</div><!-- .dropdown -->
				<div class="dropdown">
				    <button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    	<?php _e('Estado','odin');?>
				    	<span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
				        <?php $link = get_membros_query_args();?>
					 	<?php $tipos = get_terms('membros_state', array('hide_empty' => 0));?>
						<?php foreach($tipos as $tipo):?>
							<?php $link['state'] = $tipo->slug;?>
						   	<?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
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
				<div class="dropdown">
				    <button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    	<?php _e('Categoria','odin');?>
				    	<span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
				        <?php $link = get_membros_query_args();?>
						<?php $tipos = get_terms('membros_category', array('hide_empty' => 0));?>
						<?php foreach($tipos as $tipo):?>
							<?php $link['user_category'] = $tipo->slug;?>
							<?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
							<li>
						        <a href="<?php echo esc_url($filter_link);?>">
						        	<?php echo apply_filters('the_title',$tipo->name);?>
						        </a>
						    </li>
					   	<?php endforeach;?>
					    <?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
					   	<?php $link['user_category'] = '';?>
					    <li>
						    <a href="<?php echo esc_url($filter_link);?>">
						       	<?php _e('Todos','odin');?>
						    </a>
						</li>
					</ul>
				</div>
			</div><!-- .filter-membros -->
			<div class="clear"></div><!-- .col-md-12 clear -->
			<?php $user_query = new WP_User_Query( $args );?>
			<?php if ( ! empty( $user_query->results ) ): ?>
				<?php foreach ( $user_query->results as $user ): ?>
				    <?php global $user; ?>
			 		<?php get_template_part('content','produtos');?>
				<?php endforeach;?>
			<?php else : ?>
				<?php get_template_part('content','none');?>
			<?php endif;?>
			<div class="text-center noticias-pagination">
			<?php
			if ( ! empty( $user_query->results ) ):
			$big = 999999999; // need an unlikely integer
		    $url_args = array();
		    if(isset($_GET['filter_type']) && ! empty( $_GET['filter_type'] )) $url_args['filter_type'] = $_GET['filter_type'];
 		    echo paginate_links( array(
			    'format' => '?pagina=%#%',
			    'current' => $page,
			    'total' => $pages,
			    'add_args' => $url_args,
			    'prev_text' => '<',
			    'next_text' => '>',
			    )
			);
			endif;
			?>
			</div><!-- .text-center noticias-pagination -->

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .col-md-12 produtos-container -->
<section id="tipos" class="col-md-12">
	<div class="container">
		<div class="row">
			<?php $page = get_page_by_path( 'rede/tipologia', OBJECT, 'page' );?>

			<h2 class="section-title"><?php _e('Tipologias','odin');?></h2><!-- .section-title -->
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
<section id="patrimonio">
	<div class="container">
		<div class="row">
			<h1 class="section-title">
				<?php _e('Artesanato Brasileiro <br>e o<br>Patrimônio Imaterial','odin');?>
			</h1><!-- .section-title -->
			<div class="col-md-12 text-center">
				<a href="<?php echo home_url('/artesanato-brasileiro'); ?>" class="btn-trabalhar">
					<?php _e('Saiba Mais','odin');?>
				</a>
			</div><!-- .col-md-12 text-center -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #patrimonio -->
<?php get_footer('rede');?>
