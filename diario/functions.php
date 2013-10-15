<?php

	// error_reporting(0); // UNCOMMENT IN PRODUCTION

	$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

	if (preg_match('/MSIE/i', $user_agent)) {
		header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
	}



// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() . '/' );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins', 'jquery-ui-slider', 'jquery-ui-datepicker'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'pdf_url', site_url('/pdf/') );
		wp_localize_script( 'plugins', 'template_url',  get_bloginfo('template_url'));
		mq_localize_user_meta();

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );
		wp_enqueue_style( 'chosen-css', CSSPATH.'chosen.css' );

	});


	function mq_localize_user_meta(){
		global $current_user;
		get_currentuserinfo();
		wp_localize_script( 'functions', 'user_meta', get_user_meta($current_user->ID) );
	}



// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});



// AGREGAR CLASE FAVORITO AL SINGLE //////////////////////////////////////////////////



	add_filter('body_class', function($classes) use (&$current_user) {
		get_currentuserinfo();
		$mother_status = get_user_meta($current_user->ID, 'mother_status', true);
		array_push($classes, $mother_status);
		return $classes;
	});



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		//return ( current_user_can('administrator') ) ? $content : false;
		return false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://hacemoscodigo.com/home/">Los Maquiladores</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	add_theme_support('post-thumbnails');

	add_image_size( 'gallery', 180, 181, true );
	add_image_size( 'gallery-pop', 393, 393, true );



// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');


	require_once('inc/metaboxes.php');


	require_once('inc/taxonomies.php' );


	require_once('inc/pages.php');


	require_once('inc/facebook.php');


	require_once('inc/functions-ajax.php');


	require_once('inc/users.php');



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action( 'pre_get_posts', function($query){

		if ( $query->is_main_query() and ! is_admin() ) {


		}
		return $query;

	});



// ELIMINAR LA PALABRA PRIVADO DEL TITULO ////////////////////////////////////////////



	add_filter('the_title', function ($title){
		return preg_replace('/Privado: /', '', $title);
	});



// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////



	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});



	function cover_image(){
		global $current_user;
		get_currentuserinfo();

		$templateDir = get_template_directory();

		if ( file_exists($templateDir."/images/covers/{$current_user->user_login}.png") ){
			return THEMEPATH."images/covers/{$current_user->user_login}.png";
		}else{
			return false;
		}
	}



	/**
	 * Crea el directorio para guardar las imagenes de portada
	 */
	function checkCoverFotoFolder(){
		$templateDir = get_template_directory();
		if ( ! file_exists($templateDir.'/images/covers') ) {
			mkdir( $templateDir.'/images/covers' );
		}
	}



	/**
	 * Validar si un string es un URL valido
	 * @param  string  $url
	 * @return boolean
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
			get_template_directory()."/images/$directory/$current_user->user_login.png",
			file_get_contents($url)
		);
	}


	function saveAttachmentImage($url){
		global $current_user;
		get_currentuserinfo();
		$upload_dir  = wp_upload_dir();
		$newfilename = wp_unique_filename( $upload_dir['path'], $current_user->user_login.'.png' );
		$upload = file_put_contents(
			$upload_dir['path']. '/'. "$newfilename",
			file_get_contents($url)
		);
		return $upload ? $upload_dir['path'].'/'."$newfilename" : false;
	}


	function saveAttachmentData($data){
		global $current_user;
		get_currentuserinfo();
		$imagen      = imagecreatefromstring( base64_decode($data) );
		$upload_dir  = wp_upload_dir();
		$newfilename = wp_unique_filename( $upload_dir['path'], $current_user->user_login.'.png' );
		$path        = $upload_dir['path']. '/'. "$newfilename";
		$upload      = imagepng( $imagen, $path, 0 );
		return $upload ? $upload_dir['path'].'/'."$newfilename" : false;
	}


	/**
	 * Crear y guardar una imagen a partir de un string (image data)
	 * @param  string $string
	 * @param  string $directory
	 * @return boolean
	 */
	function saveImageFromString($string, $directory){
		global $current_user;
		$imagen = imagecreatefromstring( base64_decode($string) );
		$path   = get_template_directory()."/images/$directory/$current_user->user_login.png";
		$result = imagepng( $imagen, $path, 0 );
		imagedestroy( $imagen );
		return $result;
	}



	function nombre_bebe(){
		global $current_user;
		get_currentuserinfo();
		$nombre = get_user_meta( $current_user->ID, 'nombre_bebe', true );
		echo $nombre;
	}

	//SI LA FOTO DEL ALBUM TIENE THUMBNAIL

	function TieneThumbnail($imagen){
		if ($imagen == ''):
			echo 'picframe';
	    else:
			echo 'abre_pop';
		endif;
	}
