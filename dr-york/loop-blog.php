<?php

	global $wp_query;
		$args = array_merge( $wp_query->query_vars, array( 'posts_per_page' => 3, 'paged' => $paged, 'category' => 3 ) );
		query_posts( $args );
	
	if(have_posts()): while(have_posts()): the_post();
	
	?>
	
	<div class="dentro">
		<div class="imagen_entrada">
			<?php the_post_thumbnail('blog2'); ?>
		</div>
		<div class="texto_entrada">
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
		</div>
	</div>

<?php
	endwhile; endif;
	wp_reset_query();
?>