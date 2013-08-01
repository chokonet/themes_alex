<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){

	// post type bebes
		$labels = array(
			'name'          => 'Bebés',
			'singular_name' => 'Bebé',
			'add_new'       => 'Nuevo Bebé',
			'add_new_item'  => 'Nuevo Bebé',
			'edit_item'     => 'Editar Bebé',
			'new_item'      => 'Nuevo Bebé',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Bebés',
			'search_items'  => 'Buscar Bebés',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Bebés'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'bebes' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => false,
			//'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type('bebes', $args);

	});