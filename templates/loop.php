<?php if( have_posts() ): ?>

	<div class="posts">

	<?php while( have_posts() ): the_post(); ?>

		<article class="entry">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta"><?php echo get_the_time( 'Y.m.d' ); ?></div>
			<div class="entry-share">
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
				<a data-pocket-label="pocket" data-pocket-count="horizontal" class="pocket-btn" data-lang="en" data-save-url="<?php the_permalink(); ?>"></a>
			</div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile ?>

	</div>

<?php endif; ?>
