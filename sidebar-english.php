<?php
/* sidebar english */
?>
<div class="col-md-12" id="menu-institucional">
	<h3><?php _e('English Menu','odin');?></h3>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-english',
			'container'      => false
		)
	);
	?>
</div><!-- #menu-institucional.col-md-12 -->

