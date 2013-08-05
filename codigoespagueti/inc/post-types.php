<?php

// POST TYPES /////////////////////////////////////////////////////////////////////////

	function post_types_espagueti(){

		// VIDEOS
		$args = array(
			'label'         => 'Videos',
			'public'        => true,
			'rewrite'       => array('slug' => 'videos'),
			'has_archive'   => true,
			'taxonomies'    => array('category'),
			'supports'      => array('title','thumbnail','editor'),
			'menu_position' => 5,
		);
		register_post_type( 'videos', $args );

		// RESEÑAS
		$args = array(
			'label'         => 'Reseñas',
			'public'        => true,
			'rewrite'       => array('slug' => 'resenas'),
			'has_archive'   => true,
			'taxonomies'    => array('category'),
			'supports'      => array('title','thumbnail','editor'),
			'menu_position' => 5,
		);
		register_post_type( 'resenas', $args );
	}
	add_action( 'init', 'post_types_espagueti' );

/*
	---------------------
		TAXONOMIES
	---------------------
*/

	function espagueti_tax(){
		//Reseñas //Consolas
		$argumentos = array(
			'labels' => array(
				'name'			=> 'Consolas',
				'add_new_item'	=> 'Nueva Consola',
				'parent_item'	=> 'Consola madre'
			),
			'hierarchical' => true
		);

		register_taxonomy(
			'consolas',
			'resenas',
			$argumentos
		);
	}
	add_action( 'init', 'espagueti_tax' );