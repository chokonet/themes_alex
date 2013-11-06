<?php

	// POST TYPES ////////////////////////////////////////

	function mq_post_types() {

	// Recorridos //

	  $labels = array(
		'name' => 'Recorridos',
		'singular_name' => 'Recorrido',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Recorrido',
		'edit_item' => 'Edit Recorrido',
		'new_item' => 'New Recorrido',
		'all_items' => 'All Recorridos',
		'view_item' => 'View Recorrido',
		'search_items' => 'Search Recorridos',
		'not_found' =>  'No recorridos found',
		'not_found_in_trash' => 'No recorridos found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Recorridos'
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'recorridos' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'author' )
	  );

	  register_post_type( 'recorridos', $args );



	// Lugares //

	  $labels = array(
		'name' => 'Lugares',
		'singular_name' => 'Lugar',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Lugar',
		'edit_item' => 'Edit Lugar',
		'new_item' => 'New Lugar',
		'all_items' => 'All Lugares',
		'view_item' => 'View Lugar',
		'search_items' => 'Search Lugares',
		'not_found' =>  'No Lugares found',
		'not_found_in_trash' => 'No Lugares found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Lugares'
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'lugares' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'author' )
	  );

	  register_post_type( 'lugares', $args );

	  // Actividades //

	  $labels = array(
		'name' => 'Actividades',
		'singular_name' => 'Actividad',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Actividad',
		'edit_item' => 'Edit Actividad',
		'new_item' => 'New Actividad',
		'all_items' => 'All Actividades',
		'view_item' => 'View Actividad',
		'search_items' => 'Search Actividades',
		'not_found' =>  'No Actividades found',
		'not_found_in_trash' => 'No Actividades found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Actividades'
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'actividades' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'author')
	  );

	  register_post_type( 'actividades', $args );

	}


add_action( 'init', 'mq_post_types' );

?>