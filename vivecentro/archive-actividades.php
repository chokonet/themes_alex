<?php get_header(); ?>

					<div class="navegador actividades" >

						<?php get_template_part('templates/actividades', 'navegador'); ?>


					</div><!-- end .navegador actividades-->
					<div class="filters">

					</div>

					<!--
	  _____                        _         _                              _         _                    _                          _
	 |_   _|___  _ __ ___   _ __  | |  __ _ | |_  ___   _ __    __ _  _ __ | |_    __| |  ___  ___  _ __  | |  ___   __ _   __ _   __| |  ___
	   | | / _ \| '_ ` _ \ | '_ \ | | / _` || __|/ _ \ | '_ \  / _` || '__|| __|  / _` | / _ \/ __|| '_ \ | | / _ \ / _` | / _` | / _` | / _ \
	   | ||  __/| | | | | || |_) || || (_| || |_|  __/ | |_) || (_| || |   | |_  | (_| ||  __/\__ \| |_) || ||  __/| (_| || (_| || (_| || (_) |
	   |_| \___||_| |_| |_|| .__/ |_| \__,_| \__|\___| | .__/  \__,_||_|    \__|  \__,_| \___||___/| .__/ |_| \___| \__, | \__,_| \__,_| \___/
	                       |_|                         |_|                                         |_|              |___/
	-->

					<div class="lugares-zona-single-desplegado">

						<?php
							if(have_posts()): while(have_posts()): the_post();
								$terms = wp_get_post_terms($post->ID, 'zonas');
									foreach($terms as $term){
						?>
							<div <?php post_class('content_lugar'); ?>>
								<div class="header"><div class="pleca"></div><a href="#" class="close"></a></div>
								<div class="twoCols">

									<div class="sliderContainer">
										<div class="big_viewport"><?php the_post_thumbnail('cuadrado_grande'); ?></div>
										<ul class="imgStrip">
											<?php
											 $attachments = get_posts( array(
									            'post_type' => 'attachment',
									            'posts_per_page' => -1,
									            'post_parent' => $post->ID
									        ) );

									        if ( $attachments ) {
									            foreach ( $attachments as $attachment ) {
									            	$img_url = wp_get_attachment_image_src($attachment->ID, 'cuadrado_grande');
									            	?>
									            	<li><a href=""><img src="<?php echo $img_url[0]; ?>"></a></li>
									           <?php  }
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
									<p><strong>Lugar: </strong><?php foreach($categorias as $categoria){ echo $categoria->name;} ?></p>
									<p><strong>Ubicación: </strong><?php echo  get_post_meta($post->ID, 'ubicacion', true); ?></p>

									<div class="megusta social">
										<h5>Me gusta</h5>
										<a class="like_icon" href="#">12763</a>
									</div><!-- end .megusta -->

									<div class="comparte social clearfix">
										<h5>Comparte</h5>
										<ul>
											<li><a class="fbk" href="#"></a></li>
											<li><a class="twt" href="#"></a></li>
											<li><a class="tmblr" href="#"></a></li>
											<li><a class="instgrm" href="#"></a></li>
										</ul>
									</div><!-- end .comparte -->

									<div class="comenta social">
										<a href="#"><h5>Comenta</h5></a>
									</div><!-- end .comenta -->

								</div><!-- end .twoCols -->

							</div><!-- end .content-lugar -->

					<?php } endwhile; endif; wp_reset_query(); ?>

					</div><!-- lugares-zona-single-desplegado -->

					<div class="clear"></div>


<!--
                   _
   ___  _ __    __| |
  / _ \| '_ \  / _` |
 |  __/| | | || (_| |
  \___||_| |_| \__,_|

-->

					<div class="loop-lugares" class="clearfix">

						<?php
							if(have_posts()): while(have_posts()): the_post();
								$terms = wp_get_post_terms($post->ID, 'zonas');

									foreach($terms as $term){
						?>
						<div <?php post_class('lugar-home'); ?> data-post_id="post-<?php echo $post->ID; ?>" >
							<a class="link-foto" href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/aguilita.png"></a>
							<span class="titulo"><?php echo $term->name; ?></span>
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>
						</div><!-- end .lugar-home -->
						<?php } endwhile; endif; wp_reset_query(); ?>
					</div><!-- end .loop-lugares -->

<?php get_footer(); ?>