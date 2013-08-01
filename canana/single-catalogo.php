<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
	 $metabox_datos =  get_post_custom();
?>

<div id="contenido">
	<div class="contenidoTemaPelicula">
		<div class="col1Datos">
			<?php $attachments = get_children(
					array(
						'post_parent'    => $post->ID,
						'post_status'    => 'inherit',
						'post_type'      => 'attachment',
						'post_mime_type' => 'image',
						'order'          => 'ASC',
						'orderby'        => 'menu_order ID'
					)
			); ?>
			<div class="columna_img_cartelera">
				<!-- En caso de querer usar meta -->
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="237" height="338" class="imagenPelicula" />
				<?php if ( qtrans_getLanguage() == 'es' ):?>
					<div class="cartelera">
						<h1>DÓNDE Y CUÁNDO VERLA</h1>
						<?php echo get_post_meta($post->ID, 'catalogo_datos_cartelera', true ); ?>

					</div>
			    <?php endif; ?>
			</div>

			<div class="colSinopsis">

				<div class="bordeBlanco">

					<div class="tituloDatos">

						<span class="tituloIndividual">
							<h1><?php the_title(); ?></h1>
						</span>

						<span class="datos">
							<?php $valor_meta = $metabox_datos ['linea2titulo'];
							foreach ( $valor_meta as $key => $valor ){
								echo $valor;
							} ?>
						</span>

						<span class="pais">
							<?php $valor_meta = $metabox_datos ['pais'];
							foreach ( $valor_meta as $key => $valor ){
								echo $valor;
							} ?>
						</span>

					</div><!-- tituloDatos -->
				</div><!-- bordeBlanco -->


				<div class="bordeBlanco">
					<div class="txtSinopsis">
						<?php the_content(); ?>
					</div>
				</div><!-- bordeBlanco -->

			</div><!-- colSinopsis -->


			<div class="menuPelicula" id="menuSeccion">

				<div id="borde3">
					<ul>
						<?php
							$postlist_args = array(
								'posts_per_page' => -1,
								'post_type' => 'catalogo',
								'order'		=> 'ASC'
							);

							$postlist = get_posts( $postlist_args );

							$ids = array();
							foreach ($postlist as $thepost) {
							   $ids[] = $thepost->ID;
							}

							//Obtener e imprimir posts anterior y siguiente
							$thisindex = array_search($post->ID, $ids);
							$previd = $thisindex-1;
							$nextid = $thisindex+1;
							$prevlink = get_permalink($ids[$previd]);
							$nextlink = get_permalink($ids[$nextid]);

							// Imprime flecha post anterior si existe
							$lastIndex = sizeof($ids)-1;
							if ( $post->ID != $ids[$lastIndex]) {
							   echo '<li id="btn_prev" rel="prevPost"><a rel="prev" href="' . $nextlink . '">&larr;</a></li>';
							}
						?>

						<li id="btn_trailer" rel="trailer"><a><?php if (qtrans_getLanguage() == 'es') { ?>Ver trailer<?php } else { ?>Trailer<?php }; ?></a></li>
						<li id="btn_compartir" rel="compartir"><a><?php if (qtrans_getLanguage() == 'es') { ?>Compartir<?php } else { ?>Share<?php }; ?></a></li>

						<?php if ( is_user_logged_in() ) {
							global $current_user;
							$selected[] = get_post_meta( $post->ID, '_acceso_usuarios', true );
							$acceso   = in_array($current_user->ID, $selected);
						}

						if( is_user_logged_in() and $acceso ){
							$attachment =  mq_get_press_attachment($post->ID); ?>
							<li id="btn_press" class="presskit_true"><a href="<?php echo $attachment; ?>">Press Kit</a></li>

						<?php }else if ( is_user_logged_in() and !$acceso ){ ?>
							<li id="btn_no_permiso"><a>Press Kit</a></li>
						<?php } else { ?>
							<li id="btn_press" class="open-login-form"><a>Press Kit</a></li>
						<?php }
							// Imprime flecha siguiente post si existe
							if ( $post->ID != $ids[0]) {
							   echo '<li id="btn_next" rel="nextPost"><a rel="next" href="' . $prevlink . '">&rarr;</a></li>';
							}

						?>
					</ul>
				</div>
			</div>


			<div class="infoExtra oculto" id="trailer">
				<?php $valor_meta = $metabox_datos ['trailer'];
				foreach ( $valor_meta as $key => $valor ){
					echo $valor;
				} ?>

				<div style="clear"></div>
			</div><!-- trailer -->


			<div class="infoExtra oculto" id="compartir">
				<div class="fb-like" data-send="false" data-layout="button_count" data-width="55" data-show-faces="false"></div>
				<a href="https://twitter.com/share" class="twitter-share-button" data-related="jasoncosta" data-lang="en" data-size="medium" data-count="none">Tweet</a>
				<?php $valor_meta = $metabox_datos ['redes'];
				foreach ( $valor_meta as $key => $valor ){
					echo $valor;
				} ?>
			</div><!-- compartir -->


			<div class="infoExtra oculto" id="press">
				<?php $valor_meta = $metabox_datos['prensa'];
				foreach ( $valor_meta as $key => $valor ){
					echo $valor;
				} ?>
			</div><!-- press -->

			<div style="clear"></div>

		</div><!-- col1Datos -->

		<div style="clear"></div>


		<div  class="colFicha">

			<div class="bordeBlancoVert">

				<div class="bordeBlanco">

					<span class="tituloFT">
						<?php if (qtrans_getLanguage() == 'es') { ?>
							FICHA TÉCNICA
						<?php } else { ?>
							FACT SHEET
						<?php } ?>
					</span>

				</div><!-- bordeBlanco -->

				<div class="bordeTablaFicha1">

					<div class="bordeTablaFicha2">

						<table id="tablaFicha">
							<tr>
								<td>Director:</td>
								<td>
									<?php $valor_meta = $metabox_datos ['director'];
									foreach ( $valor_meta as $valor ){ echo $valor; } ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php //__('Escrito por:', 'canana'); ?>


									<?php if (qtrans_getLanguage() == 'es') { ?>
										Escrito por:
									<?php } else { ?>
										Writter:
									<?php }; ?>
								</td>
								<td>
									<?php $valor_meta = $metabox_datos ['escritor'];
									foreach ( $valor_meta as $key => $valor ){ echo $valor; } ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php if (qtrans_getLanguage() == 'es') { ?>Producción:<?php } else { ?>Production:<?php }; ?>
								</td>
								<td>
								<?php $valor_meta = $metabox_datos ['produccion'];
									foreach ( $valor_meta as $key => $valor ){
										echo $valor;
									} ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php if (qtrans_getLanguage() == 'es') { ?>Fotografía:<?php } else { ?>Photography:<?php }; ?>
								</td>
								<td>
									<?php $valor_meta = $metabox_datos ['fotografia'];
									foreach ( $valor_meta as $key => $valor ){ echo $valor; } ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php if (qtrans_getLanguage() == 'es') { ?>Reparto:<?php } else { ?>Cast:<?php }; ?>
								</td>
								<td>
									<?php $valor_meta = $metabox_datos ['reparto'];
									foreach ( $valor_meta as $key => $valor ){
										echo $valor;
									} ?>
								</td>
							</tr>

						</table>
					</div>
				</div>

			</div>

		</div>

	</div>
<?php endwhile; ?>

<?php //get_footer();
?>
<div class="clear"></div>

<?php get_footer(); ?>