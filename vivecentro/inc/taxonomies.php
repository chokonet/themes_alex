<?php

	add_action( 'init', 'mq_taxonomies', 0 );

	function mq_taxonomies() {

		$labels = array(
			'name'              => _x( 'Zonas', 'taxonomy general name' ),
			'singular_name'     => _x( 'Zona', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Zonas' ),
			'all_items'         => __( 'Todas las Zonas' ),
			'parent_item'       => __( 'Parent Zona' ),
			'parent_item_colon' => __( 'Parent Zona:' ),
			'edit_item'         => __( 'Edit Zona' ),
			'update_item'       => __( 'Update Zona' ),
			'add_new_item'      => __( 'Add New Zona' ),
			'new_item_name'     => __( 'New Zona Name' ),
			'menu_name'         => __( 'Zonas' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'zonas' ),
		);

		register_taxonomy( 'zonas', array( 'lugares', 'actividades' ), $args );

		$labels = array(
			'name'              => _x( 'Categorías', 'taxonomy general name' ),
			'singular_name'     => _x( 'Categoría', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Categorías' ),
			'all_items'         => __( 'Todas las Categorías' ),
			'parent_item'       => __( 'Parent Categoría' ),
			'parent_item_colon' => __( 'Parent Categoría:' ),
			'edit_item'         => __( 'Edit Categoría' ),
			'update_item'       => __( 'Update Categoría' ),
			'add_new_item'      => __( 'Add New Categoría' ),
			'new_item_name'     => __( 'New Categoría Name' ),
			'menu_name'         => __( 'Categorías' )
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'categorias' )
		);

		register_taxonomy( 'categorias', array( 'lugares' ), $args );



		if(taxonomy_exists('zonas')){
			wp_insert_term( 'Zócalo-Moneda', 'zonas' );
			wp_insert_term( 'Antigua Merced', 'zonas' );
			wp_insert_term( 'Madero', 'zonas' );
			wp_insert_term( 'Alameda Norte', 'zonas' );
			wp_insert_term( 'San Ildefonso', 'zonas' );
			wp_insert_term( 'Regina', 'zonas' );
			wp_insert_term( 'Alameda Sur', 'zonas' );
			wp_insert_term( 'Garibaldi', 'zonas' );
			wp_insert_term( 'Santo Domingo', 'zonas' );

		}

		if(taxonomy_exists('categorias')){
			wp_insert_term( 'Comercial', 'categorias' );
			wp_insert_term( 'Identidad Histórica', 'categorias' );
			wp_insert_term( 'Cultural', 'categorias' );
			wp_insert_term( 'Plazas y Parques', 'categorias' );
			wp_insert_term( 'Alimentos', 'categorias' );
			wp_insert_term( 'Destacados', 'categorias' );

		}

	}

?>