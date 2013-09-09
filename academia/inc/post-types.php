<?php


// POST TYPES /////////////////////////////////////////////////////////////////////////


	add_action('init', function () {

		/* post type propiedad*/
		$labels = array(
			'name'               => 'Productos',
			'singular_name'      => 'Producto',
			'add_new'            => 'Producto',
			'add_new_item'       => 'Producto',
			'edit_item'          => 'Producto',
			'new_item'           => 'Nuevo',
			'view_item'          => 'Ver Producto',
			'search_items'       => 'Search',
			'not_found'          => 'Nothing',
			'not_found_in_trash' => 'Nothing',
			'parent_item_colon'  => ''
		);


		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'query_var'          => true,
			'rewrite'            => true,
			'has_archive'        => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor','excerpt','custom-fields','author','page-attributes','thumbnail'),
			'taxonomies'         => array('category'),
			'slug'               => 'productos',
		);

		register_post_type('productos', $args);

	});