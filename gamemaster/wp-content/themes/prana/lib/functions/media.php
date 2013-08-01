<?php
/** Register Prana Core scripts. */
add_action( 'wp_enqueue_scripts', 'prana_register_scripts', 1 );

/** Load Prana Core scripts. */
add_action( 'wp_enqueue_scripts', 'prana_enqueue_scripts' );

/** Register JavaScript and Stylesheet files for the framework. */
function prana_register_scripts() {

	/** Register the 'Superfish Plugin' scripts. */
	wp_register_script( 'prana-js-superfish', esc_url( PRANA_JS_URI . 'superfish/superfish-combine.min.js' ), array( 'jquery' ), '1.5.9', true );
	
	/** Register the 'common' scripts. */
	wp_register_script( 'prana-js-common', esc_url( PRANA_JS_URI . 'common.js' ), array( 'jquery' ), '1.0', true );
	
	/** Register '960.css' for grid. */
	wp_register_style( 'prana-css-960', esc_url( PRANA_CSS_URI . '960.css' ) );
	
	/** Register Google Fonts. */
	$protocol = is_ssl()? 'https' : 'http';
	wp_register_style( 'prana-google-fonts', esc_url( $protocol . '://fonts.googleapis.com/css?family=Open+Sans|Bitter' ) );
}

/** Tells WordPress to load the scripts needed for the framework using the wp_enqueue_script() function. */
function prana_enqueue_scripts() {

	/** Load the comment reply script on singular posts with open comments if threaded comments are supported. */
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/** Load the 'Superfish Plugin' scripts. */
	wp_enqueue_script( 'prana-js-superfish' );
	
	/** Load the 'common' scripts. */
	wp_enqueue_script( 'prana-js-common' );
	
	/** Load '960.css' for grid. */
	wp_enqueue_style( 'prana-css-960' );
	
	/** Load Google Fonts. */
	wp_enqueue_style( 'prana-google-fonts' );
}

/** Dynamic JS */
add_action( 'wp_footer', 'prana_dynamic_js', 100 );
function prana_dynamic_js() {
	
	$prana_options = prana_get_settings();
	if( $prana_options['prana_menu_position'] == 'center' ) {

?>
<script language="javascript">
(function($){
	$(document).ready(function(){
		$( '.menu' ).width( <?php echo esc_js( $prana_options['prana_menu_width'] ); ?> );
	});
})(jQuery);
</script>
<?php
	}
}
?>