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
		$file       = saveAttachmentData($_POST['image_data'], $image_name);
		$imagen     = pathinfo($file);

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
			set_post_thumbnail( '', $attach_id );


			 $img_url2 = wp_get_attachment_image_src($attach_id, 'imagen_girl_large');
			wp_send_json($img_url2[0]);
		}else{
			wp_send_json_error();
		}
	}
	add_action('wp_ajax_save_image_as_attachment', 'save_image_as_attachment');
	add_action('wp_ajax_nopriv_save_image_as_attachment', 'save_image_as_attachment');




	/**
	 * CROP IMAGEN
	 * @return boolean
	 */
	function crop_save_image(){

			$image_name = isset($_POST['image_name']) ? $_POST['image_name'] : false;
			$file       = isset($_POST['img']) ? $_POST['img'] : false;

			$new_img = cortar_imagen_png($_POST['x1'], $_POST['y1'], $_POST['w'], $_POST['h'], $image_name, $file );

			wp_send_json_success($new_img);

	}

	add_action('wp_ajax_crop_save_image', 'crop_save_image');
	add_action('wp_ajax_nopriv_crop_save_image', 'crop_save_image');





	function update_service_table(){
		if ( ! isset($_POST['service_type']) OR
			 ! isset($_POST['service_name']) ) wp_send_json_error();

		extract($_POST);

		$query  = new Escort\Query();
		$result = $query->insert_service($service_type, $service_name);

		wp_send_json_success($result);
	}
	add_action('wp_ajax_update_service_table', 'update_service_table');
	add_action('wp_ajax_nopriv_update_service_table', 'update_service_table');





	function ajax_delete_service(){
		if ( ! isset($_POST['service_id']))
			wp_send_json_error();

		$result = Escort\Query::delete_service( $_POST['service_id'] );
		wp_send_json_success( $result );
	}
	add_action('wp_ajax_delete_service_by_id', 'delete_service_by_id');
	add_action('wp_ajax_nopriv_delete_service_by_id', 'delete_service_by_id');





	function ajax_delete_user(){
		if ( ! isset($_POST['user_id']))
			wp_send_json_error();

		if ( current_user_can('delete_users') AND check_ajax_referer( '_ajax_nonce', 'security' ) ) {
			$result = Escort\Account::delete( $_POST['user_id'] );
			wp_send_json_success( $result );
		}
	}
	add_action('wp_ajax_ajax_delete_user', 'ajax_delete_user');
	add_action('wp_ajax_nopriv_ajax_delete_user', 'ajax_delete_user');





	function set_user_active_status(){
		if ( ! isset($_POST['user_id']))
			wp_send_json_error();

		if ( current_user_can('edit_users') AND check_ajax_referer( '_ajax_nonce', 'security' ) ) {

			$account = new Escort\Account();
			$result  = $account->set_status( $_POST['user_id'], $_POST['status'] );

			wp_send_json_success( $result );
		}
	}
	add_action('wp_ajax_set_user_active_status', 'set_user_active_status');
	add_action('wp_ajax_nopriv_set_user_active_status', 'set_user_active_status');




	function ajax_update_option(){

		if ( ! isset($_POST['value']) OR ! isset($_POST['option']))
			wp_send_json_error();

		Escort\Query::array_push_option( $_POST['option'], $_POST['value'] );
		wp_send_json_success();
	}
	add_action('wp_ajax_ajax_update_option', 'ajax_update_option');
	add_action('wp_ajax_nopriv_ajax_update_option', 'ajax_update_option');


	function update_password_user($new_password, $user_id){

		if ($new_password && $user_id) {

			wp_set_password( $new_password, $user_id );
			wp_set_auth_cookie( $user_id, 0, 0 );
			wp_set_current_user( $user_id );

		}
	}

	/**
	 * resive datos my acount para ser modificados
	 * @return [string] [mail]
	 */
	function update_data_account(){

		if ( ! isset($_GET)) wp_send_json_error();

		extract($_GET);
		$user = get_user_by( 'login', $username );

		if ( $user && wp_check_password( $current_password, $user->data->user_pass, $user->ID) ):

			update_password_user($new_password, $user->ID);

			if ($email && $user->ID) {
				wp_update_user( array ( 'ID' => $user->ID, 'user_email' => $email ) ) ;
			};

			$result = 'changes saved';

		elseif( !wp_check_password( $current_password, $user->data->user_pass, $user->ID) ):
			$result = 'your current password is invalid.';
		else:
			$result = '0 cambios.';
  		endif;

		wp_send_json($result);

	}

	add_action('wp_ajax_update_data_account', 'update_data_account');
	add_action('wp_ajax_nopriv_update_data_account', 'update_data_account');