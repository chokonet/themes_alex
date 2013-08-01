<?php
/**
 * @package WordPress
 * @subpackage game_master
 * @since game master 1.0
 */
?>
<?php get_header();?>
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
        <!--popup crear tema-->
        <div id="crear_tema">
            <div id="ct_izq">
                <div id="ct_tem">CREAR NUEVO TEMA</div>
                <div id="ct_tit">TÍTULO:</div>
            </div>
        </div>
    <div id="izq_line"></div>

    <!-- modulos categorias-->

    <!-- cat1-->
    

    <div id="izq_c_categoria"> 
    
             
          <?php $categorias = get_categories('orderby=id'); ?> 

          <?php foreach ($categorias as $categoria) { ?>

                <a href="category/<?php echo $categoria->slug; ?>"><div id="izq_c_bt">
                    <div id="izq_c_img"><img src="<?php print IMAGES; ?>/<?php echo $categoria->slug; ?>.png"></div>
                <div id="izq_c_bt_txt"><?php echo $categoria->name; ?></div>
                </div></a> 
              <div id="izq_c_txt"><?php echo $categoria->description; ?></div>
       
          <?php } ?>
          
   
        <!--<div id="izq_c_bt">
            <div id="izq_c_bt_txt"> </div>
        </div>
        <div id="izq_c_txt"></div>-->
                            
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
