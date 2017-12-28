<?php if( have_posts() ): ?>

	<div class="posts">

	<?php while( have_posts() ): the_post(); ?>

		<article class="entry">
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="post-thumbnail">
					<?php the_post_thumbnail( array( 1880, 940 ) ); ?>
				</figure>
			<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta"><?php echo get_the_time( 'Y.m.d' ); ?></div>
			<div class="entry-share">

				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="facebook icon-facebook-square" target="_blank">Share</a>
				<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" class="twitter icon-twitter" target="_blank">Tweet</a>
				<a href="http://getpocket.com/edit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="pocket icon-pocket">Pocket</a>

			</div>
<!-- 				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
				<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="<?php the_title() ?>" data-url="<?php the_permalink(); ?>" data-hashtags="kiteretz" data-show-count="false">Tweet</a>
				<a data-pocket-label="pocket" data-pocket-count="horizontal" class="pocket-btn" data-lang="en" data-save-url="<?php the_permalink(); ?>"></a> -->
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile ?>

	</div>

<?php endif; ?>
