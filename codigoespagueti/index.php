<?php get_header(); ?>

	<div id="slider">

		<?php $slides = get_posts(array(
			'post_type'      => 'post',
			'posts_per_page' => 1,
			'meta_key'       => 'top_home',
			'meta_value'     => 'true'
		));

		global $featured_posts;

		foreach($slides as $index => $post): setup_postdata($post); $featured_posts[$index] = $post->ID; ?>

			<div class="slide">
				<a rel="nofollow" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide'); ?></a>
				<div class="slide-info">
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
					<h2><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h2>

					<p><?php the_excerpt(); ?></p>
					<ul class="share-slide">
						<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>

					</ul>
				</div><!-- end .slide-info-->
			</div><!-- end .slide -->

		<?php endforeach; wp_reset_query(); ?>

	</div><!-- end #slider -->


	<?php get_sidebar(); ?>


	<div id="content">

		<div id="content-destacados">
			<?php $destacados = get_posts(array(
				'post_type'      => 'post',
				'posts_per_page' => 6,
				'meta_key'       => 'grid_home',
				'meta_value'     => 'true',
				'exclude'        => $featured_posts
			));

			foreach ($destacados as $post): setup_postdata($post); ?>

				<div class="post">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post');?></a>
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ','', $post->ID); ?></span>
					<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
					<?php the_excerpt();?>
				</div><!-- end .post -->

			<?php endforeach; wp_reset_query(); ?>

		</div><!-- end #content-destacados -->


		<?php get_template_part( 'templates/main', 'entrevistas' ); ?>


		<?php get_template_part( 'templates/main', 'colaboradores' ); ?>


		<?php get_template_part( 'templates/main', 'resenas' ); ?>


		<?php get_template_part( 'templates/main', 'leyendo' ); ?>


	</div><!-- end #content -->


	<?php get_template_part( 'templates/main', 'videos' ); ?>


<?php get_footer(); ?>