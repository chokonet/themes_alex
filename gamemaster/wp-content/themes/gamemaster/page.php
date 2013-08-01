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
    <div id="izq_line"></div>

    <!-- modulos categorias-->

    <!-- cat1-->
    <div id="izq_c_categoria"> 

					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #ciozq_cate -->
			</div><!-- #contenidos -->
		</div><!-- #columna_izq -->

<?php get_footer(); ?>