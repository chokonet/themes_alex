<?php
	get_header();
	$objeto = get_queried_object();
	// echo '<pre>';
	// print_r($objeto);
	// echo '</pre>';

	$userID = $objeto->ID;
?>
		<div class="autores">
			<div class="splash">
				<img src="<?php echo get_the_author_meta('imagen', $userID);?>">
			</div><!-- end .splash -->
			<div class="contenido-autor">
				<div class="nombre-columna">
					<h2><?php echo get_the_author_meta('nombre_columna', $userID); ?></h2>
				</div><!-- end .nombre-columna -->
				<div class="biografia">
					<?php $descripcion = apply_filters('the_content',get_the_author_meta('description', $userID)); echo $descripcion; ?>
				</div><!-- end .biografia -->
				<div class="sidebar-autor">
					<div class="side uno">
						<img src="<?php bloginfo('template_url'); ?>/images/quote.png">
						<blockquote><?php echo get_the_author_meta('quote', $userID);?></blockquote>
					</div><!-- end .side-->
					<div class="side">
						<ul>
							<li><a href="<?php echo get_the_author_meta('facebook', $userID);?>">Facebook</a></li>
							<li><a href="http://twitter.com/<?php echo get_the_author_meta('twitter', $userID);?>">Twitter</a></li>
							<li><a href="http://instagram.com/<?php echo get_the_author_meta('instagram', $userID);?>">Instagram</a></li>
							<li><a href="<?php echo get_the_author_meta('tumblr', $userID);?>">Tumblr</a></li>
							<li><a href="<?php echo get_the_author_meta('flickr', $userID);?>">Flickr</a></li>
						</ul>
					</div><!-- end .side-->
					<div class="side">
						<h5>Tweets</h5>

					</div><!-- end .side-->
				</div><!-- end .sidebar-autor-->
				<h5>Últimos artículos</h5>
				<div class="ultimos">
					<?php
						$args = array(
								'posts_per_page' => 4,
								'author' => $objeto->ID
							);
						$ultimos = get_posts($args);
						foreach ($ultimos as $post): setup_postdata($post);
					?>
					<div class="post">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_post'); ?></a>
						<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
						<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
						<?php the_excerpt();?>
					</div><!-- end .post -->
					<?php endforeach; ?>
				</div><!-- end .ultimos -->
			</div><!-- end .contenido-autor -->

		</div><!-- end .autores -->


<?php get_footer(); ?>