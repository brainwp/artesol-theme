<?php
/*Page migracao */
// WP_Query arguments
$paged = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$args = array (
	'post_type'              => 'post',
	'posts_per_page'         => 300,
	'paged'                  => $paged,
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$data_str = str_replace(array('http://www.artesol.org.br/site/wp-content/uploads/','.jpg'), '', get_post_meta( get_the_ID(), 'data', true ));
		$data_str = str_replace('.', '/', $data_str);
		$data = DateTime::createFromFormat('d/m/Y', $data_str);
		wp_update_post(
			array(
				'ID' => get_the_ID(),
				'post_date' => $data->format('Y-m-d H:i:s'),
			), false);
		echo $data->format('Y-m-d H:i:s');
		//echo $data_str;
		echo '<br>';
		echo get_the_ID();
		echo '<br>';

		break;
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
