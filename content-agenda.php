<?php
/* Content agenda */
$date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'evento_data', true ) );
?>
<div class="col-md-4 agenda-container">
	<a href="<?php the_permalink();?>" class="col-md-12">
		<div class="col-md-4 pull-left data">
			<h3 class="col-md-12 mes">
				<?php echo date_i18n( 'M', $date->getTimestamp(), false );?>
			</h3><!-- .col-md-12 mes -->
			<h2 class="col-md-12 dia">
				<?php echo $date->format('d');?>
			</h2><!-- .col-md-12 dia -->
		</div><!-- .col-md-4 pull-left data -->
		<div class="col-md-8 pull-right content">
			<?php echo brasa_resumo(get_the_content(),60);?>
		</div><!-- .col-md-8 pull-right content -->
		<div class="col-md-12 icon"></div><!-- .col-md-12 icon -->
	</a>
</div><!-- .col-md-4 agenda-container -->
