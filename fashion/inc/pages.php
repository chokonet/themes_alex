<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// CONTACTO
		if( ! get_page_by_path('contacto') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Contacto',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		// PRODUCTOS
		if( ! get_page_by_path('productos') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Productos',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		// acerca_de
		if( ! get_page_by_path('acerca-de') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Acerca De',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	});