
	<div class="side_noticias">

		<h2>Últimas noticias</h2>

		<?php global $featured_post;

			$noticias = get_posts(array(
				'post_type'      => 'post',
				'category'       => 1,
				'posts_per_page' => 6,
				'exclude'        => $featured_post
			));

			foreach ($noticias as $post): setup_postdata($post); ?>

				<div class="cont_post">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<h4><?php print_the_terms($post->ID, 'category', ' '); ?></h4>
					<p><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
				</div>

		<?php endforeach; wp_reset_query(); ?>

	</div><!-- end .side_noticias -->