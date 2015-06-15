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
<?php if( get_option('options_box_projetos_institucional_0_box_home_repeater_class' ) ): ?>
	<?php $field = 'options_box_projetos_institucional_0_';?>
	<div class="col-md-12 boxes">
		<a href="<?php echo get_option($field.'box_home_repeater_link');?>" class="<?php echo get_option($field.'box_home_repeater_class');?>">
			<div class="icon"></div>
			<h3><?php echo get_option($field.'box_home_repeater_title');?></h3>
			<?php if(get_option($field.'box_home_repeater_class') == 'projetos'): ?>
				<p><?php echo get_option($field.'box_home_repeater_text');?></p>
			<?php endif; ?>
		</a>
	</div><!-- servicos -->
<?php endif;?>

