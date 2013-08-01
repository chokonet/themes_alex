<?php
add_theme_support( 'post-thumbnails' );
add_image_size( 'prensa_thumb', 104, 104, true );
add_image_size( 'imagenes_personajes', 870, 470, true );
add_image_size( 'blog', 428, 428, true );
add_image_size( 'blog2', 428, 270, true );
add_image_size( 'gente', 640, 426, true );

/* PERSONAJES */

function codex_custom_init() {
  $labels = array(
    'name' => _x('personajes', 'post type general name'),
    'singular_name' => _x('personajes', 'post type singular name'),
    'add_new' => _x('Add New', 'personajes'),
    'add_new_item' => __('Add New personajes'),
    'edit_item' => __('Edit personajes'),
    'new_item' => __('New personajes'),
    'all_items' => __('All personajes'),
    'view_item' => __('View personajes'),
    'search_items' => __('Search personajes'),
    'not_found' =>  __('No personajes found'),
    'not_found_in_trash' => __('No personajes found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Personajes'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
  );
  register_post_type('personajes',$args);

/* PERSONAJES */

/* PRENSA */

  $labels = array(
    'name' => _x('prensas', 'post type general name'),
    'singular_name' => _x('prensas', 'post type singular name'),
    'add_new' => _x('Add New', 'prensas'),
    'add_new_item' => __('Add New prensas'),
    'edit_item' => __('Edit prensas'),
    'new_item' => __('New prensas'),
    'all_items' => __('All prensas'),
    'view_item' => __('View prensas'),
    'search_items' => __('Search prensas'),
    'not_found' =>  __('No prensas found'),
    'not_found_in_trash' => __('No prensas found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'prensas'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );
  register_post_type('prensas',$args);

/* PRENSA */

/* GENTE */
  $labels = array(
    'name' => _x('gente', 'post type general name'),
    'singular_name' => _x('gente', 'post type singular name'),
    'add_new' => _x('Add New', 'gente'),
    'add_new_item' => __('Add New gente'),
    'edit_item' => __('Edit gente'),
    'new_item' => __('New gente'),
    'all_items' => __('All gente'),
    'view_item' => __('View gente'),
    'search_items' => __('Search gente'),
    'not_found' =>  __('No gente found'),
    'not_found_in_trash' => __('No gente found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Gente'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );
  register_post_type('gente',$args);

}
add_action( 'init', 'codex_custom_init' );


//Se crean acciones para poder usar la función del scroll infinito
add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in

function wp_infinitepaginate(){
    $loopFile        = $_POST['loop_file'];   //Archivo del loop, loop-gente.php
    $paged           = $_POST['page_no'];   //Número de la página
    $posts_per_page  = get_option('posts_per_page');   //Número de personas/posts por página
    if ($loopFile == 'loop-blog'){
	    $query = 'cat=3&paged='.$paged;
    }
   else{
	   $query = array('paged' => $paged );
   }
    # Load the posts
    query_posts($query);  //Carga el query de los posts que siguen
    get_template_part( $loopFile );  //Jala los posts desde el archivo del loop
    exit;   //termina
}
/*custombox subtitulo*/
add_action( 'add_meta_boxes', 'custombox_subtitulo' );
add_action( 'save_post', 'guardar_custombox_subtitulo' );

/* Adds a box to the main column on the Post and Page edit screens */
function custombox_subtitulo() {
    $screens = array( 'personajes', 'page' );
    foreach ($screens as $screen) {
        add_meta_box(
            'myplugin_dd',
            __( 'Subtitulos', 'myplugin_ficha_hotel' ),
            'campos_custombox_subtitulo',
            $screen
        );
    }
}

/* Prints the box content */
function campos_custombox_subtitulo( $post ) {

  global $post;

    $subtitulo = get_post_meta( $post->ID, 'subtitulo', true );
    // output invlid url message and add the http:// to the input field

    $subtitulo = $subtitulo ? $subtitulo : '';
    wp_editor(  stripslashes($subtitulo), 'subtitulo', array('name'=>'subtitulo', 'media_buttons'=>false));

}

/* When the post is saved, saves our custom data */
function guardar_custombox_subtitulo( $post_id ) {
global $post;
    if( $_POST ) {
        update_post_meta( $post->ID, 'subtitulo', $_POST['subtitulo'] );
    }

}
//Sidebar para meter el widget de qTranslate
register_sidebar();