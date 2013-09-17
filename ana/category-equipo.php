<?php get_header(); ?>

	<div id="slider_wrap_100"  class="slider_wrap_equipo">
	<div id="slider_wrap" >
		<h4>Equipo</h4>
		<div id="slider2" class="equipo_slide" >
		<div id="para_slider" >
				<div id="carousel_inner">
					<ul id="carousel_ul">
						<?php query_posts( array(
							'posts_per_page' => -1,
							'category_name'	 => 'equipo',
							'orderby'        => 'meta_value',
							'meta_key'       => 'orden_equipo',
							'order'          => 'ASC'
						));

						while ( have_posts() ) : the_post(); ?>

							<li class="equipo">
								<a href="<?php the_permalink(); ?>?a=rosa"> <?php the_post_thumbnail(); ?> </a>
								<div class="slider_info">
									<h3> <a href="<?php the_permalink(); ?>?a=rosa"> <?php the_title(); ?> </a></h3>
									<p><?php echo get_post_meta($post->ID, 'dbt_puesto', true); ?></p>
								</div><!-- slider_info -->
							</li>

						<?php endwhile; ?>

					</ul><!-- carousel_ul -->
				</div><!-- carousel_inner -->

			</div><!-- para_slider -->
			<div id='left_scroll'></div>
			<div id='right_scroll'></div>
		</div><!-- para_slider2 -->

	</div><!-- slider_wrap -->
	</div><!-- slider_wrap 100 -->


	<div id="content">

		<div class="single_izq">
			<div class="tercio">
				<h2 class="brand_rosa">Equipo</h2>

				<?php
					$termino = get_term_by( 'slug', 'equipo', 'category' );
				?>

				<p><?php echo $termino->description; ?></p>
			</div>

		</div><!-- single_izq -->

		<div class="single_der">

			<div class="un_tercio tercio preguntale equipo_rosa">
				<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h2 class="brand_rosa">Consulta a Ana</h2></a>
				<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">

			</div><!-- un_tercio -->

			<div class="tercio margen_sup_25 banner_ocultar">
				<div class="tercio_in">
					<!-- Google Adsense -->
					<script type="text/javascript">
					google_ad_client = "ca-pub-5042601521790259";
					/* Header */
					google_ad_slot = "4963263372";
					google_ad_width = 300;
					google_ad_height = 250;
					</script>
					<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
					</script>
				</div><!-- tercio_in -->

			</div><!-- tercio -->

			<div id="twitter_wid" class="tercio margen_sup_25">
				<a class="twitter-timeline" href="https://twitter.com/ConsejosdeAna" data-widget-id="346712873344573440">Tweets by @ConsejosdeAna</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		    </div><!-- twitter -->

		</div><!-- single_der -->

	</div><!-- content -->

<?php get_footer(); ?>