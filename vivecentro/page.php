<?php get_header(); ?>
<?php
	if(have_posts()): while(have_posts()): the_post();

		echo '<div class="page-content">';
		echo '<h2>';
		the_title();
		echo '</h2>';
		the_content();
		echo '</div>';
	endwhile; endif; wp_reset_query();
?>

<?php get_footer(); ?>