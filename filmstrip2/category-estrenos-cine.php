<?php get_header(); ?>

	<div class="main">

		<div class="una-seccion archive estrenos">
			<div class="mas-videos titulos">
				<h2><?php echo single_cat_title("", false);?></h2>
			</div>
			<?php if( have_posts() ): while( have_posts() ): the_post();
			$director = get_post_meta($post->ID, 'director', true);
			$reparto  = get_post_meta($post->ID, 'reparto', true); ?>

			<div class="mas-videos">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'estrenos_home'); ?></a>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<a href="<?php the_permalink(); ?>" class="contenido"><?php the_content(); ?></a>
				<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
				<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo $reparto; ?></p></a>
			</div>

			<?php endwhile; ?>

				<div class="mas-videos pagination">
					<p class="anterior left"><?php previous_posts_link( '« Anterior' ); ?></p>
					<p class="siguiente right"><?php next_posts_link( 'Siguiente »' ); ?></p>
				</div><!-- navegacion -->
			<?php endif; wp_reset_query(); ?>
		</div><!-- trailer -->

	</div><!-- main -->

<?php get_footer(); ?>
