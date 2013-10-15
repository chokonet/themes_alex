<?php


// AJAX FUNCTIONS ////////////////////////////////////////////////////////////////////



	function save_imagen_usuario(){
		global $current_user;
		get_currentuserinfo();
		if( $current_user and isset($_POST['image_data']) ) {

			$imageData = $_POST['image_data'];
			$directory = $_POST['directory'];

			checkCoverFotoFolder(); // validar/crear los directorios necesarios

			if( isValidURL($imageData) ) {
				$result = saveImageFromUrl( $imageData, $directory );
			} else {
				$result = saveImageFromString( $imageData, $directory );
			}
		}
		wp_send_json($result);
	}
	add_action('wp_ajax_save_imagen_usuario', 'save_imagen_usuario');
	add_action('wp_ajax_nopriv_save_imagen_usuario', 'save_imagen_usuario');




	function set_user_mother_status(){
		global $current_user;
		get_currentuserinfo();
		$value  = isset($_POST['meta_value']) ? $_POST['meta_value'] : '';
		$result = update_user_meta( $current_user->ID, 'mother_status', $value );
		wp_send_json($result);
	}
	add_action('wp_ajax_set_user_mother_status', 'set_user_mother_status');
	add_action('wp_ajax_nopriv_set_user_mother_status', 'set_user_mother_status');




	function create_facebook_event(){
		global $facebook;
		$name       = isset($_POST['name']) ? $_POST['name'] : '';
		$start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
		$imagen     = isset($_POST['imagen']) ? $_POST['imagen'] : '';
		$facebook->set_facebook_event($name, $start_time, 'Diario de mi bebé', $imagen);
	}
	add_action('wp_ajax_create_facebook_event', 'create_facebook_event');
	add_action('wp_ajax_nopriv_create_facebook_event', 'create_facebook_event');




	function save_user_event(){
		global $current_user;

		$evento_id = isset($_POST['evento_id']) ? $_POST['evento_id'] : '';
		if( ! $evento_id) wp_send_json_error();


		$user_events = get_user_meta($current_user->ID, 'user_events', true);
		if( ! $user_events ){
			$result = update_user_meta( $current_user->ID, 'user_events', $evento_id );
		} else {
			$new_meta_value = $user_events.','.$evento_id;
			$result = update_user_meta( $current_user->ID, 'user_events', $new_meta_value);
		}
		wp_send_json($result);
	}
	add_action('wp_ajax_save_user_event', 'save_user_event');
	add_action('wp_ajax_nopriv_save_user_event', 'save_user_event');




	function update_bebe_info(){
		global $current_user;
		get_currentuserinfo();
		$meta_key   = isset($_POST['meta_key']) ? $_POST['meta_key'] : '';
		$meta_value = isset($_POST['meta_value']) ? $_POST['meta_value'] : '';
		$result = update_user_meta( $current_user->ID, $meta_key, $meta_value );
		wp_send_json($result);
	}
	add_action('wp_ajax_update_bebe_info', 'update_bebe_info');
	add_action('wp_ajax_nopriv_update_bebe_info', 'update_bebe_info');




	function send_facebook_notification(){
		global $facebook;

		$message = isset($_POST['message']) ? $_POST['message'] : false;

		if ( ! $message) wp_send_json_error();

		$response = $facebook->send_notification($message);
		wp_send_json($response);
	}
	add_action('wp_ajax_send_facebook_notification', 'send_facebook_notification');
	add_action('wp_ajax_nopriv_send_facebook_notification', 'send_facebook_notification');




	function crear_nuevo_logro(){
		global $current_user;
		get_currentuserinfo();

		$post_title = isset($_POST['post_title']) ? $_POST['post_title'] : false;
		$category   = isset($_POST['category']) ? $_POST['category'] : false;

		if( ! $post_title OR ! $category) wp_send_json_error();

		$term = get_category_by_slug($category);

		$args = array(
			'post_status'   => 'private',
			'post_type'     => 'post',
			'post_title'    => $post_title,
			'post_author'   => $current_user->ID,
			'post_category' => array($term->term_id)
		);
		$result = wp_insert_post( $args, true );
		wp_send_json($result);
	}
	add_action('wp_ajax_crear_nuevo_logro', 'crear_nuevo_logro');
	add_action('wp_ajax_nopriv_crear_nuevo_logro', 'crear_nuevo_logro');




	function compartir_album_facebook(){
		global $current_user, $facebook;
		get_currentuserinfo();
		$category = isset($_POST['category']) ? $_POST['category'] : false;

		if ( ! $category) wp_send_json_error();

		$query = new WP_Query(array(
			'category_name'  => $category,
			'author'         => $current_user->ID,
			'meta_key'       => '_thumbnail_id',
			'posts_per_page' => -1
		));

		$images = array();

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$image_id = get_post_thumbnail_id(get_the_ID());
				$images[get_the_ID()] = get_attached_file( $image_id );
 			}
 		}
 		wp_reset_postdata();

		$result = $facebook->share_new_album($images, $category);

		wp_send_json($result);
	}
	add_action('wp_ajax_compartir_album_facebook', 'compartir_album_facebook');
	add_action('wp_ajax_nopriv_compartir_album_facebook', 'compartir_album_facebook');



	function save_image_as_attachment(){

		global $current_user, $wpdb;
		get_currentuserinfo();

		$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : false;

		if ( ! isset($_POST['image_url']) OR ! $post_id) wp_send_json_error();

		$file   = saveAttachmentImage($_POST['image_url']);
		$imagen = pathinfo($file);

		$wp_upload_dir = wp_upload_dir();


		$attachment = array(
			'post_status'    => 'inherit',
			'post_mime_type' => "image/{$imagen['extension']}",
			'post_type'      => 'attachment',
			'post_author'    => $current_user->ID,
			'ping_status'    => get_option('default_ping_status'),
			'post_title'     => preg_replace('/\.[^.]+$/', '', $imagen['basename']),
			'guid'           => $wp_upload_dir['url'] . $imagen['basename']
		);


		$dir = substr($wp_upload_dir['subdir'], 1);
		$img = $dir .'/'. $imagen['basename'];

		$attach_id = wp_insert_attachment( $attachment, $img, $post_id );


		if($attach_id){
			// you must first include the image.php file for the function wp_generate_attachment_metadata() to work
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$image_file = $wp_upload_dir['path'] .'/'. $imagen['basename'];
			$attach_data = wp_generate_attachment_metadata( $attach_id, $image_file );
			$_POST['attach_id'] = $attach_id;
			wp_update_attachment_metadata( $attach_id, $attach_data );
			set_post_thumbnail( $post_id, $attach_id );
			wp_send_json( $attach_id );
		}else{
			wp_send_json_error();
		}

	}
	add_action('wp_ajax_save_image_as_attachment', 'save_image_as_attachment');
	add_action('wp_ajax_nopriv_save_image_as_attachment', 'save_image_as_attachment');






	function save_data_as_attachment(){

		global $current_user, $wpdb;
		get_currentuserinfo();

		$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : false;

		if ( ! isset($_POST['image_data']) OR ! $post_id) wp_send_json_error();

		$file = saveAttachmentData($_POST['image_data']);


		$imagen = pathinfo($file);

		$wp_upload_dir = wp_upload_dir();


		$attachment = array(
			'post_status'    => 'inherit',
			'post_mime_type' => "image/{$imagen['extension']}",
			'post_type'      => 'attachment',
			'post_author'    => $current_user->ID,
			'ping_status'    => get_option('default_ping_status'),
			'post_title'     => preg_replace('/\.[^.]+$/', '', $imagen['basename']),
			'guid'           => $wp_upload_dir['url'] . $imagen['basename']
		);


		$dir = substr($wp_upload_dir['subdir'], 1);
		$img = $dir .'/'. $imagen['basename'];

		$attach_id = wp_insert_attachment( $attachment, $img, $post_id );


		if($attach_id){
			// you must first include the image.php file for the function wp_generate_attachment_metadata() to work
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$image_file = $wp_upload_dir['path'] .'/'. $imagen['basename'];
			$attach_data = wp_generate_attachment_metadata( $attach_id, $image_file );
			$_POST['attach_id'] = $attach_id;
			wp_update_attachment_metadata( $attach_id, $attach_data );
			set_post_thumbnail( $post_id, $attach_id );
			wp_send_json( $attach_id );
		}else{
			wp_send_json_error();
		}

	}
	add_action('wp_ajax_save_data_as_attachment', 'save_data_as_attachment');
	add_action('wp_ajax_nopriv_save_data_as_attachment', 'save_data_as_attachment');





	function descargar_album_pdf(){
		$category = isset($_POST['category']) ? $_POST['category'] : false;
		if ( ! $category) wp_send_json_error();
		$images = get_posts_by_category($category);
		wp_send_json($images);
	}
	add_action('wp_ajax_descargar_album_pdf', 'descargar_album_pdf');
	add_action('wp_ajax_nopriv_descargar_album_pdf', 'descargar_album_pdf');





	function obtieneIDParaPop(){

		$id_post   = isset($_POST['post_id']) ? $_POST['post_id'] : false;
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'gallery-pop');
		wp_send_json($image_url[0]);

	}

	add_action('wp_ajax_obtieneIDParaPop', 'obtieneIDParaPop');
	add_action('wp_ajax_nopriv_obtieneIDParaPop', 'obtieneIDParaPop');





	function BorrarPostAlbum(){
		global $current_user;

		$post_id   = isset($_POST['post_id']) ? $_POST['post_id'] : false;
		$author_id = get_post_field( 'post_author', $post_id );

		if ( $current_user->ID == $author_id ){
			wp_delete_post( $post_id );
			wp_send_json('post eliminado');
		}else{
			wp_send_json_error();
		}

	}

	add_action('wp_ajax_BorrarPostAlbum', 'BorrarPostAlbum');
	add_action('wp_ajax_nopriv_BorrarPostAlbum', 'BorrarPostAlbum');




	// HELPERS /////////////////////////////////////////////////////


	function get_posts_by_category($category){

		global $current_user, $wpdb;
		get_currentuserinfo();

		$query = new WP_Query(array(
			'category_name'  => $category,
			'author'         => $current_user->ID,
			'meta_key'       => '_thumbnail_id',
			'posts_per_page' => -1
		));

		$images = array();

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$image_id = get_post_thumbnail_id(get_the_ID());
				$images[get_the_ID()] = get_attached_file( $image_id );
 			}
 		}
 		wp_reset_postdata();
 		return $images;
	}



