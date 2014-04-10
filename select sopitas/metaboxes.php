<?php

// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		//META BOX PARA MÚLTIPLES POST-TYPES
		$posttypes = array( 'post', 'agenda', 'entrevistas', 'playlist' );
		foreach( $posttypes as $posttype ) {
	      add_meta_box( 'meta-box-header', 'Colocar header', 'show_metabox_header', $posttype, 'side', 'high' );
		}

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////


	function show_metabox_header($post){

			$numero_posicion = get_image_header($post->ID);

			echo "<label for=\"meta-posicion\">Posición imagen</label>";
			echo "<select name=\"posicion_header\">";

				for ($i=0; $i < 9; $i++) { ?>
					<option value="<?php echo $i; ?>" <?php if ( $numero_posicion == $i ):?>selected="selected" <?php endif; ?>><?php echo $i; ?></option>
				<?php }

				echo  "</select>";?>

            <br/><br/><img src="<?php echo THEMEPATH; ?>images/posiciones.png"  width="249"alt="">

	<?php }


// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){

		if ( ! current_user_can('edit_page', $post_id))
			return $post_id;


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE )
			return $post_id;


		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) )
			return $post_id;


		  // save metaselect
		if( isset( $_POST[ 'posicion_header' ] ) ) {

			if ($_POST[ 'posicion_header' ] != 0) {
				update_image_header($post_id, $_POST['posicion_header']);
			}



		}



	});


