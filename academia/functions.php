<?php


// DEFINIR EL PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ////////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );


	define( 'CSSPATH', get_template_directory_uri() . '/css/' );


	define( 'THEMEPATH', get_template_directory_uri().'/' );



// ENQUEUE FRONT END JAVASCRIPT AND CSS //////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery'), false, true );
		wp_enqueue_script('functions', JSPATH.'functions.js', array('plugins', 'jquery-effects-core'), false, true );

		// styles
		wp_enqueue_style('style', get_stylesheet_uri());

		//localize
		wp_localize_script('plugins', 'template_url',  get_bloginfo('template_url'));
		wp_localize_script('plugins', 'is_single',  (string)is_single() );
		wp_localize_script('functions', 'ajax_url',  admin_url('admin-ajax.php'));

		if (is_home()){
			wp_localize_script('functions', 'is_home', 'true');
		}


	});



// ADD THUMBNAIL SUPPORT /////////////////////////////////////////////////////////////



	add_theme_support( 'post-thumbnails' );

		add_image_size( 'seccion_imagen', 619, 175, true );
		add_image_size( 'seccion_imagen_chica', 296, 153, true );
		add_image_size( 'imagen_single', 619, 314, true );
		add_image_size( 'imagen_single_relacion', 247, 100, true );



// METABOXES, TAXONOMIES AND POST TYPES //////////////////////////////////////////////



	require_once 'inc/metaboxes.php';


	require_once 'inc/taxonomies.php';


	require_once 'inc/post-types.php';


	require_once 'inc/custom-pages.php';


	require_once 'inc/queries.php';


	require_once 'inc/users.php';



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action('pre_get_posts', function($query){

		if ( !is_admin() AND $query->is_main_query() ) :
			if ( $query->get( 'category_name' ) ){
				$query->set('posts_per_page', -1);
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
		return 50;
	});


	add_filter('excerpt_more', function(){
		return ' ...';
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



// AGREGAR ACTIVIDAD A LA BASE DE DATOS //////////////////////////////////////////////



	add_action('wp_footer', function() use (&$post){
		$facebook_user = get_facebook_user();
		if ( is_single() AND $facebook_user AND $post ){
			$existe = check_if_actividad_exists($facebook_user, $post->ID);
			if ( ! $existe) {
				create_new_actividad($facebook_user, $post->ID);
			}
		}
	});



// AGREGAR ACTIVIDAD A LA BASE DE DATOS //////////////////////////////////////////////



	/**
	 * Crea campos en la tabla wp_actividades, si ya existe el campo solo se actualiza.
	 * Ademas se puede especificar si el post debe marcarse como favorito.
	 *
	 * @param $_POST['post_id']
	 * @param $_POST['favorito'] Si el post es favorito o no
	 */

	function administrar_favoritos(){

		$post_id       = isset($_POST['post_id'])  ? $_POST['post_id']  : false;
		$favorito      = isset($_POST['favorito']) ? $_POST['favorito'] : false;
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



// AGREGAR CLASE FAVORITO AL SINGLE //////////////////////////////////////////////////



	add_filter('body_class', function($classes) use (&$post) {
		if( $post AND is_post_favorito($post->ID) ){
			array_push($classes, 'favorito');
		}else{
			array_push($classes, 'no-favorito');
		}
		return $classes;
	});



// MAQUILADORES HELPER FUNCTIONS /////////////////////////////////////////////////////



	/**
	 * Regresa el id del usuario de facebook
	 * @return String
	 */
	function get_facebook_user(){
		global $fbUser;
		return $fbUser;
	}



	/**
	 * Regresa la fecha con el formato correcto
	 * @param  Timestamp $fecha
	 * @return String
	 */
	function parsepostDate($fecha){

		$minutos = ( time() - $fecha )/60;

		if($minutos < 60){
			return round($minutos).' minutos';
		}else if($minutos < 1440){
			return round($minutos/60).' horas';
		}else if($minutos >= 1440){
			return round($minutos/1440).' dias';
		}
	}




	/**
	 * Actualiza un campo en la tabla wp_actividad
	 * @param  String  $facebook_user
	 * @param  Integer  $post_id
	 * @param  Integer $favorito
	 * @return Boolean
	 */
	function update_actividad($facebook_user, $post_id, $favorito = 0){
		global $wpdb;
		$result = $wpdb->query(
			"UPDATE wp_actividad SET favorito = '$favorito'
				WHERE facebook_id = '$facebook_user' AND post_id = '$post_id';"
		);
		return ($result !== false) ? 1 : 0;
	}



	/**
	 * Crea una nueva entrada en la tabla wp_actividad
	 * @param  String  $facebook_user
	 * @param  Integer  $post_id
	 * @param  Integer $favorito
	 * @return Boolean
	 */
	function create_new_actividad ($facebook_user, $post_id, $favorito = 0) {
		global $wpdb;
		$result = $wpdb->query( $wpdb->prepare(
			"INSERT INTO wp_actividad ( facebook_id, post_id, favorito ) VALUES ( %d, %d, %d );",
			$facebook_user, $post_id, $favorito
		));
		return ($result !== false) ? 1 : 0;
	}



	/**
	 * Revisa si un existe el campo en la tabla wp_actividad
	 * @param  String $facebook_user
	 * @param  String $post_id
	 * @return Boolean
	 */
	function check_if_actividad_exists ($facebook_user, $post_id) {
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare(
			"SELECT COUNT(actividad_id) FROM wp_actividad WHERE facebook_id = %d AND post_id = %d;",
			$facebook_user, $post_id
		));
	}



	/**
	 * Regresa todos los posts leeidos por el usuario
	 * @return Array
	 */
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



	/**
	 * Regresa todos los posts favoritos del usuario
	 * @return Array
	 */
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



	/**
	 * Regresa la clase 'style' segun la categoria
	 * @param  String $category
	 * @return String
	 */
	function get_category_style($category){
		switch ($category[0]->cat_name) {
			case 'Mi Embarazo' : echo 'embarazo_pleca'; break;
			case '0-6 Meses'   : echo 'primeros_pleca'; break;
			case '6-12 Meses'  : echo 'sorpresas_pleca'; break;
			case '1-3 Años'    : echo 'descubriendo_pleca'; break;
		}
	}



	/**
	 * Regresa la clase 'back' segun la categoria
	 * @param  String $category
	 * @return String
	 */
	function get_category_back($category){
		switch ($category[0]->cat_name) {
			case 'Mi Embarazo' : echo 'embarazo_back'; break;
			case '0-6 Meses'   : echo 'primeros_back'; break;
			case '6-12 Meses'  : echo 'sorpresas_back'; break;
			case '1-3 Años'    : echo 'descubriendo_back'; break;
		}
	}



	/**
	 * Regresa la clase 'back' segun la categoria
	 * @param  String $category
	 * @return String
	 */
	function get_category_text($category){
		switch ($category[0]->cat_name) {
			case 'Mi Embarazo' : echo 'embarazo_texto'; break;
			case '0-6 Meses'   : echo 'primeros_texto'; break;
			case '6-12 Meses'  : echo 'sorpresas_texto'; break;
			case '1-3 Años'    : echo 'descubriendo_texto'; break;
		}
	}



	/**
	 * Regresa un los ID's de los amigos que tambien leyeron el post
	 * @param String $_GET['friends'] Array con los ID's de los amigos
	 * @param String $_GET['post_id'] the post ID
	 * @return Array
	 */
	function get_friends_posts(){

		// if ( ! isset($_GET['friends']) ){
		// 	wp_send_json_error();
		// }

		global $wpdb;
		$friends = implode( ' OR facebook_id = ', array_values($_GET['friends']) );
		$post_id = isset($_GET['post_id']) ? $_GET['post_id'] : 0;

		$results = $wpdb->get_results(
			"SELECT DISTINCT facebook_id FROM wp_actividad
				WHERE post_id = $post_id AND ( facebook_id = $friends ) LIMIT 5;", OBJECT
		);

		echo json_encode($results);
		exit;
	}
	add_action('wp_ajax_get_friends_posts', 'get_friends_posts');
	add_action('wp_ajax_nopriv_get_friends_posts', 'get_friends_posts');




	/**
	 * Regresa si el posts esta marcado como favorito en la tabla wp_actividad
	 * @param  Integer  $post_id
	 * @return Boolean
	 */
	function is_post_favorito($post_id){
		global $wpdb;

		$facebook_id = get_facebook_user();

		$result = $wpdb->get_var(
			"SELECT COUNT(actividad_id) AS favorito FROM wp_actividad
				WHERE facebook_id = $facebook_id
					AND post_id   = $post_id
					AND favorito  = 1;"
		);

		return (boolean)$result;
	}



	/**
	 * Regresa la url del attachment especificado
	 * @param  integer $post_id
	 * @return string  $size
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}

	function get_frace_categoria($cat){

		switch ($cat) {
			case 'mi-embarazo' : echo '<p><strong>El Inicio de Todo:</strong> Mi embarazo</p>'; break;
			case '0-6-meses'   : echo '<p><strong>Mis Primeros Momentos:</strong> 0 - 6 meses</p>'; break;
			case '6-12-meses'  : echo '<p><strong>Sorpresas Cada Día:</strong> 6 - 12 meses</p>'; break;
			case '1-3-anos'    : echo '<p><strong>Descubriendo el Mundo:</strong> 1 - 3 años</p>'; break;
		}
	}