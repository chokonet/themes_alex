<?php


	// Definir el paths a los directorios de javascript y css
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	$featured_posts = array();


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
		wp_enqueue_script('functions', JSPATH.'functions.js', array('cycle', 'plugins'), false, true );
		wp_enqueue_script('lastest', JSPATH.'jquery-latest.js', array('jquery'), false, true );


		// styles
		wp_enqueue_style('jquery-ui-css', CSSPATH.'jquery-ui.css');
		wp_enqueue_style('style', get_stylesheet_uri());


		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );

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



// CONTEO DE PALABRAS EN EL EXCERPT //////////////////////////////////////////////////



	function custom_excerpt_length( $length ) {
		return 20;
	}

	add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );


	add_filter('the_excerpt', function($excerpt){
		return strip_tags($excerpt);
	});


	add_filter('excerpt_more', function($more){
		return '... &raquo;';
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter('admin_footer_text', function() {
		echo 'Creado por <a href="http://hacemoscodigo.com">Los Maquiladores</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// RSS FEED IMAGES ///////////////////////////////////////////////////////////////////



	add_theme_support( 'automatic-feed-links' );


	add_action('rss2_ns', function (){
		echo "xmlns:media='http://search.yahoo.com/mrss/'";
	});


	add_filter('rss2_item', function() use (&$post) {

		$thumbnail_id = get_post_thumbnail_id($post->ID);

		if ($thumbnail_id ) {
			$attachment_url = wp_get_attachment_url($thumbnail_id);
			$attributes     = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' );
			$attachment_url = isset($attributes[0]) ? $attributes[0] : '';
			echo "<media:content url='$attachment_url' medium='image' />";
		}

	});



// TWITTER //////////////////////////////////////////////////////////////////////////



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



	function ajax_update_post_meta(){
		$post_id  = ( isset($_POST['post_id']) ) ? $_POST['post_id'] : false;
		$checked  = ( isset($_POST['checked']) ) ? $_POST['checked'] : false;

		if ( $checked == 'true' ){
			update_post_meta($post_id, 'mandar_a_sopitas', 'true');
		}else{
			delete_post_meta($post_id, 'mandar_a_sopitas');
		}
	}
	add_action('wp_ajax_ajax_update_post_meta', 'ajax_update_post_meta');
	add_action('wp_ajax_nopriv_ajax_update_post_meta', 'ajax_update_post_meta');


	/*
	---------------------
		LIMIT WORDS
	---------------------
	*/

	function string_limit_words($string, $word_limit){
	  $words = explode(' ', $string, ($word_limit + 1));
	  if(count($words) > $word_limit)
	  array_pop($words);
	  return implode(' ', $words);
	}



/// REWRITE AUTHOR BASE URL  //////////////////////////////////////////////////////



	function custom_author_base(){
		global $wp_rewrite;
		$wp_rewrite->author_base = 'colaborador';
	}

	add_action('init', 'custom_author_base', 0 );




// PAGINACIÓN ////////////////////////////////////////////////////////////////////



	function remove_page_from_query_string($query_string) {
		if ( isset($query_string['name']) && $query_string['name'] == 'page' && isset($query_string['page'])) {
			unset($query_string['name']);
			// 'page' in the query_string looks like '/2', so split it out
			list($delim, $page_index) = explode('/', $query_string['page']);
			$query_string['paged'] = $page_index;
		}
		return $query_string;
	}
	add_filter('request', 'remove_page_from_query_string');




/*
 .d888                                    d8b 888
d88P"                                     Y8P 888
888                                           888
888888  8888b.  888  888  .d88b.  888d888 888 888888  .d88b.  .d8888b
888        "88b 888  888 d88""88b 888P"   888 888    d88""88b 88K
888    .d888888 Y88  88P 888  888 888     888 888    888  888 "Y8888b.
888    888  888  Y8bd8P  Y88..88P 888     888 Y88b.  Y88..88P      X88
888    "Y888888   Y88P    "Y88P"  888     888  "Y888  "Y88P"   88888P'
*/




	/**
	 * Get posts likes from google, facebook, twitter
	 */
	add_action('init', function(){

		setFacebookCountTransients();

		setTwitterCountTransients();

		setGoogleCountTransients();
	});


// ULTIMOS POST //////////////////////////////////////////////////////////////



	function get_posts_from_last_week(){
		global $wpdb;
		$fecha_limite = date('Y-m-d H:i:s', strtotime('-30 days'));
		return $wpdb->get_results(
				"SELECT * FROM wp_posts
					WHERE post_date > '$fecha_limite'
						AND post_status = 'publish' LIMIT 40;", OBJECT);
	}



// FACEBOOK COUNTS ///////////////////////////////////////////////////////////



	/**
	 * Recibe una url y regresa el tweet count
	 * @param  string $url
	 * @return integer      tweet count
	 */
	function getFacebookCount($url){
		$fileData = file_get_contents('http://graph.facebook.com/?id='.$url);
		$json     = json_decode($fileData, true);
		return isset($json['shares']) ? $json['shares'] : false;
	}




	function setFacebookCountTransients(){

		$posts = get_posts_from_last_week();

		if ( $posts ) : foreach ($posts as $post) :

			$facebookCount = get_transient( "facebook_count_".$post->ID );

			if( $facebookCount === false ){

				$permalink  = get_permalink($post->ID);
				$facebookCount = getFacebookCount( $permalink );
				set_transient( "facebook_count_".$post->ID, $facebookCount, 3600);
			}

		endforeach; endif;
	}



	function get_posts_facebook_count(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT SUBSTRING( option_name, 27, 5 ) AS post_id, option_value AS facebook_count
				FROM wp_options WHERE option_name LIKE '_transient_facebook_count%';", OBJECT
		);
	}



	function countFacebook(){

		$postsData = get_posts_facebook_count();

		$count_face = array(); // guarda los resultados

		foreach ($postsData as $key => $values) {

				$post = get_post($values->post_id);

				$face_counts        = new stdClass;
				$face_counts->url   = get_permalink($post->ID);
				$face_counts->count = $values->facebook_count;
				$count_face[get_permalink($post->ID)]   = $face_counts;

		}
		return $count_face;
	}




// TWEET COUNTS //////////////////////////////////////////////////////////////


	/**
	 * Recibe una url y regresa el tweet count
	 * @param  string $url
	 * @return integer      tweet count
	 */
	function getTweetCount($url){
		$twitterApi = "http://urls.api.twitter.com/1/urls/count.json?url=%s";
		$fileData   = file_get_contents(sprintf($twitterApi, urlencode($url)));
		$json       = json_decode($fileData, true);
		unset($fileData);
		return $json['count'];
	}



	function setTwitterCountTransients(){

		$posts = get_posts_from_last_week();

		if ( $posts ) : foreach ($posts as $post) :

			$tweetCount = get_transient( "tweet_count_".$post->ID );

			if( $tweetCount === false ){
				$permalink  = get_permalink($post->ID);
				$tweetCount = getTweetCount( $permalink );
				set_transient( "tweet_count_".$post->ID, $tweetCount, 3600);
			}

		endforeach; endif;
	}



	function get_posts_tweet_count(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT SUBSTRING( option_name, 24, 5 ) AS post_id, option_value AS tweet_count
				FROM wp_options WHERE option_name LIKE '_transient_tweet_count%';", OBJECT
		);
	}



	function count_tweet(){

		$postsData = get_posts_tweet_count();

		$count_tweet = array(); // guarda los resultados

		foreach ($postsData as $key => $values) {

				$post = get_post($values->post_id);

				$tweet_counts        = new stdClass;
				$tweet_counts->url   = get_permalink($post->ID);
				$tweet_counts->count = $values->tweet_count;
				$count_tweet[get_permalink($post->ID)]   = $tweet_counts;

		}
		return $count_tweet;
	}



// GOOGLE COUNTS /////////////////////////////////////////////////////////////



	/**
	 * Recibe una url y regresa el google count
	 * @param  string $url
	 * @return integer      google count
	 */
	function getGoogleCount($urls){
		$url = $urls;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));

		$curl_results = curl_exec ($ch);
		curl_close ($ch);

		$parsed_results = json_decode($curl_results, true);

		return $parsed_results[0]['result']['metadata']['globalCounts']['count'];
	}



	function setGoogleCountTransients(){

		$posts = get_posts_from_last_week();

		if ( $posts ) : foreach ($posts as $post) :

			$googleCount = get_transient( "google_count_".$post->ID );

			if( $googleCount === false ){
				$permalink  = get_permalink($post->ID);
				$googleCount = getGoogleCount( $permalink );
				set_transient( "google_count_".$post->ID, $googleCount, 3600);
			}

		endforeach; endif;
	}



	function get_posts_google_count(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT SUBSTRING( option_name, 25, 5 ) AS post_id, option_value AS google_count
				FROM wp_options WHERE option_name LIKE '_transient_google_count%';", OBJECT
		);
	}




	function countGoogle(){
		$postsDataGoogle = get_posts_google_count();

		$countGoogle = array(); // guarda los resultados

		foreach ($postsDataGoogle as $key => $values) {

				$post = get_post($values->post_id);

				$google_counts        = new stdClass;
				$google_counts->url   = get_permalink($post->ID);
				$google_counts->count = $values->google_count;
				$countGoogle[get_permalink($post->ID)]    = $google_counts;

		}
		return $countGoogle;
	}



// SUMA ARRAYS //////////////////////////////////////////////////////////////



	function get_posts_mas_gustados(){

		// $arrayResults = get_transient( 'posts_mas_gustados' );

		// if ( $arrayResults ) return $arrayResults;


		$count_facebook = countFacebook();
		$count_tweet    = count_tweet();
		$countGoogle    = countGoogle();

		$result = array();

		foreach( $count_facebook as $index => $object  ){
			$count =  $object->count + $countGoogle[$index]->count + $count_tweet[$index]->count;

			$wrapper        = new stdClass;
			$wrapper->url   = $object->url;
			$wrapper->count = $count;
			array_push( $result, $wrapper );
		}

		usort($result, 'sort_objects_by_couts'); // ordenar elementos


		$arrayResults = array();

		foreach ($result as $value) {

			$post = get_post_by_permalink($value->url);
			if ( ! empty($post)){
				array_push( $arrayResults, $post[0] );
			}
		}
		set_transient( 'posts_mas_gustados', $arrayResults, 3600 );

		return $arrayResults;
	};



	function get_post_by_permalink($url){

		global $wpdb;

		$path      = parse_url( $url, PHP_URL_PATH );
		$pathinfo  = pathinfo($path);
		$post_name = $pathinfo['basename'];

		return $wpdb->get_results(
			"SELECT * FROM wp_posts WHERE post_name = '$post_name'", OBJECT
		);
	}



	/**
	 * usort helper function ordena el array de mayor a menor
	 * @param  Object $a primer elemento
	 * @param  Object $b segundo elemento
	 * @return Object    Resultado
	 */
	function sort_objects_by_couts($a, $b) {
		if($a->count == $b->count){ return 0 ; }
		return ($a->count > $b->count) ? -1 : 1;
	}



// FACEBOOCK COMMENTS ///////////////////////////////////////////////////////



	function oder_posts_by_coment_count($posts){

		$permalinks = '';

		foreach ($posts as $post) {
			$permalinks .= get_permalink($post->ID) .',';
		}

		$permalinks    = substr_replace($permalinks ,'',-1);
		$results       = file_get_contents("http://graph.facebook.com/?ids=$permalinks");
		$facebook_data = json_decode($results);

		$ordenados = array(); // guarda los resultados

		foreach ($facebook_data as $key => $value) {
			if( !empty($value->comments ) ){
				$data            = new stdClass;
				$data->link      = $key;
				$data->url       = $value->id;
				$data->comments  = $value->comments;
				$ordenados[$key] = $data;
			}
		}

		usort($ordenados, 'sort_objects_by_coments'); // ordenar elementos

		$arrayResults_order = array();

		foreach ($ordenados as $value) {
			$post = get_post_by_permalink($value->url);
			if ( ! empty($post)){
				array_push( $arrayResults_order, $post[0] );
			}
		}
		return $arrayResults_order;

	}



	/**
	 * usort helper function ordena el array de mayor a menor
	 * @param  Object $a primer elemento
	 * @param  Object $b segundo elemento
	 * @return Object    Resultado
	 */
	function sort_objects_by_coments($a, $b) {
		if($a->comments == $b->comments){ return 0 ; }
		return ($a->comments > $b->comments) ? -1 : 1;
	}



	/**
	 * Regresa los posts mas recientes
	 * @return Array Array of WP_Posts
	 */
	function get_posts_mas_comentados(){

		$arrayResults = get_transient( 'posts_mas_comentados' );
		if ( $arrayResults ) {
			return $arrayResults;
		}

		$posts = get_posts_from_last_week();
		$arrayResults = oder_posts_by_coment_count($posts);

		set_transient( 'posts_mas_comentados', $arrayResults, 3600 );

		return $arrayResults;
	}



	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function print_the_terms($post_id, $taxonomy = 'category', $delimiter = ', '){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'slug');
			echo implode($delimiter, $names);
		}
	}