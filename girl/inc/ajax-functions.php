<?php


	/**
	 * Envia mail el formulario de contacto
	 * @param  $_GET email data
	 * @return boolean
	 */
	function ajax_envia_mail(){

		if ( ! isset($_GET['email'])) wp_send_json_error();

		if ( ! filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
			wp_send_json_error('El campo de mail es invalido');

		extract($_GET);

		$fecha = date('d-m-Y H:i:s');
		$subject_form = "Subject: $subject \n\r";

		$mailContent = "Mensaje de $name \n\rEmail: $email  \n\rFecha: $fecha \n\r $subject_form Mensaje: $comment";
		$mailResult  = wp_mail( 'alex@losmaquiladores.com', 'bemygirl', $mailContent );
		wp_send_json($mailResult);
	}
	add_action('wp_ajax_ajax_envia_mail', 'ajax_envia_mail');
	add_action('wp_ajax_nopriv_ajax_envia_mail', 'ajax_envia_mail');



	/**
	 * Create user account
	 * @return json
	 */
	function create_user_account(){

		if ( ! isset($_POST['user_data'])) wp_send_json_error();

		$account = new Escort\Account( $_POST['user_data'] );
		$result  = $account->save();

		wp_send_json_success( array('ID' => $result) );
	}
	add_action('wp_ajax_create_user_account', 'create_user_account');
	add_action('wp_ajax_nopriv_create_user_account', 'create_user_account');




	/**
	 * Update escort data
	 * @return json
	 */
	function update_account_data(){
		if ( ! isset($_POST['user_data'])) wp_send_json_error();

		$account = new Escort\Account( $_POST['user_data'] );
		$account->update( $_POST['user_data'] );

		wp_send_json_success();
	}
	add_action('wp_ajax_update_account_data', 'update_account_data');
	add_action('wp_ajax_nopriv_update_account_data', 'update_account_data');




	/**
	 * Check username availability
	 * @return mixed WP_Error | boolean
	 */
	function check_username_availability(){

		if ( ! isset($_GET['username']))
			wp_send_json(array('available' => false));

		if ( is_null( username_exists($_GET['username']) ) )
			wp_send_json(array('available' => true));

		wp_send_json(array('available' => false));
	}
	add_action('wp_ajax_check_username_availability', 'check_username_availability');
	add_action('wp_ajax_nopriv_check_username_availability', 'check_username_availability');




	/**
	 * Check email availability
	 * @return boolean
	 */
	function check_email_availability(){

		if ( ! isset($_GET['email']))
			wp_send_json(array('available' => false));

		if ( ! email_exists($_GET['email']) )
			wp_send_json(array('available' => true));

		wp_send_json(array('available' => false));
	}
	add_action('wp_ajax_check_email_availability', 'check_email_availability');
	add_action('wp_ajax_nopriv_check_email_availability', 'check_email_availability');




	/**
	 * Set cookie terminos y condiciones
	 * @return  json success
	 */
	function set_terms_accepted(){
		set_terms_accepted_session();
		wp_send_json_success();
	}
	add_action('wp_ajax_set_terms_accepted', 'set_terms_accepted');
	add_action('wp_ajax_nopriv_set_terms_accepted', 'set_terms_accepted');


	/**
	 * crear imagen attachment EDIT-MEDIA
	 * @return boolean
	 */
	function save_image_as_attachment(){

		global $wpdb;

		$image_name = isset($_POST['image_name']) ? $_POST['image_name'] : false;

		$file = saveAttachmentData($_POST['image_data'], $image_name);

		$imagen = pathinfo($file);

		$wp_upload_dir = wp_upload_dir();

		$attachment = array(
			'post_status'    => 'inherit',
			'post_mime_type' => "image/{$imagen['extension']}",
			'post_type'      => 'attachment',
			'post_author'    => $_POST['girl_id'],
			'ping_status'    => get_option('default_ping_status'),
			'post_title'     => preg_replace('/\.[^.]+$/', '', $imagen['basename']),
			'guid'           => $wp_upload_dir['url'] . $imagen['basename']
		);


		$dir = substr($wp_upload_dir['subdir'], 1);
		$img = $dir .'/'. $imagen['basename'];

		$attach_id = wp_insert_attachment( $attachment, $img);


		if($attach_id){
			// you must first include the image.php file for the function wp_generate_attachment_metadata() to work
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$image_file = $wp_upload_dir['path'] .'/'. $imagen['basename'];
			$attach_data = wp_generate_attachment_metadata( $attach_id, $image_file );
			$_POST['attach_id'] = $attach_id;
			wp_update_attachment_metadata( $attach_id, $attach_data );
			set_post_thumbnail( $post_id, $attach_id );

			//wp_send_json( $attach_id );
			$url = $wp_upload_dir['url'].'/'.$attach_data['sizes']['gallery']['file'];
			wp_send_json( $url );
		}else{
			wp_send_json_error();
		}
	}
	add_action('wp_ajax_save_image_as_attachment', 'save_image_as_attachment');
	add_action('wp_ajax_nopriv_save_image_as_attachment', 'save_image_as_attachment');
