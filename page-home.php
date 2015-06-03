<?php
/**
 * The template for displaying all pages.
 * Template name: Home
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
			'post_type' => array('post','page'),
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
				     		<div class="mult-only">
				     			<?php the_post_thumbnail( 'medium' ); ?>
				     		</div><!-- .col-md-12 multi-only -->
				     		<h4 class="area">
				     			<?php if($cat = get_the_category()):?>
				     				<?php echo $cat[0]->cat_name;?>
				     		    <?php endif;?>
				     		</h4><!-- .area -->
						<h3><?php the_title(); ?></h3>
						<div class="mult-only">
				     		<span class="resumo"><?php the_excerpt();?></span>
						</div><!-- multi-only -->
				     		<span class="leia-mais btn-artesol"><?php _e('Leia mais', 'odin'); ?></span>
				     	</a><!-- .item-container -->
				     </div><!-- .item -->
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			</div><!-- #slider-home -->
			<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
			<div class="boxes">
				<div class="col-md-4" style="margin-top:-40px;">
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
				<?php if( get_field('home_feature_1_title', 'option') ): ?>
				        <?php $style = ''; ?>
				        <?php if(get_field('home_feature_1_bg','option')): ?>
				              <?php $style = get_field('home_feature_1_bg','option');?>
				                <?php $style = 'background:transparent url("'.$style['sizes']['large'].'") no-repeat scroll center center;background-size:cover;'; ?>
				        <?php endif;?>
				    	    <div class="col-md-4">
				    	    	<a href="<?php echo get_field('home_feature_1_link','option');?>" class="<?php echo get_field('home_feature_1_class','option');?>" style="<?php echo esc_attr($style);?>">
				    	    	    <?php $style = ''; ?>
				    	    	    <?php if(get_field('home_feature_1_icon','option')): ?>
				    	    	        <?php $style = get_field('home_feature_1_icon','option');?>
				    	    	        <?php $style = 'background:transparent url("'.$style['sizes']['thumbnail'].'") no-repeat scroll center center;'; ?>
				    	    	    <?php endif;?>
				    	    		<div class="icon" style="<?php echo esc_attr($style);?>"></div>
				    	    		<h3><?php echo get_field('home_feature_1_title','option');?></h3>
				    	    		<?php if(get_field('home_feature_1_class','option') == 'projetos'): ?>
				    	    		    <p><?php echo get_field('home_feature_1_resume','option');?></p>
				    	    	    <?php endif; ?>
				    	    	</a>
				    	    </div><!-- servicos -->
                <?php endif;?>
                <?php if( get_field('home_feature_2_title', 'option') ): ?>
				        <?php $style = ''; ?>
				        <?php if(get_field('home_feature_2_bg','option')): ?>
				              <?php $style = get_field('home_feature_2_bg','option');?>
				                <?php $style = 'background:transparent url("'.$style['sizes']['large'].'") no-repeat scroll center center;background-size:cover;'; ?>
				        <?php endif;?>
				    	    <div class="col-md-4">
				    	    	<a href="<?php echo get_field('home_feature_2_link','option');?>" class="<?php echo get_field('home_feature_2_class','option');?>" style="<?php echo esc_attr($style);?>">
				    	    	    <?php $style = ''; ?>
				    	    	    <?php if(get_field('home_feature_2_icon','option')): ?>
				    	    	        <?php $style = get_field('home_feature_2_icon','option');?>
				    	    	        <?php $style = 'background:transparent url("'.$style['sizes']['thumbnail'].'") no-repeat scroll center center;'; ?>
				    	    	    <?php endif;?>
				    	    		<div class="icon" style="<?php echo esc_attr($style);?>"></div>
				    	    		<h3><?php echo get_field('home_feature_2_title','option');?></h3>
				    	    		<?php if(get_field('home_feature_2_class','option') == 'projetos'): ?>
				    	    		    <p><?php echo get_field('home_feature_2_resume','option');?></p>
				    	    	    <?php endif; ?>
				    	    	</a>
				    	    </div><!-- servicos -->
                <?php endif;?>
                <?php if( get_field('home_feature_3_title', 'option') ): ?>
				        <?php $style = ''; ?>
				        <?php if(get_field('home_feature_3_bg','option')): ?>
				              <?php $style = get_field('home_feature_3_bg','option');?>
				                <?php $style = 'background:transparent url("'.$style['sizes']['large'].'") no-repeat scroll center center;background-size:cover;'; ?>
				        <?php endif;?>
				    	    <div class="col-md-4">
				    	    	<a href="<?php echo get_field('home_feature_3_link','option');?>" class="<?php echo get_field('home_feature_3_class','option');?>" style="<?php echo esc_attr($style);?>">
				    	    	    <?php $style = ''; ?>
				    	    	    <?php if(get_field('home_feature_3_icon','option')): ?>
				    	    	        <?php $style = get_field('home_feature_3_icon','option');?>
				    	    	        <?php $style = 'background:transparent url("'.$style['sizes']['thumbnail'].'") no-repeat scroll center center;'; ?>
				    	    	    <?php endif;?>
				    	    		<div class="icon" style="<?php echo esc_attr($style);?>"></div>
				    	    		<h3><?php echo get_field('home_feature_3_title','option');?></h3>
				    	    		<?php if(get_field('home_feature_3_class','option') == 'projetos'): ?>
				    	    		    <p><?php echo get_field('home_feature_3_resume','option');?></p>
				    	    	    <?php endif; ?>
				    	    	</a>
				    	    </div><!-- servicos -->
                <?php endif;?>
                <?php if( get_field('home_feature_4_title', 'option') ): ?>
				        <?php $style = ''; ?>
				        <?php if(get_field('home_feature_4_bg','option')): ?>
				              <?php $style = get_field('home_feature_4_bg','option');?>
				                <?php $style = 'background:transparent url("'.$style['sizes']['large'].'") no-repeat scroll center center;background-size:cover;'; ?>
				        <?php endif;?>
				    	    <div class="col-md-4">
				    	    	<a href="<?php echo get_field('home_feature_4_link','option');?>" class="<?php echo get_field('home_feature_4_class','option');?>" style="<?php echo esc_attr($style);?>">
				    	    	    <?php $style = ''; ?>
				    	    	    <?php if(get_field('home_feature_4_icon','option')): ?>
				    	    	        <?php $style = get_field('home_feature_4_icon','option');?>
				    	    	        <?php $style = 'background:transparent url("'.$style['sizes']['thumbnail'].'") no-repeat scroll center center;'; ?>
				    	    	    <?php endif;?>
				    	    		<div class="icon" style="<?php echo esc_attr($style);?>"></div>
				    	    		<h3><?php echo get_field('home_feature_4_title','option');?></h3>
				    	    		<?php if(get_field('home_feature_4_class','option') == 'projetos'): ?>
				    	    		    <p><?php echo get_field('home_feature_4_resume','option');?></p>
				    	    	    <?php endif; ?>
				    	    	</a>
				    	    </div><!-- servicos -->
                <?php endif;?>
			</div><!-- boxes -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
