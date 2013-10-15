<?php

	require_once('facebook-php-sdk/src/facebook.php');


	class WP_Facebook extends Facebook {

		public $fbUser, $fbUserID, $wpUser, $params, $fbAlbums, $fbAlbumCovers;

		protected $accessToken;


		public function __construct($config)
		{
			parent::__construct($config['app_data']);

			$this->params = $config['params'];
			$this->fbUser = $this->get_facebook_user();
			$this->handle_user_session();
		}



		public function handle_user_session()
		{
			if ( ! is_user_logged_in() AND isset($this->fbUser)){
				$this->handle_facebook_session();
			} else {
				$this->wpUser = wp_get_current_user();
			}
		}



		public function handle_facebook_session()
		{
			if ( ! $this->user_exists_in_db()){
				$this->wpUser = $this->create_new_wp_user();


				// $this->wpUser->add_cap('upload_files');
				// $this->wpUser->add_cap('delete_posts');
			}
			$this->auto_login_user();
		}



		private function auto_login_user()
		{
			$this->wpUser = get_user_by('email', $this->fbUser['email']);
			if( $this->wpUser ){
				wp_set_auth_cookie( $this->wpUser->ID, 0, 0 );
				wp_set_current_user( $this->wpUser->ID );
				$this->redirect_home();
			}
		}


		private function create_new_wp_user()
		{
			extract($this->fbUser);
			$password  = wp_generate_password();
			$userEmail = wp_create_user( $username, $password, $email );
			$user      = get_user_by('login', $username);
			$user->set_role('mama');
			$this->create_initial_posts($user->ID);
		}


		public function update_user_wp_meta()
		{


			extract($this->fbUser);

			$this->wpUser = get_user_by('email', $email);
			update_user_meta( $this->wpUser->ID, 'first_name', $first_name);
			update_user_meta( $this->wpUser->ID, 'last_name', $last_name);


		}


		public function get_facebook_user()
		{
			try{
				$this->fbUserID    = $this->getUser();
				$this->accessToken = $this->getAccessToken();
				return $this->api('/'.$this->fbUserID);
			}catch(FacebookApiException $e){
				$this->redirect_home();
			}
		}


		public function user_exists_in_db()
		{
			$email = isset($this->fbUser['email']) ? $this->fbUser['email'] : false;
			return email_exists($email);
		}


		public function get_albums()
		{
			try{
				if (isset($this->fbAlbums)){
					return $this->fbAlbums;
				}
				$request = $this->api('/me/albums', 'GET', array('fields'=>'name,count,cover_photo'));
				return $this->fbAlbums = $request['data'];
			}catch(OAuthException $e){

			}
		}


		public function get_album_cover_ids(){
			$request      = $this->get_albums();
			$cover_photos = @wp_list_pluck( $request, 'cover_photo' );
			return implode(',', array_filter($cover_photos));
		}


		public function get_album_ids()
		{
			$request      = $this->get_albums();
			$cover_photos = @wp_list_pluck( $request, 'id' );
			return implode(',', array_filter($cover_photos));
		}


		/**
		 * Regresa todas las portadas de los albums dentro de un array
		 * @return array [aid, src_big, name]
		 */
		public function get_album_covers()
		{
			if(isset($this->fbAlbumCovers)) return $this->fbAlbumCovers;

			try{
				$cover_ids = $this->get_album_cover_ids();
				$results  = $this->api(array(
					'/me',
					'method'  => 'fql.multiquery',
					'queries' => array(
						'query1' => "SELECT src_big FROM photo WHERE object_id IN ($cover_ids)",
						'query2' => "SELECT object_id,name FROM album WHERE owner = me() AND cover_object_id IN ($cover_ids)"
					)
				));

				$array1 = isset($results[1]['fql_result_set']) ? $results[1]['fql_result_set'] : array();
				$array2 = isset($results[0]['fql_result_set']) ? $results[0]['fql_result_set'] : array();

				return $this->fbAlbumCovers = array_replace_recursive($array1, $array2);

			}catch(FacebookApiException $e){

			}
		}


		/**
		 * Regresa todas las fotos de cada album en un array bidimencional
		 * @return array [album_object_id, pid, src_big]
		 */
		public function get_album_photos()
		{
			if( false !== $results = get_transient('facebook_album_photos') ){
				return $results;
			}

			try{
				$album_ids = $this->get_album_ids();
				$queries   = explode(',', $album_ids);
				array_walk($queries, function (&$id) {
					$id = "SELECT album_object_id,pid,src_big FROM photo WHERE album_object_id = $id LIMIT 40";
				});

				$results = $this->api(array(
					'/me',
					'method'  => 'fql.multiquery',
					'queries' => $queries
				));
				$results = @wp_list_pluck( $results, 'fql_result_set' );
				set_transient( 'facebook_album_photos', $results, 120 );
				return $results;
			}catch(FacebookApiException $e){

			}
		}


		// FALTA ARREGLAR LA IMAGEN
		// http://hasin.me/2011/09/29/working-with-facebook-events-using-graph-api-part-1/
		// fotmato de la fecha: // '2013-10-05T14:30:00-0500'
		public function set_facebook_event($name, $startTime, $description, $image)
		{
			$fileName = get_template_directory()."/images/eventos/$image";

			$data = array(
				"name"         => $name,
				"access_token" => $this->accessToken,
				"start_time"   => $startTime,
				"description"  => $description,
				"source"       => '@'.$fileName
			);

			try{
				$event  = $this->api("/me/events","post",$data);
				$result = $this->send_new_event_notification($event['id']);
				wp_send_json($event);
			}catch(FacebookApiException $e){
				wp_send_json_error($e);
			}
		}



		public function send_new_event_notification($event_id)
		{

			$appAccessToken = $this->getAppId().'|'.$this->getApiSecret();

			try{

				$result = $this->api('/'.$this->getUser().'/notifications', 'post', array(
					'href'         => "https://www.facebook.com/ProgressGoldMexico",
					'template'     => 'Se creo un nuevo evento en tu calendario.',
					'access_token' => $appAccessToken
				));

				return $result;

			}catch(FacebookApiException $e){
				wp_send_json_error($e);
			}
		}




		public function send_notification($message)
		{

			$appAccessToken = $this->getAppId().'|'.$this->getApiSecret();

			try{

				$result = $this->api('/'.$this->getUser().'/notifications', 'post', array(
					'href'         => 'http://diario.dev/',
					'template'     => $message,
					'access_token' => $appAccessToken
				));

				return $result;

			}catch(FacebookApiException $e){
				wp_send_json_error($e);
			}
		}




		public function create_new_album($description)
		{
			try{
				return $this->api('/'.$this->getUser().'/albums', 'post', array(
					'name'        => 'Diario de mi Bebé',
					'description' => $description
				));
			}catch(FacebookApiException $e){
				wp_send_json_error($e);
			}
		}



		public function upload_image_to_album($album_id, $image)
		{
			try{
				return $this->api("/$album_id/photos", 'post', array(
					'message' => 'My photo caption',
					'source'  => '@' . realpath($image)
				));
			}catch(FacebookApiException $e){
				wp_send_json_error($e);
			}
		}



		public function share_new_album($images, $description)
		{
			$results  = array();
			$album_id = $this->create_new_album($description);

			foreach ($images as $key => $image) {
				$results[] = $this->upload_image_to_album($album_id['id'], $image);
			}
			return array('album_id' => $album_id, 'photos' => $results);
		}


		public function get_user_events()
		{
			$userEvents = get_user_meta($this->wpUser->ID, 'user_events', true);

			return $this->api(array(
				'method' => 'fql.query',
				'query'  => "SELECT creator,name,pic_cover,pic_big,start_time FROM event WHERE eid IN ($userEvents)"
			));
		}



		public function get_user_data($field = '')
		{
			return $field ? $this->fbUser[$field] : $this->fbUser;
		}



		private function redirect_home()
		{
			wp_redirect( $this->getLoginUrl($this->params), 302 ); exit;
		}




		public function create_initial_posts($user_id)
		{
			$args1 = array(
				'post_status'   => 'private',
				'post_type'     => 'post',
				'post_author'   => $user_id,
				'post_category' => array(get_cat_ID('0-6 Meses'))
			);
			wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera foto') ), true );
			wp_insert_post(array_merge( $args1, array('post_title' => 'Mis ojitos abiertos') ), true );
			wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera sonrisa') ), true );
			wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera foto con mamá')), true );
			wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera foto con papá') ), true );
			wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primer paseo') ), true );


			$args2 = array(
				'post_status'   => 'private',
				'post_type'     => 'post',
				'post_author'   => $user_id,
				'post_category' => array(get_cat_ID('6-12 Meses'))
			);
			wp_insert_post(array_merge( $args2, array('post_title' => '¡Mira como gateo!') ), true );
			wp_insert_post(array_merge( $args2, array('post_title' => '¡Mi primer diente!') ), true );
			wp_insert_post(array_merge( $args2, array('post_title' => '¡Ya me siento sin ayuda!') ), true );
			wp_insert_post(array_merge( $args2, array('post_title' => '¡Ya puedo decir mamá!') ), true );
			wp_insert_post(array_merge( $args2, array('post_title' => '¡Ya puedo decir papá!') ), true );
			wp_insert_post(array_merge( $args2, array('post_title' => '¡Mis primeros pasos!') ), true );



			$args3 = array(
				'post_status'   => 'private',
				'post_type'     => 'post',
				'post_author'   => $user_id,
				'post_category' => array(get_cat_ID('1-3 Años'))
			);
			wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya camino solito!') ), true );
			wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya puedo usar la cuchara!') ), true );
			wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya tomo mi Progress GOLD en vaso!') ), true );
			wp_insert_post(array_merge( $args3, array('post_title' => '¡Mi primer dibujo!') ), true );
			wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya me puedo lavar los dientes!') ), true );
			wp_insert_post(array_merge( $args3, array('post_title' => '¡Mi primer día en el kinder!') ), true );


			$args4 = array(
				'post_status'   => 'private',
				'post_type'     => 'post',
				'post_author'   => $user_id,
				'post_category' => array(get_cat_ID('Mi Embarazo'))
			);
			wp_insert_post(array_merge( $args4, array('post_title' => '¡La mejor noticia!') ), true );
			wp_insert_post(array_merge( $args4, array('post_title' => '¡No se me nota nada!') ), true );
			wp_insert_post(array_merge( $args4, array('post_title' => 'Mi primera foto con pancita') ), true );
			wp_insert_post(array_merge( $args4, array('post_title' => 'Creciendo juntos')), true );
			wp_insert_post(array_merge( $args4, array('post_title' => '¡Baby shower!') ), true );
			wp_insert_post(array_merge( $args4, array('post_title' => '¡Ya casi!') ), true );


		}
	}


	$facebook = new WP_Facebook(array(
		'app_data' => array(
			// 'appId'      => '1412749818952904',// york
			// 'secret'     => '0b91a6e85a4cb8c13c56ac028adfd960',// york
			'appId'      => '459611047479187',// alex
			'secret'     => '1137a2317234d118f44b633977bfd9d6',// alex
			// 'appId'      => '640567422640442',// diario
			// 'secret'     => '6bb56a52a471365ee66a73e45d494e71',// diario
			'cookie'     => false,
			'fileUpload' => true
		),
		'params' => array(
			'scope'        => 'email,user_events,create_event,rsvp_event,user_status,read_stream,publish_stream,publish_actions,user_photos,friends_photos,manage_notifications,user_online_presence',
			'redirect_uri' => site_url('/')
		)
	));





	add_action('init', function() use ($facebook){

		$facebookAlbums = $facebook->get_albums();

	});
