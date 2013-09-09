<?php get_header(); ?>

	<?php if ( have_posts() ) : $postNumber = 1; while ( have_posts() ) : the_post();

		if( $postNumber == 1 ) : ?>

			<div class="seccion_full">

				<div class="seccion_imagen embarazo_pleca">

					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen' ); ?></a>
					<span class="tag embarazo_back">Mi Embarazo</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="embarazo_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
				</div>

			</div>

		<?php elseif( $postNumber == 2 ) : ?>

			<div class="seccion_mitad">

				<div class="seccion_imagen  embarazo_pleca">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
					<span class="tag embarazo_back">Mi Embarazo</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="embarazo_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>">
					<p><?php the_excerpt() ?></p>
					</a>
				</div>

			</div>

			<?php get_template_part( 'templates/main', 'links' ) ?>

		<?php else : ?>

			<div class="seccion_mitad">

				<div class="seccion_imagen  embarazo_pleca">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
					<span class="tag embarazo_back">Mi Embarazo</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="embarazo_texto"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					<a href="<?php the_permalink() ?>">
					<p><?php the_excerpt() ?></p>
					</a>
				</div>

		    </div>

		<?php endif; ?>

	<?php $postNumber++; endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>