<?php get_header(); ?>
	<div class="entrada">
	<?php
		global $post;
		$paged = get_query_var( 'paged' );
		$args = array ('category' => 3, 'paged' => $paged, 'posts_per_page' => 3);
		$posts_array = get_posts($args);
			foreach($posts_array as $post) : setup_postdata($post);
				echo '<div class="dentro">';
				echo '<div class="imagen_entrada">';
						the_post_thumbnail('blog');
				echo '</div>';
			
				echo '<div class="texto_entrada">';
					echo '<h3>';
						the_title();
					echo '</h3>';
					echo '<p>';
						the_content();
					echo '</p>';
				echo '</div>';
				echo '</div>';
			endforeach;
		wp_reset_query();
	?>
	<a id="inifiniteLoader"><img src="<?php bloginfo('template_directory'); ?>/images/loader-gente3.gif" /></a>

	</div>
<?php get_footer(); ?>