<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

</div><!-- #main -->
</div><!-- .container -->
<footer id="footer" role="contentinfo">
	<div class="container">
		<div class="col-md-6 pull-left">
			<h3><?php _e('Mapa do site','odin'); ?></h3>
			<nav class="col-md-4 pull-left">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu-1',
						'depth'          => 1,
						'container'      => false,
					)
				);
				?>
			</nav><!-- .col-md-2 pull-left -->
			<nav class="col-md-4 pull-left">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu-2',
						'depth'          => 1,
						'container'      => false,
					)
				);
				?>
			</nav><!-- .col-md-2 pull-left -->
			<nav class="col-md-4 pull-left">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu-3',
						'depth'          => 1,
						'container'      => false,
					)
				);
				?>
			</nav><!-- .col-md-2 pull-left -->
		</div><!-- .col-md-6 pull-left -->
	</div><!-- .container -->
</footer><!-- #footer -->
<?php wp_footer(); ?>
</body>
</html>
