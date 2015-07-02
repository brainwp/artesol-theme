<?php
/**
 * The template for displaying Archive Publicacoes.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */
get_header( 'projetos' );
$args = array(
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
	array_merge($args['meta_query'],$meta_query);
}
$count_query = new WP_User_Query($args);
$per_page = 1; // número de registros por página
$page = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$pages = ceil($count_query->total_users/$per_page);
$offset = ($per_page*$page)-$per_page;
$args = array(
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
?>
	<section id="primary" class="col-md-12">
		<div id="content" class="site-content" role="main">

				<header class="page-header">
					<h1 class="publicacoes-archive-title">
						<?php
							_e( 'Membros da Rede', 'odin' );
						?>
					</h1>
					<div class="col-md-7 pull-right membros-link">
						<?php $link = get_post_type_archive_link('membros');?>
						<div class="col-md-6">
							<a href="<?php echo $link;?>?type_pin=artesao" class="col-md-12 btn btn-primary btn-large">
								<?php _e('Artesão ou Mestre','odin');?>
							</a>
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<a href="<?php echo $link;?>?type_pin=associacoes" class="col-md-12 btn btn-primary btn-large">
								<?php _e('Associações ou Cooperativas','odin');?>
							</a>
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<a href="<?php echo $link;?>?type_pin=lojistas" class="col-md-12 btn btn-primary btn-large">
								<?php _e('Lojistas','odin');?>
							</a>
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<a href="<?php echo $link;?>?type_pin=aceleradoras" class="col-md-12 btn btn-primary btn-large">
								<?php _e('Aceleradoras e Governos','odin');?>
							</a>
						</div><!-- .col-md-6 -->
					</div><!-- .col-md-8 pull-right membros-link -->
				</header><!-- .page-header -->

				<div class="nav-history col-md-7">
					<?php if(isset($_GET['type_pin']) && !empty($_GET['type_pin'])):?>
					    <?php if($_GET['type_pin'] == 'artesao') $type = __('Artesão ou Mestre','odin');?>
					    <?php if($_GET['type_pin'] == 'associacoes') $type = __('Associações ou Cooperativas','odin');?>
					    <?php if($_GET['type_pin'] == 'lojistas') $type = __('Lojistas','odin');?>
					    <?php if($_GET['type_pin'] == 'aceleradoras') $type = __('Aceleradoras e Governos','odin');?>
					    <?php printf(__('Membros >> %s','odin'),$type);?>
					<?php else: ?>
				        <?php _e('Membros >> Todos','odin');?>
				    <?php endif;?>
				</div><!-- .nav-history -->
				<div class="col-md-4 pull-right filter-membros">
				    <div class="dropdown">
				    	<button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    		<?php _e('Filtro','odin');?>
				    		<span class="caret"></span>
				    	</button>
				    	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				            <?php $link = array();?>
				            <?php if(isset($_GET['type_pin']) && !empty($_GET['type_pin'])) $link['type_pin'] = $_GET['type_pin'];?>
						    <?php $tipos = get_terms('tipos', array('hide_empty' => 0));?>
						    <?php foreach($tipos as $tipo):?>
						        <?php $link['filter_type'] = $tipo->slug;?>
						        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
						        <li>
						        	<a href="<?php echo esc_url($filter_link);?>">
						        		<?php echo apply_filters('the_title',$tipo->name);?>
						        	</a>
						        </li>
					        <?php endforeach;?>
					    </ul>
					</div>
				</div><!-- .col-md-4 pull-right -->
				<?php $user_query = new WP_User_Query( $args );?>
				<?php if ( ! empty( $user_query->results ) ): ?>
				    <?php foreach ( $user_query->results as $user ): ?>
				        <?php global $user; ?>
				        <?php get_template_part('content','membro');?>
				    <?php endforeach;?>
				<?php else : ?>
				    <?php get_template_part('content','none');?>
			    <?php endif;?>
			    <div class="text-center noticias-pagination">
			    <?php
			    if ( ! empty( $user_query->results ) ):
			    $big = 999999999; // need an unlikely integer
			    $url_args = array();
			    if(isset($_GET['type_pin']) && !empty($_GET['type_pin'])) $url_args['type_pin'] = $_GET['type_pin'];
			    if(isset($_GET['filter_type']) && !empty($_GET['filter_type'])) $url_args['filter_type'] = $_GET['filter_type'];
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
		</div><!-- #content -->
	</section><!-- #primary -->
	<div class="map-margin-top"></div><!-- .map-margin -->
	<div class="iframe-container-map">
		<?php $map = array();?>
		<?php $map['embed'] = 'true';?>
		<?php if(isset($_GET['type_pin']) && !empty($_GET['type_pin'])) $map['type_pin'][] = $_GET['type_pin'];?>
		<?php if(isset($_GET['filter_type']) && !empty($_GET['filter_type'])) $map['filter_type'] = $_GET['filter_type'];?>
		<?php $map = add_query_arg($map,'http://wp.codeispoetry.info/mapa-artesol/');?>
		<iframe src="<?php echo esc_url($map);?>" id="section-mapa"></iframe>
	</div><!-- .iframe-container-map -->
	<div class="map-margin"></div><!-- .map-margin -->
<?php
get_footer('aceleracao');
