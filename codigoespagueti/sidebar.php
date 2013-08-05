<div id="sidebar">
	<h5>Noticias</h5>
	<?php
		$args = array(
				'post_type' => 'post',
				'category' => 1,
				'posts_per_page' => 25
			);
		$noticias = get_posts($args);
		foreach ($noticias as $post): setup_postdata($post);
	?>
	<div class="post-side">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
		<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
		<span class="date"><?php echo get_the_date('d.m.y'); ?></span>
		<?php the_excerpt(); ?>
	</div>
	<?php endforeach; wp_reset_query(); ?>
	<div id='div-gpt-ad-1374362520645-0' style='width:300px; height:600px;'>
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1374362520645-0'); });
		</script>
	</div>

</div>
