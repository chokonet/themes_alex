<?php get_header(); ?>

		<div id="content">

				<div class="single_izq">
					<div class="tercio">

						<h3 class="brand_anara">Salud y Bienestar</h3>
					<?php
						$termino = get_term_by( 'slug', 'salud-y-bienestar', 'category' );

						// echo '<pre>';
						// 	print_r($termino);
						// echo '</pre>';

						?>
						<p><?php echo $termino->description; ?></p>
					</div>

					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array('posts_per_page' => 4,'paged' => $paged,'post_type' => 'post','tax_query' => array(array('taxonomy' => 'category','field' => 'slug','terms' => 'salud-y-bienestar' ) ));

					query_posts( $args );
					while ( have_posts() ) : the_post(); ?>
					<div class="cada_post">
						<h4 class="post_h_anara">
							<a href="<?php the_permalink(); ?>?a=anara">
								<?php the_title(); ?>
							</a>
						</h4>
						<div class="cada_post_img_warp">
							<?php the_post_thumbnail( 'img_blog' ); ?>
						</div><!-- cada_post_img_warp -->
						<div class="cada_post_p_warp">
							<?php
								$excerpt = get_the_content();
								$excerpt = string_limit_words($excerpt,40);
								?>
							<p><?php echo $excerpt; ?>…</p>
							<div class="cada_post_leer_anara"> <a href="<?php the_permalink(); ?>?a=anara"> Leer más </a> </div>
						</div><!-- cada_post_p_warp -->
						<div class="separacion_anara sepa_blog"></div>
					</div><!-- cada_post -->

					<?php endwhile; ?>
					<ul class="dicc_pager link_anara">
						<?php posts_nav_link( ' | ', '< Anterior', 'Siguiente >' ); ?>
					</ul>
				</div><!-- single_izq -->


		<div class="single_der">

					<div class="un_tercio tercio preguntale brand_anara">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h3 class="brand_anara">Consulta a Ana</h3></a>
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