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
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
				<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="<?php the_title() ?>" data-url="<?php the_permalink(); ?>" data-hashtags="kiteretz" data-show-count="false">Tweet</a>
				<a data-pocket-label="pocket" data-pocket-count="horizontal" class="pocket-btn" data-lang="en" data-save-url="<?php the_permalink(); ?>"></a>
			</div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile ?>

	</div>

<?php endif; ?>
