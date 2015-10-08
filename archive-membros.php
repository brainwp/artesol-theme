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
							<a href="<?php echo $link;?>?type_pin=agentes" class="col-md-12 btn btn-primary btn-large">
								<?php _e('Agentes de Apoio','odin');?>
							</a>
						</div><!-- .col-md-6 -->
					</div><!-- .col-md-8 pull-right membros-link -->
				</header><!-- .page-header -->

				<div class="nav-history col-md-6">
					<?php if(isset($_GET['type_pin']) && !empty($_GET['type_pin'])):?>
					    <?php if($_GET['type_pin'] == 'artesao') $type = __('Artesão ou Mestre','odin');?>
					    <?php if($_GET['type_pin'] == 'associacoes') $type = __('Associações ou Cooperativas','odin');?>
					    <?php if($_GET['type_pin'] == 'lojistas') $type = __('Lojistas','odin');?>
					    <?php if($_GET['type_pin'] == 'agentes') $type = __('Agentes de Apoio','odin');?>
					    <?php printf(__('Membros >> %s','odin'),$type);?>
					<?php else: ?>
				        <?php _e('Membros >> Todos','odin');?>
				    <?php endif;?>
				</div><!-- .nav-history -->
				<div class="col-md-6 pull-right filter-membros">
					<span class="filter-title"><?php _e('Filtros','odin');?></span>
					<?php if(isset($_GET['type_pin']) && $_GET['type_pin'] == 'artesao' || isset($_GET['type_pin']) && $_GET['type_pin'] == 'associacoes'):?>
				    <div class="dropdown">
				    	<button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    		<?php _e('Técnicas','odin');?>
				    		<span class="caret"></span>
				    	</button>
				    	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				            <?php $link = get_membros_query_args();?>
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
					        <?php $link['filter_type'] = '';?>
					        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
					        <li>
						        <a href="<?php echo esc_url($filter_link);?>">
						        	<?php _e('Todos','odin');?>
						        </a>
						    </li>
					    </ul>
					</div>
					<?php endif;?>
					<?php if(isset($_GET['type_pin']) && $_GET['type_pin'] == 'artesao' || isset($_GET['type_pin']) && $_GET['type_pin'] == 'associacoes'):?>
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
					<?php endif;?>
					<?php if(isset($_GET['type_pin']) && $_GET['type_pin'] == 'agentes'):?>
				    <div class="dropdown">
				    	<button class="pull-right btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    		<?php _e('Perfil','odin');?>
				    		<span class="caret"></span>
				    	</button>
				    	<ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
				            <?php $link = get_membros_query_args();?>
						    <?php $tipos = get_terms('membros_perfil', array('hide_empty' => 0));?>
						    <?php foreach($tipos as $tipo):?>
						        <?php $link['user_perfil'] = $tipo->slug;?>
						        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
						        <li>
						        	<a href="<?php echo esc_url($filter_link);?>">
						        		<?php echo apply_filters('the_title',$tipo->name);?>
						        	</a>
						        </li>
					        <?php endforeach;?>
					        <?php $link['user_perfil'] = '';?>
					        <?php $filter_link = add_query_arg($link,get_post_type_archive_link('membros'));?>
					        <li>
						        <a href="<?php echo esc_url($filter_link);?>">
						        	<?php _e('Todos','odin');?>
						        </a>
						    </li>
					    </ul>
					</div>
					<?php endif;?>
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

				</div><!-- .col-md-4 pull-right -->

				<div class="clear"></div>

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
			    $url_args = get_membros_query_args(true);
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
		<?php $map = add_query_arg($map,'http://mapa.artesol.org.br/');?>
		<iframe src="<?php echo esc_url($map);?>" id="section-mapa"></iframe>
	</div><!-- .iframe-container-map -->
	<div class="map-margin"></div><!-- .map-margin -->
<?php
get_footer('aceleracao');
