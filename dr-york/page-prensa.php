<?php get_header(); ?>
	
	<div id="prensa">
		<div id="grid">
		
		<?php
		global $post;
		$args = array ('post_type' => 'prensas', 'posts_per_page' => -1);
		$posts_array = get_posts($args);
		//echo '<pre>';
		//print_r($posts_array);
		//echo '</pre>';
			foreach($posts_array as $post) : setup_postdata($post);
			
			$thumb_id = get_post_thumbnail_id(get_the_ID());
				$args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'post_status' => null,
				'post_parent' => $post->ID,
				'exclude' => $thumb_id
				);

  $attachments = get_posts( $args );
     if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
          $attachmentID = $attachment->ID;
          }
     }
			
			echo '<a class="prensafancybox" rel="prensa" href="';
				the_permalink();
			echo '">';
				the_post_thumbnail('prensa_thumb');
			echo '</a>';
			endforeach;
		wp_reset_query();
	?>

	</div><!-- prensa -->

<?php get_footer(); ?>