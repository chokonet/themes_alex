<?php get_header(); ?>

	<div class="ninos_cont">
		<h2>Apadrina a un niño</h2>
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts('post_type=ninos&estatus_ninos=no-apadrinado&posts_per_page=25&paged='.$paged.'orderby=title&order=asc');
		while(have_posts()): the_post(); ?>

			<div class="nino">
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('ninos-thumb'); ?>
				<p><?php the_title(); ?></p>
				</a>
			</div><!-- end .nino -->

		<?php endwhile; ?>
		<p class="paginado"><?php posts_nav_link(); ?></p>
		<?php wp_reset_query(); ?>

	</div><!-- end .centros -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>