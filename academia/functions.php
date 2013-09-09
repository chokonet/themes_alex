<?php


// DEFINIR EL PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ////////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );


	define( 'CSSPATH', get_template_directory_uri() . '/css/' );


	define( 'THEMEPATH', get_template_directory_uri().'/' );



// ENQUEUE FRONT END JAVASCRIPT AND CSS //////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery'), false, true );
		wp_enqueue_script('functions', JSPATH.'functions.js', array('plugins'), false, true );

		// styles
		wp_enqueue_style('style', get_stylesheet_uri());

		//localize
		wp_localize_script('plugins', 'template_url',  get_bloginfo('template_url'));
		wp_localize_script('functions', 'ajax_url',  get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');

	});



// ADD THUMBNAIL SUPPORT /////////////////////////////////////////////////////////////



	add_theme_support( 'post-thumbnails' );

		add_image_size( 'seccion_imagen', 619, 175, true );
		add_image_size( 'seccion_imagen_chica', 296, 153, true );
		add_image_size( 'imagen_single', 619, 314, true );



// METABOXES, TAXONOMIES AND POST TYPES //////////////////////////////////////////////



	require_once 'inc/metaboxes.php';


	require_once 'inc/taxonomies.php';


	require_once 'inc/post-types.php';


	require_once 'inc/custom-pages.php';


	require_once 'inc/queries.php';



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action('pre_get_posts', function($query){

		if ( !is_admin() AND $query->is_main_query() ) :

			if ( $query->get( 'category_name' ) ){
				$query->set('posts_per_page', 4);
				$query->set('post_type', array('post','productos'));
			}

			if ( is_search() ) {
				$query->set('post_status', 'publish');
			}

		endif;

		return $query;
	});



// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////



	add_filter('excerpt_length', function(){
		return 8;
	});


	add_filter('excerpt_more', function(){
		return ' &raquo;';
	});



// FACEBOOK PHP API INTEGRATION //////////////////////////////////////////////////////


	require_once 'inc/facebook-php-sdk/src/facebook.php';

	$facebook = new Facebook(array(
		'appId'  => '672465082763688',
		'secret' => 'd13013e86073639b2c8f306e49675e86',
		'cookie' => true
	));

	$fbUser   = $facebook->getUser();
	$loginUrl = $facebook->getLoginUrl( array('scope'=>'email') );

	if ( ! $fbUser) {
	    echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
	    exit;
	}
	if (isset($_GET['code'])){
	    header("Location: " . site_url() );
	    exit;
	}


	function get_facebook_user(){
		global $fbUser;
		return $fbUser;
	}


	add_action('wp_footer', function() use (&$post){
		$facebook_user = get_facebook_user();
		if ( is_single() AND $facebook_user){
			$existe = check_if_actividad_exists($facebook_user, $post->ID);
			if ( ! $existe) {
				create_new_actividad($facebook_user, $post->ID);
			}
		}
	});



	/**
	 * Crea campos en la tabla wp_actividades, si ya existe el campo solo se actualiza.
	 * @param $_POST['post_id']
	 * @param $_POST['favorito']
	 */
	function administrar_favoritos(){

		$post_id  = isset($_POST['post_id']) ? $_POST['post_id'] : false;
		$favorito = isset($_POST['favorito']) ? $_POST['favorito'] : false;


		$facebook_user = get_facebook_user();



		if ( ! $facebook_user AND ! $post_id ) return;

		$existe = check_if_actividad_exists($facebook_user, $post_id);


		if ($existe){
			$result = update_actividad($facebook_user, $post_id, $favorito);
		} else {
			$result = create_new_actividad($facebook_user, $post_id, $favorito);
		}

		echo json_encode($result);
		exit;
	}
	add_action('wp_ajax_administrar_favoritos', 'administrar_favoritos');
	add_action('wp_ajax_nopriv_administrar_favoritos', 'administrar_favoritos');



// MAQUILADORES HELPER FUNCTIONS /////////////////////////////////////////////////////



	/**
	 * Regresa la fecha con el formato correcto
	 */
	function parsepostDate($fecha){

		$minutos = ( time() - $fecha )/60;

		if($minutos < 60){
			return roºund($minutos).' minutos';
		}else if($minutos < 1440){
			return round($minutos/60).' horas';
		}else if($minutos >= 1440){
			return round($minutos/1440).' dias';
		}
	}



	function update_actividad($facebook_user, $post_id, $favorito = 0){
		global $wpdb;
		$result = $wpdb->query(
			"UPDATE wp_actividad SET favorito = '$favorito'
				WHERE facebook_id = '$facebook_user' AND post_id = '$post_id';"
		);
		return ($result !== false) ? 1 : 0;
	}

	function create_new_actividad ($facebook_user, $post_id, $favorito = 0) {
		global $wpdb;
		$result = $wpdb->query( $wpdb->prepare(
			"INSERT INTO wp_actividad ( facebook_id, post_id, favorito ) VALUES ( %d, %d, %d );",
			$facebook_user, $post_id, $favorito
		));
		return ($result !== false) ? 1 : 0;
	}


	function check_if_actividad_exists ($facebook_user, $post_id) {
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare(
			"SELECT COUNT(actividad_id) FROM wp_actividad WHERE facebook_id = %d AND post_id = %d;",
			$facebook_user, $post_id
		));
	}


	function get_user_activity(){
		global $wpdb;
		$facebook_user = get_facebook_user();
		if ( ! $facebook_user) return false;

		return $wpdb->get_results(
			"SELECT * FROM wp_posts WHERE ID IN (
				SELECT post_id FROM wp_actividad WHERE facebook_id = '$facebook_user'
			) AND post_status = 'publish';", OBJECT
		);
	}


	function get_user_favorites(){
		global $wpdb;
		$facebook_user = get_facebook_user();

		if ( ! $facebook_user) return false;

		return $wpdb->get_results(
			"SELECT * FROM wp_posts WHERE ID IN (
				SELECT post_id FROM wp_actividad WHERE facebook_id = '$facebook_user' AND favorito = '1'
			) AND post_status = 'publish';", OBJECT
		);
	}


	function get_category_style($category){
		switch ($category[0]->cat_name) {
			case 'Mi Embarazo' : echo 'embarazo_pleca'; break;
			case '0-6 Meses'   : echo 'primeros_pleca'; break;
			case '6-12 Meses'  : echo 'sorpresas_pleca'; break;
			case '1-3 Años'    : echo 'descubriendo_pleca'; break;
		}
	}


	function get_category_back($category){
		switch ($category[0]->cat_name) {
			case 'Mi Embarazo' : echo 'embarazo_back'; break;
			case '0-6 Meses'   : echo 'primeros_back'; break;
			case '6-12 Meses'  : echo 'sorpresas_back'; break;
			case '1-3 Años'    : echo 'descubriendo_back'; break;
		}
	 }

	function get_category_text($category){
		switch ($category[0]->cat_name) {
			case 'Mi Embarazo' : echo 'embarazo_texto'; break;
			case '0-6 Meses'   : echo 'primeros_texto'; break;
			case '6-12 Meses'  : echo 'sorpresas_texto'; break;
			case '1-3 Años'    : echo 'descubriendo_texto'; break;
		}
	}