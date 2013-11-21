<?php


	function __autoload($class_name) {
		if ( preg_match( '/html/i', $class_name ) )
			include 'inc/class.html.php';
	}



// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'THEMEPATH', get_template_directory_uri() );

	define( 'CSSPATH', get_template_directory_uri().'/css/' );

	define( 'SITEURL', site_url().'/' );



// HELPER CHECK IF USER IS ADMIN OR DEVELOPER ////////////////////////////////////////



	function is_bemygirl_admin($user){
		$accepted = array('administrator', 'developer');
		return in_array($accepted, $user->caps);
	}



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action('wp_enqueue_scripts', function() use (&$current_user) {

		// scripts
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true);


		// if user is admin use backbone and underscore js
		if ( is_bemygirl_admin($current_user) ){
			wp_enqueue_script('underscore', JSPATH.'underscore.js', array('plugins', 'jquery-ui-datepicker'), '1.5.2', true);
			wp_enqueue_script('backbone', JSPATH.'backbone.js', array('underscore'), '1.1.0', true);
			wp_enqueue_script('dashboard', JSPATH.'dashboard.js', array('backbone'), '1.0', true);
			wp_enqueue_script('functions', JSPATH.'functions.js', array('dashboard'), '1.0', true);
		}else{
			wp_enqueue_script('underscore', JSPATH.'underscore.js', array('plugins'), '1.5.2', true);
			wp_enqueue_script('functions', JSPATH.'functions.js', array('underscore', 'jquery-ui-datepicker'), '1.0', true);
		}

		// localize scripts
		localize_custom_scripts();

		// styles
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('plugins-css', CSSPATH.'plugins.css');
		wp_enqueue_style('style-admin', CSSPATH.'style-admin.css');

	});


	/**
	 * Localize scripts
	 */
	function localize_custom_scripts(){
		// localize functions.js
		wp_localize_script('functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script('functions', 'home_url', site_url('/home/') );
		wp_localize_script('dashboard', 'upload_dir', wp_upload_dir() );
		wp_localize_script('functions', 'json_regiones', get_regiones_data() );
		wp_localize_script('functions', 'selected_area', get_selected_area() );

		// localize dashboard.js
		wp_localize_script('dashboard', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script('dashboard', 'ajax_nonce', wp_create_nonce('_ajax_nonce') );
		wp_localize_script('dashboard', 'theme_url', THEMEPATH );
	}



// SITE REDIRECTIONS /////////////////////////////////////////////////////////////////



	add_action('template_redirect', function() use (&$current_user){
		if( is_page('dashboard') AND ! is_bemygirl_admin($current_user) ){
			wp_redirect( site_url('/wp-login/') );
		}
	});


	add_action('admin_init', function () use (&$current_user){
		if ( ! defined('DOING_AJAX') AND is_bemygirl_admin($current_user) ){
			set_terms_accepted_session();
			wp_redirect( site_url('/dashboard/') );
		}
	});



// ENQUEQUE LOGIN SCREEN CUSTOM STYLES ///////////////////////////////////////////////



	add_action( 'login_enqueue_scripts', function(){
		wp_enqueue_style( 'styles_login', CSSPATH.'login.css' );
	});



// UNSET WORDPRESS DEFAULT IMAGE SIZES ///////////////////////////////////////////////



	add_filter('intermediate_image_sizes_advanced', function($sizes) {
		unset($sizes['thumbnail']);
		unset($sizes['medium']);
		unset($sizes['large']);
		return $sizes;
	});



// ADD THUMBNAIL SUPPORT /////////////////////////////////////////////////////////////



	add_theme_support('post-thumbnails');

	add_image_size( 'imagen_register', 318, 317, true );
	add_image_size( 'imagen_term', 845, 315, true );
	add_image_size( 'imagen_girl', 313, 313, true );
	add_image_size( 'imagen_girl_large', 760, 9999 );



// REWRITE AUTHOR BASE URL ///////////////////////////////////////////////////////////



	add_action('init', function () use (&$wp_rewrite){
		$wp_rewrite->author_base = 'girl';
	});



 // INTERNATIONALIZATION - i18n ///////////////////////////////////////////////////////



	add_action( 'after_setup_theme', function (){
		load_theme_textdomain('bemygirl', get_template_directory() . '/languages' );
		apply_filters( 'theme_locale', get_locale(), 'bemygirl' );
	});



// REMOVE WORDPRESS MENU BAR  ////////////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return false;
	});



// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');


	require_once('inc/metaboxes.php');


	require_once('inc/taxonomies.php');


	require_once('inc/pages.php');


	require_once('inc/ajax-functions.php');


	require_once('inc/users.php');


	require_once('inc/twitter.php');



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action( 'pre_get_posts', function($query){

		if ( ! is_admin() AND $query->is_main_query() ) {

			if ( is_post_type_archive('magazine') ){
				$query->set('posts_per_page', 5);
			}
		}
		return $query;

	});



// FRONT PAGE DISPLAYS A STATIC PAGE /////////////////////////////////////////////////



	add_action( 'after_setup_theme', function () {

		$frontPage = get_page_by_path('terms', OBJECT);
		$blogPage  = get_page_by_path('home', OBJECT);

		if ( $frontPage AND $blogPage ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $frontPage->ID);
			update_option('page_for_posts', $blogPage->ID);
		}
	});



// ENQUEUE THE SESSION START/END FUNCTIONS ///////////////////////////////////////////



	add_action( 'init', function(){
		if( ! session_id()) session_start();
	});


	function bemygirl_end_session(){
		session_destroy();
	}
	add_action( 'wp_logout', 'bemygirl_end_session' );
	add_action( 'wp_login', 'bemygirl_end_session' );



// REDIRECT SI EL USUARIO NO ACEPTO TERMINOS Y CONDICIONES ///////////////////////////



	add_action('template_redirect', function(){
		if ( ! is_page('terms') AND ! isset($_SESSION['bemygirl_terms']) ){
			wp_die(__('You Must accept the terms and conditions to view the site', 'bemygirl'));
		}
		if( is_page('terms') AND isset($_SESSION['bemygirl_terms']) AND ! isset($_GET['accepted'])){
			wp_redirect(site_url('/home/'));
		}
	});



// HELPER FUNCTIONS PARA LOCALIZAR VARIABLES A JAVASCRIPT/////////////////////////////



	function get_regiones_data(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT {$wpdb->prefix}usermeta.meta_value AS `region`, um2.meta_value AS `area` FROM {$wpdb->prefix}usermeta
				INNER JOIN {$wpdb->prefix}usermeta AS um2 ON ( {$wpdb->prefix}usermeta.user_id = um2.user_id AND um2.meta_key =  'area' )
					WHERE {$wpdb->prefix}usermeta.meta_key = 'region'",
			OBJECT
		);
	}

	function get_selected_area(){
		return isset($_GET['area']) ? $_GET['area'] : 'All';
	}



// BREADCRUMBS ///////////////////////////////////////////////////////////////////////



	function get_breadcrumbs(){
		global $wpdb;

		if ( ! isset($_GET['region'])) return;

		$result = "";
		$and    = "?";
		$url    = site_url('/home/');

		if ( check_GET('region') ){
			$url    .= "{$and}region={$_GET['region']}";
			$result .= " > <a href='$url'>{$_GET['region']}</a>";
			$and     = "&";
			if ( check_GET('area') ){
				$url    .= "{$and}area={$_GET['area']}";
				$result .= " > <a href='$url'>{$_GET['area']}</a>";
			}
		}
		if ( check_GET('type') ){
			$url    .= "{$and}type={$_GET['type']}";
			$result .= " > <a href='$url'>{$_GET['type']}</a>";
			$and     = "&";
		}
		if ( check_GET('tags') ){
			$url    .= "{$and}tags={$_GET['tags']}";
			$result .= " > <a href='$url'>{$_GET['tags']}</a>";
		}
		echo $result;
	}


	/**
	 * Check if specific field isseet in the $_GET global variable
	 * @param  string $field
	 * @return boolean
	 */
	function check_GET($field){
		return (
			isset( $_GET[$field] )
			AND $_GET[$field] !== 'All'
			AND $_GET[$field] !== ''
		);
	}



// MAQUILADORES HELPER FUNCTIONS /////////////////////////////////////////////////////



	function previous_page_link_plus(){
		return array( 'role' => 'escort', 'orderby' => 'rand' );
	}



	/**
	 * Get all images for current post. Use within the loop.
	 * @param  array  $args
	 * @return array  List of post objects.
	 */
	function get_post_images( $args = array() ) {
		global $post;

		$defaults = array(
			'numberposts'    => -1,
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'post_mime_type' => 'image',
			'post_parent'    => $post->ID,
			'post_type'      => 'attachment',
		);

		$args = wp_parse_args( $args, $defaults );

		return get_posts( $args );
	}



	/**
	 * Set the global $_SESSION variable to access the site.
	 */
	function set_terms_accepted_session(){
		$_SESSION['bemygirl_terms'] = 1;
	}



	/**
	 * Regresa la url del attachment especificado
	 * @param  int     $post_id
	 * @param  string  $size
	 * @return string  url de la imagen
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}



	/**
	 * Convierte las url's @ mentions y hashtags en links
	 * @param  string
	 * @return string
	 */
	function parseLinks($text) {
		$links    = make_clickable($text);
		$patterns = array("/@([a-zA-Z0-9_]+)/", "/#([a-zA-Z0-9_]+)/");
		$replace  = array(
			"<a href='http://twitter.com/$1' target='_blank'>@$1</a>",
			"<a href='http://twitter.com/#$1' target='_blank'>#$1</a>"
		);
		return preg_replace($patterns, $replace, $links);
	}



	/**
	 * Imprime selected si el option field lo necesita
	 * @param  string  $field $_GET[field] name
	 * @param  string  $value
	 */
	function is_selected($field, $value){
		if ( isset($_GET[$field]) AND $_GET[$field] == $value )
			echo 'selected';
	}



	/**
	 * Imprime active si el string coincide con la pagina que se esta mostrando
	 * @param  string $string
	 * @return string
	 */
	function nav_is($string = ''){
		$query = get_queried_object();

		if( isset($query->slug) AND preg_match("/$string/i", $query->slug)
				OR isset($query->name) AND preg_match("/$string/i", $query->name)
				OR isset($query->rewrite) AND preg_match("/$string/i", $query->rewrite['slug'])
				OR isset($query->post_title) AND preg_match("/$string/i", remove_accents(str_replace(' ', '-', $query->post_title) ) ) )
				echo 'active';
	}



	/**
	 * Regresa un array con los servicios de la escort
	 * @param  int     $escort_ID [id de escort]
	 * @return string             [nombre del servicio]
	 */
	function get_user_services($escort_ID, $type) {
		global $wpdb;

		if ($type === "services"):
			$type_query = "(service_type = 'service_ordinary' OR service_type = 'service_extra')";
		else:
			$type_query = "service_type = '$type'";
		endif;

		return $wpdb->get_results(
			"SELECT service_name FROM {$wpdb->prefix}services
			   INNER JOIN {$wpdb->prefix}service_relationships ON service_id = service_relationship_id
				   WHERE escort_id = $escort_ID AND $type_query ;"
		);
	}



// SAVE ATTACHMENT DATA //////////////////////////////////////////////////////////////



	function saveAttachmentData($data, $image_name){
		$imagen      = imagecreatefromstring( base64_decode($data) );
		$upload_dir  = wp_upload_dir();
		$newfilename = wp_unique_filename( $upload_dir['path'], $image_name );
		$path        = $upload_dir['path']. '/'. "$image_name.png";
		$upload      = imagepng( $imagen, $path, 0 );
		return $upload ? $upload_dir['path'].'/'."$image_name.png" : false;
	}




// CROP IMAGE MENU /////////////////////////////////////////////////////////////////

	function saveCropImage($imagen, $image_name){
		$upload_dir  = wp_upload_dir();
		$newfilename = wp_unique_filename( $upload_dir['path'], $image_name );
		$path        = $upload_dir['path']. '/'. "$image_name.png";
		$upload      = imagepng( $imagen, $path, 0 );
		return $upload ? $upload_dir['path'].'/'."$image_name.png" : false;
	}


	function cortar_imagen_png($x, $y, $width, $height, $image_name, $file ){

			header('Content-Type: image/png');

			$dst_x = 0;
			$dst_y = 0;
			$src_x = $x;
			$src_y = $y;
			$dst_w = $width;
			$dst_h = $height;
			$src_w = $width;
			$src_h = $height;

			//crop image
			$dst_image = imagecreatetruecolor($dst_w,$dst_h);
			$src_image = imagecreatefrompng($file);


			imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

			return $image_crop = saveCropImage($dst_image, $image_name);

	}



	function is_checked($field, $value){
		echo ( isset($field) AND $field == $value ) ? 'checked' : '';
	}



	function get_user_id_from_path(){
		if ( ! isset($_SERVER['REQUEST_URI'])) return false;

		$path = pathinfo($_SERVER['REQUEST_URI']);
		return $path['basename'];
	}