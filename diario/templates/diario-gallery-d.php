<div class="albumWrapper hidden" id="FotosD">

	<?php global $current_user;

	get_currentuserinfo();

	$anos3 = new WP_Query(array(
		'category_name'  => '1-3-anos',
		'author'         => $current_user->ID,
		'posts_per_page' => -1
	));

	if ( $anos3->have_posts() ) : while ( $anos3->have_posts() ) : $anos3->the_post(); ?>
		<?php $imagen = get_the_post_thumbnail();?>
		<article class="cont-picframe">
			<div class="<?php TieneThumbnail($imagen); ?> drop css-picframe" data-post_id="<?php the_ID(); ?>" >
				<div class="pin rounded dropPin"></div>
				<div class="img_wrapp">
					<?php the_post_thumbnail('gallery'); ?>
				</div><!-- img_wrapp -->
			</div>
			<p><?php the_title(); ?></p>

		</article>

	<?php endwhile; endif; wp_reset_query(); ?>

</div>