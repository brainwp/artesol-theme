<?php
/* Brasa Agenda Class */
class Brasa_Agenda{
	public function __construct(){
		//hooks
		add_action( 'wp', array($this,'add_cron') );
		add_action( 'brasa_agenda_cron', array($this,'do_cron') );
		add_action( 'pre_get_posts', array($this, 'order_archive') );
	}

	public function order_archive($query){
		if(!is_category('agenda'))
			return;
		if(!$query->is_main_query())
			return;

		$query->set('orderby','meta_value');
		$query->set('meta_key','evento_data');
		$query->set('order','DESC');
	}
	public function add_cron(){
		if( wp_next_scheduled( 'brasa_agenda_cron' ) )
			return;

		wp_schedule_event( time(), 'hourly', 'brasa_agenda_cron' );
	}

	private function categories_array($post_id){
		$categories = get_the_category($post_id);

		$ids = array();
		foreach ($categories as $cat) {
			if($cat->slug == 'agenda')
				continue;

			$ids[] = $cat->term_id;
		}
		return $ids;
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
			global $post;
			$date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'evento_data', true ) );

			$current_time = intval( current_time( 'timestamp' ) );
			if($date->getTimestamp() <= $current_time){
			    wp_update_post(
					array(
						'ID' => get_the_ID(),
						'post_name' => str_replace(get_option( 'reveal-modal-string-random' ), '', $post->post_name)					)
				);
				delete_post_meta( get_the_ID(), 'is_reveal_modal', null );
				if( has_post_thumbnail() ){
					update_post_meta( get_the_ID(), 'slider_home', 'true', null );
				}
				wp_remove_object_terms( get_the_ID(), 'agenda', 'category' );
			}
		}

	// Restore original Post Data
	wp_reset_postdata();
	}
}
new Brasa_Agenda();
