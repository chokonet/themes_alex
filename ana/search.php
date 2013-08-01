<?php get_header(); ?>
<div id="content">

				<div class="single_izq">
<?php if ( have_posts() ) : ?>
			<div class="tercio">
		  <h3 class="ana_verde"><?php printf( __( 'Resultados de "%s"' ),  get_search_query()  ); ?></h3>
		  </div>
                <?php while ( have_posts() ) : the_post(); ?>
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

          <?php endwhile;?>
          <ul class="dicc_pager link_azul2">
						<?php posts_nav_link( ' | ', '< Anterior', 'Siguiente >' ); ?>
					</ul><!-- dicc_pager -->
            <?php else : ?>


                        <p><?php _e( 'No encontramos lo que buscabas, por favor busca con otras palabras.' ); ?></p>


            <?php endif; ?>
				</div><!-- single_izq -->


		<div class="single_der">

					<div class="un_tercio tercio preguntale brand_azul2">
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h3 class="brand_azul2">Consulta a Ana</h3></a>
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