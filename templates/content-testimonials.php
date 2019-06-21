<div class="testimonial-item">
	<div class="testimonial-body">
		<?php 
		
		the_content();
		
		$enterprise = get_post_meta( $post->ID, 'testimonial_enterprise',  true );
		
		if ( !empty($enterprise) ) {
			echo '<strong>' . $enterprise . '</strong>';
		} else {
			the_title( '<strong>', '</strong>');
		}
		?>
	</div>
</div>