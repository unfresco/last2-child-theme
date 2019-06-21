<?php 
get_header(); 

do_action('wherever_place', 'page-header' );	

while ( have_posts() ) : the_post();
	?>
	<div class="post-thumbnail">
	<?php
	the_post_thumbnail('full');
	?>
	</div>
	<div class="post-content">
	<?php
	the_title('<h1>', '</h1>');
	get_template_part( 'templates/entry-meta' );
	the_content();
	?>
	</div>
	<?php
endwhile;

do_action('wherever_place', 'page-footer' );

get_footer();
