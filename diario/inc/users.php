<?php


// CUSTOM USER CONFIGURATIONS /////////////////////////////////////////////////////////



	// CREAR EL ROL DE MAMA
	$author = get_role('author');
	add_role( 'mama', 'Mama', $author->capabilities );



	// EVITAR QUE LAS MAMAS ENTREN AL DASHBOARD
	add_action('admin_menu', function() use (&$current_user){
		if ( in_array('mama', $current_user->roles) ){
			wp_redirect( home_url(), 403 ); exit;
		}
	});


	// SET ROL MAMA A LOS USUARIOS QUE NO SON ADMINISTRADORES
	// add_action('user_register', function ($user_id) {
	// 	$user = get_user_by('id', $user_id);
	// 	if ( ! $user->has_cap('edit_users')){
	// 		$user->set_role('mama');
	// 		create_initial_posts($user_id);
	// 	}
	// });


	// CREAR LOS POSTS NECESARIOS PARA INSERTAR LAS IMAGENES
	// function create_initial_posts($user_id){

	// 	$args1 = array(
	// 		'post_status'   => 'private',
	// 		'post_type'     => 'post',
	// 		'post_author'   => $user_id,
	// 		'post_category' => array(get_cat_ID('0-6 Meses'))
	// 	);
	// 	wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera foto') ), true );
	// 	wp_insert_post(array_merge( $args1, array('post_title' => 'Mis ojitos abiertos') ), true );
	// 	wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera sonrisa') ), true );
	// 	wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera foto con mamá')), true );
	// 	wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primera foto con papá') ), true );
	// 	wp_insert_post(array_merge( $args1, array('post_title' => 'Mi primer paseo') ), true );


	// 	$args2 = array(
	// 		'post_status'   => 'private',
	// 		'post_type'     => 'post',
	// 		'post_author'   => $user_id,
	// 		'post_category' => array(get_cat_ID('6-12 Meses'))
	// 	);
	// 	wp_insert_post(array_merge( $args2, array('post_title' => '¡Mira como gateo!') ), true );
	// 	wp_insert_post(array_merge( $args2, array('post_title' => '¡Mi primer diente!') ), true );
	// 	wp_insert_post(array_merge( $args2, array('post_title' => '¡Ya me siento sin ayuda!') ), true );
	// 	wp_insert_post(array_merge( $args2, array('post_title' => '¡Ya puedo decir mamá!') ), true );
	// 	wp_insert_post(array_merge( $args2, array('post_title' => '¡Ya puedo decir papá!') ), true );
	// 	wp_insert_post(array_merge( $args2, array('post_title' => '¡Mis primeros pasos!') ), true );



	// 	$args3 = array(
	// 		'post_status'   => 'private',
	// 		'post_type'     => 'post',
	// 		'post_author'   => $user_id,
	// 		'post_category' => array(get_cat_ID('1-3 Años'))
	// 	);
	// 	wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya camino solito!') ), true );
	// 	wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya puedo usar la cuchara!') ), true );
	// 	wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya tomo mi Progress GOLD en vaso!') ), true );
	// 	wp_insert_post(array_merge( $args3, array('post_title' => '¡Mi primer dibujo!') ), true );
	// 	wp_insert_post(array_merge( $args3, array('post_title' => '¡Ya me puedo lavar los dientes!') ), true );
	// 	wp_insert_post(array_merge( $args3, array('post_title' => '¡Mi primer día en el kinder!') ), true );

	// }