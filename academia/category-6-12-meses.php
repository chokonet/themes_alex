<?php get_header(); ?>

	<?php if ( have_posts() ) : $countPosts=1; while ( have_posts() ) : the_post();

		if( $countPosts == 1 ) : ?>

			<div class="seccion_full">
				<div class="seccion_imagen sorpresas_pleca">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'seccion_imagen' ); ?>
					</a>
					<span class="tag sorpresas_back">6-12 meses</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="sorpresas_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
				</div>
			</div>

		<?php elseif( $countPosts == 2 ) : ?>

			<div class="seccion_mitad">
				<div class="seccion_imagen  sorpresas_pleca">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
					<span class="tag sorpresas_back">6-12 meses</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="sorpresas_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>">
					<p><?php the_excerpt() ?></p>
					</a>
				</div>
			</div><!-- seccion_mitad -->

		<?php get_template_part( 'templates/main', 'links' ) ?>

		<?php else : ?>

			<div class="seccion_mitad">

				<div class="seccion_imagen  sorpresas_pleca">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
					<span class="tag sorpresas_back">6-12 meses</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="sorpresas_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>">
					<p><?php the_excerpt() ?></p>
					</a>
				</div>

			</div><!-- seccion_mitad -->

		<?php endif; ?>

	<?php $countPosts++; endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>