<?php
	//Theme
	add_theme_support( 'post-thumbnails' );

	//Image Sizes
	add_image_size( 'slider_home', 420, 280, true );
	add_image_size( 'diccionario', 143, 215, true );
    add_image_size( 'un_tercio', 300, 250, true );
	add_image_size( 'img_blog', 358, 232, true );
    add_image_size( 'car_articulos', 87, 130, true );

/*
	---------------------
		SCRIPTS
	---------------------
*/

// Definir el paths a los directorios de javascript y css
define( 'JSPATH', get_template_directory_uri() . '/js/' );

add_action('wp_enqueue_scripts', function(){

	//Register
	wp_register_script('ana_tinycarousel', JSPATH.'jquery.tinycarousel.min.js', array('jquery'), false, true);
	wp_register_script('ana_cycle', JSPATH.'jquery.cycle.lite.js', array('jquery'), false, true);
	wp_register_script('ana_cycle2', JSPATH.'cycle2.js', array('jquery'), false, true);
	wp_register_script('ana_round', JSPATH.'roundabout.min.js', array('jquery'), false, true);
	wp_register_script('ana_functions', JSPATH.'functions.js', array('jquery'), false, true);

    wp_localize_script('ana_functions', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php' );

	//Enqueue
	wp_enqueue_style('ana_css', get_stylesheet_uri() );

	wp_enqueue_script('ana_tinycarousel');
	wp_enqueue_script('ana_cycle');
	wp_enqueue_script('ana_cycle2');
	wp_enqueue_script('ana_round');
	wp_enqueue_script('ana_functions');



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
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
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
function mq_get_posts_by_category($letra){
    global $wpdb;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $postsperpage = 10;
    $offset = ($paged-1) * $postsperpage;

    $query_diccionario_limit = $wpdb->get_results(
        "SELECT ID, post_title, post_content, post_mime_type FROM wp_posts
            JOIN wp_term_relationships AS tr ON object_id = ID
            JOIN wp_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
            JOIN wp_terms AS t ON tt.term_id = t.term_id
                WHERE post_title LIKE '$letra%' AND t.slug = 'diccionario'
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

/*paginacion*/
function get_pagination_links($l) {
global $wp_query;

$big = 999999999; // need an unlikely integer
$totales = mq_get_posts_by_category_total($l);



echo paginate_links( array(
    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'    => '/page/%#%',
    'current'   => max( 1, get_query_var('paged') ),
    'total'     => $totales,
    'show_all'  => true
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
          'post_title'    => 'Nueva pregunta de:' . $name,
          'post_content'  => $pregunta,
          'post_status'   => 'draft',
          'post_author'   => $current_user->ID,
          'post_category' => array( 3072 )
        );

        // Insert the post into the database
        $result = wp_insert_post( $post, true );
        if( ! is_wp_error( $result ) ){
            wp_mail( $current_user->user_email, 'anavasquez', 'Gracias por enviarnos tu pregunta' );
        }
        echo json_encode($result);
    } else {
        echo json_encode('error');
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





