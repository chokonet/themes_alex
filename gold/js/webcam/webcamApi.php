<?php
/**
 * JPEGCam Test Script
 * Receives JPEG webcam submission and saves to local file.
 * Make sure your directory has permission to write files as your web server user!
 */

	$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));

	if ( file_exists($root.'/wp-config.php') ) {
		require_once($root.'/wp-config.php');
		require_once($root.'/wp-load.php');
	}

	global $current_user;

	// Guardar imagen temporal en: img/imagenesPaso1/
	$result = file_put_contents(
		get_template_directory()."/img/imagenesPaso1/$current_user->user_login.png",
		file_get_contents('php://input')
	);

	if (!$result) {
		print "ERROR: Failed to write data, check permissions\n";
		exit;
	}