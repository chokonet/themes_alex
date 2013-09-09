<?php

// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// Page Actividad
		if( ! get_page_by_path('actividad') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Actividad',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Page Favoritos
		if( ! get_page_by_path('favoritos') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Favoritos',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	});