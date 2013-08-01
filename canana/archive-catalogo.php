<?php get_header(); ?>

		<div id="contenido">
			<div class="wrapper bordeBlanco">
				<div class="tema1" id="sobreC">

				<div class="bordeBlanco centrado">

					<div class="tituloTema">
						<?php if ( qtrans_getLanguage() == 'es' ) {
							echo 'CATÁLOGO ';
						} else {
							echo 'FILM LIBRARY ';
						}; ?>
					</div><!-- tituloTema -->
				</div><!-- centrado -->

				<div class="contenidoTemaCatalogo">
				<?php
				$seccion = isset($_GET['estrenos']) ? $_GET['estrenos'] : false;
				$args = array(
						'post_type'  	 => 'catalogo',
						'post_status'	 => 'publish',
						'posts_per_page' => -1,
						'order'          => 'DESC'
					);

				$i=0;
				$query = new WP_Query($args);
				while ( $query->have_posts() ) : $query->the_post();

					$i++;
					$metabox_datos = get_post_custom();

					$attachments = get_children(
						array(
							'post_parent'    => $post->ID,
							'post_status'    => 'inherit',
							'post_type'      => 'attachment',
							'post_mime_type' => 'image',
							'order'          => 'ASC',
							'orderby'        => 'menu_order ID'
						)
					); ?>

					<a href="<?php the_permalink(); ?>">
						<div class="peliculaCatalogo pelicula_hover" id="pelicula<?php echo $i; ?>">
							<div class="catalogoContiene">
								<div class="infoPelicula"><span class="tituloPelicula"><?php the_title(); ?></span>

									<?php
									$valor_meta = $metabox_datos['linea2titulo'];
									foreach ( $valor_meta as $key => $valor )
										echo $valor . '/';

									$valor_meta = $metabox_datos ['pais'];
									foreach ( $valor_meta as $key => $valor )
										echo $valor; ?>

								</div><!-- infoPelicula -->
								<?php $meta_now = get_post_meta($post->ID, 'catalogo_datos_cartelera', true ); ?>
								<?php  if ( qtrans_getLanguage() == 'es' ): if ($meta_now != ''):?><img src="<?php echo get_bloginfo('template_url'); ?>/images/now_playing.png" alt="<?php the_title(); ?>" width="173" height="247"  id="now_playing"/><?php endif; endif;?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); ?>
								<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="173" height="247" class="flotaDerecha"/>
							</div><!-- catalogoContiene -->
						</div><!-- peliculaCatalogo -->
					</a>

				<?php endwhile; ?>

				<div class="clear"></div>

			</div><!-- wrapper -->

		</div><!-- contenido -->

		<div class="clear"></div>

	</div>

	<div style="clear"></div>

<?php get_footer(); ?>