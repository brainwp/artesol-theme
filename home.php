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
			<h1 class="entry-title col-md-6 pull-left"><?php _e( 'Destaques', 'odin' ); ?></h1>
			<div class="col-md-1 pull-right slider-icon" id="slider-ctrl">
				<span></span>
			</div><!-- .col-md-5 pull-right -->
			<div id="slider-home">
			<?php
			// WP_Query arguments
			$args = array (
			'post_type' => 'page',
			'meta_query'            => array(
				array(
					'key'       => 'slider_home',
					'value'     => 'true',
					'compare'   => '=',
					),
				),
			);
			// The Query
			$query = new WP_Query( $args );
			?>
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ): $query->the_post(); ?>
				     <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
				     <div class="item">
				     	<a class="item-container" style="background-image:url(<?php echo esc_attr($src[0]);?>)" href="<?php the_permalink();?>">
				     		<?php the_post_thumbnail( 'medium', array('class' => 'mult-only') ); ?>
				     		<h3><?php the_title(); ?></h3>
				     		<h4 class="area"><?php echo 'area'; ?></h4><!-- .area -->
				     		<span><?php the_excerpt();?></span>
				     	</a><!-- .item-container -->
				     </div><!-- .item -->
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			</div><!-- #slider-home -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<div class="boxes">
				<div class="col-md-4">
				<?php if( get_field('box_home_repeater', 'option') ): ?>
				    <div class="pull-right">
				    	<?php while ( has_sub_field('box_home_repeater','option') ): ?>
				    	    <div class="<?php echo get_sub_field('box_home_repeater_icon');?>">
				    	    	<h3>
				    	    		<?php echo get_sub_field('box_home_repeater_title');?>
				    	    	</h3>
				    	    	<span>
				    	    		<?php echo get_sub_field('box_home_repeater_text');?>
				    	    	</span>
				    	    	<a class="btn-artesol <?php echo get_sub_field('box_home_repeater_btn');?>" href="<?php echo get_sub_field('box_home_repeater_link');?>">
				    	    		<?php echo get_sub_field('box_home_repeater_btn_text');?>
				    	    	</a>
				    	    </div><!-- servicos -->
                        <?php endwhile; ?>
				    </div><!-- .pull-right -->
                <?php endif;?>
				</div>
				<?php if( get_field('box_projetos', 'option') ): ?>
				    <?php while ( has_sub_field('box_projetos','option') ): ?>
				    	    <div class="col-md-4">
				    	    	<a href="<?php echo get_sub_field('box_home_repeater_link');?>" class="<?php echo get_sub_field('box_home_repeater_class');?>">
				    	    		<div class="icon"></div>
				    	    		<h3><?php echo get_sub_field('box_home_repeater_title');?></h3>
				    	    		<?php if(get_sub_field('box_home_repeater_class') == 'projetos'): ?>
				    	    		    <p><?php echo get_sub_field('box_home_repeater_text');?></p>
				    	    	    <?php endif; ?>
				    	    	</a>
				    	    </div><!-- servicos -->
                        <?php endwhile; ?>
                <?php endif;?>
			</div><!-- boxes -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
