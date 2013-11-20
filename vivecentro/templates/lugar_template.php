<div class="content_lugar lugar-in-recorrido clearfix">
	
		<?php
			define('WP_USE_THEMES', false);  
			require_once('../../../../wp-load.php');
		?>
		<!-- MAPAS -->

	<div class="header"><div class="pleca"></div></div>
	<div class="twoCols">

		<div class="sliderContainer">
			<div class="big_viewport">
				<?php echo get_the_post_thumbnail( $_POST['ID'], 'cuadrado_grande' ); ?>
			</div>
			<ul class="imgStrip">
				<?php
				$categorias =  wp_get_post_terms($_POST['ID'], 'categorias');
				$zonas =  wp_get_post_terms($_POST['ID'], 'zonas');
				$attachments = get_posts( array(
		            'post_type'      => 'attachment',
		            'posts_per_page' => -1,
		            'post_parent'    => $_POST['ID'],
		            'order'          => ASC
		        ) );

		        if ( $attachments ) {
		            foreach ( $attachments as $index => $attachment ) {
		            	$img_url = wp_get_attachment_image_src($attachment->ID, 'cuadrado_grande');
		            	echo ($index === 0) ? '<li class="selected"><a href=""><img src="'.$img_url[0].'"></a></li>'
		            								: '<li><a href=""><img src="'.$img_url[0] .'"></a></li>';
		            }
		        }

		         $latlong = get_post_meta($_POST['ID'], 'latlong', true);

				?>

				<input id="lat_long" type="hidden" value="<?php echo $latlong; ?>">
				<input id="post_id" type="hidden" value="<?php echo $_POST['ID']; ?>">
				<input id="post_title" type="hidden" value="<?php echo $_POST['post_title']; ?>">
			</ul>
		</div><!-- sliderContainer -->

		<div class="mapContainer">
			
			<div id="map-canvas-inlugar">
			</div><!-- mapContainer -->

		</div><!-- end .twoCols -->

</div> <!-- end content_lugar -->

<div class="twoCols">
			<h1><?php $_POST['post_title']; ?></h1>
			<div class="descripcion">
				<?php $_POST['post_content']; ?>
			</div>
			<p><strong>Horario: </strong><?php echo  get_post_meta($_POST['ID'], 'horario', true); ?></p>
			<p><strong>Precio: </strong><?php echo  get_post_meta($_POST['ID'], 'precio', true); ?></p>
			<p><strong>Zona: </strong><?php foreach($zonas as $zona){ echo $zona->name;} ?></p>
			<p><strong>Categoría: </strong><?php foreach($categorias as $categoria){ echo $categoria->name;} ?></p>
			<p><strong>Ubicación: </strong><?php echo  get_post_meta($_POST['ID'], 'ubicacion', true); ?></p>

			<div class="megusta social">
				<h5>Me gusta</h5>
				<a class="like_icon" href="#" data-post_id="<?php $_POST['ID'] ?>"><?php echo numero_favoritos_post($_POST['ID']); ?></a>
			</div><!-- end .megusta -->

			<div class="comparte social clearfix">
				<h5>Comparte</h5>

				<ul>
					<li>
						<a class="fbk comprtirFB"
							data-permalink="<?php the_permalink() ?>"
							data-title="<?php the_title() ?>"
							data-description="<?php the_content(); ?>"
							data-image="<?php attachment_image_url($_POST['ID'], 'thumbnail') ?>">
						</a>
					</li>
					<li><a class="twt" href="#"></a></li>
					<li><a class="tmblr" href="#"></a></li>

				</ul>
			</div><!-- end .comparte -->

			<div class="comenta social">
				<a href="#comments"><h5>Comenta</h5></a>
			</div><!-- end .comenta -->

			
			<div class="navPosts">
				<a class="prev_lugar btnAzul marginRight">Anterior</a>
				<a class="next_lugar btnAzul">Siguiente</a>
			</div><!-- navPosts -->

		</div><!-- end .twoCols -->