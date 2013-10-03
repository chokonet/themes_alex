<?php


// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );


	define( 'CSSPATH', get_template_directory_uri() . '/css/' );


	define( 'THEMEPATH', get_template_directory_uri() . '/' );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});



 // INTERNATIONALIZE THEME ////////////////////////////////////////////////////////////



	add_action( 'after_setup_theme', function (){
		load_theme_textdomain('fashion', get_template_directory() . '/languages' );
		apply_filters( 'theme_locale', get_locale(), 'fashion' );
	});




// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://hacemoscodigo.com">Los Maquiladores</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}

	if ( function_exists('add_image_size') ){

		add_image_size( 'acerca_de', 960, 460, true );
		add_image_size( 'marcas-img', 210, 100, true );

		// cambiar el tamaño del thumbnail
		/*
		update_option( 'thumbnail_size_h', 100 );
		update_option( 'thumbnail_size_w', 200 );
		update_option( 'thumbnail_crop', false );
		*/
	}



// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');


	require_once('inc/metaboxes.php');


	require_once('inc/taxonomies.php');


	require_once('inc/pages.php');


	require_once('inc/users.php');



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action( 'pre_get_posts', function($query){

		if ( $query->is_main_query() and ! is_admin() ) {

		}
		return $query;

	});



// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////



	/*add_filter('excerpt_length', function($length){
		return 20;
	});*/


	/*add_filter('excerpt_more', function(){
		return ' &raquo;';
	});*/




// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////



	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Pagina %s' ), max( $paged, $page ) );
		}
	}



	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function print_the_terms($post_id, $taxonomy = 'category'){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'name');
			echo implode(', ', $names);
		}
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
	 * tema por page
	 * @return [string] [color tema]
	 */
	function pasa_class_theme(){

		if ( is_page('productos') ) {
			echo "tema_verde";
		}
		if ( is_page('contacto') ) {
			echo "tema_morado";
		}

	}

	/**
	 * envia mail de form escribenos
	 * @return [string] [mail]
	 */
	function ajax_envia_mail(){

		if ( ! isset($_GET)){
			wp_send_json_error();
		}

		if ( ! filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
			wp_send_json_error('El campo de mail es invalido');
		}

		extract($_GET);
		$fecha = date('d-m-Y H:i:s');
		$mailContent = "Mensaje de $nombre \n\rEmail: $email  \n\rFecha: $fecha \n\rMensaje: $mensaje";

		$result = wp_mail( 'alex@losmaquiladores.com', 'Fashion Depot', $mailContent );
		wp_send_json($result);
	}

	add_action('wp_ajax_ajax_envia_mail', 'ajax_envia_mail');
	add_action('wp_ajax_nopriv_ajax_envia_mail', 'ajax_envia_mail');


	/**
	 * envia mail de form clientes
	 * @return [string] [mail]
	 */
	function ajax_envia_mail_clientes(){

		if ( ! isset($_GET)){
			wp_send_json_error();
		}

		if ( ! filter_var($_GET['correo'], FILTER_VALIDATE_EMAIL)){
			wp_send_json_error('El campo de mail es invalido');
		}

		extract($_GET);

		$fecha = date('d-m-Y H:i:s');
		$mailContent = "Mensaje de $nombre $apellido \n\rEmail: $correo  \n\rEmpresa: $empresa \n\rPuesto: $puesto \n\rFecha: $fecha \n\rMensaje: $mensaje";

		$result = wp_mail( 'alex@losmaquiladores.com', 'Fashion Depot', $mailContent );
		wp_send_json($result);



	}

	add_action('wp_ajax_ajax_envia_mail_clientes', 'ajax_envia_mail_clientes');
	add_action('wp_ajax_nopriv_ajax_envia_mail_clientes', 'ajax_envia_mail_clientes');