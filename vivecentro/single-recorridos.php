<?php get_header(); ?>
					

					<div class="navegador recorridos" >

						<?php get_template_part('templates/content', 'navegador'); ?>

						<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="recorrido-single">
							<img class="hover_img" src="<?php echo THEMEPATH; ?>/images/zablu-grande.png">
							<a href="#" class="info_toggle abrir-info"></a>
							<div class="info-recorrido-cerrado">
								<h2><?php the_title(); ?></h2>
								<h3>Por <?php echo get_post_meta($post->ID, 'autor', true); ?></h3>
							</div>
							<div class="info-recorrido-abierto">
								<a href="#" class="close"></a>
								<h2><?php the_title(); ?></h2>
								<h3><?php echo get_post_meta($post->ID, 'autor', true); ?></h3>
								<?php the_content(); ?>
							</div>
						</div><!-- end .recorrido-single -->

					<?php endwhile; endif; wp_reset_query(); ?>
					</div><!-- end .navegador recorridos-->

					
					<? // SCRIPT MAPA // ?>
					<script type="text/javascript">

					var directionsDisplay;
					var directionsService = new google.maps.DirectionsService();
					var map;

					function initialize() {

					  directionsDisplay = new google.maps.DirectionsRenderer();

					  var mapOptions = {
					    zoom: 15,
					    mapTypeId: google.maps.MapTypeId.ROADMAP,
					    center: new google.maps.LatLng(19.432296951641764, -99.13515329360962),
					  }
					  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
					  directionsDisplay.setMap(map);

					  calcRoute();
					}

					function calcRoute() {

					  <?php /*

					      foreach ($lugaresydescripciones as $lugar){

					        $entrada = get_page_by_title($lugar[0], OBJECT, 'lugares');

					    ?>
					      [<?php echo get_post_meta($entrada->ID, 'latlong', true); ?>],

					    <?php }  wp_reset_query();  */ ?>

					   <?php

					   $lugaresydescripciones = get_lugares_descripciones($post->ID);

					   	foreach ($lugaresydescripciones as $index => $lugar){
					   		if($index == 0){
					        	$entrada = get_page_by_title($lugar[0], OBJECT, 'lugares');
					        	$primero = get_post_meta($entrada->ID, 'latlong', true);

					   		}elseif ($index == (count($lugaresydescripciones)-1) ){
					   			$entrada = get_page_by_title($lugar[0], OBJECT, 'lugares');
					   			$ultimo  = get_post_meta($entrada->ID, 'latlong', true);

					   		}
					  	} ?>

					  var start = new google.maps.LatLng(<?php echo $primero; ?>);
					  var end = new google.maps.LatLng(<?php echo $ultimo; ?>);
					  var waypts = [

					  	<?php

					      foreach ($lugaresydescripciones as $lugar){

					        $entrada = get_page_by_title($lugar[0], OBJECT, 'lugares'); ?>

					     <?php  if($entrada != '' ) {
					    ?>
					     {location: new google.maps.LatLng(<?php echo get_post_meta($entrada->ID, 'latlong', true); ?>)},


					    <?php } } wp_reset_query();   ?>

					    ] ;


					  var request = {
					      origin: start,
					      destination: end,
					      waypoints: waypts,
					      optimizeWaypoints: true,
					      travelMode: google.maps.TravelMode.WALKING
					  };

					  	directionsService.route(request, function(response, status) {
					    if (status == google.maps.DirectionsStatus.OK) {
					      directionsDisplay.setDirections(response);
					    }
					  });

					}

					google.maps.event.addDomListener(window, 'load', initialize);
			    </script>
	    		<!-- MAPAS -->
					<div id="map-canvas">
					</div>
					<div class="lugares-recorrido-single">
					<?



						foreach ($lugaresydescripciones as $index => $lugar){


							$entrada = get_page_by_title($lugar[0], OBJECT, 'lugares');
							
							if($entrada != '') { ?>

						<div class="lugar-recorrido-single expand">
							<a href="#" data-id="<?php echo $index ?>">
								<?php if( has_post_thumbnail() ) {the_post_thumbnail( 'cuadrado_grande' ); } else { ?> <img src="http://placehold.it/164x165"> <?php } ?>
								<span class="nombre-lugar"><h4><?php echo $entrada->post_title; ?></h4></span>
							</a>

						</div><!-- end lugar-single -->

					<?php } } wp_reset_query(); ?>

					</div><!-- end .lugares-single -->
<div class="load_here"> </div>

<div class="move_sidebar"></div>
<?php get_footer(); ?>