<!-- category es para mostrar el contenido de las categori-->
<?php get_header(); $queried_object = get_queried_object(); ?>
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

		  <div id="izq_c_logo"><img src="<?php print IMAGES; ?>/<?php echo $queried_object->slug ?>_c.png" alt="<?php bloginfo('name'); ?>"></div>
		  <div id="izq_c_ncat"><?php single_cat_title(); ?></div>
 		  <!--<?php echo category_description(); ?> POR SI QUIEREN LA DESCRIPCION -->
 		  <div id="izq_c_atu">
 			  <div id="izq_c_atua">AUTOR</div>
 			  <div id="izq_c_atub">TEMA</div>
 			  <div id="izq_c_atuc">ÚLTIMO COMENTARIO</div>
 		  </div>

		  <!--lista de post-->
 		   <?php if (have_posts()) : ?>
   		  <?php while (have_posts()) : the_post(); ?>
   		  <div id="izq_c_lpost">
   		  <div id="izq_c_lpost_fot"><?php echo get_avatar( get_the_author_meta('email'), '50' ); ?><!-- colocar avatar --></div>
      		
      	<div id="izq_c_lpost_txt1">
      		<div id="izq_c_lpost_txt1a"><?php the_author() ?> </div>
      		<div id="izq_c_lpost_txt1b"><?php the_time('j F Y') ?> </div>
      		<div id="izq_c_lpost_txt1b"><?php the_time('g: ia') ?> </div>
   		  </div>	
   		  <div id="izq_c_lpost_tma">
   			  <div id="izq_c_lpost_tma_con">PS3</div>
   			  <div id="izq_c_lpost_tma_tit"><div id="post-<?php the_ID(); ?>">	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div></div>
 		      <div id="izq_c_lpost_tma_log"><img height="15px" width="15px" src="<?php print IMAGES; ?>/<?php echo $queried_object->slug ?>_c.png" alt="<?php bloginfo('name'); ?>"></div>
          <div id="izq_c_lpost_tma_msj"><img height="12.2px" width="17px" src="<?php print IMAGES; ?>/ms.png" alt="<?php bloginfo('name'); ?>"></div>
          <div id="izq_c_lpost_tma_msjn"><?php comments_popup_link(__( '0' ), __( '1' ), __( '%' )); ?> </div>
          <div id="izq_c_lpost_tma_vew"><img height="10px" width="20px" src="<?php print IMAGES; ?>/visitas.png" alt="<?php bloginfo('name'); ?>"></div>
          <div id="izq_c_lpost_tma_newn"><?php echo getPostViews(get_the_ID()); ?></div><!-- num visitas -->
          
           </div>	
           <div id="izq_c_u_coment"><?php echo ultimo_comentario(get_the_ID()); ?><!-- ultimo_comen --></div>
 		</div>
 		<!--fin lista de post-->
     
<?php endwhile; ?>
 
<?php else : ?>
  <h2 class="center">Not Found</h2>
<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); 

?></p>
 <?php endif; ?>

                            
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
