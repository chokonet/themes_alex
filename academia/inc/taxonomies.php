<?php

// CUSTOM TAXONOMIES /////////////////////////////////////////////////////////////////


	add_action('init', function(){

		if ( ! term_exists( 'Mi Embarazo', 'category' ) ){
			wp_insert_term( 'Mi Embarazo', 'category' );
		}

		if ( ! term_exists( '0-6 Meses', 'category' ) ){
			wp_insert_term( '0-6 Meses', 'category' );
		}

		if ( ! term_exists( '1-3 Años', 'category' ) ){
			wp_insert_term( '1-3 Años', 'category' );
		}

		if ( ! term_exists( '6-12 Meses', 'category' ) ){
			wp_insert_term( '6-12 Meses', 'category' );
		}

	});