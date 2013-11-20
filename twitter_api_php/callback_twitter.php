<?php
	require_once 'twitteroauth/twitteroauth.php';

	require_once('../../../../wp-load.php');

	$consumer_key ='xS8UtkEm3yywdPmFKHvNA';
	$consumer_secret = 'jnC7lbyTNDRksBZTn1SW9yAPnp91iXOIj6RdaQEuE';

	$twitteroauth = new TwitterOAuth($consumer_key, $consumer_secret, $_SESSION['temp_token'], $_SESSION['temp_token_secret']);

	$twitter_token = $twitteroauth->getAccessToken($_REQUEST['oauth_verifier']);

	$credenciales = $twitteroauth->get('account/verify_credentials');

	$username_tw   = $credenciales->name;
	$id_user_tweet = $credenciales->id;



	if ( $id_user_tweet ):

		$existe = check_if_user_tweet_exists($id_user_tweet);

		if (!$existe){
			create_new_wp_user($username_tw, $id_user_tweet	);
		}else{
			$new_user = false;
			$user_id  = obten_id_user($username_tw);
			$id_user  = $user_id[0]->ID;
			auto_login_user($id_user, $new_user);

		}


	endif;



	/**
	 * Obtener el user id
	 * @param  String $username_tw
	 * @return Boolean
	 */
	function obten_id_user($username_tw){
		global $wpdb;

		return $wpdb->get_results(
			"SELECT ID FROM wp_users WHERE display_name = '$username_tw';", OBJECT
		);


	}




	/**
	 * Revisa si existe el usuario por medio del meta (id_user_tweet)
	 * @param  String $id_user_tweet
	 * @return Boolean
	 */
	function check_if_user_tweet_exists ($id_user_tweet) {
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare(
			"SELECT COUNT(*) FROM wp_usermeta WHERE meta_key = 'id_user_tweet' AND meta_value = %d;",
			$id_user_tweet
			));

	}



	/**
	 * Crear un nuevo usuario
	 * @param  string $user username
	 */
	function create_new_wp_user($username_tw, $id_user_tweet){

		$password  = wp_generate_password();
		$user_id   = wp_create_user( $username_tw, $password );
		$new_user = true;

		if ( is_int($user_id) ){
			update_user_meta( $user_id, 'id_user_tweet', $id_user_tweet);
			set_maquilador_role( $user_id );
			wp_new_user_notification( $user_id, $password );
			auto_login_user($user_id, $new_user);
		}

	}



	/**
	 * Set user role as developer (super admin)
	 * @param int $user_id
	 */
	function set_maquilador_role($user_id){
		$wp_user = get_user_by( 'id', $user_id );
		$wp_user->set_role( 'subscriber' );
	}



	/**
	 * [auto_login_user]
	 */
	function auto_login_user($id_user, $new_user){

		if( $id_user){
			wp_set_auth_cookie( $id_user, 0, 0 );
			wp_set_current_user( $id_user );
			$url = site_url('/timeline/');
			if ($new_user == true) {
				$url = site_url('/completa/');
				echo "<script language='javascript'>window.location='$url'</script>";
			}else{
				echo "<script language='javascript'>window.location='$url'</script>";
			}

		}

	}