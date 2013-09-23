<div class="albumWrapper hidden" id="FotosC">

	<?php global $current_user;

	get_currentuserinfo();

	$mes12 = new WP_Query(array(
		'category_name'  => '6-12-meses',
		'author'         => $current_user->ID,
		'posts_per_page' => -1
	));

	if ( $mes12->have_posts() ) : while ( $mes12->have_posts() ) : $mes12->the_post(); ?>

		<article class="picframe drop">
			<div class="pin rounded dropPin"></div>
			<div class="img_wrapp">
				<?php the_post_thumbnail('gallery'); ?>
			</div><!-- img_wrapp -->

		</article>

	<?php endwhile; endif; wp_reset_query(); ?>

</div>