<?php
/* content single projetos */
?>
<article id="projetos-post" class="col-md-12">
	<h1 class="post-title col-md-12">
		<?php the_title();?>
	</h1><!-- .post-title col-md-12 -->
	<h3 class="col-md-12">
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
	</h3>
	<div class="col-md-4 pull-left thumbnail-projetos">
		<?php the_post_thumbnail('medium');?>
	</div><!-- .col-md-4 pull-left thumbnail-projetos -->
	<div class="col-md-3 projetos-meta">
		<h4 class="col-md-12"><?php _e('Cidade:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_local', true ));?>
		</div><!-- .col-md-12 meta-content -->
	    <h4 class="col-md-12"><?php _e('Duração:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_time', true ));?>
		</div><!-- .col-md-12 meta-content -->
	    <h4 class="col-md-12"><?php _e('Artesãos Beneficiados:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_beneficiados', true ));?>
		</div><!-- .col-md-12 meta-content -->
	</div><!-- .col-md-3 projetos-meta -->
	<div class="col-md-5 projetos-meta">
		<?php if(get_field('project_repeater')): ?>
		    <h4 class="col-md-12"><?php _e('Parceiro Financiador:','odin');?></h4>
		    <div class="col-md-12 meta-content">
		    	<?php while(has_sub_field('project_repeater')): ?>
		    	    <a class="repeater-projetos" href="<?php echo the_sub_field('project_repeater_link');?>" target="_blank">
		    	    	<?php $img = get_sub_field('project_repeater_img');?>
		    	    	<img src="<?php echo $img['sizes']['large'];?>" />
		            </a><!-- .col-md-12 meta-content -->
		        <?php endwhile;?>
		    </div><!-- .col-md-12 meta-content -->
		<?php endif;?>
		<h4 class="col-md-12"><?php _e('Parceiros apoiadores:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_apoiadores', true ));?>
		</div><!-- .col-md-12 meta-content -->
		<h4 class="col-md-12"><?php _e('Gênero:','odin');?></h4>
		<div class="col-md-12 meta-content">
			<?php echo esc_textarea(get_post_meta(get_the_ID(), 'project_type', true ));?>
		</div><!-- .col-md-12 meta-content -->
	</div><!-- .col-md-5 projetos-meta -->
	<div class="col-md-12 projetos-content"><?php the_content();?></div><!-- .col-md-12 projetos-content -->
</article><!-- #projetos-post -->
