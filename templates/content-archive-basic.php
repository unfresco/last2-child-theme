<article <?php post_class(); ?> >
	<div class="container-fluid">
		<div class="row">
			<?php $thumbnail = get_the_post_thumbnail(); ?>
			<?php if ( !empty( $thumbnail ) ) {
				?>
				<div class="col-sm-4">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
				</div>
				<div class="col-sm-8">
					<header>
						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php get_template_part( 'templates/entry-meta' ); ?>
					</header>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
					<?php #get_template_part( 'templates/entry-share' ); ?>
				</div>
				<?php
			} else {
				?>
				<div class="col-sm-12">
					<header>
						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php get_template_part( 'templates/entry-meta' ); ?>
					</header>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
					<?php #get_template_part( 'templates/entry-share' ); ?>
				</div>

				<?php
			} ?>
		</div>
	</div>
</article>
