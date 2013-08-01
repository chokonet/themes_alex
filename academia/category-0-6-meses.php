<?php get_header(); ?>
			<div class="seccion_full">
				<?php $args = array(
					               'posts_per_page' => 1,
								   'category_name' => '0-6-meses'
							);

					query_posts( $args );
					while ( have_posts() ) : the_post();

				?>
					<div class="seccion_imagen primeros_pleca">

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen' ); ?></a>
						<span class="tag primeros_back">0-6 meses</span>
					</div><!-- seccion_imagen -->

					<div class="info_seccion">
						<p class="date">Hace <?php echo parsepostDate(get_the_time());  ?></p>
						<h3 class="primeros_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
					</div>
				<?php endwhile;?>
			</div>
			<?php $c=0; ?>
			<?php $loop_p = array('posts_per_page' => 5,
								   'category_name' => '0-6-meses'
							);

			query_posts( $loop_p );
			while ( have_posts() ) : the_post();

			?>
				<?php $c++;
				if( $c == 1) : ?>
				<div class="seccion_mitad">
					

						<div class="seccion_imagen  primeros_pleca">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
							<span class="tag primeros_back">0-6 meses</span>
						</div><!-- seccion_imagen -->

						<div class="info_seccion">
							<p class="date">Hace <?php echo parsepostDate(get_the_time());  ?></p>
							<h3 class="primeros_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<a href="<?php the_permalink(); ?>">
								<?php
								$excerpt = get_the_excerpt();
								$excerpt = string_limit_words($excerpt,40);
								?>
							<p><?php echo $excerpt; ?>…</p>
							</a>
						</div>
				</div>

				<div class="seccion_mitad seccion">
					<img src="<?php bloginfo('template_url'); ?>/images/seccion.jpg" alt="seccion">
				</div><!-- seccion_mitad -->

				<div class="seccion_mitad seccion">
					<img src="<?php bloginfo('template_url'); ?>/images/seccion.jpg" alt="seccion">
				</div><!-- seccion_mitad -->
				<?php else: ?>
				<div class="seccion_mitad">
					
						<div class="seccion_imagen  primeros_pleca">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
							<span class="tag primeros_back">0-6 meses</span>
						</div><!-- seccion_imagen -->

						<div class="info_seccion">
							<p class="date">Hace <?php the_time() ?> horas</p>
							<h3 class="primeros_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<a href="<?php the_permalink(); ?>">
								<?php
								$excerpt = get_the_excerpt();
								$excerpt = string_limit_words($excerpt,15);
								?>
							<p><?php echo $excerpt; ?>…</p>
							</a>
						</div>
				
			    </div>
			<?php endif; ?>
			<?php endwhile; ?>
		</div><!-- main -->

<?php get_footer(); ?>