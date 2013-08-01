<?php

// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'my_meta', 'titulo', 'callback_function', 'post', 'side', 'default' );

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function callback_function($post){

		wp_nonce_field( __FILE__, '_nonce_name' );

	}



// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){

		if ( !current_user_can('edit_page', $post_id) ) {
			return $post_id;
		}

		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) {
			return $post_id;
		}

		if( !empty($_POST) and !check_admin_referer( __FILE__, '_nonce_name' ) ){
			return $post_id;
		}

	});