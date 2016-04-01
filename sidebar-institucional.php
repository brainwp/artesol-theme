<?php
/* sidebar institucional */
?>
<div class="col-md-12" id="menu-institucional">
	<h3><?php _e('Menu Institucional','odin');?></h3>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-institucional',
			'container'      => false
		)
	);
	?>
</div><!-- #menu-institucional.col-md-12 -->

