<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'meta-box-post-video', 'Video', 'show_metabox_post_video', 'post', 'side', 'high' );
		add_meta_box( 'meta-box-post-extra', 'Información extra', 'show_metabox_post_extra', 'post', 'normal', 'high' );

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function show_metabox_post_video($post){

		$id_vimeo   = get_post_meta($post->ID, 'id_vimeo', true);
		$id_youtube = get_post_meta($post->ID, 'id_youtube', true);
		wp_nonce_field(__FILE__, '_articulo_videos_nonce');
		echo <<< meta_box_post_video

			<label for="id_vimeo">ID de Vimeo</label>
			<input type="text" name="id_vimeo" id="id_vimeo" value="$id_vimeo" class="widefat">
			<p class="howto" style="font-size:11px; margin: 0.2em 0 1.5em 0;">http://vimeo.com/<strong>45118430</strong></p>

			<label for="id_youtube">ID de Youtube</label>
			<input type="text" name="id_youtube" id="id_youtube" value="$id_youtube" class="widefat">
			<p class="howto" style="font-size:11px; margin: 0.2em 0 1.5em 0;">http://www.youtube.com/watch?v=<strong>rT_OmTMwvZI</strong></p>

meta_box_post_video;
	}

	function show_metabox_post_extra($post){

		$director   = get_post_meta($post->ID, 'director', true);
		$reparto = get_post_meta($post->ID, 'reparto', true);
		wp_nonce_field(__FILE__, '_articulo_extras_nonce');
		echo <<< meta_box_post_video

			<label for="director">Director</label>
			<input type="text" name="director" id="director" value="$director" class="widefat">
			<br/><br/>
			<label for="reparto">Reparto</label>
			<input type="text" name="reparto" id="reparto" value="$reparto" class="widefat">
			<p class="howto" style="font-size:11px; margin: 0.2em 0 1.5em 0;">Hugh Jackman, James McAvoy, Michael Fassbender</p>

meta_box_post_video;
	}



// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id)){
			return $post_id;
		}


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ){
			return $post_id;
		}




		/// VIDEOS
		if( isset($_POST['id_vimeo']) and check_admin_referer( __FILE__, '_articulo_videos_nonce' ) ){

			if (isset($_POST['id_vimeo']) ) {
				update_post_meta($post_id, 'id_vimeo', $_POST['id_vimeo']);
			}

			if (isset($_POST['id_youtube']) ) {
					update_post_meta($post_id, 'id_youtube', $_POST['id_youtube']);
			}
		}

		/// EXTRAS
		if( isset($_POST['director']) and check_admin_referer( __FILE__, '_articulo_extras_nonce' ) ){

			if (isset($_POST['director']) ) {
				update_post_meta($post_id, 'director', $_POST['director']);
			}

			if (isset($_POST['reparto']) ) {
					update_post_meta($post_id, 'reparto', $_POST['reparto']);
			}
		}


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////