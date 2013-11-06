<?php get_header(); ?>
	<div class="navegador zonas">
		<?php get_template_part('templates/zonas', 'navegador'); ?>
	</div>
	<div class="filters <?php echo is_tax() ? 'scrollIt' : '' ; ?>">
		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
		<h3 class="plazas-y-parques"><?php echo $term->name; ?></h3>
	</div>

	<div class="lugares-zona-single">
		<?php
			if(have_posts()): while(have_posts()): the_post();
				$terms = wp_get_post_terms($post->ID, 'categorias');
					foreach($terms as $term){
		?>
						<div <?php if( ! is_archive('zonas') ){ post_class('lugar-zona-single'); } else{ echo 'class="lugar-zona-single"'; } ?> data-post_id="post-<?php echo $post->ID; ?>" >

							<div class="lugares-zona-single-mini">
								<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail() ) {the_post_thumbnail( 'cuadrado_grande' ); } else { ?> <img src="http://placehold.it/164x165"> <?php } ?></a>
								<span class="nombre-lugar"><h4><?php the_title(); ?></h4></span>
							</div><!-- lugares-zona-single-mini -->

						</div><!-- end lugar-single -->

		<?php } endwhile; endif; wp_reset_query(); ?>
	</div>
<?php get_footer(); ?>