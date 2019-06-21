<?php

class Last_Child  {
	
	private $dependencies;
	
	function __construct() {
		
	 $this->dependencies = array();
	 $this->theme_dir = get_stylesheet_directory();
	 
	}

	private function load_required() {
		
		require_once $this->theme_dir . '/admin/class-last-child-admin.php';
		
		require_once $this->theme_dir . '/public/class-last-child-api.php';
		require_once $this->theme_dir . '/public/class-last-child-public.php';
		
	}
	
	
	private function define_admin_hooks() {
		
		$theme_admin = new Last_Child_Admin();
		
		$this->dep('loader')->add_action( 'after_setup_theme', $theme_admin, 'theme_support' );
		$this->dep('loader')->add_action( 'carbon_fields_register_fields', $theme_admin, 'theme_options' );
		
	}

	private function define_public_hooks() {
		
		$theme_public = new Last_Child_Public();
		
		$this->dep('loader')->add_action( 'init', $theme_public, 'register_nav_menus' );
		$this->dep('loader')->add_action( 'init', $theme_public, 'register_wherever_places' );
		$this->dep('loader')->add_action( 'wp_enqueue_scripts', $theme_public, 'enqueue_styles' );
		$this->dep('loader')->add_action( 'wp_enqueue_scripts', $theme_public, 'enqueue_scripts' );
		$this->dep('loader')->add_action( 'wp_head', $theme_public, 'wp_head' );
		
	}

	public function run() {
		
		$this->load_required();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		
	}
	
	private function dep( $dep_key ) {
		
		if ( array_key_exists( $dep_key, $this->dependencies ) && !empty( $this->dependencies[$dep_key] ) ) {
			return $this->dependencies[$dep_key];
		} else {
			return new WP_Error( 'dependency', __( 'The dependency ' . $dep_key . ' was not found', 'last-child' ) );
		}
		
	}
	
	public function dep_add( $dep_key, $dep ) {

		$this->dependencies[$dep_key] = $dep;

	}	
	public function dep_run() {
		
		foreach( $this->dependencies as $dependency ) {
			if ( method_exists( $dependency, 'run' ) ) {
				$dependency->run();
			}
		}
		
	}
	
	
	
}
