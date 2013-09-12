<?php


	// Definir el paths a los directorios de javascript y css
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
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



// CONTEO DE PALABRAS EN EL EXCERPT //////////////////////////////////////////////////



	function custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );
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



// RSS POST THUMBNAIL ///////////////////////////////////////////////////////////////


	//DEPRECATED
	function rss_post_thumbnail($content) {
		global $post;
		if( has_post_thumbnail($post->ID) ) {
			$content = get_the_post_thumbnail($post->ID, 'thumbnail', array('style'=>'width:80px; height:80px;'));
		}
		return $content;
	}
	add_filter('the_excerpt_rss', 'rss_post_thumbnail');
	add_filter('the_content_feed', 'rss_post_thumbnail');



// RSS FEED FILTERS /////////////////////////////////////////////////////////////////



	add_feed('sopitas', 'custom_sopitas_rss_feed');
	function custom_sopitas_rss_feed() {

		$transient = get_transient( 'sopitas_feed_rss' );
		if($transient){
			echo $transient;
			exit;
		}

		global $wpdb;
		$results = $wpdb->get_results(
			"SELECT * FROM wp_posts
				INNER JOIN wp_postmeta ON ID = post_id
					WHERE post_type = 'post'
					AND post_status = 'publish'
					AND meta_key    = 'mandar_a_sopitas'
					AND meta_value  = 'true'
						ORDER BY ID DESC LIMIT 7;", OBJECT
		);

		$json = array();

		foreach ($results as $result) {
			$item = new stdClass();
			$item->title     = get_the_title($result->ID);
			$item->date      = get_the_date('j/m/Y');
			$item->permalink = get_permalink($result->ID);
			$item->thumbnail = get_the_post_thumbnail($result->ID, 'thumbnail', array('style'=>'width:80px; height:80px;'));
			$json[] = $item;
		}

		$result = json_encode($json);

		set_transient( 'sopitas_feed_rss', $result, 1800 );

		echo $result;
		exit;
	}



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




// PAGINCIÓN ////////////////////////////////////////////////////////////////////



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



/// ULTIMOS POST /////////////////////////////////////////////////////////////


	function get_posts_from_last_week(){
		global $wpdb;
		$fecha_limite = date('Y-m-d H:i:s', strtotime('-30 days'));
		return $wpdb->get_results(
				"SELECT * FROM wp_posts
					WHERE post_date > '$fecha_limite'
						AND post_status = 'publish' LIMIT 40;", OBJECT);
	}



// FACEBOOCK SHARES ////////////////////////////////////////////////////////



	function oder_posts_by_date($posts){

		$permalinks = '';

		foreach ($posts as $post) {
			$permalinks .= get_permalink($post->ID) .',';
		}
		$permalinks    = substr_replace($permalinks ,'',-1);

		$results       = file_get_contents("http://graph.facebook.com/?ids=$permalinks");
		$facebook_data = json_decode($results);

		$count_facebook = array(); // guarda los resultados

		foreach ($facebook_data as $value) {

				$data = new stdClass;
				$data->url        = $value->id;
				$data->count     = $value->shares;
				// $count_facebook       = $data;
				array_push($count_facebook, $data);

		}

		return $count_facebook;
	}



	function get_posts_mas_shares(){
		$posts = get_posts_from_last_week();
		return oder_posts_by_date($posts);
	}

	///tweet counts ///////////////////////////////////////////////////////////

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



	add_action('init', function(){
		setTwitterCountTransients();
	});


	function setTwitterCountTransients(){

		$posts = get_posts_from_last_week();

		foreach ($posts as $post) {

			$tweetCount = get_transient( "tweet_count_".$post->ID );

			if( $tweetCount === false ){
				$permalink  = get_permalink($post->ID);
				$tweetCount = getTweetCount( $permalink );
				set_transient( "tweet_count_".$post->ID, $tweetCount, 7200);
			}
		}
	}


	function get_posts_tweet_count(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT SUBSTRING( option_name, 24, 3 ) AS post_id, option_value AS tweet_count
				FROM wp_options WHERE option_name LIKE '_transient_tweet_count%';", OBJECT
		);
	}

	function count_tweet(){

		$postsData = get_posts_tweet_count();

		$count_tweet = array(); // guarda los resultados

		foreach ($postsData as $key => $values) {

				$post = get_post($values->post_id);

				$tweet_counts         = new stdClass;
				$tweet_counts->url     = get_permalink($post->ID);
				$tweet_counts->count  = $values->tweet_count;
				$count_tweet[$key] 		  = $tweet_counts;

		}

		return $count_tweet;

	}

	///google counts ///////////////////////////////////////////////////////////

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


	add_action('init', function(){
		setGoogleCountTransients();
	});

	function setGoogleCountTransients(){

		$posts = get_posts_from_last_week();

		foreach ($posts as $post) {

			$googleCount = get_transient( "google_count_".$post->ID );

			if( $googleCount === false ){
				$permalink  = get_permalink($post->ID);
				$googleCount = getGoogleCount( $permalink );
				set_transient( "google_count_".$post->ID, $googleCount, 20);
				//set_transient( "google_count_".$post->ID, $googleCount, 7200);
			}
		}
	}


	function get_posts_google_count(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT SUBSTRING( option_name, 25, 3 ) AS post_id, option_value AS google_count
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
				$countGoogle[$key]    = $google_counts;

		}

		return $countGoogle;


	}

//suma arrays

	function imprime_post_masgustados(){

		$count_facebook = get_posts_mas_shares();
		$count_tweet    = count_tweet();
		$countGoogle    = countGoogle();

		$result = array();

		foreach( $count_facebook as $index => $object  ){

			$count =  $object->count + $countGoogle[$index]->count + $count_tweet[$index]->count;

			$wrapper = new stdClass;
			$wrapper->url   = $object->url;
			$wrapper->count = $count;

			array_push( $result, $wrapper );



		}

		usort($result, 'sort_objects_by_couts'); // ordenar elementos


		$arrayResults = array();

		foreach ($result as $value) {

			$post = get_post_by_permalink($value->url);

			array_push( $arrayResults, $post );
		}


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
// FACEBOOCK COMMENTS //////////////////////////////////////////////////////



	function get_oder_posts_by_coment($posts){

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
				$data = new stdClass;
				$data->link       = $key;
				$data->url         = $value->id;
				$data->comments   = $value->comments;
				$ordenados[$key]  = $data;
			}
		}

		usort($ordenados, 'sort_objects_by_coments'); // ordenar elementos

		$arrayResults_order = array();

		foreach ($ordenados as $value) {

			$post = get_post_by_permalink($value->url);

			array_push( $arrayResults_order, $post );
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
		$posts = get_posts_from_last_week();
		return get_oder_posts_by_coment($posts);
	}


