<?php
	get_header();

	$objeto = get_queried_object();
	$featured_posts = array();

	if($page == 1){

	$slides = get_posts(array(
		'post_type'      => 'post',
		'posts_per_page' => 1,
		'category'       => $objeto->term_id,
		'meta_key'       => 'cat_top_home',
		'meta_value'     => 'true'
	));

	foreach($slides as $index => $post): setup_postdata($post); $featured_posts[$index] = $post->ID;

	?>

		<div id="slider">

			<div class="slide">
				<a rel="nofollow" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide'); ?></a>
				<div class="slide-info">
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
					<h2><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h2>
					<ul class="social-post">
						<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>
						<!-- <li><a href=""><img src=""></a></li>
						<li><a href=""><img src=""></a></li> -->
					</ul>
				</div><!-- end .slide-info-->
			</div><!-- end .slide -->

		</div><!-- end #slider -->

	<?php endforeach; wp_reset_query(); ?>

	<?php } ?>


	<div class="top-archive">

		<div class="content-archive">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



			<div class="post">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post'); ?></a>
				<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
				<?php the_excerpt();?>
			</div><!-- end .post -->

			<?php endwhile; endif; wp_reset_query();?>

			<div id="paginacion">
				<?php global $wp_query;
					$big  = 999999999; // need an unlikely integer
					$args = array(
						'base'      => str_replace( $big, '%#%', esc_url(get_pagenum_link($big)) ),
						'format'    => '?page=%#%',
						'total'     => $wp_query->max_num_pages,
						'current'   => max( 1, get_query_var('paged') ),
						'show_all'  => false,
						'end_size'  => 3,
						'mid_size'  => 2,
						'type'      => 'list',
						'prev_next' => true,
						'prev_text' => __('&raquo; Anterior |'),
						'next_text' => __('| &laquo; Siguiente'),
					);
					echo paginate_links($args);?>
			</div><!-- end #paginacion -->


		</div><!-- end .content-archive -->



		<?php include_once('side-general.php'); ?>

	</div><!-- end .top-archive -->

	<div class="bottom-archive">

		<?php if(!is_category('noticias')) : ?>

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
					<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
					<span class="date"><?php echo get_the_date('d.m.y'); ?></span>
					<?php the_excerpt(); ?>

				</div><!-- end .post-side -->

				<?php endforeach; wp_reset_query(); ?>

			</div><!-- end .bottom-archive-content -->

		<?php endif; ?>

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
			<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ',$post->ID); ?></span>
			<h4><a rel="nofollow" href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>

		</div><!-- end .video -->

		<?php endforeach; wp_reset_query(); ?>

	</div><!-- end .bottom-archive-->

<?php get_footer(); ?>