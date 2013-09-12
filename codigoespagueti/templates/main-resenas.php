	<h5>Reseñas</h5>

	<div id="content-resenas">

		<?php $resenas = get_posts(array(
			'post_type'      => 'resenas',
			'posts_per_page' => 4,
		));

		foreach ($resenas as $post): setup_postdata($post); ?>

			<div class="post">

				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('featured_post'); ?>
				</a>

				<a href="<?php the_permalink(); ?>">
					<div class="resena-score">
						<p><?php echo get_post_meta($post->ID, 'score', true); ?></p>
					</div><!-- end .resena-score -->
				</a>

				<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>

				<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>

				<?php the_excerpt();?>

			</div><!-- end .post -->

		<?php endforeach; wp_reset_query(); ?>

	</div><!-- end #content-resenas -->