<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

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

	add_action( 'init', function(){

		// terms
		if ( ! term_exists( 'Mi Embarazo', 'category' ) ){
			wp_insert_term( 'Mi Embarazo', 'category' );
		}

		if ( ! term_exists( '0-6 Meses', 'category' ) ){
			wp_insert_term( '0-6 Meses', 'category' );
		}

		if ( ! term_exists( '1-3 Años', 'category' ) ){
			wp_insert_term( '1-3 Años', 'category' );
		}

		if ( ! term_exists( '6-12 Meses', 'category' ) ){
			wp_insert_term( '6-12 Meses', 'category' );
		}


	});