<?php

	// DECLARAR METABOXES //////////////////////////

	add_action('admin_menu', function(){

		$posttypes = array('lugares', 'actividades');
			foreach ($posttypes as $posttype ) {
				add_meta_box( 'meta-box-lugar-info', 'Información general del lugar', 'show_metabox_lugar_info', $posttype, 'normal', 'default' );
			}
		add_meta_box( 'meta-box-recorrido-info', 'Información general del recorrido', 'show_metabox_recorrido_info', 'recorridos', 'normal', 'default' );

	});




	// INFO GENERAL DEL LUGAR /////////////////////////////

	function show_metabox_lugar_info($post) {
		$horario   = get_post_meta($post->ID, 'horario', true);
		$precio = get_post_meta($post->ID, 'precio', true);
		$ubicacion = get_post_meta($post->ID, 'ubicacion', true);
		$latlong = get_post_meta($post->ID, 'latlong', true);
		wp_nonce_field(__FILE__, 'lugares_info_nonce');
		echo <<< metabox_lugar_info

			<label for="horario">Horario: </label>
			<input type="text" name="horario" id="horario" value="$horario" class="">
			<br />
			<br />

			<label for="precio">Precio: </label>
			<input type="text" name="precio" id="precio" value="$precio" class="">
			<br />
			<br />

			<label for="ubicacion">Ubicación: </label>
			<input type="text" name="ubicacion" id="ubicacion" value="$ubicacion" class="">
			<br />
			<br />

			<label for="latlong">Coordenadas Google Maps: </label>
			<input type="text" name="latlong" id="latlong" value="$latlong" class="">



metabox_lugar_info;
	}

	// INFO GENERAL DEL RECORRIDO /////////////////////////////


	function show_metabox_recorrido_info($post) {
		$autor   = get_post_meta($post->ID, 'autor', true);
		wp_nonce_field(__FILE__, 'recorridos_info_nonce');


		$lugares       = get_post_meta($post->ID, 'lugar', true);
		$descripciones = get_post_meta($post->ID, 'descripcion', true);

		echo <<< metabox_autor

			<label for="autor">Autor: </label>
			<input type="text" name="autor" id="autor" value="$autor" class="">


metabox_autor;

		if( !$lugares and !$descripciones){

echo <<< metabox_lugar

		<div id="lugares-container">

			<br /><label for="lugar">Lugar: </label>
			<input type="text" name="lugar[]" id="lugar" value="" class="normal-text input-lugar">
			&nbsp;&nbsp;<label for="lugar">Descripcion: </label>
			<input type="text" name="descripcion[]" id="descripcion" value="" class="regular-text"><br />

		</div>

		<div id="lugares-adder" class="wp-hidden-children">
			<h4><a id="lugares-add-toggle" href="#lugares-add" >+ Agregar Lugar</a></h4>
		</div>

metabox_lugar;

		} else {
			display_saved_lugares_meta($lugares, $descripciones);
		}



	}

	function display_saved_lugares_meta($lugares, $descripciones){

		echo '<div id="lugares-container">';

		foreach ($lugares as $index => $lugar) :

			echo <<< metabox_lugar
				<br /><label for="lugar">Lugar: </label>
				<input type="text" name="lugar[]" id="lugar" value="$lugar" class="normal-text input-lugar">
				&nbsp;&nbsp;<label for="lugar">Descripcion: </label>
				<input type="text" name="descripcion[]" id="descripcion" value="{$descripciones[$index]}" class="regular-text"><br />
metabox_lugar;

		endforeach;

		echo <<< add_other_lugar_button
			</div>
			<div id="lugares-adder" class="wp-hidden-children">
				<h4><a id="lugares-add-toggle" href="#lugares-add" >+ Agregar Lugar</a></h4>
			</div>
add_other_lugar_button;

	}


	// GUARDAR LA METADATA DEL POST //////////////////////////////////

	add_action('save_post', function ($post_id){

		if( !current_user_can('edit_page', $post_id)){
			return $post_id;
		}

		if(defined('DOING_AUTOSAVE') and DOING_AUTOSAVE){
			return $post_id;
		}


		if( isset($_POST['horario']) and check_admin_referer( __FILE__, 'lugares_info_nonce' ) ){

			if (isset($_POST['horario']) ) {
				update_post_meta($post_id, 'horario', $_POST['horario']);
			}

			if (isset($_POST['precio']) ) {
					update_post_meta($post_id, 'precio', $_POST['precio']);
			}

			if (isset($_POST['ubicacion']) ) {
					update_post_meta($post_id, 'ubicacion', $_POST['ubicacion']);
			}

			if (isset($_POST['latlong']) ) {
					update_post_meta($post_id, 'latlong', $_POST['latlong']);
			}
		}


		if( isset($_POST['autor']) and check_admin_referer( __FILE__, 'recorridos_info_nonce' ) ){

			if (isset($_POST['autor']) ) {
				update_post_meta($post_id, 'autor', $_POST['autor']);
			}

		}

		if (isset($_POST['lugar']) and check_admin_referer( __FILE__, 'recorridos_info_nonce' ) ) {
				update_post_meta($post_id, 'lugar', $_POST['lugar']);
		}

		if (isset($_POST['descripcion']) and check_admin_referer( __FILE__, 'recorridos_info_nonce' ) ) {
			update_post_meta($post_id, 'descripcion', $_POST['descripcion']);
		}
	});