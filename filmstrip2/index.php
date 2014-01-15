<?php get_header(); ?>

		<div class="main">

			<div id="container-banner">

				<!--  Outer wrapper for presentation only, this can be anything you like -->
				<div id="banner">
					<!-- start Basic Jquery Slider -->
					<ul class="bjqs">
						<li><img src="<?php bloginfo('template_url'); ?>/images/banner01.jpg" title="Automatically generated caption" data-conent="conent1"></li>
						<li><img src="<?php bloginfo('template_url'); ?>/images/banner02.jpg" title="Automatically generated caption" data-conent="conent2"></li>
						<li><img src="<?php bloginfo('template_url'); ?>/images/banner03.jpg" title="Automatically generated caption" data-conent="conent3"></li>
						<li><img src="<?php bloginfo('template_url'); ?>/images/banner01.jpg" title="Automatically generated caption" data-conent="conent4"></li>
						<li><img src="<?php bloginfo('template_url'); ?>/images/banner02.jpg" title="Automatically generated caption" data-conent="conent5"></li>
					</ul>
					<!-- end Basic jQuery Slider -->
				</div>
				<!-- End outer wrapper -->

			</div>

			<div class="una-seccion">
				<?php $the_query = new WP_Query( array( 'category_name' => 'trailers', 'posts_per_page' => 5 ));

				if ( $the_query->have_posts() ) : $count = 1; while ( $the_query->have_posts() ) : $the_query->the_post();
					$director = get_post_meta($post->ID, 'director', true);
					$reparto  = get_post_meta($post->ID, 'reparto', true);

					if($count == 1):?>

						<div id="trailer-uno">
							<?php if(get_post_meta($post->ID, 'id_vimeo', true)){ ?>
								<iframe id="un-video" src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'id_vimeo', true); ?>?color=00a6ce" width="476" height="268" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<?php } elseif (get_post_meta($post->ID, 'id_youtube', true)) { ?>
								<iframe id="un-video" width="476" height="268" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allowfullscreen></iframe>
							<?php } ?>
							<div id="info-video">
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
								<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo wp_trim_words( $reparto, 20 ) ?></p></a>
							</div>
						</div>
					<?php else: ?>

						<div class="mas-videos">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'video_home'); ?></a>
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
							<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo wp_trim_words( $reparto, 20 ) ?></p></a>
						</div>

				<?php endif; $count++; endwhile; endif; wp_reset_postdata();?>
			</div><!-- trailer -->

			<div class="un-tercio">
				<h4>Estrenos [Cine]</h4>

				<?php $estrenos_dvd = new WP_Query( array( 'category_name' => 'estrenos-cine', 'posts_per_page' => 3 ));

				if ( $estrenos_dvd->have_posts() ) : while ( $estrenos_dvd->have_posts() ) : $estrenos_dvd->the_post();
					$director = get_post_meta($post->ID, 'director', true);
					$reparto  = get_post_meta($post->ID, 'reparto', true);?>
					<div class="col-estrenos">
						<?php the_post_thumbnail( 'estrenos_home'); ?>
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
						<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo wp_trim_words( $reparto, 30 ) ?></p></a>
					</div>
				<?php endwhile; endif; wp_reset_postdata();?>

			</div><!-- estrenos cine -->
			<span class="separador"></span>

			<div class="un-tercio">
				<h4>Estrenos [DVD/BR]</h4>

				<?php $estrenos_dvd = new WP_Query( array( 'category_name' => 'estrenos-dvdbr', 'posts_per_page' => 3 ));

				if ( $estrenos_dvd->have_posts() ) : while ( $estrenos_dvd->have_posts() ) : $estrenos_dvd->the_post();
					$director = get_post_meta($post->ID, 'director', true);
					$reparto  = get_post_meta($post->ID, 'reparto', true);?>

					<div class="col-estrenos">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'estrenos_home'); ?></a>
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
						<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo wp_trim_words( $reparto, 30 ) ?></p></a>
					</div>

				<?php endwhile; endif; wp_reset_postdata();?>

			</div><!-- estrenos dvd -->

			<span class="separador"></span>

			<div class="un-tercio noticias-home">
				<h4>Noticias</h4>
				<?php $primicias = new WP_Query( array( 'category_name' => 'primicias', 'posts_per_page' => 5 ));

				if ( $primicias->have_posts() ) : while ( $primicias->have_posts() ) : $primicias->the_post();?>

					<div class="col-estrenos">
						<h3><?php the_title(); ?></h3>
						<p><?php echo wp_trim_words( get_the_excerpt(), 20 ) ?></p>
					</div>

				<?php endwhile; endif; wp_reset_postdata();?>

			</div><!-- estrenos noticias -->

		</div><!-- main -->

<?php get_footer(); ?>
