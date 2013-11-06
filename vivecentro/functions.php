<?php

	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() . '/' );



	// ENQUEUE FRONT END SCRIPTS ////////////////////////////////////////

		add_action('wp_enqueue_scripts', function(){


			// wp_dequeue_script( 'jquery' );
			// wp_enqueue_script( 'jquery', 'google.cdn.awesome', null, '1.10', true );

			wp_enqueue_script( 'cycle', JSPATH.'cycle.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'isotope', JSPATH.'isotope.js', array('cycle'), '1.0', true );
			wp_enqueue_script( 'maphilight', JSPATH.'jquery.maphilight.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'scrollTo', JSPATH.'scrollTo.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'facebook', JSPATH.'facebook.js', array('jquery', 'plugins'), '1.0', true );
			wp_enqueue_script( 'functions', JSPATH.'functions.js', array('isotope', 'plugins'), '1.0', true );

			// localize scripts
			wp_localize_script('facebook', 'template_url',  get_bloginfo('template_url'));
			wp_localize_script('facebook', 'ajax_url',  admin_url('admin-ajax.php') );
			wp_enqueue_style('style', get_stylesheet_uri());

		});





	// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////
	//

		add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'jquery-ui-autocomplete' ); // nativo de wordpress
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery', 'jquery-ui-autocomplete'), '1.0', true );


		$lugares = get_posts('post_type=lugares&posts_per_page=-1');

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'admin-js', 'lugares', $lugares );



		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});

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





	// POST TYPES, TAXONOMIES & METABOXES ///////////////////////////////////////////////


		require_once('inc/post-types.php');

		require_once('inc/taxonomies.php');

		require_once('inc/pages.php');

		require_once('inc/metaboxes.php');

		require_once 'inc/queries.php';




	// POST - THUMBNAILS ////////////////////////////////////////

		add_theme_support( 'post-thumbnails' );

		add_filter('post_class', function($clases) use (&$post){
			$terms = wp_get_post_terms($post->ID, 'categorias');
				foreach($terms as $term):
					array_push($clases, $term->slug);
				endforeach;

			return $clases;
		});



		function mq_get_lugares(){
			global $wpdb;
			$results = $wpdb->get_results(
				"SELECT ID as value, post_title as label FROM wp_posts
					WHERE post_status = 'publish'
						AND post_type = 'lugares';", OBJECT
			);
			echo json_encode($results);
			exit;
		}

		add_action('wp_ajax_mq_get_lugares', 'mq_get_lugares');
		add_action('wp_ajax_nopriv_mq_get_lugares', 'mq_get_lugares');



	//Image sizes

		add_image_size( 'cuadrado_grande', 600, 600, true );



	//Highlights zonas y lugares

		function where_am_i($cat, $slug){
			if( is_tax($cat, $slug) ){
				return true;
			}else {
				return false;
			}
		}
		function where_am_i_term($tax, $term){
			if( has_term($tax, $term) ){
				return true;
			}else {
				return false;
			}
		}

	/*

		8888888888                                 d8b 888
		888                                        Y8P 888
		888                                            888
		8888888  8888b.  888  888  .d88b.  888d888 888 888888  .d88b.  .d8888b
		888         "88b 888  888 d88""88b 888P"   888 888    d88""88b 88K
		888     .d888888 Y88  88P 888  888 888     888 888    888  888 "Y8888b.
		888     888  888  Y8bd8P  Y88..88P 888     888 Y88b.  Y88..88P      X88
		888     "Y888888   Y88P    "Y88P"  888     888  "Y888  "Y88P"   88888P'
	*/



	/**
	 * Crea campos en la tabla wp_post_favorito.
	 *
	 * @param $_POST['post_id']
	 * @param $_POST['user_id']
	 */

	function marcar_favoritos(){

		$post_id = isset($_POST['post_id'])  ? $_POST['post_id']  : false;
		$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : false;

		if ( $post_id AND $user_id ):

			$existe = check_if_favorito_exists($user_id, $post_id);

			if (!$existe){
				create_new_favorito($user_id, $post_id);
				$result = "listo";
			}

		endif;

		wp_send_json($result);
		exit;
	}
	add_action('wp_ajax_marcar_favoritos', 'marcar_favoritos');
	add_action('wp_ajax_nopriv_marcar_favoritos', 'marcar_favoritos');


	/**
	 * Crea campos en la tabla wp_post_favorito.
	 *
	 * @param $_POST['post_id']
	 * @param $_POST['user_id']
	 */

	function check_if_post_favorito(){

		$post_id = isset($_POST['post_id'])  ? $_POST['post_id']  : false;
		$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : false;

		if ( $post_id AND $user_id ):

			$existe = check_if_favorito_exists($user_id, $post_id);

			if ($existe){
				$result = "1";
			}

		endif;

		wp_send_json($result);
		exit;
	}
	add_action('wp_ajax_check_if_post_favorito', 'check_if_post_favorito');
	add_action('wp_ajax_nopriv_check_if_post_favorito', 'check_if_post_favorito');


	/**
	 * Revisa si existe el campo
	 * @param  String $user_id
	 * @param  String $post_id
	 * @return Boolean
	 */
	function check_if_favorito_exists ($user_id, $post_id) {
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare(
			"SELECT COUNT(id_favorito) FROM wp_post_favorito WHERE facebook_id = %d AND post_id_favorito = %d;",
			$user_id, $post_id
		));
	}




	/**
	 * Crea un nuevo favorito para el usuario
	 * @param  String  $user_id
	 * @param  Integer  $post_id
	 * @return Boolean
	 */
	function create_new_favorito ($user_id, $post_id) {
		global $wpdb;
		$result = $wpdb->query( $wpdb->prepare(
			"INSERT INTO wp_post_favorito ( facebook_id, post_id_favorito ) VALUES ( %d, %d );",
			$user_id, $post_id
		));
		return ($result !== false) ? 1 : 0;
	}



	/**
	 * Obtener numero de megusta al post.
	 *
	 * @param $_POST['post_id']
	 * @param $_POST['user_id']
	 */

	function numero_megusta_post(){

		$post_id  = isset($_POST['post_id'])  ? $_POST['post_id']  : false;

		if ( $post_id ):

			$result = numero_favoritos_post($post_id);

		endif;

		wp_send_json($result);
		exit;
	}
	add_action('wp_ajax_numero_megusta_post', 'numero_megusta_post');
	add_action('wp_ajax_nopriv_numero_megusta_post', 'numero_megusta_post');




	/**
	 * [numero_favoritos_post total de megusta al post]
	 * @param  [type] $post_id
	 * @return Integer
	 */
	function numero_favoritos_post($post_id){
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare(
			"SELECT count(*) FROM wp_post_favorito WHERE post_id_favorito = %d",
			$post_id
		));
	}




	/*
	8888888                        888
	888                            888
	888                            888
	8888888  .d88b.   .d88b.   .d88888
	888     d8P  Y8b d8P  Y8b d88" 888
	888     88888888 88888888 888  888
	888     Y8b.     Y8b.     Y88b 888
	888      "Y8888   "Y8888   "Y88888



	8888888888                         888                        888
	888                                888                        888
	888                                888                        888
	8888888  8888b.   .d8888b  .d88b.  88888b.   .d88b.   .d88b.  888  888
	888         "88b d88P"    d8P  Y8b 888 "88b d88""88b d88""88b 888 .88P
	888     .d888888 888      88888888 888  888 888  888 888  888 888888K
	888     888  888 Y88b.    Y8b.     888 d88P Y88..88P Y88..88P 888 "88b
	888     "Y888888  "Y8888P  "Y8888  88888P"   "Y88P"   "Y88P"  888  888 */



	/**
	 * Recibe una url y regresa el tweet count
	 * @param  string $url
	 * @return integer      tweet count
	 */
	function getFacebookFeed(){
		$old_access_token = get_option('extend_acces_token');
	    $fileData         = file_get_contents('https://graph.facebook.com/oauth/access_token?client_id=251814941633434&client_secret=46ab43fc8f1ecb885b7f5c8b26969460&grant_type=fb_exchange_token&fb_exchange_token='.$old_access_token);

	    $desde = strpos($fileData, '=');
	    $hasta = strpos($fileData, '&');

	    $desde = $desde + 1;
	    $hasta = $hasta - $desde;

	    return $accessToken = substr($fileData, $desde, $hasta);

	}



	function setFacebookFeedTransients(){

			$facebookFeed = get_transient( "fb_extend_acces_token");

			if( $facebookFeed === false ){

				set_transient( "fb_extend_acces_token", 'trancent extend acces token', 4320000);

				$facebookFeedOption = getFacebookFeed();
				update_option('extend_acces_token', $facebookFeedOption);//si no existe crea el campo

			}

	}

	add_action('init', 'setFacebookFeedTransients');



	/**
	 * Obtener access token extend.
	 */

	function get_ajax_token(){

		$result = get_option('extend_acces_token');
		wp_send_json($result);

	}
	add_action('wp_ajax_get_ajax_token', 'get_ajax_token');
	add_action('wp_ajax_nopriv_get_ajax_token', 'get_ajax_token');
