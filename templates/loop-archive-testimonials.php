<?php if ( have_posts() ) : ?>
	<div class="archive-post-loop">
	<?php
	while (have_posts()) : the_post();
		get_template_part( 'templates/content', 'archive-testimonials' );
	endwhile;
	?>
	</div>
	<?php
	the_posts_pagination( array( 'screen_reader_text' => __('Testimonial post navigation', 'last2-child' ) ));
	?>
<?php endif; ?>
