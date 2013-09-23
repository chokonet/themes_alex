<?php

// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// Page NuevosProductos
		if( ! get_page_by_path('nuevosproductos') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'NuevosProductos',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Page NuevosProductos PayPal IPN
		if( ! get_page_by_path('nuevosproductos-paypal-ipn') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'NuevosProductos PayPal IPN',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		// Page NuevosProductos Subscription PayPal IPN
		if( ! get_page_by_path('nuevosproductos-subscription-paypal-ipn') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'NuevosProductos Subscription PayPal IPN',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		if( ! get_page_by_title('Padrino Facturas') ){
			$page = array(
				'post_author'  => 1,
				'post_status'  => 'publish',
				'post_title'   => 'Padrino Facturas',
				'post_type'    => 'page'
			);
			wp_insert_post( $page, true );
		}


		if( ! get_page_by_title('Post Donativo') ){
			$page = array(
				'post_author'  => 1,
				'post_status'  => 'publish',
				'post_title'   => 'Post Donativo',
				'post_type'    => 'page'
			);
			wp_insert_post( $page, true );
		}


	});