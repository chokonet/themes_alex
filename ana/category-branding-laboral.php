<?php get_header(); ?>

	<div id="content">

		<div class="single_izq">
			<div class="tercio">

				<h2 class="brand_azul2">Branding Laboral</h2>
				<?php $termino = get_term_by( 'slug', 'branding-laboral', 'category' ); ?>
				<p><?php echo $termino->description; ?></p>

			</div>

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="cada_post">
				<h4 class="post_h_azul2">
					<a href="<?php the_permalink(); ?>?a=azul2">
						<?php the_title(); ?>
					</a>
				</h4>
				<div class="cada_post_img_warp">
					<?php the_post_thumbnail( 'img_blog' ); ?>
				</div><!-- cada_post_img_warp -->
				<div class="cada_post_p_warp">

					<p><?php the_excerpt(); ?></p>
					<div class="cada_post_leer_azul2"> <a href="<?php the_permalink(); ?>?a=azul2"> Leer más </a> </div>
				</div><!-- cada_post_p_warp -->
				<div class="separacion_azul2 sepa_blog"></div>
			</div><!-- cada_post -->
			<?php endwhile; ?>

			<ul class="dicc_pager link_gris2">
				<?php if (function_exists('pagination')) {
					global $wp_query;
					pagination($wp_query->max_num_pages);
				} ?>
			</ul><!-- dicc_pager -->
		</div><!-- single_izq -->


		<div class="single_der">

			<div class="un_tercio tercio preguntale brand_azul2">
				<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h2 class="brand_azul2">Consulta a Ana</h2></a>
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