<?php
	session_start();
	require_once 'twitteroauth/twitteroauth.php';

	function url_twitter(){

			$consumer_key ='xS8UtkEm3yywdPmFKHvNA';
			$consumer_secret = 'jnC7lbyTNDRksBZTn1SW9yAPnp91iXOIj6RdaQEuE';
			$oaut_callback = home_url().'/wp-content/themes/museografo/inc/callback_twitter.php';

			// The TwitterOAuth instance
			$twitteroauth = new TwitterOAuth($consumer_key, $consumer_secret);

			$request_temp = $twitteroauth->getRequestToken($oaut_callback);

			$_SESSION['temp_token']= $request_temp['oauth_token'];
			$_SESSION['temp_token_secret']= $request_temp['oauth_token_secret'];

			$twitter_url = $twitteroauth->getAuthorizeURL($request_temp['oauth_token']);

			echo $twitter_url;


	}





