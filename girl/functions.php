<?php


// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'THEMEPATH', get_template_directory_uri() );

	define( 'CSSPATH', get_template_directory_uri().'/css/' );

	define( 'SITEURL', site_url().'/' );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action('wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true);
		wp_enqueue_script('functions', JSPATH.'functions.js', array('plugins', 'jquery-ui-datepicker'), '1.0', true);

		// localize scripts
		wp_localize_script('functions', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php' );

		// styles
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('plugins-css', CSSPATH.'plugins.css');
		wp_enqueue_style('style-admin', CSSPATH.'style-admin.css');

	});



// ADD THUMBNAIL SUPPORT /////////////////////////////////////////////////////////////



	add_theme_support('post-thumbnails');

	add_image_size( 'imagen_register', 318, 317, true );
	add_image_size( 'imagen_term', 845, 315, true );



// REWRITE AUTHOR BASE URL ///////////////////////////////////////////////////////////



	add_action('init', function () use (&$wp_rewrite){
		$wp_rewrite->author_base = 'girl';
	});



 // INTERNATIONALIZATION - i18n ///////////////////////////////////////////////////////



	add_action( 'after_setup_theme', function (){
		load_theme_textdomain('bemygirl', get_template_directory() . '/languages' );
		apply_filters( 'theme_locale', get_locale(), 'bemygirl' );
	});



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



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



// MODIFICAR EL QUERY DE USUARIOS ////////////////////////////////////////////////////



	// add_action( 'pre_user_query', function($query) use (&$wpdb){
	// 	$query->query_orderby = 'GROUP BY user_login ORDER BY RAND()';
	// 	return $query;
	// });




// MAQUILADORES HELPER FUNCTIONS /////////////////////////////////////////////////////



	function previous_page_link_plus(){
		return array( 'role' => 'escort', 'orderby' => 'rand' );
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