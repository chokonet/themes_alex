<div class="albumWrapper" id="FotosA">

	<?php global $current_user;

   	get_currentuserinfo();

	$embarazo = new WP_Query(array(
		'category_name'  => 'mi-embarazo',
		'author'         => $current_user->ID,
		'posts_per_page' => -1
	));

	if ( $embarazo->have_posts() ) : while ( $embarazo->have_posts() ) : $embarazo->the_post(); ?>

		<article class="picframe drop">
			<div class="pin rounded dropPin"></div>
			<div class="img_wrapp">
				<?php the_post_thumbnail('gallery'); ?>
			</div><!-- img_wrapp -->

		</article>

	<?php endwhile; endif; wp_reset_query(); ?>


</div>