<?php get_header();
$l = isset( $_GET['letra'] ) ? $_GET['letra'] : false; if ($l == ""): $l = 'a'; endif;
$nombre = isset( $_GET['nombre'] ) ? $_GET['nombre'] : false;
		//obtener letra de nombre
			if($nombre != false):
				$nom = $nombre;
				$letra = substr($nom, 0, 1);
				$l = strtolower($letra);
			endif;
?>



		<div id="content">

				<div class="single_izq">
					<div class="tercio">


						<h2 class="brand_verde">Diccionario de moda y estilo</h2>

						<!--<h2 class="brand_verde">Diccionario de moda</h2>-->

						<div class="tri_ana tri_ana_izq"></div>
					</div>

					<div class="single_cont">
						<ul class="letras_ul">
							<?php $url = home_url('/category/diccionario/'); ?>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=a" class="<?php if ($l == 'a'): echo 'selec'; endif;  ?>">A</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=b" class="<?php if ($l == 'b'): echo 'selec'; endif;  ?>">B</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=c" class="<?php if ($l == 'c'): echo 'selec'; endif;  ?>">C</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=d" class="<?php if ($l == 'd'): echo 'selec'; endif;  ?>">D</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=e" class="<?php if ($l == 'e'): echo 'selec'; endif;  ?>">E</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=f" class="<?php if ($l == 'f'): echo 'selec'; endif;  ?>">F</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=g" class="<?php if ($l == 'g'): echo 'selec'; endif;  ?>">G</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=h" class="<?php if ($l == 'h'): echo 'selec'; endif;  ?>">H</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=i" class="<?php if ($l == 'i'): echo 'selec'; endif;  ?>">I</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=j" class="<?php if ($l == 'j'): echo 'selec'; endif;  ?>">J</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=k" class="<?php if ($l == 'k'): echo 'selec'; endif;  ?>">K</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=l" class="<?php if ($l == 'l'): echo 'selec'; endif;  ?>">L</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=m" class="<?php if ($l == 'm'): echo 'selec'; endif;  ?>">M</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=n" class="<?php if ($l == 'n'): echo 'selec'; endif;  ?>">N</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=o" class="<?php if ($l == 'o'): echo 'selec'; endif;  ?>">O</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=p" class="<?php if ($l == 'p'): echo 'selec'; endif;  ?>">P</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=q" class="<?php if ($l == 'q'): echo 'selec'; endif;  ?>">Q</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=r" class="<?php if ($l == 'r'): echo 'selec'; endif;  ?>">R</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=s" class="<?php if ($l == 's'): echo 'selec'; endif;  ?>">S</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=t" class="<?php if ($l == 't'): echo 'selec'; endif;  ?>">T</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=u" class="<?php if ($l == 'u'): echo 'selec'; endif;  ?>">U</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=v" class="<?php if ($l == 'v'): echo 'selec'; endif;  ?>">V</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=w" class="<?php if ($l == 'w'): echo 'selec'; endif;  ?>">W</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=x" class="<?php if ($l == 'x'): echo 'selec'; endif;  ?>">X</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=y" class="<?php if ($l == 'y'): echo 'selec'; endif;  ?>">Y</a></li>
							<li class="letras_li"><a href="<?php echo  $url ?>?letra=z" class="<?php if ($l == 'z'): echo 'selec'; endif;  ?>">Z</a></li>
						</ul>

						<h5 class="letra_gde"><?php echo $l;?></h5>
					<?php
					if($nombre != false):
						$diccionarios2 = mq_get_posts_by_category_diccionary($nombre);

						foreach ($diccionarios2 as $diccionario2): setup_postdata($category2); ?>

							<?php
								$d_id = $diccionario2->ID;
								//echo $d_id;
								$imagen_id = get_post_thumbnail_id( $d_id );
								//echo $imagen_id;
								$imagen_src = wp_get_attachment_image_src( $imagen_id, 'diccionario' );
								//echo $imagen_src[0];
							?>

							<div class="definicion_wrap">
								<h5 class="prin"><?php echo $diccionario2->post_title;?></h5>
								<img class="defi_thumb" src="<?php echo $imagen_src[0]; ?>">
								<?php echo $diccionario2->post_mime_type; ?>
								<div class="definicion">
									<p><?php echo string_limit_words($diccionario2->post_content, 30); ?></p>
								</div>
							</div><!-- definicion_wrap -->
							<?php endforeach; ?>
						<?php endif; ?>
					<?php
					$diccionarios = mq_get_posts_by_category($l);

					foreach ($diccionarios as $diccionario): setup_postdata($category); ?>

						<?php
							$d_id = $diccionario->ID;
							//echo $d_id;
							$imagen_id = get_post_thumbnail_id( $d_id );
							//echo $imagen_id;
							$imagen_src = wp_get_attachment_image_src( $imagen_id, 'diccionario' );
							//echo $imagen_src[0];
						?>

						<div class="definicion_wrap">
							<h5><?php echo $diccionario->post_title;?></h5>
							<img class="defi_thumb" src="<?php echo $imagen_src[0]; ?>">
							<?php echo $diccionario->post_mime_type; ?>
							<div class="definicion">
								<p><?php echo $diccionario->post_content ?></p>
							</div>
						</div><!-- definicion_wrap -->
						<?php endforeach; ?>


						<ul class="dicc_pager link_verde">
							<?php echo get_pagination_links_dicc($l); ?>
						</ul>




					</div><!-- single_cont -->


				</div><!-- single_izq -->


						<div class="single_der">

					<div class="un_tercio tercio preguntale brand_verde">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h2 class="brand_verde">Consulta a Ana</h2></a>
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

		</div><!-- container -->

<?php get_footer(); ?>