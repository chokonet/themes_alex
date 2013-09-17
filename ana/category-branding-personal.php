<?php get_header(); ?>

		<div id="content">

				<div class="tercio">
					<h2 class="brand_verde" >Branding personal</h2>
				</div>

				<div class="un_tercio tercio tercio_responsive ">

					<a href="<?php echo home_url('/category/articulos/branding-femenino/'); ?>"><h2 style="background: #dc3492">Branding Femenino</h2></a>

					<div class="tercio_in">
						<?php
						$args = array(
							'posts_per_page' => 1,
							'category_name'	 => 'branding-femenino'
						);
						query_posts( $args );
						while ( have_posts() ) : the_post(); ?>
							<a href="<?php echo home_url('/category/articulos/branding-femenino/'); ?>"><?php the_post_thumbnail( 'breading' ); ?></a>
						<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->

				<div class="un_tercio tercio tercio_responsive margen_responsive2">

					<a href="<?php echo home_url('/category/articulos/branding-masculino/'); ?>"><h2 style="background: #c0d72f">Branding Masculino</h2></a>

					<div class="tercio_in">
						<?php
						$args = array(
							'posts_per_page' => 1,
							'category_name'	 => 'branding-masculino'
						);
						query_posts( $args );
						while ( have_posts() ) : the_post(); ?>
							<a href="<?php echo home_url('/category/articulos/branding-masculino/'); ?>"><?php the_post_thumbnail( 'breading' ); ?></a>
						<?php endwhile; ?>

					</div><!-- tercio_in -->

				</div><!-- tercio -->

				<div class="un_tercio tercio tercio_responsive">

					<a href="<?php echo home_url('/category/articulos/branding-laboral/'); ?>"><h2 style="background: #40c0c4">Branding Laboral</h2></a>

					<div class="tercio_in">
						<?php
						$args = array(
							'posts_per_page' => 1,
							'category_name'	 => 'branding-laboral'
						);
						query_posts( $args );
						while ( have_posts() ) : the_post(); ?>
							<a href="<?php echo home_url('/category/articulos/branding-laboral/'); ?>"><?php the_post_thumbnail( 'breading' ); ?></a>
						<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->

				<div class="un_tercio tercio tercio_responsive margen_responsive2">

					<a href="<?php echo home_url('/category/articulos/branding-y-etiqueta/'); ?>"><h2 style="background: #acb0b6">Branding y Etiqueta</h2></a>

					<div class="tercio_in">

						<div class="tercio_in branding_p">
							<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'branding-y-etiqueta'

							);
							query_posts( $args );
							while ( have_posts() ) : the_post(); ?>
							<?php $ids_checked[] = $post->ID; ?>
								<a href="<?php echo home_url('/category/branding-y-etiqueta/'); ?>"><?php the_post_thumbnail( 'breading' ); ?></a>
							<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio_in -->

				</div><!-- tercio -->



				<div class="un_tercio tercio tercio_responsive">

					<a href="<?php echo home_url('/category/articulos/salud-y-bienestar/'); ?>"><h2 style="background: #f58c45">Salud y Bienestar</h2></a>

					<div class="tercio_in">
						<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'salud-y-bienestar'

							);
							query_posts( $args );
							while ( have_posts() ) : the_post(); ?>
							<?php $ids_checked[] = $post->ID; ?>
								<a href="<?php echo home_url('/category/salud-y-bienestar/'); ?>"><?php the_post_thumbnail( 'breading' ); ?></a>
							<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->
				<div class="un_tercio tercio tercio_responsive margen_responsive2">

					<a href="<?php echo home_url('/category/articulos/estilo-de-vida/'); ?>"><h2 style="background: #e21a23">Estilo de Vida</h2></a>

					<div class="tercio_in">
						<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'estilo-de-vida',
								'post__not_in'   => $ids_checked
							);
							query_posts( $args );
							while ( have_posts() ) : the_post(); ?>
								<a href="<?php echo home_url('/category/articulos/estilo-de-vida/'); ?>"><?php the_post_thumbnail( 'un_tercio' ); ?></a>
							<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->


				<div class="izq bread_atriculos">

					<div class="dos_tercios tercio diccionario_de_moda">

						<h2 class="brand_verde">Diccionario de Moda y Estilo</h2>

						<div id="carusel-moda">
							<a class="flechas flecha_carrusel prev" href="#"></a>
							<div class="viewport">
								<ul class="overview " id="carousel_uls">
					            <?php
					            $args = array(
					            	'posts_per_page' => 50,
					            	'category_name'	 => 'diccionario',
					            	'orderby'=>'rand'
					            );
					            query_posts($args);
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

					</div><!-- dos_tercios -->

					<div id="videos" class="dos_tercios tercio ">
						<a href = '<?php echo home_url("/category/videos/") ?>'><h2 class="brand_verde">Videos</h2></a>

						<div id="slider_videos">

							<div class="videos_ventana videos_breading
							cycle-slideshow"
								data-cycle-fx="scrollHorz"
								data-cycle-pause-on-hover="true"
								data-cycle-speed="200"
								data-cycle-pager=".videos_nav_wrap"
								data-cycle-slides="> div"
							>
								<?php
								$args = array(
								'posts_per_page' => 3,
								'category_name'	 => 'videos'
								);
								query_posts($args);
								while ( have_posts() ) : the_post(); ?>
									<div class="iframe_wrap ">
										<?php
										$video_url = get_post_meta($post->ID, 'dbt_link_video', true);
										?>
										<iframe src="http://www.youtube.com/embed/<?php echo $video_url; ?>"></iframe>
									</div><!--iframe_wrap-->
								<?php endwhile; ?>

							</div><!-- videos_ventana -->

							<div class="videos_nav_wrap">

							</div><!-- videos_nav_wrap -->

						</div><!-- slider_videos -->

					</div><!-- dos_tercios -->

				</div><!-- izq -->

				<div class="der">

					<div class="un_tercio tercio ad ban_branding">
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
					</div><!-- tercio -->

					<br />
					<br />
					<br />

					<div id="twitter_wid" class="un_tercio tercio ">
						<a class="twitter-timeline" href="https://twitter.com/ConsejosdeAna" data-widget-id="346712873344573440">Tweets by @ConsejosdeAna</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div><!-- twitter -->
				</div><!-- der -->
			</div><!-- content -->

<?php get_footer(); ?>