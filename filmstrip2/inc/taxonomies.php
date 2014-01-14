<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// term trailers
		if ( ! term_exists( 'Trailers', 'category' ) ){
			wp_insert_term( 'Trailers', 'category' );
		}

		// term Primicias
		if ( ! term_exists( 'Primicias', 'category' ) ){
			wp_insert_term( 'Primicias', 'category' );
		}

		// term Nanometrajes
		if ( ! term_exists( 'Nanometrajes', 'category' ) ){
			wp_insert_term( 'Nanometrajes', 'category' );
		}

		// term Estrenos Cine
		if ( ! term_exists( 'Estrenos Cine', 'category' ) ){
			wp_insert_term( 'Estrenos Cine', 'category' );
		}

		// term Estrenos dvd
		if ( ! term_exists( 'Estrenos DVD/BR', 'category' ) ){
			wp_insert_term( 'Estrenos DVD/BR', 'category' );
		}
		

		// AUTORES
		/*if( ! taxonomy_exists('autores')){

			$labels = array(
				'name'              => 'Autores',
				'singular_name'     => 'Autor',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Autor',
				'update_item'       => 'Actualizar Autor',
				'add_new_item'      => 'Nuevo Autor',
				'new_item_name'     => 'Nombre Nuevo Autor',
				'menu_name'         => 'Autores'
			);

			$args = array(
				'hierarchical'      => false,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'autores' ),
			);

			register_taxonomy( 'autor', 'libro', $args );
		}*/
	}