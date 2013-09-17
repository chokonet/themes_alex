<?php get_header(); ?>

	<div id="content">

		<div class="single_izq">
			<div class="tercio">

				<h2 class="brand_verde">Videos</h2>
				<div class="tri_ana tri_ana_izq"></div>
			</div>

			<div class="single_cont">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="video_wrap_el">
						<?php
						$video_url = get_post_meta($post->ID, 'dbt_link_video', true);
						$twitcam_url = get_post_meta($post->ID, 'dbt_link_twitcam', true);
						?>
						<?php if($video_url != ''):?>
								<iframe width="100%" height="192" src="http://www.youtube.com/embed/<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
						<?php elseif($twitcam_url != ''):?>
								<object id="twitcamPlayer" width="100%" height="192" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param name="movie" value="http://static.livestream.com/grid/LSPlayer.swf?hash=<?php echo $twitcam_url; ?>"/><param name="allowScriptAccess" value="always"/><param name="allowFullScreen" value="true"/><param name="wmode" value="window"/> <embed name="twitcamPlayer" src="http://static.livestream.com/grid/LSPlayer.swf?hash=<?php echo $twitcam_url; ?>" allowFullScreen="true" allowScriptAccess="always" type="application/x-shockwave-flash" bgcolor="#ffffff" width="100%" height="192" wmode="window" ></embed></object>
						<?php else:?>
								<iframe width="100%" height="192" src="http://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
						<?php endif; ?>
						<h4><a href="<?php the_permalink(); ?>?a=videos"><?php the_title(); ?></a></h4>
					</div>
				<?php endwhile; ?>
				<ul class="dicc_pager link_verde">
					<?php if (function_exists('pagination')) {
						global $wp_query;
						pagination($wp_query->max_num_pages);
					} ?>
				</ul><!-- dicc_pager -->
			</div><!-- single_cont -->


		</div><!-- single_izq -->


		<div class="single_der">

			<div class="un_tercio tercio preguntale brand_verde">
				<h2 class="brand_verde">Consulta a Ana</h2>
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


		<div class="tres_tercios tercio diccionario_de_moda diccionario_videos">


			<h2 class="brand_verde">Diccionario de Moda y Estilo</h2>

			<div class="tri_ana tri_ana_izq"></div>

			<div id="carusel_videos_verde">
			    <a class="flechas flecha_carrusel prev" href="#"></a>
			    <div class="viewport">
			        <ul class="overview" id="carousel_uls">
			        	<?php  query_posts(array(
			            	'posts_per_page' => 50,
			            	'category_name'	 => 'diccionario',
							'orderby'        =>'rand'
			            ));
			            while ( have_posts() ) : the_post(); ?>

			           		 <li>
								<a href='<?php echo home_url("/category/diccionario/") ?>?nombre=<?php echo the_title(); ?>'>
											<?php the_post_thumbnail('diccionario'); ?>
											<div class="nombre_diccionario">
												<p><?php the_title(); ?></p>
											</div><!-- nombre_diccionario -->
										</a>
							</li>
                        <?php endwhile; ?>
			        </ul>
			    </div>
			    <a class="flecha_carrusel next" href="#"></a>
			</div><!-- carusel-diccionario -->

		</div><!-- tres_tercios -->

	</div><!-- content -->

<?php get_footer(); ?>