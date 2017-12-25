<?php if( have_posts() ): ?>

	<div class="posts">

	<?php while( have_posts() ): the_post(); ?>

		<article class="entry">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta"><?php echo get_the_time( 'Y.m.d' ); ?></div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile ?>

	</div>

<?php endif; ?>
