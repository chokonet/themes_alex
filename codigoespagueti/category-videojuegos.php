<?php
	get_header();

	$objeto = get_queried_object();
	$featured_posts = array(); ?>

	<div id="slider">

		<?php $slides = get_posts(array(
			'post_type'      => 'post',
			'posts_per_page' => 1,
			'category'       => $objeto->term_id,
			'meta_key'       => 'cat_top_home',
			'meta_value'     => 'true'
		));
		foreach($slides as $index => $post): setup_postdata($post); $featured_posts[$index] = $post->ID; ?>

		<div class="slide">

			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide'); ?></a>
			<div class="slide-info">
				<span class="date"><?php the_date('d.m.y', '', ' |'); ?>  <?php the_category(' - ', $post->ID); ?></span>
				<h2><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h2>
				<ul class="share-slide">
					<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>
					<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
					<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
				</ul>
			</div><!-- end .slide-info-->

		</div><!-- end .slide -->

		<?php endforeach; wp_reset_query(); ?>

	</div><!-- end #slider -->


	<div class="top-archive">

		<div class="content-archive">

		<?php $posts = get_posts(array(
			'post_type'      => 'post',
			'category'       => $objeto->term_id,
			'posts_per_page' => 4,
			'exclude'        => $featured_posts
		));
		foreach ($posts as $post): setup_postdata($post); ?>

			<div class="post">

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post'); ?></a>
				<span class="date"><?php the_date('d.m.y', '', ' |'); ?>  <?php the_category(' - ', $post->ID); ?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
				<?php the_excerpt();?>

			</div><!-- end .post -->

			<?php endforeach; wp_reset_query(); ?>

		</div><!-- end .content-archive -->

		<?php include_once('side-general.php'); ?>

	</div><!-- end .top-archive -->


	<div class="bottom-archive">

		<h5>Noticias</h5>

		<div class="bottom-archive-content">
			<?php $noticias = get_posts(array(
					'post_type' => 'post',
					'category' => 1,
					'posts_per_page' => 6
				));
			foreach ($noticias as $post): setup_postdata($post); ?>

			<div class="post-side">

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<h6><?php echo $post->post_title; ?></h6>
				<span class="date"><?php the_date('d.m.y'); ?> </span>
				<?php the_excerpt(); ?>

			</div><!-- end .post-side -->

			<?php endforeach; wp_reset_query(); ?>

		</div><!-- end .bottom-archive-content -->


		<?php $video = get_posts(array(
			'post_type' => 'videos',
			'category_name' => $objeto->name,
			'posts_per_page' => 1,
		));
		foreach ($video as $post): setup_postdata($post); ?>

		<div class="video">

			<h5>Video</h5>
			<?php if(get_post_meta($post->ID, 'id_vimeo', true)){ ?>
				<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'id_vimeo', true); ?>?color=00a6ce" width="980" height="551" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			<?php } elseif (get_post_meta($post->ID, 'id_youtube', true)) { ?>
				<iframe width="980" height="551" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
			<?php } ?>
			<span class="date"><?php the_date('d.m.y', '', ' |'); ?>  <?php the_category(' - ',$post->ID); ?></span>
			<h4><a rel="nofollow" href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>

		</div><!-- end .video -->

		<?php endforeach; wp_reset_query(); ?>

		<h5>Reseñas</h5>

		<div class="archive-resenas">

			<?php $resenas = get_posts(array(
				'post_type' => 'resenas',
				'posts_per_page' => 6,
				'category' => 3
			));
			foreach ($resenas as $post): setup_postdata($post); ?>

			<div class="resena-archive">

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<a href="<?php the_permalink(); ?>">
					<div class="score-archive">
						<p><?php echo get_post_meta($post->ID, 'score', true); ?></p>
					</div><!-- end .score-archive -->
				</a>
				<?php $terms = wp_get_post_terms($post->ID, 'consolas');

				foreach ($terms as $term) { ?>
					<span class="date">
						<a href="<?php bloginfo('url'); ?>/consolas/<?php echo $term->slug; ?>"><?php echo $term->name; ?>,</a>
						</span>
				<?php } ?>
				<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
			</div><!-- end .resena-archive -->

			<?php endforeach; wp_reset_query(); ?>

		</div><!-- end .archive-resenas -->

	</div><!-- end .bottom-archive-->

<?php get_footer(); ?>