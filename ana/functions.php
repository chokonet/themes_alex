<?php
	//Theme
	add_theme_support( 'post-thumbnails' );

	//Image Sizes
	add_image_size( 'slider_home', 420, 280, true );
	add_image_size( 'diccionario', 143, 215, true );
	add_image_size( 'un_tercio', 300, 250, true );
	add_image_size( 'img_blog', 358, 232, true );
	add_image_size( 'car_articulos', 87, 130, true );
	add_image_size( 'breading', 288, 191, true );
	add_image_size( 'post_interes', 156, 103, true );

/*
	---------------------
		SCRIPTS
	---------------------
*/

// Definir el paths a los directorios de javascript y css
define( 'JSPATH', get_template_directory_uri() . '/js/' );
define( 'THEMEPATH', get_template_directory_uri() );

add_action('wp_enqueue_scripts', function(){

	// scripts
	wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true);
	wp_enqueue_script('functions', JSPATH.'functions.js', array('plugins'), '1.0', true);

	// localize scripts
	wp_localize_script('functions', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php' );

	// styles
	wp_enqueue_style('ana_css', get_stylesheet_uri() );

});

/* main query requerido siempre */
add_action('pre_get_posts', function($query){
	if ( !is_admin() && $query->is_main_query() && $query->get( 'category_name' ) ){
		$category = $query->get( 'category_name' );

		if(  $category === 'videos' ){
			$query->set('posts_per_page', 8);
		}else{
			$query->set('posts_per_page', 4);
		}
	}


});

/*
	---------------------
		METABOXES
	---------------------
*/

//Metabox videos
$prefix = 'dbt_';
$meta_box = array(
	'id' => 'my-meta-box',
	'title' => 'Detalles',
	'page' => 'post',
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Video',
			'desc' => 'URL de video',
			'id' => $prefix . 'link_video',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => 'Twitcam',
			'desc' => 'URL de twitcam',
			'id' => $prefix . 'link_twitcam',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => 'Puesto',
			'desc' => 'Puesto en el equipo',
			'id' => $prefix . 'puesto',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => 'Slide',
			'desc' => 'colocar en slider',
			'id' => $prefix . 'slider_home',
			'type' => 'checkbox',
			'std' => ''
		)
	)
);

add_action('admin_menu', 'mytheme_add_box');
//creando taxonomias
function crea_mis_taxonomias() {

	register_taxonomy(
		'tipo',
		'post',
		array(
			'hierarchical'      => true,
			'query_var'         => true,
			'label'             => 'Sexo',
			'rewrite'           => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true
		)
	);


}

add_action('init', 'crea_mis_taxonomias', 0);
// Add meta box
function mytheme_add_box() {
	global $meta_box;
	add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box() {
	global $meta_box, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<table class="form-table">';
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
				break;

			case 'checkbox':

				 $checked = $meta ? 'checked' : '';

				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '" value="1"  '.$checked.' />', '<br />', $field['desc'];
				break;

		}
		echo     '</td><td>',
			'</td></tr>';
	}
	echo '</table>';
}

add_action('save_post', 'mytheme_save_data');
// Save data from meta box
function mytheme_save_data($post_id) {
	global $meta_box;
	// verify nonce
	if ( isset($_POST['mytheme_meta_box_nonce']) and !wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']]: false;

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}

//ejecuta una consulta y regresa un arreglo de tuplas
function mq_get_posts_by_category_diccionary($letra2){
	global $wpdb;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$postsperpage = 10;
	$offset = ($paged-1) * $postsperpage;

	$query_diccionario_limit = $wpdb->get_results(
		"SELECT DISTINCT ID, post_title, post_content, post_mime_type FROM wp_posts
			JOIN wp_term_relationships AS tr ON object_id = ID
			JOIN wp_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
			JOIN wp_terms AS t ON tt.term_id = t.term_id
				WHERE post_title LIKE '$letra2%' AND t.slug = 'diccionario'
					AND post_status = 'publish'
						ORDER BY post_title
							LIMIT $offset, $postsperpage;", OBJECT
	);

	return $query_diccionario_limit;
}

//ejecuta una consulta y regresa un arreglo de tuplas
function mq_get_posts_by_category($letra){
	global $wpdb;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$postsperpage = 10;
	$offset = ($paged-1) * $postsperpage;

	$query_diccionario_limit = $wpdb->get_results(
		"SELECT DISTINCT ID, post_title, post_content, post_mime_type FROM wp_posts
			JOIN wp_term_relationships AS tr ON object_id = ID
			JOIN wp_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
			JOIN wp_terms AS t ON tt.term_id = t.term_id
				WHERE post_title LIKE '$letra%' AND t.slug = 'diccionario'
					AND post_status = 'publish'
						ORDER BY post_title
							LIMIT $offset, $postsperpage;", OBJECT
	);

	return $query_diccionario_limit;
}

function mq_get_posts_by_category_total($letra){
	global $wpdb;

	$query_diccionario = $wpdb->get_results(
		"SELECT ID, post_title, post_content, post_mime_type FROM wp_posts
			JOIN wp_term_relationships AS tr ON object_id = ID
			JOIN wp_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
			JOIN wp_terms AS t ON tt.term_id = t.term_id
				WHERE post_title LIKE '$letra%' AND t.slug = 'diccionario'", OBJECT
	);
	$total = count($query_diccionario);
	$total = $total / 10;
	$total = ceil($total);
	return $total;
}

/*
	---------------------
		LIMIT WORDS
	---------------------
*/

function string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


/*
	---------------------
		PAGINACION
	---------------------
*/

function pagination($pages = '', $range = 3){
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}

	if( $pages != 1 ){
		echo "<div class='pagination'>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo " <a href='".get_pagenum_link(1)."'> << </a> ";
		if($paged > 1 && $showitems < $pages) echo " <a href='".get_pagenum_link($paged-1)."'> < </a> ";

		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i) ? " <span class='current_page'>$i</span> " : " <a href='".get_pagenum_link($i)."' class='inactive'>$i</a> ";
			}
		}
		if ($paged < $pages && $showitems < $pages) echo " <a href='".get_pagenum_link($paged + 1)."'> > </a> ";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <a href='".get_pagenum_link($pages)."'> >> </a> ";
		echo "</div>";
	}
}



/*paginacion diccionario*/
function get_pagination_links_dicc($l) {
global $wp_query;

$big = 999999999; // need an unlikely integer
$totales = mq_get_posts_by_category_total($l);

echo paginate_links( array(
    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'    => '/page/%#%',
    'current'   => max( 1, get_query_var('paged') ),
    'total'     => $totales,
    'prev_next' => true,
    'prev_text' => __('<   '),
    'next_text' => __('   >')

    ) );
}




// funcion ajax crea e inserta post como draft
function crear_nueva_pregunta(){

    global $current_user;

    $name     = isset($_POST['name']) ? $_POST['name'] : false;
    $email    = isset($_POST['email']) ? $_POST['email'] : false;
    $pregunta = isset($_POST['pregunta']) ? $_POST['pregunta'] : false;

    if( $name and $email and $pregunta and $current_user ){
         // Create post object
        $post = array(
          'post_title'   => 'Nueva pregunta de:' . $name,
          'post_content' => $pregunta,
          'post_status'  => 'draft',
          'post_author'  => $current_user->ID,
          'post_type'    => 'consejos'
        );

        // Insert the post into the database
        $result = wp_insert_post( $post, true );
        if( ! is_wp_error( $result ) ){
        	$mensaje = 'Gracias por enviarnos tu pregunta';
        	update_post_meta($result, 'nombre', $name);
        	update_post_meta($result, 'mail', $email);

        	$headers[] = 'From: Ana Vasquez <consulta_ana@anavasquez.com>';
            wp_mail( $email, 'anavasquez', $mensaje, $headers );
        }
        echo json_encode($result);
    } else {
        wp_send_json_error();
    }
    exit;
}



add_action('wp_ajax_crear_nueva_pregunta', 'crear_nueva_pregunta');
add_action('wp_ajax_nopriv_crear_nueva_pregunta', 'crear_nueva_pregunta');



add_action('init', function(){
	if( isset($_POST['sexo']) and !isset($_COOKIE["sexo"]) ){
		setcookie('sexo', $_POST['sexo'], time()+31556926);
		echo "<script> location.reload(); </script>";
	}
});



// conteo hombre mujer
function update_gender_count($sexo){
	if($sexo == 'hombre'){
		$hombres = get_option('usuarios_hombre');//accede a la tabla option de wordpress
		update_option('usuarios_hombre', $hombres+1);//si no existe crea el campo
		unset($_POST['sexo']);
	}elseif($sexo == 'mujer'){
		$mujeres = get_option('usuarios_mujer');
		update_option('usuarios_mujer', $mujeres+1);
		unset($_POST['sexo']);
	}
}



//Limite palabras the_excerpt
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



//creando post-type
function create_post_type() {
  register_post_type( 'consejos',
		array(
			'labels' => array(
				'name' => __( 'Consulta a Ana' ),
				'singular_name' => __( 'consejos' )
			),
		'public' => true,
		'has_archive' => true,
		'taxonomies' => array('category'),
		'supports' => array('title', 'editor','excerpt','custom-fields','author','page-attributes','thumbnail', 'comments')
		)
	);

}
add_action( 'init', 'create_post_type' );



// crear un metabox en el post_type consejos con el email de la persona que hizo la pregunta

/*custombox consejosAna*/
add_action( 'add_meta_boxes', 'custombox_mailConsejos' );
add_action( 'save_post', 'guardar_custombox_mailConsejos' );

/* Adds a box to the main column on the Post and Page edit screens */
function custombox_mailConsejos() {
    $screens = array( 'consejos', 'page' );
    foreach ($screens as $screen) {
        add_meta_box(
            'myplugin_dd',
            'Datos de quien consulta',
            'campos_custombox_mailConsejos',
            $screen
        );
    }
}

/* Prints the box content */
function campos_custombox_mailConsejos( $post ) {

  global $post;


    $nombre = get_post_meta( $post->ID, 'nombre', true );
    $mail = get_post_meta( $post->ID, 'mail', true );

    ?>
    <p><label for="nombre">Nombre:<br />
        <input id="nombre" size="40" name="nombre" value="<?php if( $nombre ) { echo $nombre; } ?>" /></label></p>
    <p><label for="mail">Mail:<br />
        <input id="mail" size="40" name="mail" value="<?php if( $mail ) { echo $mail; } ?>" /></label></p>

<?php

}

/**
 * When the post is saved, saves our custom data
 * @param  int $post_id
 */
function guardar_custombox_mailConsejos( $post_id ) {
global $post;
    if( $_POST ) {
        update_post_meta( $post->ID, 'nombre', $_POST['nombre'] );
        update_post_meta( $post->ID, 'mail', $_POST['mail'] );
    }

}

/**
 * Mandar el email cuando la pregunta se publique.
 */
add_action( 'publish_consejos', function( $post_id ){

	$post = get_post($post_id, OBJECT);

	$permalink = get_permalink($post->ID);
	$nombre = get_post_meta($post->ID, 'nombre', true);
	$mail = get_post_meta($post->ID, 'mail', true);

	$contenido = 'Hola '.$nombre. ' en este link puedes ver tu pregunta '.$permalink;
	// mandar email a la persona que realizo la pregunta con wp_mail();

	$headers[] = 'From: Ana Vasquez <consulta_ana@anavasquez.com>';

	wp_mail($mail,'anavasquez', $contenido, $headers);

});

/**
 * Poner imagen en una categoria
 */

add_action ( 'edit_category_form_fields', function( $tag ){


	if (   $tag->slug == 'asesorias'
		OR $tag->slug == 'conferencias'
		OR $tag->slug == 'cursos' ) {


	    $category_meta = get_option( "category_".$tag->term_id );

		echo <<< imagen_normal

		<tr class="form-field">
			<th scope="row" valign="top"><label for="cat_Image_url_extra">Url imagen categoria</label></th>
			<td>
				<input type="text" name="category_meta[img]" id="category_meta[img]" size="3" value="{$category_meta['img']}"><br />
				<span class="description">Imagen de categoría: use url completa http://<br />Dimensiones: 417 × 341 px</span>
			</td>
		</tr>

imagen_normal;

	}

	if ($tag->slug == 'cursos' ) {

		$category_meta = get_option( "category_".$tag->term_id );

		echo <<< imagen_rectangular

			<tr class="form-field">
				<th scope="row" valign="top"><label for="cat_Image_url_extra">Url imagen responsive</label></th>
				<td>
					<input type="text" name="category_meta[img_extra]" id="category_meta[img_extra]" size="3" value="{$category_meta['img_extr']}"><br />
					<span class="description">Imagen extra de categoría (responsive): use url completa http:// <br />Dimensiones: 565 × 138 px</span>
				</td>
			</tr>
imagen_rectangular;

	}

});


add_action ( 'edited_category', function($term_id){

    if ( isset( $_POST['category_meta'] ) ) {
        $t_id = $term_id;
        $category_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['category_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['category_meta'][$key])){
                $category_meta[$key] = $_POST['category_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $category_meta );
    }

});
