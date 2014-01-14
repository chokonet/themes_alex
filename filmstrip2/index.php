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
					<?php $the_query = new WP_Query( array( 'tax_query' => array(array(
																					'taxonomy' => 'category',
																					'field' => 'slug',
																					'terms' => 'trailers'
																				)
																			),
															'posts_per_page' => 5
													));

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
									<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo $reparto; ?></p></a>
								</div>
							</div>
						<?php else: ?>

							<div class="mas-videos">
								<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/vid1.jpg"  /></a>
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<a href="<?php the_permalink(); ?>"><p>Dirección: <?php echo $director; ?></p></a>
								<a href="<?php the_permalink(); ?>"><p>Reparto: <?php echo $reparto; ?></p></a>
							</div>

					<?php endif; $count++; endwhile; endif;?>
				</div><!-- trailer -->

				<div class="un-tercio">
					<h4>Estrenos [Cine]</h4>
					<div class="col-estrenos">
						<img src="<?php bloginfo('template_url'); ?>/images/est1.jpg">
						<h3>X-Men: Days of Future Past</h3>
						<p>Dirección: Bryan Singer</p>
						<p>Reparto: Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence...</p>
					</div>
					<div class="col-estrenos">
						<img src="<?php bloginfo('template_url'); ?>/images/est2.jpg">
						<h3>X-Men: Days of Future Past</h3>
						<p>Dirección: Bryan Singer</p>
						<p>Reparto: Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence...</p>
					</div>
					<div class="col-estrenos">
						<img src="<?php bloginfo('template_url'); ?>/images/est3.jpg">
						<h3>X-Men: Days of Future Past</h3>
						<p>Dirección: Bryan Singer</p>
						<p>Reparto: Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence...</p>
					</div>

				</div><!-- estrenos cine -->
				<span class="separador"></span>

				<div class="un-tercio">
					<h4>Estrenos [DVD/BR]</h4>

					<div class="col-estrenos">
						<img src="<?php bloginfo('template_url'); ?>/images/est1.jpg">
						<h3>X-Men: Days of Future Past</h3>
						<p>Dirección: Bryan Singer</p>
						<p>Reparto: Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence...</p>
					</div>
					<div class="col-estrenos">
						<img src="<?php bloginfo('template_url'); ?>/images/est2.jpg">
						<h3>X-Men: Days of Future Past</h3>
						<p>Dirección: Bryan Singer</p>
						<p>Reparto: Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence...</p>
					</div>
					<div class="col-estrenos">
						<img src="<?php bloginfo('template_url'); ?>/images/est3.jpg">
						<h3>X-Men: Days of Future Past</h3>
						<p>Dirección: Bryan Singer</p>
						<p>Reparto: Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence...</p>
					</div>
				</div><!-- estrenos dvd -->

				<span class="separador"></span>

				<div class="un-tercio noticias-home">
					<h4>Noticias</h4>

					<div class="col-estrenos">
						<h3>Invitados al Festival Mórbido</h3>
						<p>Elijah Wood (El Señor de los Anillos) será uno de los invitados de la...</p>
					</div>

					<div class="col-estrenos">
						<h3>Lista Q Score</h3>
						<p>Según la lista Q Score, Sean Connery (La Roca) es el actor británico más popular...</p>
					</div>

					<div class="col-estrenos">
						<h3>Nuevo libro de Guillermo del Toro</h3>
						<p>“Guillermo del Toro: Gabinete de Curiosidades. Mi libro de apuntes, colecciones y otras obsesiones” es...</p>
					</div>

					<div class="col-estrenos">
						<h3>5ta Temporada de “The Walking Dead”</h3>
						<p>The Walking Dead temporada 4 contó con 16.1 millones de televidentes estadounidenses...</p>
					</div>

				</div><!-- estrenos noticias -->

			</div><!-- main -->

<?php get_footer(); ?>
