<?php
/* Brasa Agenda Class */
class Brasa_Tipologia{
	public function __construct(){
		//hooks
		add_action( 'wp_ajax_tipologia_content', array($this,'tipologia_content') );
		add_action( 'wp_ajax_nopriv_tipologia_content', array($this,'tipologia_content') );
	}
	public function tipologia_content(){
		global $category_id;
		$category_id = $_POST['id'];
		get_template_part('modal-tipologia');
		die();
	}
}
new Brasa_Tipologia();
