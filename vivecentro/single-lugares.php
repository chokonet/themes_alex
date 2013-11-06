<?php get_header(); ?>

	<div class="navegador zonas">
		<?php get_template_part('templates/zonas', 'navegador'); ?>
	</div>

	<?php
		if(have_posts()): while(have_posts()): the_post();
		$categorias =  wp_get_post_terms($post->ID, 'categorias');
		$zonas =  wp_get_post_terms($post->ID, 'zonas');
	 ?>

	<div class="content_lugar scrollIt">
		<div class="header"><div class="pleca"></div></div>
		<div class="twoCols">

			<div class="sliderContainer">
				<div class="big_viewport"><?php the_post_thumbnail( 'cuadrado_grande' ); ?></div>
				<ul class="imgStrip">
					<?php
					 $attachments = get_posts( array(
			            'post_type'      => 'attachment',
			            'posts_per_page' => -1,
			            'post_parent'    => $post->ID,
			            'order'          => ASC
			        ) );

			        if ( $attachments ) {
			            foreach ( $attachments as $index=>$attachment ) {
			            	$img_url = wp_get_attachment_image_src($attachment->ID, 'cuadrado_grande');
			            	echo ($index === 0) ? '<li class="selected"><a href=""><img src="'.$img_url[0].'"></a></li>'
			            								: '<li><a href=""><img src="'.$img_url[0] .'"></a></li>';
			            }
			        }

					?>
				</ul>
			</div><!-- sliderContainer -->

			<div class="mapContainer">
				<? // SCRIPT MAPA // ?>
				<script type="text/javascript">
			    	function initialize() {

			    		var styles = [
						    {
						      stylers: [

						        { saturation: 10 }
						      ]
						    },{
						      featureType: "all",
						      elementType: "labels",
						      stylers: [
						        { visibility: "off" }
						      ]
						    },{
						      featureType: "road",
						      elementType: "geometry",
						      stylers: [
						        { visibility: "on" },
						        { hue: "#e5b3b2" },
						        { weight: 1.5},
						        { saturation: 20 }
						      ]
						    },{
						      featureType: "landscape",
						      elementType: "all",
						      stylers: [
						      	{ hue: "#ffffff" },
						      	{ saturation: 0 },
						        { visibility: "simplified" }
						      ]
						    }
						  ];

						var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

				      	var myLatLong = new google.maps.LatLng(<?php echo get_post_meta($post->ID, 'latlong', true); ?>);

				        var mapOptions = {
					        center: myLatLong,
					        zoom: 16,
					        mapTypeControlOptions: {
									mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
								}
							};


				        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

				        map.mapTypes.set('map_style', styledMap);
						map.setMapTypeId('map_style');

				        var marker = new google.maps.Marker({
					      position: myLatLong,
					      map: map,
					      title:"<?php the_title(); ?>"
					  });

			    	}

			    	google.maps.event.addDomListener(window, 'load', initialize);
			    </script>
	   			<!-- MAPAS -->
				<div id="map-canvas">
				</div>
			</div><!-- mapContainer -->


		</div><!-- end .twoCols -->

		<div class="twoCols">
			<h1><?php the_title(); ?></h1>
			<div class="descripcion">
				<?php the_content(); ?>
			</div>
			<p><strong>Horario: </strong><?php echo  get_post_meta($post->ID, 'horario', true); ?></p>
			<p><strong>Precio: </strong><?php echo  get_post_meta($post->ID, 'precio', true); ?></p>
			<p><strong>Zona: </strong><?php foreach($zonas as $zona){ echo $zona->name;} ?></p>
			<p><strong>Categoría: </strong><?php foreach($categorias as $categoria){ echo $categoria->name;} ?></p>
			<p><strong>Ubicación: </strong><?php echo  get_post_meta($post->ID, 'ubicacion', true); ?></p>

			<div class="megusta social">
				<h5>Me gusta</h5>
				<a class="like_icon" href="#" data-post_id="<?php the_ID() ?>"><?php echo numero_favoritos_post($post->ID); ?></a>
			</div><!-- end .megusta -->

			<div class="comparte social clearfix">
				<h5>Comparte</h5>

				<ul>
					<li>
						<a class="fbk comprtirFB"
							data-permalink="<?php the_permalink() ?>"
							data-title="<?php the_title() ?>"
							data-description="<?php the_content(); ?>"
							data-image="<?php attachment_image_url($post->ID, 'thumbnail') ?>">
						</a>
					</li>
					<li><a class="twt" href="#"></a></li>
					<li><a class="tmblr" href="#"></a></li>

				</ul>
			</div><!-- end .comparte -->

			<div class="comenta social">
				<a href="#comments"><h5>Comenta</h5></a>
			</div><!-- end .comenta -->

			<div class="otras_zonas">
				<h5>Otras zonas</h5>
				<ul>
					<li class="selected"></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div class="navPosts">
				<a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>" class="btnAzul marginRight">Anterior</a>
				<a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>" class="btnAzul">Siguiente</a>
			</div><!-- navPosts -->

		</div><!-- end .twoCols -->

	</div><!-- end .content-lugar -->
	<div id="comments" class="content-lugar">
		<div class="header"><h6>COMENTA</h6></div>
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-colorscheme="light" data-numposts="5" data-width="838px"></div>
	</div><!-- end #comments .content-lugar -->
<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>