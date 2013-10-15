<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// magazine
		$labels = array(
			'name'          => 'Magazine',
			'singular_name' => 'Magazine',
			'add_new'       => 'Nueva Magazine',
			'add_new_item'  => 'Nueva Magazine',
			'edit_item'     => 'Editar Magazine',
			'new_item'      => 'Nueva Magazine',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Magazine',
			'search_items'  => 'Buscar Magazine',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Magazine'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'magazine' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor','excerpt','author','thumbnail' )
		);
		register_post_type( 'magazine', $args );

	});