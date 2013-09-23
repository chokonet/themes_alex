<div class="albumWrapper hidden" id="FotosD">

	<?php global $current_user;

   	get_currentuserinfo();

	$anos3 = new WP_Query(array(
		'category_name'  => '1-3-anos',
		'author'         => $current_user->ID,
		'posts_per_page' => -1
	));

	if ( $anos3->have_posts() ) : while ( $anos3->have_posts() ) : $anos3->the_post(); ?>

		<article class="picframe drop">
			<div class="pin rounded dropPin"></div>
			<div class="img_wrapp">
				<?php the_post_thumbnail('gallery'); ?>
			</div><!-- img_wrapp -->

		</article>

	<?php endwhile; endif; wp_reset_query(); ?>

</div>