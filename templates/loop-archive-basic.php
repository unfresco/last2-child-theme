<?php if ( have_posts() ) : ?>
	<div class="archive-post-loop">
	<?php
	while (have_posts()) : the_post();
		get_template_part( 'templates/content', 'archive-basic' );
	endwhile;
	?>
	</div>
	<?php
	the_posts_pagination();
	?>
<?php endif; ?>
