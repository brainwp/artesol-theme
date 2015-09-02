<?php
/*Page migracao */

// The Query
$args = array(
	'meta_query' => array(
		array(
			'key'     => 'type_pin',
			'compare' => 'EXISTS'
		),
		'number' => 99999
	)
);
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		$bio = get_user_meta( $user->ID, 'description', true );
		update_user_meta( $user->ID, 'user_content', $bio );
		echo $bio;
		echo '<br><br>';
	}
}
