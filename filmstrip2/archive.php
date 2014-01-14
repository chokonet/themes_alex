<?php get_header(); ?>

		<div class="main">

			<div class="una-seccion archive">
				<?php if(have_posts()): $count = 1; while(have_posts()): the_post();
					$director = get_post_meta($post->ID, 'director', true);
					$reparto  = get_post_meta($post->ID, 'reparto', true);

				    if($count == 1): ?>
						<div id="trailer-uno">
							<?php if(get_post_meta($post->ID, 'id_vimeo', true)){ ?>
									<iframe id="un-video" src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'id_vimeo', true); ?>?color=00a6ce" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
								<?php } elseif (get_post_meta($post->ID, 'id_youtube', true)) { ?>
									<iframe id="un-video" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
								<?php } ?>
							<div id="info-video">
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
								<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo $reparto; ?></p></a>
							</div>
						</div>
					<?php else: ?>
						<div class="mas-videos">
							<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/vid1.jpg"  /></a>
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
							<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo $reparto; ?></p></a>
						</div>

				<?php endif; $count++; endwhile; ?>

					<div class="navegacion clearfix">
						<p class="anterior left"><?php previous_posts_link( '« Anterior' ); ?></p>
						<p class="siguiente right"><?php next_posts_link( 'Siguiente »' ); ?></p>
					</div><!-- navegacion -->
				<?php endif; wp_reset_query(); ?>
			</div><!-- trailer -->

		</div><!-- main -->

<?php get_footer(); ?>
