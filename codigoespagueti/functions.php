<?php


	// Definir el paths a los directorios de javascript y css
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );



// IMAGE SUPPORT /////////////////////////////////////////////////////////////////////


	add_theme_support( 'post-thumbnails' );
		add_image_size('featured', 640, 360, true);
		add_image_size('featured_post', 300, 250, true);
		add_image_size('slide', 980, 360, true);
		add_image_size('ficha_imagen', 136, 250, true);



// POST TYPES && METABOXES ///////////////////////////////////////////////////////////



	require_once('inc/metaboxes.php');


	require_once('inc/post-types.php');



// SISTEMA DE VOTACION ////////////////////////////////////////////////////////////////



	require_once('inc/votacion.php');



// ENQUEUE FRONT END JAVASCRIPT AND CSS //////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script('jquery-ui-slider'); // Default wordpress jQuery-ui-slider
		wp_enqueue_script('cycle', JSPATH.'cycle.js', array('jquery'), false, true );
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery', 'jquery-ui-slider'), false, true );
		wp_enqueue_script('liscroller', JSPATH.'liscroller.js', array('jquery'), false, true );
		wp_enqueue_script('functions', JSPATH.'functions.js', array('cycle', 'plugins', 'liscroller'), false, true );
		wp_enqueue_script('lastest', JSPATH.'jquery-latest.js', array('jquery'), false, true );
		// styles
		wp_enqueue_style('jquery-ui-css', CSSPATH.'jquery-ui.css');
		wp_enqueue_style('style', get_stylesheet_uri());


		// localize scripts
		wp_localize_script('functions', 'ajax_url',  get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');
	});


// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



    // Admin scripts and styles
    add_action( 'admin_enqueue_scripts', function(){

        // scripts
        wp_enqueue_script('media-upload');
        wp_enqueue_script('admin-js', get_template_directory_uri().'/js/admin.js',  array('jquery'), '1.0', true );

        // localize scripts
        wp_localize_script('admin-js', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');

        wp_enqueue_media(); // Enqueues all scripts, styles, settings, and templates necessary to use all media JavaScript APIs.

    });




// CONTEO DE PALABRAS EN EL EXCERPT



	function custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter('admin_footer_text', function() {
		echo 'Creado por <a href="http://hacemoscodigo.com">Los Maquiladores</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// TWITTER ///////////////////////////////////////////////////////////////////////////



	require_once('inc/twitter/twitteroauth.php');


	define('CONSUMER_KEY', 'MNcYnXlaV9bdqVe7yBGKA');
	define('CONSUMER_SECRET', 'pCLBPDRdlDH9fmEcocmnKWQA6Ftu4gGPUKgikG0');
	define('OAUTH_CALLBACK', 'http://codigoespagueti.com');


	/**
	 * Twitter User Timeline
	 */
	function get_transient_tweet(){
		$result = get_transient('tweet_content');

		if( !$result ){
			$connection = new TwitterOAuth( CONSUMER_KEY, CONSUMER_SECRET, '1362435139-4xBJPalvmW1UNIJ9ksbjQGfZHLAefncFZDjXKqt', 'rn9q4SJT5aHiBx51LbZkzHfJmelmNznaHsaqgjr1kM' );
			$tweets = $connection->get( 'statuses/user_timeline', array('count'=>10) );
			set_transient( 'tweet_content', $tweets, 900 );
			return $tweets;
		}else{
			return $result;
		}
	}


	/**
	 * Twitter Mentions
	 */
	function get_tweet_mentions(){
		$result = get_transient('tweet_mentions');

		if( !$result ){
			$connection = new TwitterOAuth( CONSUMER_KEY, CONSUMER_SECRET, '1362435139-4xBJPalvmW1UNIJ9ksbjQGfZHLAefncFZDjXKqt', 'rn9q4SJT5aHiBx51LbZkzHfJmelmNznaHsaqgjr1kM' );
			$tweets = $connection->get( 'statuses/mentions_timeline', array('count'=>10) );
			set_transient( 'tweet_mentions', $tweets, 900 );
			return $tweets;
		}else{
			return $result;
		}
	}



// HELPER FUNCTIONS //////////////////////////////////////////////////////////////////



	/**
	 * Convierte las url's y @ mentions en links
	 */
	function parseLinks($text) {
		$pattern = "/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/i";
		$replace = "<a href='$1' target='_blank' rel='nofollow'>$1</a>";
		$links   = preg_replace($pattern, $replace, $text);

		$pattern = '/@([a-zA-Z0-9_]+)/';
		$replace = '<a href="http://twitter.com/$1">@$1</a>';
		$result  = preg_replace($pattern, $replace, $links);

		return $result;
	}



	/**
	 * Regresa el tiempo desde que se creo el tweet
	 */
	function parseTweetDate($fecha){
		$segundos = time() - strtotime($fecha);
		$transcurrido = $segundos/60;

		if($transcurrido <= 59){
			return round($transcurrido).'min';
		}else if($transcurrido >= 60 and $transcurrido <= 2599){
			return round($transcurrido/60).'hr';
		}else if($transcurrido >= 3600){
			return round($transcurrido/3600).'días';
		}
	}


	function format_twitter_mention_data($mention) {
		$tweet = new stdClass;
		$tweet->user = parseLinks( '@'.$mention->user->screen_name );
		$tweet->name = $mention->user->name;
		$tweet->time = parseTweetDate($mention->created_at);
		$tweet->text = parseLinks($mention->text);
		return $tweet;
	}





    /**
     * Crea metadata 'imagen-resena'
     *
     * @param attachment
     * @return imagen
     */
    function save_imagen_ficha_tecnica(){
        $attachment = ( isset($_POST['attachment']) ) ? $_POST['attachment'] : false;
        $post_id    = ( isset($_POST['post_id']) ) ? $_POST['post_id'] : false;

        if( !$attachment or !$post_id ){
            echo json_encode('error');
            exit;
        }

        // guardar la url como metadata del post
        $imagen = wp_get_attachment_image( $attachment['id'], 'ficha_imagen' );
        update_post_meta($post_id, 'imagen-resena', $imagen);

        echo json_encode($imagen);
        exit;
    }
    add_action('wp_ajax_save_imagen_ficha_tecnica', 'save_imagen_ficha_tecnica');
    add_action('wp_ajax_nopriv_save_imagen_ficha_tecnica', 'save_imagen_ficha_tecnica');




    /**
     * BORRA metadata 'imagen-resena'
     * @param post_id
     * @return BOOLEAN False for failure. True for success.
     */
    function delete_imagen_ficha_tecnica(){

        $post_id  = ( isset($_POST['post_id']) ) ? $_POST['post_id'] : false;

        if( !$post_id ){
            echo json_encode('error');
            exit;
        }

        $result = delete_post_meta($post_id, 'imagen-resena');
        echo json_encode($result);
        exit;
    }
    add_action('wp_ajax_delete_imagen_ficha_tecnica', 'delete_imagen_ficha_tecnica');
    add_action('wp_ajax_nopriv_delete_imagen_ficha_tecnica', 'delete_imagen_ficha_tecnica');