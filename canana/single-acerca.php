<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
	 $metabox_datos =  get_post_custom();
	 $lang = qtrans_getLanguage();
?>
<div id="menuAcerca">
	<div id="menuSeccion">
		<ul>
			<li>
				<a href="<?php echo qtrans_convertURL( home_url('/acerca/sobre-canana/') ); ?>" hreflang="<?php echo $lang; ?>">
					<?php echo ( $lang == 'es' ? 'Sobre Canana' : 'About'); ?>
				</a>
			</li>
			<li>
				<a href="<?php echo qtrans_convertURL( home_url('/cine/') ); ?>" hreflang="<?php echo $lang; ?>">
					<?php echo ( $lang == 'es' ? 'Cine' : 'Film'); ?>
				</a>
			</li>
			<li>

				<a href="<?php echo qtrans_convertURL( home_url('/tv/') ); ?>" hreflang="<?php echo $lang; ?>">
					TV
				</a>
			</li>
			<li>
				<a href="<?php echo qtrans_convertURL( home_url('/branded-content/') ); ?>" hreflang="<?php echo $lang; ?>">
					Branded Content
				</a>
			</li>
			<li class="btnExterno">
				<?php $link_mundial =  get_option('canana_link_mundial') ?>
				<a href="<?php echo $link_mundial  ?>" target="_blank">
					Mundial
				</a>
			</li>
			<li class="btnExterno">
				<?php $link_ambulante =  get_option('canana_link_ambulante') ?>
				<a href="<?php echo $link_ambulante; ?>" target="_blank">
					Ambulante
				</a>
			</li>
		</ul>
	</div><!-- menuSeccion -->
</div><!-- menuAcerca -->

<?php
$titulo = get_the_title();

if ( $titulo === 'ABOUT CANANA' || $titulo === 'SOBRE CANANA' ){ ?>
	
	<div id="contenido">
		<div class="bordeBlanco" id="acercaPost">
			<div class="tema1 extraPad" id="acerca_cine">
				<div class="bordeBlanco centrado">
					<div class="tituloTema">
						<h3><?php echo $titulo; ?></h3>
					</div><!-- tituloTema -->
				</div><!-- bordeBlanco -->

				<div class="contenidoTemaSobre">
					<div class="contenidoTema">

						<div class="center">
							<?php the_post_thumbnail(); ?>
						</div><!-- center -->
						<div class="below">
							<?php the_content(); ?>
						</div><!-- below -->

					</div><!-- contenidoTema -->
					<div class="clear"></div>
				</div><!-- contenidoTemaSobre -->
			</div><!-- extraPad -->
		</div><!-- bordeBlanco -->
	</div><!-- contenido -->
<?php } else {
// End if about

	 ?>

<div id="contenido">
	<div class="contenidoTemaPelicula">
		<div class="col1Datos">
			<div id="theimg">
			<?php the_post_thumbnail( 'single-catalogo', array('class' => 'imagenPelicula') ); ?>
			</div>
			<div class="colSinopsis">

				<div class="bordeBlanco">

					<div class="tituloDatos">

						<span class="tituloIndividual">
							<h1><?php the_title(); ?></h1>
						</span>

						<span class="datos">
							<?php
							if ( isset($metabox_datos ['linea2titulo']) ){
								$valor_meta = $metabox_datos ['linea2titulo'];
								foreach ( $valor_meta as $key => $valor ){
									echo $valor;
								}
							}
							?>
						</span>

						<span class="pais">
							<?php
							if ( isset($metabox_datos ['pais']) ){
								$valor_meta = $metabox_datos ['pais'];
								foreach ( $valor_meta as $key => $valor ){
									echo $valor;
								}
							}
							?>
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
							if(get_the_terms(get_the_ID(), 'cine')){
								$postlist_args = array(
									'posts_per_page' => -1,
									'post_type' => 'acerca',
									'cine'		=> 'producciones',
									'order'		=> 'ASC'
								);
							}else{
								$postlist_args = array(
									'posts_per_page' => -1,	
									'post_type' => 'acerca',
									'tv'		=> 'producciones',
									'order'		=> 'ASC'
								);
							}

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
				</div><!-- borde3 -->
			</div><!-- menuSeccion -->


			<div class="infoExtra oculto" id="trailer">
				<?php $valor_meta = $metabox_datos ['trailer'];
				foreach ( $valor_meta as $key => $valor ){?>

					<?php
					// echo '<pre>';
					// 	print_r($valor_meta);
					// echo '</pre>';

					//echo 'valor_meta: '.$valor_meta.'<br />';
					// echo 'key: '.$key.'<br />';
					//echo 'valor: '.$valor.'<br />';

					?>

					<iframe width="560" height="315" src="http://<?php echo $valor; ?>" frameborder="0" allowfullscreen=""></iframe>
				<?php } ?>

				<div style="clear"></div>
			</div><!-- trailer -->


			<div class="infoExtra oculto" id="compartir">
				<div class="fb-like" data-send="false" data-layout="button_count" data-width="55" data-show-faces="false"></div>
				<a href="https://twitter.com/share" class="twitter-share-button" data-related="jasoncosta" data-lang="en" data-size="medium" data-count="none">Tweet</a>
				<?php
				if ( isset($metabox_datos ['redes']) ){
					$valor_meta = $metabox_datos ['redes'];
					foreach ( $valor_meta as $key => $valor ){
						echo $valor;
					}
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
								<?php if ( isset($metabox_datos ['director']) ){ ?>
									<td>Director:</td>
									<td>
										<?php
											$valor_meta = $metabox_datos ['director'];
											foreach ( $valor_meta as $valor ){ echo $valor; }
										?>
									</td>
								<?php } ?>

							</tr>
							<tr>
								<?php if ( isset($metabox_datos ['escritor']) ){ ?>
									<td>


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
								<?php } ?>
							</tr>
							<tr>
								<?php if ( isset($metabox_datos ['produccion']) ){  ?>
								<td>
									<?php if (qtrans_getLanguage() == 'es') { ?>Producción:<?php } else { ?>Production:<?php }; ?>
								</td>
								<td>
								<?php $valor_meta = $metabox_datos ['produccion'];
									foreach ( $valor_meta as $key => $valor ){
										echo $valor;
									} ?>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<?php if ( isset($metabox_datos ['fotografia']) ){ ?>
								<td>
									<?php if (qtrans_getLanguage() == 'es') { ?>Fotografía:<?php } else { ?>Photography:<?php }; ?>
								</td>
								<td>
									<?php $valor_meta = $metabox_datos ['fotografia'];
									foreach ( $valor_meta as $key => $valor ){ echo $valor; } ?>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<?php if( isset($metabox_datos ['reparto'])){ ?>
								<td>
									<?php if (qtrans_getLanguage() == 'es') { ?>Reparto:<?php } else { ?>Cast:<?php }; ?>
								</td>
								<td>
									<?php $valor_meta = $metabox_datos ['reparto'];
									foreach ( $valor_meta as $key => $valor ){
										echo $valor;
									} ?>
								</td>
								<?php } ?>
							</tr>

						</table>
					</div><!-- bordeTablaFicha2 -->
				</div><!-- bordeTablaFicha1 -->
			</div><!-- bordeBlancoVert -->
		</div><!-- colFicha -->
	</div><!-- contenidoTemaPelicula -->
</div><!-- contenido -->

<?php } ?><!-- End if cine y tv -->


<?php endwhile; ?>

<div class="clear"></div>


<?php get_footer(); ?>


			

