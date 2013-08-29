<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'capsulas_video_meta', 'Video Capsulas', 'campos_custombox_capsulas', 'post', 'side', 'low');
		add_meta_box( 'check_destacados_meta', 'Destacado', 'destacados_custombox', 'post', 'side', 'high');

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function campos_custombox_capsulas( $post ) {
		$video = get_post_meta($post->ID, 'video_object', true);
		wp_nonce_field( __FILE__, '_post_video_nonce' );
		echo "<input type='text' name='video_object' class='widefat' value='$video'>";
		echo "<p class='howto'>Smartcast embed code.</p>";
	}

	function destacados_custombox( $post ){
		$destacados = get_post_meta($post->ID, 'check_destacados', true);
		$checked = $destacados ? 'checked' : '';
		wp_nonce_field( __FILE__, '_post_destacados_nonce' );
		echo "<input type='checkbox' name='check_destacados' value='1' $checked>";
		echo " <p class='howto' style='display:inline;'> Es un post destacado</p>";
	}



// SAVE ATTACHMENTS META DATA ////////////////////////////////////////////////////////



	add_action( 'save_post', function ( $post_id ) {

	    if( isset($_POST['video_object']) AND check_admin_referer(__FILE__, '_post_video_nonce') ) {
	        update_post_meta( $post_id, 'video_object', $_POST['video_object'] );
	    }

	    if( isset($_POST['check_destacados']) AND check_admin_referer(__FILE__, '_post_destacados_nonce') ) {
	        update_post_meta( $post_id, 'check_destacados', $_POST['check_destacados'] );
	    }else{
	    	delete_post_meta($post_id, 'check_destacados');
	    }


	});



// USER CUSTOM METABOXES /////////////////////////////////////////////////////////////



	function custom_user_options($user) {

		$colaborador = get_the_author_meta('conductor', $user->ID); ?>

		<h3>Información extra</h3>

		<table class="form-table">
			<tr>
				<th><label for="conductor">Conductor</label></th>
				<td>
					<input type="checkbox" name="conductor" id="conductor" value="1" <?php checked( $colaborador, 1 ); ?> />
					<span class="description">El usuario es un conductor</span>
				</td>
			</tr>
			<tr>
				<th><label for="upload_user_image">Imagen de Usuario</label></th>
				<td>
					<button id="upload_user_image" class="button insert-media add_media" data-user_id="<?php echo $user->ID ?>">Upload</button>
				</td>
			</tr>
		</table><?php
	}
	add_action( 'show_user_profile', 'custom_user_options' );
	add_action( 'edit_user_profile', 'custom_user_options' );



// SAVE USER CUSTOM METABOXES ////////////////////////////////////////////////////////



	function save_user_custom_fields($user_id) {
		if ( ! current_user_can('edit_user', $user_id)) {
			return false;
		}

		if ( isset($_POST['conductor']) ){
			update_user_meta( $user_id, 'conductor', $_POST['conductor'] );
		} else {
			delete_user_meta( $user_id, 'conductor' );
		}
	}
	add_action( 'personal_options_update', 'save_user_custom_fields' );
	add_action( 'edit_user_profile_update', 'save_user_custom_fields' );