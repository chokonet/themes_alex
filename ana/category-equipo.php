<?php get_header(); ?>

		<div id="slider_wrap_100" class="slider_wrap_equipo">
			<div id="slider_wrap">

				<h2>Equipo</h2>
				<ul id="slider_equi">

					<?php
					$args = array(
						'posts_per_page' => -1,
						'category_name'	 => 'equipo'
					);
					query_posts( $args );
					while ( have_posts() ) : the_post(); ?>

						<li>
							<a href="<?php the_permalink(); ?>?a=rosa"> <?php the_post_thumbnail(); ?> </a>
							<div class="slider_info">
								<h3> <a href="<?php the_permalink(); ?>?a=rosa"> <?php the_title(); ?> </a></h3>
								<p><?php echo get_post_meta($post->ID, 'dbt_puesto', true); ?></p>
							</div><!-- slider_info -->
						</li>

					<?php endwhile; ?>

				</ul><!-- slider_equi -->

				<div id="flechas_slider">
					<div id="slider_prev" class="flechas" ></div>
					<div id="slider_next" class="flechas" ></div>
				</div><!-- flechas_slider -->

			</div><!-- slider_wrap -->
			</div><!-- slider_wrap 100 -->

			<div id="content">

				<div class="single_izq">
					<div class="tercio">
						<h3 class="brand_rosa">Equipo</h3>

						<?php
							$termino = get_term_by( 'slug', 'equipo', 'category' );
						?>

						<p><?php echo $termino->description; ?></p>
					</div>

				</div><!-- single_izq -->

				<div class="single_der">

					<div class="un_tercio tercio preguntale equipo_rosa">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h3 class="brand_rosa">Consulta a Ana</h3></a>
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">
						
					</div><!-- un_tercio -->

					<div class="tercio margen_sup_25">
						<div class="tercio_in">
							<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div id="twitter_wid" class="tercio margen_sup_25">
						<a class="twitter-timeline" href="https://twitter.com/anavasquezc" data-widget-id="339810405939552258">Tweets by @anavasquezc</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div><!-- twitter -->

				</div><!-- single_der -->
			</div><!-- content -->
<?php get_footer(); ?>