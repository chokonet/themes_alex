<div class="albumWrapper hidden" id="FotosB">

	<?php global $current_user;

	get_currentuserinfo();

	$mes6 = new WP_Query(array(
		'category_name'  => '0-6-meses',
		'author'         => $current_user->ID,
		'posts_per_page' => -1
	));

	if ( $mes6->have_posts() ) : while ( $mes6->have_posts() ) : $mes6->the_post(); ?>

		<article class="picframe drop">
			<div class="pin rounded dropPin"></div>
			<div class="img_wrapp">
				<?php the_post_thumbnail('gallery'); ?>
			</div><!-- img_wrapp -->

		</article>

	<?php endwhile; endif; wp_reset_query(); ?>


</div>