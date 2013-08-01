<?php

	include_once('inc/pages.php');


	// Add RSS links to <head> section
	// automatic_feed_links(); // deprecated
	add_theme_support( 'automatic-feed-links' );

	// Load jQuery
	add_action('wp_enqueue_scripts', 'enqueue_canana_scripts');

	function enqueue_canana_scripts(){

		wp_register_style( 'css-admin', get_bloginfo('template_url') . '/estilos_admin.css' );
		wp_enqueue_style( 'css-admin' );

		//functions php (registrar scripts)
		$php2js_vars_array = array(
			'site_url'     => home_url('/'),
			'template_url' => get_bloginfo('template_url'),
		);
		wp_localize_script( 'my-plugin-script', 'php2js_vars_obj', $php2js_vars_array );
	}

	add_filter( 'show_admin_bar', '__return_false' );
	add_action( 'init', 'register_cpt_acerca' );

	// registrar accion para admin
	// add_action( 'admin_init', 'my-plugin-script' );
	// add_action('admin_print_scripts-post.php', 'my-plugin-script');

	add_action('admin_enqueue_scripts', 'enqueue_canana_admin_scripts');

	function enqueue_canana_admin_scripts(){
		wp_enqueue_script( 'my-plugin-script', get_bloginfo('template_url') . '/js/funciones_admin.js', array('jquery'), false, false );
		wp_enqueue_style('jquery-ui-css', get_bloginfo('template_url') . '/css/admin.css' );
	}


	add_theme_support('post-thumbnails');

		add_image_size( 'slider-home', 975, 509, true );
		add_image_size( 'archive-catalogo', 173, 247, true );
		add_image_size( 'single-catalogo', 237, 338, true );
		add_image_size( 'archive-noticias', 492, 189,  true );


	/**
	 * ficm_print_options()
	 * Esta función imprime todos los attachments de un post ($ID)
	 * en forma de options para un select
	 * con la opción "selected" de acuerdo con el meta
	 *
	 * @param ID => el id de post MOVER
	 * @param $ficm_slider_img_meta => el id del attachment del meta
	 * @param $exlude_featured => el id de la features image (para excluir)
	 *
	 */
	function ficm_print_options($id, $ficm_slider_img_meta, $exlude_featured){

		$argumentos = array(
			'post_parent'	 => $id,
			'post_type'		 => 'attachment',
			'post_mime_type' => 'image',
			'post_status'	 => 'inherit',
			'posts_per_page' => -1,
			'exclude'   	 => $exlude_featured
		);

		$attachments = get_posts( $argumentos );


		echo '<option value="0"';
		if($ficm_slider_img_meta == '0') echo ' selected ';
		echo '>No incluir en el slider</option>';


		foreach($attachments as $attachment){
			echo '<option value="';
			echo $attachment->ID;
			echo '"';
			if($ficm_slider_img_meta == $attachment->ID) echo ' selected ';
			echo ' >';
			echo $attachment->post_title;
			echo '</options>';
		}
	}

	// Taxonomia géneros
	function custom_taxonomy()  {
		$labels = array(
			'name'                       => _x( 'Generos', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Género', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Género', 'text_domain' ),
			'all_items'                  => __( 'Todos los géneros', 'text_domain' ),
			'parent_item'                => __( 'Género padre', 'text_domain' ),
			'parent_item_colon'          => __( 'Género padre:', 'text_domain' ),
			'new_item_name'              => __( 'Nuevo género', 'text_domain' ),
			'add_new_item'               => __( 'Agregar Nuevo género', 'text_domain' ),
			'edit_item'                  => __( 'Editar género', 'text_domain' ),
			'update_item'                => __( 'Actualizar género', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separar géneros con comas', 'text_domain' ),
			'search_items'               => __( 'Buscar género', 'text_domain' ),
			'add_or_remove_items'        => __( 'Agregar o eliminar género', 'text_domain' ),
			'choose_from_most_used'      => __( 'Selecciona de los géneros más usados', 'text_domain' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true
		);

		//register_taxonomy( 'Genero', 'catalogo', $args );
	}

	// Taxonomia puestos
	function custom_taxonomy2()  {
		$labels = array(
			'name'                       => _x( 'Puestos', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Puesto', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Puesto', 'text_domain' ),
			'all_items'                  => __( 'Todos los puestos', 'text_domain' ),
			'parent_item'                => __( 'Puesto padre', 'text_domain' ),
			'parent_item_colon'          => __( 'Puesto padre:', 'text_domain' ),
			'new_item_name'              => __( 'Nuevo Puesto', 'text_domain' ),
			'add_new_item'               => __( 'Agregar Nuevo Puesto', 'text_domain' ),
			'edit_item'                  => __( 'Editar Puesto', 'text_domain' ),
			'update_item'                => __( 'Actualizar Puesto', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separar Puestos con comas', 'text_domain' ),
			'search_items'               => __( 'Buscar Puesto', 'text_domain' ),
			'add_or_remove_items'        => __( 'Agregar o eliminar Puesto', 'text_domain' ),
			'choose_from_most_used'      => __( 'Selecciona de los Puestos más usados', 'text_domain' )
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true
		);

		register_taxonomy( 'Puestos', 'equipo', $args );
	}

	add_action( 'init', 'custom_taxonomy', 0 );
	add_action( 'init', 'custom_taxonomy2', 0 );


	//Post type Acerca
	function register_cpt_acerca() {

		$labels = array(
				'name'               => _x( 'Acerca', 'acerca' ),
				'singular_name'      => _x( 'Acerca', 'acerca' ),
				'add_new'            => _x( 'Añadir tema en acerca', 'acerca' ),
				'add_new_item'       => _x( 'Add New Acerca', 'acerca' ),
				'edit_item'          => _x( 'Editar Acerca', 'acerca' ),
				'new_item'           => _x( 'Nuevo Acerca', 'acerca' ),
				'view_item'          => _x( 'Ver Acerca', 'acerca' ),
				'search_items'       => _x( 'Buscar Acerca', 'acerca' ),
				'not_found'          => _x( 'No se encontro acerca', 'acerca' ),
				'not_found_in_trash' => _x( 'No se encontro acerca', 'acerca' ),
				'parent_item_colon'  => _x( 'Parent Acerca:', 'acerca' ),
				'menu_name'          => _x( 'Acerca', 'acerca' ),
		);

		$args = array(
				'labels'       => $labels,
				'hierarchical' => false,
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
				'public'       => true,
				'show_ui'      => true,
				'show_in_menu' => true,


				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive'         => true,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => true,
				'capability_type'     => 'post'
		);

		register_post_type( 'acerca', $args );
	};

	//Post Type catálogo
	add_action( 'init', 'register_cpt_catalogo' );

	function register_cpt_catalogo() {

		$labels = array(
				'name'               => _x( 'Catálogo', 'catalogo' ),
				'singular_name'      => _x( 'Catalogo', 'catalogo' ),
				'add_new'            => _x( 'Agregar película', 'catalogo' ),
				'add_new_item'       => _x( 'Agregar película', 'catalogo' ),
				'edit_item'          => _x( 'Editar Catálogo', 'catalogo' ),
				'new_item'           => _x( 'Nueva película', 'catalogo' ),
				'view_item'          => _x( 'Ver película', 'catalogo' ),
				'search_items'       => _x( 'Busca en el catálogo', 'catalogo' ),
				'not_found'          => _x( 'No se encontraron películas', 'catalogo' ),
				'not_found_in_trash' => _x( 'No se encontraron películas', 'catalogo' ),
				'parent_item_colon'  => _x( 'Parent Catalogo:', 'catalogo' ),
				'menu_name'          => _x( 'Catálogo', 'catalogo' ),
		);

		$args = array(
				'labels'              => $labels,
				'description'         => 'Cónoce las películas de nuestro catálogo',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail' ),
				'taxonomies'          => array( 'Genero' ),
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive'         => true,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => true,
				'menu_position'       => null,
				'capability_type'     => 'post'
		);

		register_post_type( 'catalogo', $args );
	}


	//Post Type Equipo
	add_action( 'init', 'register_cpt_equipo' );

	function register_cpt_equipo() {

		$labels = array(
				'name'               => _x( 'Equipo', 'equipo' ),
				'singular_name'      => _x( 'Equipo', 'equipo' ),
				'add_new'            => _x( 'Agregar integrante', 'equipo' ),
				'add_new_item'       => _x( 'Agregar integrante', 'equipo' ),
				'edit_item'          => _x( 'Editar equipo', 'equipo' ),
				'new_item'           => _x( 'Nuevo integrante', 'equipo' ),
				'view_item'          => _x( 'Ver integrante', 'equipo' ),
				'search_items'       => _x( 'Busca en el equipo', 'equipo' ),
				'not_found'          => _x( 'No se encontraron integrantes', 'equipo' ),
				'not_found_in_trash' => _x( 'No se encontraron integrantes', 'equipo' ),
				'parent_item_colon'  => _x( 'Parent equipo:', 'equipo' ),
				'menu_name'          => _x( 'Equipo', 'equipo' ),
		);

		$args = array(
				'labels'              => $labels,
				'description'         => 'Nuestro equipo de trabajo',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies'          => array( 'Puestos' ),
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive'         => true,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => true,
				'capability_type'     => 'post'
		);

		register_post_type( 'equipo', $args );
		};


	//Post Type logos home
	add_action( 'init', 'register_cpt_logos' );

	function register_cpt_logos() {

		$labels = array(
				'name'               => _x( 'Logos', 'logos' ),
				'singular_name'      => _x( 'Logos', 'logos' ),
				'add_new'            => _x( 'Agregar logo', 'logos' ),
				'add_new_item'       => _x( 'Agregar logo', 'logos' ),
				'edit_item'          => _x( 'Editar logo', 'logos' ),
				'new_item'           => _x( 'Nuevo logo', 'logos' ),
				'view_item'          => _x( 'Ver logo', 'logos' ),
				'search_items'       => _x( 'Busca en los logos', 'logos' ),
				'not_found'          => _x( 'No se encontraron logos', 'logos' ),
				'not_found_in_trash' => _x( 'No se encontraron logos', 'logos' ),
				'parent_item_colon'  => _x( 'Parent logo:', 'logos' ),
				'menu_name'          => _x( 'Logos', 'logos' ),
		);

		$args = array(
				'labels'              => $labels,
				'hierarchical'        => false,
				'supports'            => array( 'title', 'thumbnail' ),
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'publicly_queryable'  => false,
				'exclude_from_search' => true,
				'has_archive'         => false,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => true,
				'capability_type'     => 'post'
		);

		register_post_type( 'logos', $args );
		};


	//Post Type Newsletter
	add_action( 'init', 'register_cpt_suscriptores' );

	function register_cpt_suscriptores() {

		$labels = array(
				'name'               => _x( 'suscriptores', 'suscriptores' ),
				'singular_name'      => _x( 'suscriptor', 'suscriptores' ),
				'add_new'            => _x( 'Agregar suscriptor', 'suscriptores' ),
				'add_new_item'       => _x( 'Agregar suscriptor', 'suscriptores' ),
				'edit_item'          => _x( 'Editar suscriptor', 'suscriptores' ),
				'new_item'           => _x( 'Nuevo suscriptor', 'suscriptores' ),
				'view_item'          => _x( 'Ver suscriptor', 'suscriptores' ),
				'search_items'       => _x( 'Busca en los suscriptores', 'suscriptores' ),
				'not_found'          => _x( 'No se encontraron suscriptores', 'suscriptores' ),
				'not_found_in_trash' => _x( 'No se encontraron suscriptores', 'suscriptores' ),
				'parent_item_colon'  => _x( 'Parent suscriptor:', 'suscriptores' ),
				'menu_name'          => _x( 'Newsletter', 'suscriptores' ),
		);

		$args = array(
				'labels'              => $labels,
				'hierarchical'        => false,
				'supports'            => array( 'title', 'thumbnail' ),
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'publicly_queryable'  => false,
				'exclude_from_search' => true,
				'has_archive'         => false,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => true,
				'capability_type'     => 'post'
		);

		register_post_type( 'suscriptores', $args );
		};

	//Metabox para el catálogo

	add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );
	add_action( 'save_post', 'myplugin_save_postdata' );

	/* Metabox catálogo  */
	function myplugin_add_custom_box() {
		$screens = array( 'catalogo', 'acerca' );
		foreach ($screens as $screen) {
			add_meta_box(
				'myplugin_sectionid',
				__( 'Datos de película', 'myplugin_textdomain' ),
				'myplugin_inner_custom_box',
				$screen,
				'normal'
			);
		}

	};

	/* Prints the box content */
	function myplugin_inner_custom_box( $post ) {

		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

		global $post;
		$estreno      = esc_attr( get_post_meta( $post->ID, 'estreno', true ) );
		$linea2titulo = esc_attr( get_post_meta( $post->ID, 'linea2titulo', true ) );
		$pais         = esc_attr( get_post_meta( $post->ID, 'pais', true ) );
		$director     = esc_attr( get_post_meta( $post->ID, 'director', true ) );
		$escritor     = esc_attr( get_post_meta( $post->ID, 'escritor', true ) );
		$produccion   = esc_attr( get_post_meta( $post->ID, 'produccion', true ) );
		$fotografia   = esc_attr( get_post_meta( $post->ID, 'fotografia', true ) );
		$reparto      = esc_attr( get_post_meta( $post->ID, 'reparto', true ) );
		$trailer      = esc_attr( get_post_meta( $post->ID, 'trailer', true ) );

		$prensa       = esc_attr( get_post_meta( $post->ID, 'prensa', true ) );
		$canana_slide = esc_attr( get_post_meta( $post->ID, 'canana_slide', true ) );

	 	$url_slide = wp_get_attachment_url( $canana_slide, 'large' );

	 	$checked = ( $estreno == '1' ) ? ' checked' : '';


		echo<<<metabox

			<label for="estreno">Estreno</label>
			<input type="checkbox" name="estreno" value="1" $checked />

			<div class="metabox-pelicula">
				<label for="linea2titulo">2a Línea del título</label>
				<input type="text" class="widefat" id="linea2titulo" name="linea2titulo" value="$linea2titulo"/>
			</div>

			<div class="metabox-pelicula">
				<label for="pais">Pais</label>
				<input type="text" class="widefat" id="pais" name="pais" value="$pais"/>
			</div>

			<div class="metabox-pelicula">
				<label for="director">Director</label>
				<input type="text" class="widefat" id="director" name="director" value="$director"/>
			</div>

			<div class="metabox-pelicula">
				<label for="escritor">Escritor</label>
				<input type="text" class="widefat" id="escritor" name="escritor" value="$escritor"/>
			</div>

			<div class="metabox-pelicula">
				<label for="produccion">Producción</label>
				<input type="text" class="widefat" id="produccion" name="produccion" value="$produccion"/>
			</div>

			<div class="metabox-pelicula">
				<label for="fotografia">Fotografía</label>
				<input type="text" class="widefat" id="fotografia" name="fotografia" value="$fotografia"/>
			</div>

			<div class="metabox-pelicula">
				<label for="reparto">Reparto</label>
				<input type="text" class="widefat" id="reparto" name="reparto" value="$reparto"/>
			</div>

			<div class="metabox-pelicula">
				<label for="trailer">Trailer</label>
				<input type="text" class="widefat" id="trailer" name="trailer" value="$trailer"/>
			</div>

			<div class="metabox-pelicula">
				<label for="prensa">Prensa</label>
				<div class="wp-media-buttons" style="width:65%; display:inline-block;">
					<a href="#" class="button insert-media add_media" data-editor="content" title="Añadir objeto">
						<span class="wp-media-buttons-icon"></span>
						Press kit
					</a>
				</div>
			</div>

metabox;

		// Imagenes slide

		echo '<div class="metabox-pelicula">';
		echo '<div class="ficm_not_featured">';
		echo '<label for="canana_slide">Slide Home:<br />';
		echo '<span class="description">975px Ancho por 509px alto</span></label>';
		echo '<select name="canana_slide" id="ficm_slider_img_id">';
			ficm_print_options($post->ID, $canana_slide, get_post_thumbnail_id($post->ID));
		echo '</select>';
		echo '</div><br />';

		echo '<small class="ficm_not_featured_msj"></small>';
			if( isset($url_slide) && $canana_slide != get_post_thumbnail_id($post->ID) )
		echo "<img src='$url_slide' style='width:100%;'>";
		echo '</div>';

	}



	/* When the post is saved, saves our custom data */
	function myplugin_save_postdata( $post_id ) {

		// verify if this is an auto save routine.
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
				return;
		}

		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times
		if ( isset($_POST['myplugin_noncename'])
			&& !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) ){
				return;
		}


		// Check permissions
		if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ){
			if ( !current_user_can( 'edit_post', $post_id ) ) return;
		}

		// OK, we're authenticated: we need to find and save the data
		if (isset($_POST['post_ID']) && isset($_POST['director'])){

			$post_ID      = $_POST['post_ID'];
			$estreno      = isset($_POST['estreno'])      ? $_POST['estreno']      : '';
			$linea2titulo = isset($_POST['linea2titulo']) ? $_POST['linea2titulo'] : '';
			$pais         = isset($_POST['pais'])         ? $_POST['pais']         : '';
			$director     = isset($_POST['director'])     ? $_POST['director']     : '';
			$escritor     = isset($_POST['escritor'])     ? $_POST['escritor']     : '';
			$produccion   = isset($_POST['produccion'])   ? $_POST['produccion']   : '';
			$fotografia   = isset($_POST['fotografia'])   ? $_POST['fotografia']   : '';
			$reparto      = isset($_POST['reparto'])      ? $_POST['reparto']      : '';
			$trailer      = isset($_POST['trailer'])      ? $_POST['trailer']      : '';
			$canana_slide = isset($_POST['canana_slide']) ? $_POST['canana_slide'] : '';


			update_post_meta( $post_ID,'estreno' , $estreno );
			update_post_meta( $post_ID,'linea2titulo' , $linea2titulo );
			update_post_meta( $post_ID,'pais' , $pais );
			update_post_meta( $post_ID,'director' , $director );
			update_post_meta( $post_ID,'escritor' , $escritor );
			update_post_meta( $post_ID,'produccion' , $produccion );
			update_post_meta( $post_ID,'fotografia' , $fotografia );
			update_post_meta( $post_ID,'reparto' , $reparto );
			update_post_meta( $post_ID,'trailer' , $trailer );
			update_post_meta( $post_ID,'canana_slide' , $canana_slide );
		}
	}

	add_action( 'add_meta_boxes', 'myplugin_add_custom_box2' );
	add_action( 'save_post', 'myplugin_save_postdata2' );

	/*metabox catalogo datos cartelera*/

	add_action( 'add_meta_boxes', 'custombox_catalogo_datos_cartelera' );
	add_action( 'save_post', 'guardar_custombox_catalogo_datos_cartelera' );

	/* Adds a box to the main column on the Post and Page edit screens */
	function custombox_catalogo_datos_cartelera() {
	    $screens = array( 'catalogo', 'page' );
	    foreach ($screens as $screen) {
	        add_meta_box(
	            'myplugin_dd',
	            __( 'Datos cartelera', 'myplugin_catalogo_datos_cartelera' ),
	            'campos_custombox_catalogo_datos_cartelera',
	            $screen
	        );
	    }
	}

	/* Prints the box content */
	function campos_custombox_catalogo_datos_cartelera( $post ) {

	  global $post;

	    $catalogo_datos_cartelera = get_post_meta( $post->ID, 'catalogo_datos_cartelera', true );
	    // output invlid url message and add the http:// to the input field

	    $catalogo_datos_cartelera = $catalogo_datos_cartelera ? $catalogo_datos_cartelera : '';
	    wp_editor(  stripslashes($catalogo_datos_cartelera), 'catalogo_datos_cartelera', array('name'=>'catalogo_datos_cartelera', 'media_buttons'=>false, 'textarea_rows' => 5));

	}

	/* When the post is saved, saves our custom data */
	function guardar_custombox_catalogo_datos_cartelera( $post_id ) {
	global $post;
	    if( $_POST ) {
	        update_post_meta( $post->ID, 'catalogo_datos_cartelera', $_POST['catalogo_datos_cartelera'] );
	    }

	}

	/* Metabox equipo  */
	function myplugin_add_custom_box2() {
			add_meta_box('myplugin_sectionid2','Linea 2 de integrante','myplugin_inner_custom_box2','equipo','side');
	}

	/* Prints the box content */
	function myplugin_inner_custom_box2( $post ) {

		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename2' );

		global $post;
		$linea2equipo=esc_attr( get_post_meta( $post->ID, 'linea2equipo', true ) );


		// 2a línea de equipo
		echo '<label for="linea2equipo">';
				 _e("Puesto/asistente	:", 'myplugin_textdomain2' );
		echo '</label><br /> ';
		echo '<input type="text" name="linea2equipo" value="'.$linea2equipo.'"/><br />';
	}

	/* When the post is saved, saves our custom data */
	function myplugin_save_postdata2( $post_id ) {

		// verify if this is an auto save routine.
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
				return;
		}

		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times

		if ( isset($_POST['myplugin_noncename2'])
			&& !wp_verify_nonce( $_POST['myplugin_noncename2'], plugin_basename( __FILE__ ) ) ){
				return;
		}


		// Check permissions
		if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ){
			if ( !current_user_can( 'edit_post', $post_id ) )
					return;
		}

		// OK, we're authenticated: we need to find and save the data
		if (isset($_POST['post_ID']) && isset($_POST['linea2equipo'])){
			$post_ID = $_POST['post_ID'];

			$linea2equipo = $_POST['linea2equipo'];
			update_post_meta( $post_ID,'linea2equipo' , $linea2equipo );
		}
	}


	add_action( 'add_meta_boxes', 'myplugin_add_custom_box3' );
	add_action( 'save_post', 'myplugin_save_postdata3' );

	/* Metaboxes */
	function myplugin_add_custom_box3() {
		add_meta_box('myplugin_sectionid3', 'Datos extra', 'myplugin_inner_custom_box3', 'logos', 'side');
		add_meta_box('usuarios','Usuarios con acceso','show_usuarios_meta','catalogo','side');
	}



	function show_usuarios_meta($post){

		wp_nonce_field(__FILE__, '_acceso_usuarios_nonce');

		$selected = get_post_meta( $post->ID, '_acceso_usuarios', true );
		$selected =  $selected ? $selected : array(); ?>

		<div class="usuarios-inside">
			<ul id="usuarios-list"  class="categorychecklist form-no-clear">
			<?php $usuarios = mq_get_usuarios();
			foreach ($usuarios as $usuario) {
				$checked = in_array($usuario->ID, $selected) ? ' checked' : ''; ?>
				<li>
					<label class="selectit">
						<input value="<?php echo $usuario->ID ?>" type="checkbox" name="_acceso_usuarios[]" <?php echo $checked; ?>>
						<?php echo $usuario->user_login; ?>
					</label>
				</li>
			<?php } ?>
			</ul>
		</div><?php
	}

	function mq_get_usuarios(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT * FROM wp_users", OBJECT
		);
	}

	function mq_get_press_attachment($post_id){
		global $wpdb;
		$result = $wpdb->get_results(
			"SELECT * FROM wp_posts
				WHERE post_parent      = '$post_id'
					AND post_type      = 'attachment'
					AND post_mime_type = 'application/zip';", OBJECT
		);
		return $result ? wp_get_attachment_url( $result[0]->ID ) : false;

	}


	/* Prints the box content */
	function myplugin_inner_custom_box3( $post ) {

		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename3' );
		$linkLogo = esc_attr( get_post_meta( $post->ID, 'linkLogo', true ) );

		// 2a línea de equipo
		echo '<label for="linkLogo">';
				 _e("Link para el logo	:", 'myplugin_textdomain3' );
		echo '</label><br /> ';
		echo '<input type="text" name="linkLogo" value="'.$linkLogo.'"/><br />';
	}

	/* When the post is saved, saves our custom data */
	function myplugin_save_postdata3( $post_id ) {
		// verify if this is an auto save routine.
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
				return;

		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times

		if (isset($_POST['myplugin_noncename3']) && !wp_verify_nonce( $_POST['myplugin_noncename3'], plugin_basename( __FILE__ ) ) )
				return;


		// Check permissions
		if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ){
			if ( !current_user_can( 'edit_post', $post_id ) )
					return;
		}

		// OK, we're authenticated: we need to find and save the data

		//if saving in a custom table, get post_ID
		if (isset($_POST['post_ID']) && isset($_POST['linkLogo'])){
			$post_ID = $_POST['post_ID'];

			$linkLogo = $_POST['linkLogo'];
			update_post_meta( $post_ID,'linkLogo' , $linkLogo );
		}


		// Distribuidores Metadata
		if(isset($_POST['_acceso_usuarios'])){
			if( !wp_verify_nonce($_POST['_acceso_usuarios_nonce'], __FILE__)){
				return $post_id;
			}
			update_post_meta($post_id, '_acceso_usuarios', $_POST['_acceso_usuarios']);
		}

	}

	//Metabox para  acerca
	add_action( 'add_meta_boxes', 'myplugin_add_custom_box4' );
	add_action( 'save_post', 'myplugin_save_postdata4' );

	/* Metabox logos  */
	function myplugin_add_custom_box4() {
		add_meta_box(
				'myplugin_sectionid4',
				__( 'Datos extra', 'myplugin_textdomain4' ),
				'myplugin_inner_custom_box4',
				'acerca'
		);

	}

	/* Prints the box content */
	function myplugin_inner_custom_box4( $post ) {

		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename4' );

		global $post;
		$urlAcerca=esc_attr( get_post_meta( $post->ID, 'urlAcerca', true ) );


		// 2a línea de equipo
		echo '<label for="urlAcerca">';
				 _e("Link para el menú acerca:", 'myplugin_textdomain4' );
		echo '</label><br /> ';
		echo '<input type="text" name="urlAcerca" value="'.$urlAcerca.'"/><br />';
	}

	/* When the post is saved, saves our custom data */
	function myplugin_save_postdata4( $post_id ) {
		// verify if this is an auto save routine.
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
				return;

		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times

		if (isset($_POST['myplugin_noncename4']) && !wp_verify_nonce( $_POST['myplugin_noncename4'], plugin_basename( __FILE__ ) ) )
				return;


		// Check permissions
		if ( isset($_POST['post_type']) && 'post' == $_POST['post_type'] )
		{
			if ( !current_user_can( 'edit_post', $post_id ) )
					return;
		}

		// OK, we're authenticated: we need to find and save the data

		//if saving in a custom table, get post_ID
		if (isset($_POST['post_ID']) && isset($_POST['urlAcerca'])){
			$post_ID = $_POST['post_ID'];

			$urlAcerca = $_POST['urlAcerca'];
			update_post_meta( $post_ID,'urlAcerca' , $urlAcerca);
		}

	}


	//fin de metabox acerca

	//lista para filtrar taxonomía catalogo
	function lista_generos() {
		global $typenow;

		// an array of all the taxonomyies you want to display. Use the taxonomy name or slug
		$taxonomies = array('Genero');

		// must set this to the post type you want the filter(s) displayed on
		if( $typenow == 'catalogo' ){

			foreach ($taxonomies as $tax_slug) {
				$tax_obj  = get_taxonomy($tax_slug);
				if( $tax_obj ) {
					$tax_name = $tax_obj->labels->name;
					$terms = get_terms($tax_slug);
					if(count($terms) > 0) {
						echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
						echo "<option value=''>Show All $tax_name</option>";
						foreach ($terms as $term) {
							echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
						}
						echo "</select>";
					}
				}
			}
		}
	}

	add_action( 'restrict_manage_posts', 'lista_generos' );

	// Clean up the <head>
	function removeHeadLinks() {
			remove_action('wp_head', 'rsd_link');
			remove_action('wp_head', 'wlwmanifest_link');
		}
		add_action('init', 'removeHeadLinks');
		remove_action('wp_head', 'wp_generator');

		if ( function_exists('register_sidebar') ) {
			register_sidebar(array(
				'name' => 'Menú de idioma',
				'id'   => 'menu-idioma',
				'description'   => 'Para qtranslate',
				'before_widget' => '<div id="idioma" class="widget">',
				'after_widget'  => '</div>'
			));
		}

	function get_page_template_name() {
		if ( is_page() ) {  // Currently displaying a Page?
			global $post;  // The data structure for the current Page is stored in this global variable.
			// Grab the template filename from Page metadata, but discard any .php extension.
			return str_replace('.php', '', get_post_meta($post->ID, '_wp_page_template', true));
		}
		return '';
	}

	function canana_login(){

		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['userpass']) ? $_POST['userpass'] : '';

		if( $username  and $password ) :

			$creds = array(
				'user_login'	=> $username,
				'user_password'	=> $password,
				'remember'		=> true
			);

			$user = wp_signon( $creds, false );
		endif;

		if ( is_wp_error( $user ) ) {
			echo json_encode( $user->get_error_message() );
		} else {
			echo json_encode( wp_set_current_user( $user->ID ) );
		}
		exit;
	}
	add_action('wp_ajax_canana_login', 'canana_login');
	add_action('wp_ajax_nopriv_canana_login', 'canana_login');

//---- TAXONOMIES ----//

add_action( 'init', 'acerca_taxonomies', 0 );


function acerca_taxonomies() {

	//Branded Content
	$labels = array(
		'name'              => _x( 'Branded Content', 'taxonomy general name' ),
		'singular_name'     => _x( 'Branded Content', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Branded Content' ),
		'all_items'         => __( 'All Branded Content' ),
		'parent_item'       => __( 'Parent Branded Content' ),
		'parent_item_colon' => __( 'Parent Branded Content:' ),
		'edit_item'         => __( 'Edit Branded Content' ),
		'update_item'       => __( 'Update Branded Content' ),
		'add_new_item'      => __( 'Add New Branded Content' ),
		'new_item_name'     => __( 'New Branded Content Name' ),
		'menu_name'         => __( 'Branded Content' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'branded-content' ),
	);

	register_taxonomy( 'branded-content', array( 'acerca' ), $args );

	//TV
	$labels = array(
		'name'              => _x( 'TV', 'taxonomy general name' ),
		'singular_name'     => _x( 'TV', 'taxonomy singular name' ),
		'search_items'      => __( 'Search TV' ),
		'all_items'         => __( 'All TV' ),
		'parent_item'       => __( 'Parent TV' ),
		'parent_item_colon' => __( 'Parent TV:' ),
		'edit_item'         => __( 'Edit TV' ),
		'update_item'       => __( 'Update TV' ),
		'add_new_item'      => __( 'Add New TV' ),
		'new_item_name'     => __( 'New TV Name' ),
		'menu_name'         => __( 'TV' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tv' ),
	);

	register_taxonomy( 'tv', array( 'acerca' ), $args );

	//CINE
	$labels = array(
		'name'              => _x( 'Cine', 'taxonomy general name' ),
		'singular_name'     => _x( 'Cine', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Cine' ),
		'all_items'         => __( 'All Cine' ),
		'parent_item'       => __( 'Parent Cine' ),
		'parent_item_colon' => __( 'Parent Cine:' ),
		'edit_item'         => __( 'Edit Cine' ),
		'update_item'       => __( 'Update Cine' ),
		'add_new_item'      => __( 'Add New Cine' ),
		'new_item_name'     => __( 'New Cine Name' ),
		'menu_name'         => __( 'Cine' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'cine' ),
	);

	register_taxonomy( 'cine', array( 'acerca' ), $args );
}


add_action( 'admin_init', 'register_links_setting_option' );



function register_links_setting_option(){
	register_setting('canana_links', 'canana_link_mundial');
	register_setting('canana_links', 'canana_link_ambulante');
}

add_action( 'admin_menu', 'show_admin_settings_canana_links' );

function show_admin_settings_canana_links(){
	add_options_page( 'canana_links', 'Canana Links', 'administrator', 'canana-links', 'display_canana_settings_link_html');
}

function display_canana_settings_link_html(){

	add_settings_section('canana_links_main_section', 'Links Canana', '', __FILE__); // table container

	add_settings_field('canana_link_mundial', 'Link Mundial', 'canana_link_mundial_html_callback', __FILE__, 'canana_links_main_section'); // table row
	add_settings_field('canana_link_ambulante', 'Link Ambulante', 'canana_link_ambulante_html_callback', __FILE__, 'canana_links_main_section'); // table row

	function canana_link_mundial_html_callback(){
		$canana_links_mundial = get_option('canana_link_mundial');
		echo "<input type='text' class='regular-text' name='canana_link_mundial' value='$canana_links_mundial' />";
	}

	function canana_link_ambulante_html_callback(){
		$canana_links_ambulante = get_option('canana_link_ambulante');
		echo "<input type='text' class='regular-text' name='canana_link_ambulante' value='$canana_links_ambulante' />";
	}?>

	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>Canana Links</h2>
		<form method="POST" action="options.php">
			<?php settings_fields('canana_links'); ?>
			<?php do_settings_sections(__FILE__); ?>
			<p class="submit">
				<input name="submit" type="submit" class="button-primary" value="Guardar Cambios" />
			</p>
		</form>
	</div><?php

}