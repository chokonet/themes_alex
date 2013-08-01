<?php get_header();
$sexo = $_POST['sexo'];
echo $sexo;
 ?>

		<?php if ($sexo == ""): ?>
			<div id="popup_hm">
				<img src="<?php bloginfo('template_url'); ?>/images/logo_ana.png" id="logo_ana">
				<p>Antes de entrar al sitio selecciona una opción</p>
				<img src="<?php bloginfo('template_url'); ?>/images/mujer.png" id="mujer">
				<img src="<?php bloginfo('template_url'); ?>/images/hombre.png" id="hombre">
				<form method="POST" action="index.php">
					<input type="radio" name="sexo" value="mujer" id="radio1">
					<label for="radio1" id="rad_mujer"></label>
					<input type="radio" name="sexo" value="hombre" id="radio2">
					<label for="radio2" id="rad_hombre"></label>
					<input type="submit" value="Entrar" id="popup_hm_entrar">
				</form>
			</div>
			<div id="popup_hm_fondo"></div>
		<?php endif; ?>
		<div id="slider_wrap_100" class="slider_wrap_home">
			<div id="slider_wrap">

				<h2>Artículos</h2>
				<ul id="slider">
					<?php
					$numero_checked = 0;
					$loop = new WP_Query( array( 'posts_per_page' => '5') );
					while (have_posts()) : the_post() ; $meta = get_post_meta( get_the_ID(), 'dbt_slide', true );
					$ids_checked[] = $post->ID; 
					?>

					<?php if( checked( $meta, 1, false ) ) : ?>

						<li>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider_home'); ?></a>
							<div class="slider_info">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php
								$excerpt = get_the_content();
  								$excerpt = string_limit_words($excerpt,15);
								?>
								<p><?php echo $excerpt; ?>…</p>
								<div class="mas"><a href="<?php the_permalink(); ?>"><p>Leer</p></a></div><!-- mas -->
							</div><!-- slider_info -->
						</li>

					<?php
						$numero_checked++;
						endif;
						endwhile;

						$per_page = 5 - $numero_checked;

					$args = array(
						'posts_per_page' => $per_page,
						'post__not_in'	 => $ids_checked 
					);
					query_posts($args);
					while(have_posts()) : the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider_home'); ?></a>
							<div class="slider_info">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php
								$excerpt = get_the_content();
  								$excerpt = string_limit_words($excerpt,15);
								?>
								<p><?php echo $excerpt; ?>…</p>
								<div class="mas"><a href="<?php the_permalink(); ?>"><p>Leer</p></a></div><!-- mas -->
							</div><!-- slider_info -->
						</li>
				<?php endwhile; ?>





				</ul>
				<div id="flechas_slider">
					<div id="slider_prev" class="flechas" ></div>
					<div id="slider_next" class="flechas" ></div>
				</div><!-- flechas_slider -->

			</div><!-- slider_wrap -->
			</div><!-- slider_wrap 100 -->

			<div id="content">

				<div class="izq">

					<div class="un_tercio tercio asesorias">

						<a href="#"><h3>Asesorías</h3></a>

						<div class="tercio_in fondo">

							<p>Tenemos servicios de asesorías especializados para hacerte proyectar la imagen que deseas según tus objetivos.</p>
							<ul>
								<li><a href="<?php echo home_url('/servicios-de-asesoria-presencial/'); ?>">Asesoría Presencial</a></li>
								<li><a href="<?php echo home_url('/servicio-de-asesoria-en-linea/'); ?>">Asesoría en Línea</a></li>
								<li><a href="<?php echo home_url('/asesoria-vip/'); ?>">Asesoría VIP</a></li>
							</ul>

							<!-- <img class="img_asesorias" src="<?php bloginfo('template_url'); ?>/images/asesorias.jpg" /> -->

						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div class="un_tercio tercio">

						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/conferencias/'); ?>"><h3>Conferencias</h3></a>

						<div class="tercio_in">

							<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'conferencias'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post();?>
								<a href="<?php echo home_url('/category/ana-vasquez-colmenares/conferencias/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
							<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->
				</div><!-- izq -->

				<div class="der">

					<div class="un_tercio tercio preguntale">
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h3 class="preguntale">Consulta a Ana</h3></a>
					</div><!-- un_tercio -->

					<div class="un_tercio tercio ad">
						<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
					</div><!-- tercio -->

				</div><!-- der -->

				<div class="tres_tercios tercio diccionario_de_moda">

					<h3>Diccionario de Moda y Estilo</h3>
					<div id="carusel-diccionario">
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
					            	<?php
					            	$titulo = get_the_title();
					            	$letra = substr($titulo, 0, 1);
					            	$letra = strtolower($letra);
					            	?>
									<li>
										<a href='<?php echo home_url("/category/diccionario/") ?>?letra=<?php echo $letra; ?>'>
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

				<div id="videos" class="dos_tercios tercio">
					<a href='<?php echo home_url("/category/videos/") ?>'><h3>Videos</h3></a>

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

						</div><!-- slider_videos -->

					</div><!-- slider_videos -->

				</div><!-- dos_tercios -->

				<div id="twitter_wid" class="un_tercio tercio twitter_border">
					<a class="twitter-timeline" href="https://twitter.com/ConsejosdeAna" data-widget-id="346712873344573440">Tweets by @ConsejosdeAna</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


				</div><!-- twitter -->
			</div><!-- content -->

<?php get_footer(); ?>