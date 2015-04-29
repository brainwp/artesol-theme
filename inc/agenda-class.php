<?php
/* Brasa Agenda Class */
class Brasa_Agenda{
	public function __construct(){
		//hooks
		add_action( 'wp', array($this,'add_cron') );
		add_action( 'brasa_agenda_cron', array($this,'do_cron') );
	}

	public function add_cron(){
		wp_schedule_event( time(), 'hourly', 'brasa_agenda_cron' );
	}

	public function do_cron(){

		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'category_name'          => 'agenda',
			'posts_per_page'         => -1,
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( !$query->have_posts() )
			return;

		while ( $query->have_posts() ) {
			$query->the_post();
			$date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'evento_data', true ) );

			$current_time = intval( current_time( 'timestamp' ) );
			if($date->getTimestamp() <= $current_time){
				wp_remove_object_terms( get_the_ID(), 'agenda', 'category' );
				if( has_post_thumbnail() ){
					update_post_meta( get_the_ID(), 'slider_home', 'true', null );
				}
			}
		}

	// Restore original Post Data
	wp_reset_postdata();
	}
}
new Brasa_Agenda();
