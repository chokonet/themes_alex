<?php
	get_header();
	$objeto = get_queried_object();
	// echo '<pre>';
	// echo print_r($objeto);
	// echo '</pre>';
?>
				<?php
						$args = array(
							'post_type' => 'resenas',
							'posts_per_page' => 1,
							'category' => $objeto->name,
							'meta_key' => 'cat_top_home',
							'meta_value' => 'true'
						);
						$slides = get_posts($args);
						foreach($slides as $post): setup_postdata($post);
					?>
				<div id="slider">
					<div class="slide">
						<a rel="nofollow" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide'); ?></a>
						<div class="slide-info">
							<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
							<h2><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h2>
							<ul class="social-post">
								<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
								<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
								<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>
								<!-- <li><a href=""><img src=""></a></li>
								<li><a href=""><img src=""></a></li> -->
							</ul>
						</div><!-- end .slide-info-->
					</div><!-- end .slide -->

				</div><!-- end #slider -->
				<?php endforeach; wp_reset_query(); ?>
				<div class="top-archive">
					<div class="content-archive">
					<?php
						$args = array(
								'post_type' => 'resenas',
								'category' => $objeto->name,
								'posts_per_page' => 4,


							);
						$posts = get_posts($args);
						foreach ($posts as $post): setup_postdata($post);
					?>

						<div class="post">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post'); ?></a>
							<a href="<?php the_permalink(); ?>">
								<div class="resena-score">
									<?php echo get_post_meta($post->ID, 'score', true); ?>
								</div><!-- end .resena-score -->
							</a>
							<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
							<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
							<?php the_excerpt();?>
						</div><!-- end .post -->

						<?php endforeach; wp_reset_query(); ?>
					</div><!-- end .content-archive -->
					<?php include_once('side-general.php'); ?>
				</div><!-- end .top-archive -->

				<div class="bottom-archive">
					<?php if(!is_category('noticias')) { ?>
					<h5>Noticias</h5>
					<div class="bottom-archive-content">
						<?php
							$args = array(
									'post_type' => 'post',
									'category' => 1,
									'posts_per_page' => 6
								);
							$noticias = get_posts($args);
							foreach ($noticias as $post): setup_postdata($post);
						?>
						<div class="post-side">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
							<span class="date"><?php echo get_the_date('d.m.y'); ?></span>
							<?php the_excerpt(); ?>
						</div><!-- end .post-side -->
						<?php endforeach; wp_reset_query(); ?>
					</div><!-- end .bottom-archive-content -->
					<?php } ?>

					<?php $args = array(
							'post_type' => 'videos',
							'category_name' => $objeto->name,
							'posts_per_page' => 1,
						);
						$video = get_posts($args);
							foreach ($video as $post): setup_postdata($post);
						?>
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