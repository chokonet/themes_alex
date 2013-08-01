<?php

	// path a los directorios de javascript y css
	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		if ( is_front_page() ){
			wp_enqueue_script('facebook', JSPATH.'facebook.js', array('jquery'), false, false );
			wp_localize_script('facebook', 'home_url', get_bloginfo('url') );
		}
		wp_enqueue_script('fabric', JSPATH.'kangax-fabric/dist/all.js', false, '1.2.0', true );
		wp_enqueue_script('webcam', JSPATH.'webcam/webcam.js', false, '1.0.9', true );
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery', 'fabric'), false, true );
		wp_enqueue_script('functions', JSPATH.'functions.js', array('plugins', 'webcam'), false, true );
     	wp_enqueue_script('temas_tinycarousel', JSPATH.'jquery.tinycarousel.min.js', array('jquery'), false, true);

		// styles
		wp_enqueue_style('style', get_stylesheet_uri() );

		wp_localize_script('plugins', 'images_url',  get_template_directory_uri() . '/img/' );
		wp_localize_script('functions', 'ajax_url',  get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');
		wp_localize_script('functions', 'images_url',  get_template_directory_uri() . '/img/' );

		localize_momentos_gold_scripts();

	});



	function localize_momentos_gold_scripts(){
		wp_localize_script('webcam', 'webcam_swf_url',  JSPATH.'webcam/webcam.swf' );
		wp_localize_script('webcam', 'webcam_shutter_url',  JSPATH.'webcam/shutter.mp3' );
		wp_localize_script('webcam', 'webcam_api_url',  JSPATH.'webcam/webcamApi.php' );
		mq_localize_momentos_gold_data();
	}



	/**
	 * Momentos Gold: localizar functions.js para los diferentes pasos
	 */
	function mq_localize_momentos_gold_data(){
		global $current_user;

		if ( $current_user ) :

			if ( isset($_GET['paso']) and $_GET['paso'] == '1' ) {       // PASO 1 ////////////////////

				wp_localize_script('functions', 'paso1Data', get_photo_albums_data() );

			} elseif ( isset($_GET['paso']) and $_GET['paso'] == '2' ) { // PASO 2 ////////////////////

				wp_localize_script('functions', 'paso2Data', array(
					'imagen' => THEMEPATH."/img/imagenesPaso1/$current_user->user_login.png",
				));

			} elseif ( isset($_GET['paso']) and $_GET['paso'] == '4' ) { // PASO 4 ////////////////////

				$theme = isset($_GET['theme'])
							? THEMEPATH."/img/momentos-gold-temas/".$_GET['theme']
							: THEMEPATH."/img/momentos-gold-temas/tema1.png";

				$texto = isset($_GET['texto']) ? $_GET['texto'] : '¡Soy todo un Rockstar!';

				wp_localize_script( 'functions', 'paso4Data', array(
					'imagen' => THEMEPATH."/img/imagenesPaso3/$current_user->user_login.png",
					'theme'  => $theme,
					'texto'  => $texto
				));
			}

			wp_localize_script('functions', 'user_login', $current_user->user_login);

		endif;
	}



// CRON JOB - BORRAR TODAS LAS IMAGENES TEMPORALES CADA DIA //////////////////////////



	// schedule the delete_temporal_images event only once
	if( !wp_next_scheduled( 'delete_temporal_images' ) ) {
	   wp_schedule_event( time(), 'daily', 'delete_temporal_images' );
	}

	add_action( 'delete_temporal_images', function(){

		$templateDir = get_template_directory();

		$directories = array('imagenesPaso1', 'imagenesPaso2', 'imagenesPaso3', 'imagenesPaso4');

		foreach ($directories as $directory) :
			/*
			$files = glob("$templateDir/img/$directory/{,.}*", GLOB_BRACE);
			foreach($files as $file){
				if ( is_file($file) ){ unlink($file); }
			}
			*/

			foreach (new DirectoryIterator("$templateDir/img/$directory") as $fileInfo){
				unlink($fileInfo->getPathname());
			}
		endforeach;
	});



// REDIRECT USER IF NOT LOGGED IN ////////////////////////////////////////////////////




	// add_action('get_header', function(){
		// $result = validate_facebook_users();
		// if ( !is_admin() and !is_front_page() and !is_user_logged_in() ){
		// 	wp_redirect( home_url() );
		// }
	// });




// FACEBOOK PHP API INIT METHOD //////////////////////////////////////////////////////


		require_once('inc/facebook-php-sdk/src/facebook.php');

		$facebook = new Facebook(array(
			'appId'  => '408409585943256',
			'secret' => '5eea8805ad313fe6b016adb56bac3f88'
		));


		if ( isset($_POST['signed_request']) ) {
			$result = parse_signed_request( $_POST['signed_request'] );

			if ( isset($result['user_id']) ) {
				$facebook_user_data = $facebook->api('/'.$result['user_id']);
				generate_wordpress_user($facebook_user_data);
			}
		}



// POST TYPES, METABOXES AND TAXONOMIES //////////////////////////////////////////////



	require_once('inc/metaboxes.php');


	require_once('inc/post-types.php');


	require_once('inc/pages.php');



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter('show_admin_bar' ,function($content){
		// return ( current_user_can('administrator') ) ? $content : false;
		return false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter('admin_footer_text', function() {
		echo 'Creado por <a href="http://hacemoscodigo.com">Los Maquiladores</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// GUARDAR IMAGENES DE MOMENTOS GOLD A UN DIRECTORIO TEMPORAL ////////////////////////



	/**
	 * Momentos Gold: Guarda imagenes temporales
	 */
	function save_temporal_image(){
		global $current_user;
		if( $current_user and isset($_POST['image_data']) ) {

			$imageData = $_POST['image_data'];
			$directory = $_POST['directory'];

			checkMomentosGoldTempFolders(); // validar/crear los directorios necesarios

			if( isValidURL($imageData) ) {
				$result = saveImageFromUrl( $imageData, $directory );
			} else {
				$result = saveImageFromString( $imageData, $directory );
			}
		}
		echo json_encode( $result );
		exit;
	}
	add_action('wp_ajax_save_temporal_image', 'save_temporal_image');
	add_action('wp_ajax_nopriv_save_temporal_image', 'save_temporal_image');




// MAQUILADORES HELPER FUNCTIONS /////////////////////////////////////////////////////



	/**
	 * Momentos Gold:
	 * Crea directorios para guardar imagenes temporales
	 */
	function checkMomentosGoldTempFolders(){

		$templateDir = get_template_directory();

		$directories = array('imagenesPaso1', 'imagenesPaso2', 'imagenesPaso3', 'imagenesPaso4');

		foreach ($directories as $directory) :
			if ( !file_exists($templateDir."/img/$directory") ) {
				mkdir( $templateDir."/img/$directory" );
			}
		endforeach;
	}



	/**
	 * Validar si un string es un URL valido
	 */
	function isValidURL($url){
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}



	/**
	 * Guardar imagenes desde una URL
	 * @return number of bytes that were written to the file, or FALSE on failure.
	 */
	function saveImageFromUrl($url, $directory){
		global $current_user;
		return file_put_contents(
			get_template_directory()."/img/$directory/$current_user->user_login.png",
			file_get_contents($url)
		);
	}



	/**
	 * Crear y guardar una imagen a partir de un string (image data)
	 * @return boolean TRUE | FALSE
	 */
	function saveImageFromString($string, $directory){
		global $current_user;
		$imagen = imagecreatefromstring( base64_decode($string) );
		$path   = get_template_directory()."/img/$directory/$current_user->user_login.png";
		$result = imagepng( $imagen, $path, 0 );
		imagedestroy( $imagen );
		return $result;
	}



	function parse_signed_request($signed_request) {
		list($encoded_sig, $payload) = explode('.', $signed_request, 2);

		// decode the data
		$sig  = base64_url_decode($encoded_sig);
		$data = json_decode(base64_url_decode($payload), true);
		return $data;
	}



	function base64_url_decode($input) {
		return base64_decode(strtr($input, '-_', '+/'));
	}



	function get_photo_albums_data(){
		global $facebook;
		if ( $facebook->getUser() ) {

			$user_id = $facebook->getUser();
			$access_token = $facebook->getAccessToken();
			$albums = $facebook->api('me/albums');

			$data = array();
			foreach($albums['data'] as $index => $album){
				$temp = $facebook->api("{$album['id']}?fields=picture", "get");
				$data[$index]['id']   = $temp['id'];
				$data[$index]['name'] = $album['name'];
				$data[$index]['url']  = $temp['picture']['data']['url'];
			}
			return $data;
		}
	}




	function generate_wordpress_user($facebook_user_data) {
		if ( email_exists($facebook_user_data['email']) ) {
			auto_login_user($facebook_user_data);
		} else {
			//ese mail NO esxiste ne la base de datos
			create_new_wp_user($facebook_user_data);
		}
	}




	function auto_login_user($facebook_user_data) {
		extract($facebook_user_data);
		$wp_user_id = email_exists($email);
		$user = new WP_User( (int)$wp_user_id );
		update_user_meta( $user->ID, 'first_name', $first_name);
		update_user_meta( $user->ID, 'last_name', $last_name);
		wp_set_auth_cookie( $user->ID, true, 0 );
	}




	function create_new_wp_user($facebook_user_data) {
		global $wpdb;

		extract($facebook_user_data);
		$password = wp_generate_password();
		$user     = wp_create_user($username, $password, $email);
		$credentials = array(
			'user_login' 	=> $username,
			'user_password' => $password,
			'remember' 		=> true
		);
		$user = wp_signon( $credentials, false );

		update_user_meta( $user->ID, 'first_name', 	$first_name);
		update_user_meta( $user->ID, 'last_name', 	$last_name);

		wp_set_current_user( $user->ID );
	}