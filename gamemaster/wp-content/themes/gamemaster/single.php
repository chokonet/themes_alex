<!-- single es para mostrar post independientes-->
<?php get_header();  ?>
<div id="contenidos">
  
    <!--columna izquierda-->
  

    <div id="columna_izq">
      
        <div id="izq_barra">
            <div id="izq_barra_txt1">FORO DE MASTERS</div>
            <div id="izq_barra_txt2">¡Hemos llegado a nuestro 3er. aniversario! Bienvenido a nuestro Foro, participa y haznos saber los temas que más te interesan, ¡este espacio es tuyo!.</div>
            <div id="izq_barra_megusta"><a href="#"><img src="<?php print IMAGES; ?>/megusta_face.png" alt="<?php bloginfo('name'); ?>"></a></div>
            <div id="izq_barra_tweet"><a href="#"><img src="<?php print IMAGES; ?>/tweet.png" alt="<?php bloginfo('name'); ?>"></a></div>
            <div id="izq_barra_gmas"><a href="#"><img src="<?php print IMAGES; ?>/gmas.png" alt="<?php bloginfo('name'); ?>"></a></div>
        </div>
        <div id="izq_subtit">CATEGORÍAS</div>
        <!--buscador2-->
    <div id="izq_buscador">
       <?php get_search_form(); ?>
    </div><!--end buscador2-->

    <div id="izq_creartema"><img src="<?php print IMAGES; ?>/c_tema.png" alt="<?php bloginfo('name'); ?>"></div>
    <div id="izq_line"></div>

    <!-- modulos categorias-->

    <!-- cat1-->
    

    <div id="izq_c_categoria"> 
      <!-- mostrar slug de la categoria -->
        <?php $terms = get_the_terms( $post->ID , 'category');
        if($terms) {
            foreach( $terms as $term ) {
             $cat_obj = get_term($term->term_id, 'category');
              $cat_slug = $cat_obj->slug;
          }
        }?>
       
       <div id="izq_c_logo">
<img src="<?php print IMAGES; ?>/<?php echo $cat_slug; ?>_c.png"></div>
      <div id="izq_c_ncat"><?php the_category (',')?></div>
        <div id="breadcrumb_a"><?php the_breadcrumb(); ?></div>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     
       <div id="izq_post">

        <div id="izq_posta">
            <div id="izq_post_fot"><?php echo get_avatar( get_the_author_meta('email'), '75' ); ?><!-- colocar avatar --></div>
            <div id="izq_post_autor"><?php the_author_posts_link(); ?></div>
            <div id="izq_post_nivelt">Nivel:</div>
            <div id="izq_post_nivele"><img src="<?php print IMAGES; ?>/es.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_post_bandera"><img src="<?php print IMAGES; ?>/bandera.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_post_gma">Gamer:</div>
            <div id="izq_post_gmb">360</div>
            <div id="izq_post_gmc">PS3</div>
            <div id="izq_post_gmd">WII</div>
            <div id="izq_post_bot"><img src="<?php print IMAGES; ?>/botar.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_post_botex">???</div>
            <div id="izq_post_view"><img src="<?php print IMAGES; ?>/visitas.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_post_viewtx"><?php echo getPostViews(get_the_ID()); ?></div>
        </div><!--fin izq_posta-->

        <div id="izq_postbcd"> 
            <div id="izq_postb"> 
            <div id="izq_postb_log"><img height="15px" width="15px" src="<?php print IMAGES; ?>/<?php echo $cat_slug; ?>_c.png"></div>
            <div id="izq_postb_gmb">360</div>
            <div id="izq_postb_gmc">PS3</div>
            <div id="izq_postb_gmd">WII</div>
            <div id="izq_postb_tit"><?php the_title();?></div> <!-- titulo post -->
            <div id="izq_postb_fecha"><?php the_time('j F Y'); ?> - <?php the_time('g:i a') ?></div>
        </div><!-- fin izq_postb -->

        <div id="izq_postc">
            <div id="izq_postc_tx"><?php the_content('Cargando....'); ?></div>
            <div id="izq_postc_skin"><img src="<?php print IMAGES; ?>/skin.jpg" alt="<?php bloginfo('name'); ?>"></div>
        </div><!-- fin izq_postc -->

        <div id="izq_postd">
           <div id="izq_postd_tag"><?php the_tags( '<div id="tags">Tags:&nbsp; </div><div id="tags">', '</div><div id="tags">,&nbsp;</div><div id="tags">', '</div>' ); ?></div> 
            <div id="izq_postd_res"><img src="<?php print IMAGES; ?>/responder.png" alt="<?php bloginfo('name'); ?>"></div>
        </div><!-- fin izq_postd -->


        <?php setPostViews(get_the_ID()); ?><!--cuenta visitas post-->
        <?php endwhile; else: ?>
        <p><?php _e('no ahi contenidos'); ?></p>
        <?php endif; ?>

        </div><!--fin izq_post-->
          
      </div><!--fin izq_post abc-->

      <div id="comen">
      <?php comments_template();?>
      </div>

    </div>
    
    <!-- end modulos categorias-->

    <div id="izq_line"></div>
         <!--ban1-->
        <div id="izq_banners">
            <div id="izq_banners_img"><img src="<?php print IMAGES; ?>/b1.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_banners_txt">FÁBRICA </br> DE AVATARES</div>
            <div id="izq_banners_txt2">CREA Y COMPARTE TUS IDEAS EN EL FORO GAME MASTER</div>
        </div>
        <!--ban2-->
        <div id="izq_banners">
            <div id="izq_banners_img"><img src="<?php print IMAGES; ?>/b2.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_banners_txt">FAN-ART </br> & FANFICS</div>
            <div id="izq_banners_txt2">PARTICIPA Y MUESTRANOS QUE TAN FAN ERES</div>
        </div>
        <!--ban3-->
        <div id="izq_banners">
            <div id="izq_banners_img"><img src="<?php print IMAGES; ?>/b3.png" alt="<?php bloginfo('name'); ?>"></div>
            <div id="izq_banners_txt">VOTA POR  </br> EL JUEGO DE LA SEMANA</div>
           
        </div>

    </div>

    <!--columna derecha en silderbar-->

    <?php get_sidebar(); ?>
<?php get_footer(); ?> 
