<?php get_header(); ?>
	<?php get_template_part('templates/lugares', 'navegador'); ?>

				<div class="filters <?php echo is_tax() ? 'scrollIt' : '' ; ?>">
				<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
				<h3 id="termID" class="<?php echo $term->slug; ?>"><?php echo $term->name; ?></h3>
			</div>
			<div class="loop-lugares" class="clearfix">
				<?php
					if(have_posts()): while(have_posts()): the_post();
						$terms = wp_get_post_terms($post->ID, 'categorias');
							foreach($terms as $term){
				?>
				<div <?php post_class('lugar-home'); ?> data-post_id="post-<?php echo $post->ID; ?>">
					<a class="link-foto" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'cuadrado_grande' ); ?></a>
					<span class="titulo"><?php echo $term->name; ?></span>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<?php the_excerpt(); ?>
				</div><!-- end .lugar-home -->
				<?php } endwhile; endif; wp_reset_query(); ?>
			</div><!-- end .loop-lugares -->

<?php get_footer(); ?>