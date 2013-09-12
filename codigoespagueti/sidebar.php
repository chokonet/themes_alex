<div id="sidebar">

	<h5>Noticias</h5>

	<?php global $featured_post;

		$noticias = get_posts(array(
			'post_type'      => 'post',
			'category'       => 1,
			'posts_per_page' => 16,
			'exclude'        => $featured_post
		));

		foreach ($noticias as $post): setup_postdata($post);


	?>

		<div class="post-side <?php
			$categorias = get_the_category($post->ID);
			foreach($categorias as $categoria) {
				echo $categoria->slug;
				echo ' ';
			}
		?>">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			<?php if(has_category('opinion')) {?>
				<div class="opinion-img">
					<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url');?>/images/opinion-flag.png"></a>
				</div>
			<?php } ?>
			<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
			<span class="date"><?php echo get_the_date('d.m.y'); ?></span>
			<?php the_excerpt(); ?>
		</div>

	<?php endforeach; wp_reset_query(); ?>

	<!-- codigo_home -->
	<div id='div-gpt-ad-1378399931388-1' style='width:300px; height:600px;'>
		<script type='text/javascript'>
			googletag.display('div-gpt-ad-1378399931388-1');
		</script>
	</div>

	<?php /* BANNER VIEJO
	<div id='div-gpt-ad-1374362520645-0' style='width:300px; height:600px;'>
		<script type='text/javascript'>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1374362520645-0'); });
		</script>
	</div>
	*/ ?>

</div>