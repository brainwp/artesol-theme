<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */

	$domain = 'odin';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 each-projeto' ); ?>>
	<header class="bg row"></header>

	<div class="col-md-12">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );	?>
	</div>

	<div class="col-md-4 summary">
		<span>
			<?php if($cats = get_the_terms(get_the_ID(),'tipos')): ?>
				<?php $i = 0;?>
				<?php $count = count($cats);?>
				<?php foreach($cats as $cat):?>
				    <?php if($i > 0):?>
				    	<?php echo '- ';?>
				    <?php endif;?>
					<?php if($i == $count - 1):?>
						<?php echo apply_filters('the_title',$cat->name) . ' - ' . get_post_meta( get_the_ID(), 'project_year', true );?>
			    	<?php else: ?>
			    		<?php echo apply_filters('the_title',$cat->name);?>
		      		<?php endif;?>
		      		<?php $i++;?>
		    	<?php endforeach;?>
			<?php endif;?>
		</span>
		<span class="entry-summary">
			<?php the_excerpt(); ?>
		</span>
		<a class="btn-artesol" href="<?php the_permalink(); ?>"><?php _e( 'Saiba mais', 'odin' ); ?></a>
	</div>
	<div class="col-md-4 infos">
		<span><strong><?php _e( 'Localização:', $domain ); ?></strong>
		<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_local', true ));?>
		</span>
		<span><strong><?php _e( 'Duração:', $domain ); ?></strong>
		<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_time', true ));?>
		</span>
		<span><strong><?php _e( 'Gênero:', $domain ); ?></strong>
		<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_type', true ));?>
		</span>
		<span><strong><?php _e( 'Artesãos beneficiados:', $domain ); ?></strong>
		<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_beneficiados', true ));?>
		</span>
	</div>
	<div class="col-md-4 thumb">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} ?>
		</a>
	</div>

	<footer class="bg row"></footer>
</article><!-- #post-## -->
