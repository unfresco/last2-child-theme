<?php 

class Last_Child_Public {

	function __construct() {
		$this->theme_url = get_stylesheet_directory_uri();
	}

	public function enqueue_styles( $arg ) {

		wp_enqueue_style( 'bootstrap-css', $this->theme_url . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), false, 'all' );
		wp_enqueue_style( 'last-child', $this->theme_url . '/assets/css/last2-child.css' );		

	}

	public function enqueue_scripts( $arg ) {
		
		wp_enqueue_script( 'default-child-js', $this->theme_url . '/assets/js/last2-child.js', array( 'jquery' ), false, true );		
		wp_localize_script( 'default-child-js', 'WP_JS', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ), 'themeUrl' => $this->theme_url ) );

	}

	public function register_nav_menus() {
		
		register_nav_menus(array(
			'contact_menu' => __( 'Contact menu', 'last2-child' ),
			'main_menu'		=> __( 'Main menu', 'last2-child')
		));
		
	}
	
	public function register_wherever_places() {
		
		if ( function_exists( 'register_wherever_places' ) ) {

			register_wherever_places( array(
					array(
							'name' => 'Page header',
							'slug' => 'page-header'
					),
					array(
							'name' => 'Page footer',
							'slug' => 'page-footer'
					)
			) );
			
		}
	}

	public function wp_head() {
		?>
		
		<?php
	}

}
