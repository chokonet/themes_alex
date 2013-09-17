<?php get_header();

$sexo = isset( $_POST['sexo'] ) ? $_POST['sexo'] : false;

if (isset($_POST['sexo']) and !isset($_COOKIE["sexo"]) ){
	update_gender_count($_POST['sexo']);
}

if ( isset($_COOKIE["sexo"]) ){
	$sexo = $_COOKIE["sexo"];
} ?>

		<?php if ( !isset($_COOKIE["sexo"]) ) : ?>
			<div id="popup_hm">
				<img src="<?php echo THEMEPATH ?>/images/select_r.png" id="cierre_pop">
				<img src="<?php echo THEMEPATH ?>/images/logo_ana.png" id="logo_ana">
				<p>Antes de entrar al sitio selecciona una opción</p>
				<img src="<?php echo THEMEPATH ?>/images/mujer.png" id="mujer">
				<img src="<?php echo THEMEPATH ?>/images/hombre.png" id="hombre">
				<form method="POST" action="index.php">
					<input type="radio" name="sexo" value="mujer" id="radio1">
					<label for="radio1" id="rad_mujer"></label>
					<input type="radio" name="sexo" value="hombre" id="radio2">
					<label for="radio2" id="rad_hombre"></label>
					<input type="radio" name="sexo" value="na" id="radio3">
					<label for="radio3" id="rad_na">No mostrar de nuevo</label>
					<input type="submit" value="Entrar" id="popup_hm_entrar">
				</form>
			</div>
			<div id="popup_hm_fondo"></div>
		<?php endif; ?>

		<div id="slider_wrap_100" class="slider_wrap_home">
			<div id="slider_wrap" >
				<h4>Artículos</h4>
				<div id="slider2" >
				<div id="para_slider" >
						<div id="carousel_inner">
							<ul id="carousel_ul">

								<?php
									$numero_checked = 0;
									global $wpdb, $post;
									$posts = $wpdb->get_results(
										"SELECT * FROM $wpdb->posts
											INNER JOIN $wpdb->postmeta ON ID = post_id
												WHERE post_status  = 'publish'
													AND meta_key   = 'dbt_slider_home'
													AND meta_value = '1' LIMIT 5;", OBJECT );

									foreach($posts  as $post) :
										setup_postdata($post);
									$ids_checked[] = $post->ID; ?>

										<li>
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider_home'); ?></a>
											<div class="slider_info">
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<?php
						  							$excerpt = get_the_content();
													$excerpt = string_limit_words($excerpt,10);
												?>
												<p> <?php echo $excerpt; ?>...</p>

												<div class="mas"><a href="<?php the_permalink(); ?>"><p>Leer</p></a></div><!-- mas -->
											</div><!-- slider_info -->
										</li>

									<?php
									$numero_checked++;
									endforeach; ?>
								<?php $per_page = 5 - $numero_checked;
								query_posts(array(
									'posts_per_page' => $per_page,
						            'post__not_in'   => $ids_checked,
								    'post_type'      => 'post',
								    'tax_query'      => array(array('taxonomy' => 'category','field' => 'slug','terms' => array('branding-femenino','branding-masculino','branding-laboral','branding-y-etiqueta','salud-y-bienestar','estilo-de-vida') ) )
								));
								while( have_posts() ) : the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail('slider_home'); ?></a>
										<div class="slider_info">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<?php
					  							$excerpt = get_the_content();
												$excerpt = string_limit_words($excerpt,10);
											?>
											<p> <?php echo $excerpt; ?>...</p>

											<div class="mas"><a href="<?php the_permalink(); ?>"><p>Leer</p></a></div><!-- mas -->
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

			<div class="mnu_branding">
				<a id="rosa" href="<?php echo home_url('/category/articulos/branding-femenino/'); ?>">Branding Femenino</a>
				<a id="verde" href="<?php echo home_url('/category/articulos/branding-masculino/'); ?>">Branding Masculino</a>
				<a id="verde2" href="<?php echo home_url('/category/articulos/branding-laboral/'); ?>">Branding Laboral</a>
				<a id="gris" href="<?php echo home_url('/category/articulos/branding-y-etiqueta/'); ?>">Branding y Etiqueta</a>
				<a id="anaranjado" href="<?php echo home_url('/category/articulos/salud-y-bienestar/'); ?>">Salud y Bienestar</a>
				<a id="rojo" href="<?php echo home_url('/category/articulos/estilo-de-vida/'); ?>">Estilo de Vida</a>

			</div>
			<div id="content">

				<div class="izq">

					<div class="un_tercio tercio tercio">

						<a href="<?php echo home_url('/category/asesorias/'); ?>"><h2>Asesorías</h2></a>

						<div class="tercio_in">
							<?php
							//first get the current category ID
							    $cat_data = get_option("category_44");
							    if (isset($cat_data['img'])){
							        ?>
							        	<a href="<?php echo home_url('/category/asesorias/'); ?>"> <?php echo '<img src="'.$cat_data['img'].'">'; ?></a>
							 <?php } ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div class="un_tercio tercio  " id="un_tercio_conferencias">

						<a href="<?php echo home_url('/category/conferencias/'); ?>"><h2>Conferencias</h2></a>

						<div class="tercio_in">
							<?php
							//first get the current category ID
							    $cat_data = get_option("category_2497");
							    if (isset($cat_data['img'])){
							    	?>
							        	<a href="<?php echo home_url('/category/conferencias/'); ?>"> <?php echo '<img src="'.$cat_data['img'].'">'; ?></a>
							<?php }?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->
					<div class="un_tercio tercio margen_responsive margen_home cursos_home" >

						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/cursos/'); ?>"><h2>Cursos</h2></a>

						<div class="tercio_in" id="un_tercio_cursos">

							<?php
							//first get the current category ID
							    $cat_data = get_option("category_45");
							    if (isset($cat_data['img'])){
							        ?>
							        	<a href="<?php echo home_url('/category/ana-vasquez-colmenares/cursos/'); ?>"> <?php echo '<img src="'.$cat_data['img'].'">'; ?></a>
							 <?php } ?>

						</div><!-- tercio_in -->

						<div class="tercio_cursos_home">
							<?php
							//first get the current category ID
							    $cat_data = get_option("category_45");
							    if (isset($cat_data['img_extra'])){
							        ?>
							        	<a href="<?php echo home_url('/category/ana-vasquez-colmenares/cursos/'); ?>"> <?php echo '<img src="'.$cat_data['img_extra'].'">'; ?></a>
							 <?php } ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->
				</div><!-- izq -->


				<div class="tres_tercios tercio diccionario_de_moda">

					<h2>Diccionario de Moda y Estilo</h2>
					<div id="carusel-diccionario">
						<a class="flechas flecha_carrusel prev" href="#"></a>
						<div class="viewport">
							<ul class="overview" id="carousel_uls">
								<?php query_posts(array(
									'posts_per_page' => 50,
									'category_name'	 => 'diccionario',
									'orderby'=>'rand'
								));
								while ( have_posts() ) : the_post();?>

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
				<div class="der">

					<div class="un_tercio tercio preguntale">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h2 class="preguntale">Consulta a Ana</h2></a>
						<img class="preguntale_img" src="<?php echo THEMEPATH ?>/images/preguntale.png">
					</div><!-- un_tercio -->

					<div class="un_tercio tercio ad">
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

				</div><!-- der -->

				<div id="videos" class="dos_tercios tercio">
					<a href='<?php echo home_url("/category/videos/") ?>'><h2>Videos</h2></a>

					<div id="slider_videos">

						<div class="videos_ventana
							cycle-slideshow"
								data-cycle-fx="scrollHorz"
								data-cycle-pause-on-hover="true"
								data-cycle-speed="200"
								data-cycle-pager=".videos_nav_wrap"
								data-cycle-slides="> div"
							>
								<?php query_posts($args = array(
									'post_status'    => 'publish',
									'posts_per_page' => 3,
									'category_name'	 => 'videos'
								));
								while ( have_posts() ) : the_post(); ?>
									<div class="iframe_wrap ">
										<?php $video_url = get_post_meta($post->ID, 'dbt_link_video', true); ?>
										<iframe src="http://www.youtube.com/embed/<?php echo $video_url; ?>" frameborder="0" width="100%" height="100%"></iframe>
									</div><!--iframe_wrap-->
								<?php endwhile; ?>

						</div><!-- videos_ventana -->

						<div class="videos_nav_wrap">

						</div><!-- slider_videos -->

					</div><!-- slider_videos -->

				</div><!-- dos_tercios -->

				<div id="twitter_wid" class="un_tercio tercio twitter_border twitter_home">
					<a class="twitter-timeline" href="https://twitter.com/ConsejosdeAna" data-widget-id="346712873344573440">Tweets by @ConsejosdeAna</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div><!-- twitter -->
			</div><!-- content -->

<?php get_footer(); ?>