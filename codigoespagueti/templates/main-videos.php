
	<div id="videos-home">

		<h5>Video</h5>

		<?php $videos = get_posts(array(
			'post_type'      => 'videos',
			'posts_per_page' => 1,
		));

		foreach($videos as $post): setup_postdata($post); ?>

			<div class="video-main-home">
				<?php if(get_post_meta($post->ID, 'id_vimeo', true)){ ?>
					<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'id_vimeo', true); ?>?color=00a6ce" width="640" height="410" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } elseif (get_post_meta($post->ID, 'id_youtube', true)) { ?>
					<iframe width="630" height="410" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
				<?php } ?>
				<span class="date"><?php the_date('d.m.y', '', ' |'); ?> <?php the_category(' - ',$post->ID); ?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
			</div>

		<?php endforeach; wp_reset_query(); ?>

		<div class="lista-videos">
			<ul>
				<?php $videos = get_posts(array(
					'post_type'      => 'videos',
					'posts_per_page' => 4,
					'offset'         => 1
				));

				foreach($videos as $post): setup_postdata($post); ?>

					<li>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('fetured'); ?></a>
						<span class="date"><?php the_date('d.m.y', '', ' |'); ?> <?php the_category(' - ',$post->ID); ?></span>
						<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
					</li>

				<?php endforeach; wp_reset_query(); ?>
			</ul>

		</div><!-- end .lista-videos -->

	</div><!-- end #videos-home -->