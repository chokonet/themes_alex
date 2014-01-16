<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// NOTICIAS
		$labels = array(
			'name'          => 'Party',
			'singular_name' => 'Party',
			'add_new'       => 'Nueva Party',
			'add_new_item'  => 'Nueva Party',
			'edit_item'     => 'Editar Party',
			'new_item'      => 'Nueva Party',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Party',
			'search_items'  => 'Buscar Party',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Party'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'party' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'party', $args );



		$labels = array(
			'name'          => 'Design',
			'singular_name' => 'Design',
			'add_new'       => 'Nueva Design',
			'add_new_item'  => 'Nueva Design',
			'edit_item'     => 'Editar Design',
			'new_item'      => 'Nueva Design',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Design',
			'search_items'  => 'Buscar Design',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Design'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'design' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'design', $args );

	});