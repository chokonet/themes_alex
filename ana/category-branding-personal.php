<?php get_header(); ?>

		<div id="content">

				<div class="tercio">
					<h3 class="brand_verde" >Branding personal</h3>
				</div>

				<div class="un_tercio tercio">

					<a href="<?php echo home_url('/category/articulos/branding-femenino/'); ?>"><h3 style="background: #dc3492">Branding Femenino</h3></a>

					<div class="tercio_in">
						<?php
						$args = array(
							'posts_per_page' => 1,
							'category_name'	 => 'branding-femenino'
						);
						query_posts( $args );
						while ( have_posts() ) : the_post(); ?>
							<a href="<?php echo home_url('/category/articulos/branding-femenino/'); ?>"><?php the_post_thumbnail( 'un_tercio' ); ?></a>
						<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->

				<div class="un_tercio tercio">

					<a href="<?php echo home_url('/category/articulos/branding-masculino/'); ?>"><h3 style="background: #c0d72f">Branding Masculino</h3></a>

					<div class="tercio_in">
						<?php
						$args = array(
							'posts_per_page' => 1,
							'category_name'	 => 'branding-masculino'
						);
						query_posts( $args );
						while ( have_posts() ) : the_post(); ?>
							<a href="<?php echo home_url('/category/articulos/branding-masculino/'); ?>"><?php the_post_thumbnail( 'un_tercio' ); ?></a>
						<?php endwhile; ?>

					</div><!-- tercio_in -->

				</div><!-- tercio -->

				<div class="un_tercio tercio">

					<a href="<?php echo home_url('/category/articulos/branding-laboral/'); ?>"><h3 style="background: #40c0c4">Branding Laboral</h3></a>

					<div class="tercio_in">
						<?php
						$args = array(
							'posts_per_page' => 1,
							'category_name'	 => 'branding-laboral-2'
						);
						query_posts( $args );
						while ( have_posts() ) : the_post(); ?>
							<a href="<?php echo home_url('/category/articulos/branding-laboral-2/'); ?>"><?php the_post_thumbnail( 'un_tercio' ); ?></a>
						<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->

				<div class="un_tercio tercio">

					<a href="<?php echo home_url('/category/articulos/branding-y-etiqueta/'); ?>"><h3 style="background: #acb0b6">Branding y Etiqueta</h3></a>

					<div class="tercio_in">

						<div class="tercio_in">
							<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'branding-y-etiqueta'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post(); ?>
								<a href="<?php echo home_url('/category/articulos/branding-y-etiqueta/'); ?>"><?php the_post_thumbnail( 'un_tercio' ); ?></a>
							<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio_in -->

				</div><!-- tercio -->



				<div class="un_tercio tercio">

					<a href="<?php echo home_url('/category/articulos/tu-vida-en-bienestar/'); ?>"><h3 style="background: #f58c45">Tu vida en Bienestar</h3></a>

					<div class="tercio_in">
						<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'tu-vida-en-bienestar'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post(); ?>
								<a href="<?php echo home_url('/category/articulos/tu-vida-en-bienestar/'); ?>"><?php the_post_thumbnail( 'un_tercio' ); ?></a>
							<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->
				<div class="un_tercio tercio">

					<a href="<?php echo home_url('/category/articulos/estilo-de-vida/'); ?>"><h3 style="background: #e21a23">Estilo de Vida</h3></a>

					<div class="tercio_in">
						<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'estilo-de-vida'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post(); ?>
								<a href="<?php echo home_url('/category/articulos/estilo-de-vida/'); ?>"><?php the_post_thumbnail( 'un_tercio' ); ?></a>
							<?php endwhile; ?>
					</div><!-- tercio_in -->

				</div><!-- tercio -->


				<div class="izq">

					<div class="dos_tercios tercio diccionario_de_moda">

						<h3 class="brand_verde">Diccionario de Moda y Estilo</h3>

						<div id="carusel-moda">
							<a class="flechas flecha_carrusel prev" href="#"></a>
							<div class="viewport">
								<ul class="overview">
					            <?php
					            $args = array(
					            	'posts_per_page' => 50,
					            	'category_name'	 => 'diccionario'
					            );
					            query_posts($args);
					            while ( have_posts() ) : the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>">
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

					<div id="videos" class="dos_tercios tercio">
						<h3 class="brand_verde">Videos</h3>

						<div id="slider_videos">

							<div class="videos_ventana
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
										<iframe src="http://www.youtube.com/embed/<?php echo $video_url; ?>" frameborder="0" width="420" height="315"></iframe>
									</div><!--iframe_wrap-->
								<?php endwhile; ?>

							</div><!-- videos_ventana -->

							<div class="videos_nav_wrap">

							</div><!-- videos_nav_wrap -->

						</div><!-- slider_videos -->

					</div><!-- dos_tercios -->

				</div><!-- izq -->

				<div class="der">

					<div class="un_tercio tercio ad">
						<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
					</div><!-- tercio -->

					<br />
					<br />
					<br />

					<div id="twitter_wid" class="un_tercio tercio">
						<a class="twitter-timeline" href="https://twitter.com/anavasquezc" data-widget-id="339810405939552258">Tweets by @anavasquezc</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

					</div><!-- twitter -->
				</div><!-- der -->
			</div><!-- content -->

<?php get_footer(); ?>