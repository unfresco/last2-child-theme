<?php 
get_header(); 

do_action('wherever_place', 'page-header' );	

while ( have_posts() ) : the_post();

	the_content();

endwhile;

do_action('wherever_place', 'page-footer' );

get_footer();