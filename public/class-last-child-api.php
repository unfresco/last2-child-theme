<?php

$last_child_api;

function last_child_api() {
	global $last_child_api;
	
	if ( empty( $last_child_api ) ) {
		$last_child_api = new Last_Child_Api();
	}
	
	return $last_child_api;
	
}

class	Last_Child_Api	{

	function	__construct()	{
		
		$this->currentPostID = null;
		$this->fields = array();
		
	}
	
	private function setup_meta_fields() {
		global $post;
		
		if ( function_exists('get_fields') ) {
			
			if ( $post->ID != $this->currentPostID ) {
				$this->currentPostID = $post->ID;
				
				if ( ! empty( get_fields() ) ) {
					$this->fields = get_fields();
				}

			}
			
		}
		
	}
	
	public function get_fields() {
		
		$this->setup_meta_fields();
		return $this->fields; 
		
	}
	
	public function get_field( $key ) {
		$this->setup_meta_fields();
		$value	=	( array_key_exists( $key, $this->fields ) ? $this->fields[$key] : '' );
		
		return	$value;
		
	}
	
	public function echo_field( $key ) {

		echo	$this->get_field($key);
		
	}
	
	
}
