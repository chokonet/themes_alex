
	<div class="side_masgustado">

		<h2>Más gustados</h2>

		<?php $masGustados = get_posts_mas_gustados();

		if( $masGustados ) : foreach ( array_slice($masGustados, 0, 6) as $post ) : setup_postdata($post); ?>

			<div class="cont_post">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<h3><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h3>
				<h4><?php print_the_terms($post->ID, 'category', ' '); ?></h4>
				<p><?php echo wp_trim_words( get_the_excerpt(), 10, ' ...' ); ?></p>
			</div>

		<?php endforeach; endif; wp_reset_postdata(); ?>

	</div><!-- end mas gustados-->