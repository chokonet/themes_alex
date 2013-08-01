<?php
//llamar imagenes 
define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH. "/images");
add_theme_support ('post-thumbnails');

//funcion para el menu
add_theme_support('nav-menus');
if(function_exists ('register_nav')){
	register_nav_menus(array('main'=>'Main Nav'));
}

//funcion para avilitar widget
if ( function_exists('register_sidebar')){
register_sidebar(array(
	'name' =>__('Primary Sidebar','primary-sidebar'),
	'id' => 'primary-widget-area',
	'description' => __('The primary widget area','dir'),
	'before_widget' => '<div id="izq_c_bt">',
	'after_widget' => '</div>',
	'bifore_title' => '<div id="izq_c_txt">',
	'after_title' => '</div>'
	));

}

//para hacer conteo de numero de visitas a un post
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//ULTIMO COMENTARIO DE POST
function ultimo_comentario($id_post) {
    global $wpdb;
  
    $ult_coment = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $id_post ORDER BY comment_ID DESC LIMIT 0 , 1  " );
    
    foreach ($ult_coment as $u_coment) {
        //post_author --> si requiero autor
        $com = $u_coment->comment_date;
        return $com;
       
    }

}
//top publicaciones
function postspopulares($num) {
    global $wpdb;
  
    $posts = $wpdb->get_results("SELECT comment_count, ID, post_title, post_date, post_author FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $num");
    
    foreach ($posts as $post) {
        //post_author --> si requiero autor
        $id = $post->ID;
        $title = $post->post_title;
        $count = $post->comment_count;
        $author_ID = $post->post_author;

        
  
        if ($count != 0) { 
            $popular = '<div id="der_c_des_c2">

                <div id="der_c_des_c1_a1"><a href="' . get_permalink($id) . '">' . $title . '</a></div>
                <div id="der_c_des_c1_b1"> ' . autor_entrada($author_ID) . '</div>
                <div id="der_c_des_c1_c1">' . mysql2date('j M Y', $post->post_date). '</div>
                </div> ';
         //checar por q .= manda error
            print_r( $popular);
        }
    }


}

//funcion para sacar el nombre
function autor_entrada($author_ID) {
    global $wpdb;
  
    $autor_entrada = $wpdb->get_results("SELECT * FROM $wpdb->users WHERE ID = $author_ID");
    
    foreach ($autor_entrada as $autor_in) {
        //post_author --> si requiero autor
        $n_autor = $autor_in->user_nicename;
        return $n_autor;
       
    }

}

// Insertar Breadcrumb   
function the_breadcrumb() {
    if (!is_home()) {
        echo '<div id="breadcrumb"><span class="removed_link" title="&#039;;
        echo get_option(&#039;home&#039;);
            echo &#039;">';
        bloginfo('name');
        echo "</span></div>";
        echo '<div id="breadcrumb">';
                echo " &nbsp;/&nbsp; ";
                echo '</div>';
        if (is_category() || is_single()) {
             echo '<div id="breadcrumb">';
            the_category('title_li=');
            echo "</div>";
            if (is_single()) {
                echo '<div id="breadcrumb">';
                echo "&nbsp;/&nbsp; ";
                echo '</div>';
                 echo '<div id="breadcrumb">';
                the_title();
                 echo '</div>';
            }
        } elseif (is_page()) {
            echo the_title();
        }
    }
}   

?>
<?php 
//funcion imagen de categoria
function imag_categoria()
    {
        //extraemos el nombre de la categoría y la cargamos a una variable
        $category = get_the_category();
        $nombrecat = $category[0]->category_nicename;
                 //imprimimos la etiqueta de la imagen
        echo '<img  src="<?php print IMAGES; ?>/'.$nombretcat.'_c.png.png" alt="'.$nombretcat.'" />';
    }

function gamemaster_comment( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
  
            break;
        default :
    ?>
          
        <div id="comment-<?php comment_ID(); ?>" >
                  <div id="izq_coment">  
             <div id="izq_posta">
              <div id="izq_post_fot"> 
               <?php
                        $avatar_size = 75;
                        if ( '0' != $comment->comment_parent )
                            $avatar_size = 39; 

                        echo get_avatar( $comment, $avatar_size ); ?>
             </div>
             <div id="izq_post_autor">
                     <?php   /* translators: comment author*/
                        printf(__('%1$s','gamemaster' ),
                            sprintf( '%s', get_comment_author_link() ) 
                            
                        );
                            ?>
                    </div>
            <div id="izq_post_nivelt">Nivel:</div>
            <div id="izq_post_nivele"><img src="<?php print IMAGES; ?>/es.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_post_bandera"><img src="<?php print IMAGES; ?>/bandera.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_post_gma">Gamer:</div>
            <div id="izq_post_gmb">360</div>
            <div id="izq_post_gmc">PS3</div>
            <div id="izq_post_gmd">WII</div>
            <div id="izq_post_bot"><img src="<?php print IMAGES; ?>/botar.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_post_botex">???</div>

            </div><!--izq_posta-->    
       

                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'gamemaster' ); ?></em>
                    <br />
                <?php endif; ?>

            <div id="izq_postbcd"> 
            <div id="izq_postb"> 
                    <!-- mostrar slug de la categoria -->
        <?php $terms = get_the_terms( '' , 'category');
        if($terms) {
            foreach( $terms as $term ) {
             $cat_obj = get_term($term->term_id, 'category');
              $cat_slug = $cat_obj->slug;
          }
        }?>
            <div id="izq_postb_log"><img height="15px" width="15px" src="<?php print IMAGES; ?>/<?php echo $cat_slug; ?>_c.png"></div>
            <div id="izq_postb_gmb">360</div>
            <div id="izq_postb_gmc">PS3</div>
            <div id="izq_postb_gmd">WII</div>
            <div id="izq_postb_tit">Re: <?php the_title();?></div> <!-- titulo post -->
            <div id="izq_postb_fecha">

                <?php   /* translators: comment author*/
                        printf(__('%2$s','gamemaster' ),
                            sprintf( '%s', get_comment_author_link() ),
                            sprintf( '<time datetime="%2$s">%3$s</time>',
                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                get_comment_time( 'c' ),
                                /* translators: 1: date, 2: time */
                                sprintf( __( '%1$s - %2$s', 'gamemaster' ), get_comment_date('j F Y'), get_comment_time('g:i a') )
                            )
                        );
                            ?>
            </div>
            </div>

            <div id="izq_postc">
            <div id="izq_postc_tx"><?php comment_text(); ?></div>
            <div id="izq_postc_skin"><img src="<?php print IMAGES; ?>/skin.jpg" alt="<?php bloginfo('name'); ?>"></div>
            </div><!-- fin izq_postc -->
            
            <div id="izq_postd">
           <div id="izq_postd_tag"></div> 
            <div id="izq_postd_res"><img src="<?php print IMAGES; ?>/responder.png" alt="<?php bloginfo('name'); ?>"></div>
        </div><!-- fin izq_postd -->
        </div><!--fin izq_post abc-->
    </div><!--izq_coment-->
         
        </div><!-- #comment-## -->


    <?php
            break;
    endswitch;
}
?>