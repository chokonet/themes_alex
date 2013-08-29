<?php


// ELIMINAR LA POSIBILIDAD DE MODIFICAR TAXONOMIES ///////////////////////////////////


	add_action( 'init', function() use (&$wp_roles){

		// terms
		wp_insert_term('Capsulas', 'category');


		// pages
		// if( ! get_page_by_path('cast') ){
		// 	$page = array(
		// 		'post_author' => 1,
		// 		'post_status' => 'publish',
		// 		'post_title'  => 'Cast',
		// 		'post_type'   => 'page'
		// 	);
		// 	wp_insert_post( $page, true );
		// }

		foreach (array_keys($wp_roles->roles) as $role){
			//$wp_roles->remove_cap($role, 'manage_categories');
		}


	});