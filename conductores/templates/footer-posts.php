
<?php
	$args = array('posts_per_page' => 2,
				  'cat' => -2
	);
	$query = new WP_Query($args); ?>

	<div class="footer_container">


			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="ultimo_post">
					<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('footer_post') ?></a>
					<a href="<?php the_permalink(); ?>">

						<?php
  							$excerpt = get_the_content();
							$excerpt = string_limit_words($excerpt,51);
						?>
						<p> <?php echo $excerpt; ?>...</p>
					</a>
				</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>


	</div>
