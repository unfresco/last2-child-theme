<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Last_Child_Admin {

	function __construct() {
	 
	}

	public function theme_support() {

		add_theme_support( 'social-links', array(
		    'facebook', 'twitter', 'linkedin', 'google_plus', 'tumblr',
		));
		
	}
	
	public function theme_options() {
		
		Container::make( 'theme_options', __( 'Last Child', 'last-child' ) )
			->set_page_parent('options-general.php')
			->add_tab( __('Post', 'Last-talleresrecomendados'), array(
				Field::make( 'checkbox', 'post_feature_image', __( 'Feature image', 'last-child' ) )
					->set_option_value( 1 )
					->set_default_value(1)
			));
	
	}

}
