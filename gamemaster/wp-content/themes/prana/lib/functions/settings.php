<?php
/** Loads the Prana theme setting. */
function prana_get_settings() {
	global $prana;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $prana->settings ) ) {
		$prana->settings = get_option( 'prana_options' );
	}
	
	/** return settings. */
	return $prana->settings;
}
?>