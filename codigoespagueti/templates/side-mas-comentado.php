
	<div class="side_comentado">

		<h2>Más comentados</h2>

		<?php $masComentados = get_posts_mas_comentados();

		if( $masComentados ) : foreach (array_slice($masComentados, 0, 6) as $post) : setup_postdata($post); ?>

			<div class="cont_post">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<h4><?php print_the_terms($post->ID, 'category', ' '); ?></h4>
				<p><?php echo wp_trim_words(get_the_excerpt() , 10, '...'); ?></p>
			</div>

		<?php endforeach; endif; wp_reset_postdata(); ?>

	</div><!-- end mas comentados-->