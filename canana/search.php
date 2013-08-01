<?php get_header(); ?>
<div id="contenido">
	<div class="bordeBlanco">
		<div class="tema1" id="sobreC">
			<div class="bordeBlanco centrado">
				<div class="tituloTema"><?php if (qtrans_getLanguage() == 'es') { ?>BÚSQUEDA<?php } else { ?>SEARCH<?php }; ?>
				</div>
			</div>
			
			<div class="contenidoTemaCatalogo">
			<span class="textoBuscado"><?php if (qtrans_getLanguage() == 'es') { ?>Resultados para: <?php } else { ?>Results for: <?php }; ?><?php echo $_GET['s']; ?></span><br />
			<?php
			$i=0;
			if (have_posts()){
			 while ( have_posts() ) : the_post(); 
			 $i++;
	 $metabox_datos =  get_post_custom(); 

$attachments = get_children(array('post_parent' => $post->ID,
						'post_status' => 'inherit',
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'order' => 'ASC',
						'orderby' => 'menu_order ID'));
    
?>
<a href="<?php the_permalink(); ?>">
			<div class="peliculaCatalogo" id="pelicula<?php echo $i; ?>">
				<div class="catalogoContiene">
					<div class="infoPelicula"><span class="tituloPelicula"><?php the_title(); ?></span><?php 
							  $valor_meta = $metabox_datos ['linea2titulo'];
  foreach ( $valor_meta as $key => $valor )
    echo $valor;
							
						?> / <?php 
							  $valor_meta = $metabox_datos ['pais'];
  foreach ( $valor_meta as $key => $valor )
    echo $valor;
							
						?></div>

    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="173" height="247" class="flotaDerecha"/>
						<?php //the_post_thumbnail( 'archive-catalogo' ); ?>
						<?php //} }; ?>
				</div>
			</div>
</a>
		<?php endwhile; } else { if (qtrans_getLanguage() == 'es') { echo "<div class='txtBusqueda'>No se encontraron resultados para: <span class='resaltado'>" . $_GET['s'] . "</span> intenta nuevamente</div>"; } else {
		echo "<div class='txtBusqueda'>No matches for: <span class='resaltado'>" . $_GET['s'] . "</span> try again</div>";
		};?><div class="nuevaBusqeda">
			
			
		</div><?php }; ?>

									<div class="clear"></div>
					</div>
		</div>
		<div class="clear"></div>
   </div>	
<div style="clear"></div>
<?php get_footer(); ?>