<?php
/*Page migracao */

// The Query
$args = array(
	'meta_query' => array(
		array(
			'key'     => 'type_pin',
			'compare' => 'EXISTS'
		),
		'number' => -1
	)
);
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		echo $user->user_login;
		$login = str_replace(' ', '-', $user->user_login);
		$login = preg_replace('/\s+/', '', $login);
		$user_id = wp_update_user(
 			array(
 				'ID' => $user->ID,
 				'user_login' => $login
 			)
 		);
 		$new_user = get_userdata( $user_id );
 		var_dump( $new_user );
 		echo '<br><br>';
	}
}

if ( is_wp_error( $user_id ) ) {
	// There was an error, probably that user doesn't exist.
} else {
	// Success!
}
