<?php if( have_posts() ): ?>

	<div class="posts">

	<?php while( have_posts() ): the_post(); ?>

		<article class="entry">
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="post-thumbnail">
					<?php the_post_thumbnail( array( 1880, 940 ) ); ?>
				</figure>
			<?php endif; ?>
			<h1 class="entry-title">
				<?php if ( ! is_singular() ) : ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php else : ?>
					<?php the_title(); ?>
				<?php endif; ?>
			</h1>
			<div class="entry-meta"><?php echo get_the_time( 'Y.m.d' ); ?></div>
			<div class="entry-share">

				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="facebook icon-facebook-square" target="_blank">Share</a>
				<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" class="twitter icon-twitter" target="_blank">Tweet</a>
				<a href="http://getpocket.com/edit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="pocket icon-pocket" target="_blank">Pocket</a>

			</div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile ?>

	</div>

<?php endif; ?>
