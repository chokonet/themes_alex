<?php get_header(); ?>
<?php $lang = qtrans_getLanguage(); ?>
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


<div id="contenido">

			<div class="bordeBlanco" id="acercaPost">
				<div class="tema1 extraPad" id="acerca_cine">
					<div class="bordeBlanco centrado">
						<div class="tituloTema">
							<h3>TV</h3>
						</div><!-- tituloTema -->
					</div><!-- bordeBlanco -->

					<div class="contenidoTemaSobre">
						<div class="contenidoTema">
							<?php
							$args = array(
								'post_type' 	 => 'acerca',
								'tv'			 => 'descripcion',
								'posts_per_page' => 1,
								'order'			 => 'DESC'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post();
								the_content();
							endwhile;
							?>
						</div><!-- contenidoTema -->
						<div class="clear"></div>
					</div><!-- contenidoTemaSobre -->

					<div class="bordeBlanco centrado">
						<div class="tituloTema">
							<h3><?php echo ( $lang == 'es' ? 'Producciones' : 'Productions'); ?></h3>
						</div><!-- tituloTema -->
					</div><!-- bordeBlanco -->

					<div class="contenidoTemaCatalogo pagina">
						<?php
						$args = array(
							'post_type'  	 => 'acerca',
							'tv'			 => 'producciones',
							'posts_per_page' => -1,
							'order'			 => 'DESC'
						);

						$query_cine_producciones = new WP_Query($args);
						while ( $query_cine_producciones->have_posts() ) : $query_cine_producciones->the_post();

							$metabox_datos = get_post_custom();
							// echo '<pre>';
							// 	print_r($metabox_datos);
							// echo '</pre>';

							$trailer = $metabox_datos['trailer'];

							?>

							<a class="fancybox-media" href="<?php the_permalink(); ?>">
								<div class="peliculaCatalogo pelicula_hover" id="pelicula<?php $post->ID; ?>">
									<div class="catalogoContiene">
										<div class="infoPelicula">
											<span class="tituloPelicula"><?php the_title(); ?></span>

											<?php
											$valor_meta_linea = $metabox_datos['linea2titulo'];
											foreach ( $valor_meta_linea as $key => $valor ){
												echo $valor . '/';
											}

											$valor_meta_pais = $metabox_datos ['pais'];
											foreach ( $valor_meta_pais as $key => $valor ){
												echo $valor;
											}
											
											// $valor_meta_dir = $metabox_datos ['director'];
											// foreach ( $valor_meta_dir as $key => $valor ){
											// 	echo '\n' . $valor;
											// }
											?>

										</div><!-- infoPelicula -->

										<?php the_post_thumbnail( 'medium' ); ?>
									</div><!-- catalogoContiene -->
								</div><!-- peliculaCatalogo -->
							</a>


						<?php endwhile; ?>
					</div><!-- contenidoTemaCatalogo -->

					<div class="bordeBlanco centrado">
						<div class="tituloTema">
							<h3><?php echo ( $lang == 'es' ? 'En Desarrollo' : 'Developement'); ?></h3>
						</div><!-- tituloTema -->
					</div><!-- bordeBlanco -->

					<div class="contenidoTemaCatalogo pagina">
						<?php
						$args = array(
							'post_type'  	 => 'acerca',
							'tv'			 => 'en-desarrollo',
							'posts_per_page' => -1,
							'order'			 => 'DESC'
						);

						$query_cine_producciones = new WP_Query($args);
						while ( $query_cine_producciones->have_posts() ) : $query_cine_producciones->the_post();

							$metabox_datos = get_post_custom();
							// echo '<pre>';
							// 	print_r($metabox_datos);
							// echo '</pre>';
							?>

							<div class="peliculaCatalogo pelicula_hover" id="pelicula<?php $post->ID; ?>">
								<div class="catalogoContiene no_link">
									<div class="infoPelicula"><span class="tituloPelicula"><?php the_title(); ?></span>

										<?php
										$valor_meta_linea = $metabox_datos['linea2titulo'];
										foreach ( $valor_meta_linea as $key => $valor ){
											echo $valor . '/';
										}

										$valor_meta_pais = $metabox_datos ['pais'];
										foreach ( $valor_meta_pais as $key => $valor ){
											echo $valor;
										}
										?>

									</div><!-- infoPelicula -->

									<?php the_post_thumbnail( 'medium' ); ?>
								</div><!-- catalogoContiene -->
							</div><!-- peliculaCatalogo -->
						<?php endwhile; ?>
					</div><!-- contenidoTemaCatalogo -->

				</div><!-- tema -->
			</div><!-- bordeBlanco -->

</div><!-- contenido -->
<div style="clear"></div>
<?php get_footer(); ?>