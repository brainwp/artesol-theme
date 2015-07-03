<?php
/* Template to show modal agenda */
?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'evento_data', true ) );?>
	<div class="col-md-12 agenda-modal">
		<div class="col-md-2 pull-left data">
			<h3 class="col-md-12 mes">
				<?php echo date_i18n( 'M', $date->getTimestamp(), false );?>
			</h3><!-- .col-md-12 mes -->
			<h2 class="col-md-12 dia">
				<?php echo $date->format('d');?>
			</h2><!-- .col-md-12 dia -->
		</div><!-- .col-md-1 pull-left data -->
		<div class="col-md-9 pull-left title-container">
			<h1 class="post-title">
				<?php the_title();?>
			</h1><!-- .post-title -->
		</div><!-- .col-md-9 pull-right title-container -->
        <div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
        <div class="col-md-12 content">
        	<?php the_content();?>
        </div><!-- .col-md-12 content -->
	</div><!-- .col-md-12 agenda-modal -->
<?php endwhile;?>
