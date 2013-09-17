  <?php
//llamar imagenes
define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH. "/img");

add_theme_support ('post-thumbnails');

if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'img_vid_hom', 245, 135, true); //menu index
add_image_size( 'img_single', 558, 309, true); //menu index
add_image_size( 'img_serv', 190, 120, true); //menu index

}

/* main query requerido siempre */
add_action('pre_get_posts', function($query){

     if ( !is_admin() && $query->is_main_query() && $query->get( 'category_name' ) ){
         //$category = $query->get( 'category_name' );
        $query->set('posts_per_page', 11);
     }


});

/* Define the custom box */

add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );
add_action( 'save_post', 'myplugin_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function myplugin_add_custom_box() {
    $screens = array( 'post', 'page' );
    foreach ($screens as $screen) {
        add_meta_box(
            'myplugin_sectionid',
            __( 'videos', 'myplugin_textdomain' ),
            'myplugin_inner_custom_box',
            $screen
        );
    }
}

/* Prints the box content */
function myplugin_inner_custom_box( $post ) {

  global $post;
    $url_vid = get_post_meta( $post->ID, 'url_vid', true );
	$nom_orig = get_post_meta( $post->ID, 'nom_orig', true );
	$director = get_post_meta( $post->ID, 'director', true );
	$protagonistas = get_post_meta( $post->ID, 'protagonistas', true );
    $fecha_estreno = get_post_meta( $post->ID, 'fecha_estreno', true );


    // output invlid url message and add the http:// to the input field
    if( $errors ) { echo $errors; } ?>
    <p><label for="url_vid">Url Video:<br />
        <input id="url_vid" size="40" name="url_vid" value="<?php if( $url_vid ) { echo $url_vid; } ?>" /></label></p>
    <p><label for="nom_orig">Nombre Original:<br />
        <input id="nom_orig" size="40" name="nom_orig" value="<?php if( $nom_orig ) { echo $nom_orig; } ?>" /></label></p>
	<p><label for="director">Director:<br />
        <input id="director" size="40" name="director" value="<?php if( $director ) { echo $director; } ?>" /></label></p>
    <p><label for="protagonistas">Protagonistas:<br />
        <input id="protagonistas" size="40" name="protagonistas" value="<?php if( $protagonistas ) { echo $protagonistas; } ?>" /></label></p>
    <p><label for="fecha_estreno">Fecha de estreno:<br />
        <input id="fecha_estreno" size="40" name="fecha_estreno" value="<?php if( $fecha_estreno ) { echo $fecha_estreno; } ?>" /></label></p>
<?php

}

/* When the post is saved, saves our custom data */
function myplugin_save_postdata( $post_id ) {
global $post;
    if( $_POST ) {

        update_post_meta( $post->ID, 'url_vid', $_POST['url_vid'] );
		update_post_meta( $post->ID, 'nom_orig', $_POST['nom_orig'] );
		update_post_meta( $post->ID, 'director', $_POST['director'] );
		update_post_meta( $post->ID, 'protagonistas', $_POST['protagonistas'] );
		update_post_meta( $post->ID, 'fecha_estreno', $_POST['fecha_estreno'] );


    }

}
//creando post-type
 
  function create_post_type() {
    register_post_type( 'party',
      array(
        'labels' => array(
          'name' => __( 'Party' ),
          'singular_name' => __( 'party' )
        ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array('servicios'),
      'supports' => array('title', 'editor','excerpt','custom-fields','author','page-attributes','thumbnail')
      )
    );
    register_post_type( 'desing',
      array(
        'labels' => array(
          'name' => __( 'Desing' ),
          'singular_name' => __( 'desing' )
        ),
      'public' => true,
      'has_archive' => true,
      'taxonomies' => array('servicios'),
      'supports' => array('title', 'editor','excerpt','custom-fields','author','page-attributes','thumbnail')
      )
    );
 
  }
 add_action( 'init', 'create_post_type' );



/*paginacion*/
function get_pagination_links() {
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages,
        'prev_text'    => __('<'),
        'next_text'    => __('>'),

    ) );
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
 
