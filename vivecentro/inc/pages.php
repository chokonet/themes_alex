<?php

// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// Page Contacto
		if( ! get_page_by_path('acerca-de') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Acerca de',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		// Page Contacto
		if( ! get_page_by_path('zonas') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Zonas',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		if( ! get_page_by_path('terminos-y-condiciones') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Términos y condiciones',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('blog') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Blog',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}




	});