<?php get_header(); ?>

		<div class="clear"></div>

		<div id="content">

				<div class="single_izq">
					<div class="tercio">
						<h3 class="ana_verde">Conferencias</h3>

						<?php
						$termino = get_term_by( 'slug', 'conferencias', 'category' );

						// echo '<pre>';
						// 	print_r($termino);
						// echo '</pre>';

						?>
						<p><?php echo $termino->description; ?></p>
					</div>

					<?php
					$args = array(
						'posts_per_page' => 4,
						'category_name'	 => 'conferencias'
					);
					query_posts( $args );
					while ( have_posts() ) : the_post(); ?>
					<div class="cada_post">
						<h4 class="post_h">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h4>
						<div class="cada_post_img_warp">
							<?php the_post_thumbnail( 'img_blog' ); ?>
						</div><!-- cada_post_img_warp -->
						<div class="cada_post_p_warp">
							<?php
								$excerpt = get_the_excerpt();
								$excerpt = string_limit_words($excerpt,40);
								?>
							<p><?php echo $excerpt; ?>…</p>
							<div class="cada_post_leer"> <a href="<?php the_permalink(); ?>"> Leer más </a> </div>
						</div><!-- cada_post_p_warp -->
						<div class="separacion sepa_blog"></div>
					</div><!-- cada_post -->

					<?php endwhile; ?>
					<ul class="dicc_pager link_verde">
						<?php posts_nav_link( ' | ', '< Anterior', 'Siguiente >' ); ?>
					</ul>
				</div><!-- single_izq -->


				<div class="single_der ana_azul2">
					<div class="tercio">

						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/'); ?>"><h4 class="ana_verde">Ana Vásquez Colmenares</h4></a>

						<div class="tercio_in">
							<?php
					$args = array(
						'posts_per_page' => 1,
						'category_name'	 => 'pensamientos'
					);
					query_posts( $args );
					while( have_posts() ) : the_post(); ?>
						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
					<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->


					<div class="tercio margen_sup_25">

						<h3 class="ana_verde">Conferencias</h3>
						<div class="tri_ana tri_ana_izq"></div>

						<div class="tercio_in">
								<?php
					$args = array(
						'posts_per_page' => 1,
						'category_name'	 => 'conferencias'
					);
					query_posts( $args );
					while( have_posts() ) : the_post(); ?>
						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
					<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div class="tercio margen_sup_25 tag_cloud">

					    <h3 class="ana_verde">Tag Cloud</h3>

					    <div class="tercio_in">
							<?php wp_tag_cloud('smallest=8&largest=22&number=20'); ?>
					    </div><!-- tercio_in -->

					</div><!-- tercio -->

					<div class="tercio margen_sup_25">
						<div class="tercio_in">
							<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div id="twitter_wid" class="tercio margen_sup_25 twitter_border">
						<a class="twitter-timeline" href="https://twitter.com/anavasquezc" data-widget-id="339810405939552258">Tweets by @anavasquezc</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div><!-- twitter -->



				</div><!-- single_der -->


			</div><!-- content -->

<?php get_footer(); ?>