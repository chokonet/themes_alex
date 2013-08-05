<?php
	get_header();
	$objeto = get_queried_object();
	// echo '<pre>';
	// echo print_r($objeto);
	// echo '</pre>';
?>
		<div class="content-archive">
			<h2><?php printf( __( 'Resultados de "%s"' ),  get_search_query()  ); ?></h2>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<div class="wrapper-post-archive">
				<div class="post-archive">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
					<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
					<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
					<?php the_excerpt(); ?>

				</div><!-- end .post-archive -->
				<ul class="social-post">
					<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
					<li><div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div></li>
					<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="125" data-show-faces="false"></div></li>
					<!-- <li><a href=""><img src=""></a></li>
					<li><a href=""><img src=""></a></li> -->
				</ul>
			</div><!-- end .wrapper-post-archive -->


			<?php endwhile; endif; wp_reset_query(); ?>
			<div class="post-nav">
			<?php previous_posts_link('%link', '&raquo Anterior'); ?>
			<span class="siguiente-post">
				<?php next_posts_link('%link', 'Siguiente &laquo'); ?>
			</span>
		</div><!-- end .post-nav -->
		</div><!-- end content-archive -->
		<?php get_template_part('side-general'); ?>


<?php get_footer(); ?>