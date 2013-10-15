<?php

	include_once('twitteroauth/twitteroauth.php');

	define('CONSUMER_KEY', 'TxNABTDjIOCf7jGyx41NJw');
	define('CONSUMER_SECRET', '7NzcaqCXcRoNw3u8tIEbgTdaZPJMNDs3OPR7Yowpo0k');
	define('ACCESS_TOKEN', '43742200-R0lruk2vx0kwtvgFV0ziS1A1K8RKl3eq8wni5kxQL');
	define('ACCESS_TOKEN_SECRET', 'CEi2e9gqgGNKhTRNiHmiCYIw2rL2nvDbpS3hoiy0Atf4s');

	$userTweets = get_transient('bemygirl_tweets');

	if ( ! $userTweets ) {
		$connection = new TwitterOAuth( CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET );
		$userTweets = $connection->get('statuses/user_timeline', array('count'=>3));
		set_transient( 'bemygirl_tweets', $userTweets, 120 );
	}