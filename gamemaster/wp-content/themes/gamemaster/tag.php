<?php
/**
 * @package WordPress
 * @subpackage game_master
 * @since game master 1.0
 */
?>
<?php get_header(); ?>
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

				<?php if ( have_posts() ) : ?>

				<?php
						printf( __( 'Tag: %s', 'gamemaster' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?>

					
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

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
 		      <?php $terms = get_the_terms( '' , 'category');
        if($terms) {
            foreach( $terms as $term ) {
             $cat_obj = get_term($term->term_id, 'category');
              $cat_slug = $cat_obj->slug;
          }
        }?>
          <div id="izq_c_lpost_tma_log"><img height="15px" width="15px" src="<?php print IMAGES; ?>/<?php echo $cat_slug; ?>_c.png"></div>
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

				
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'gamemaster' ); ?></h1>
			
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'gamemaster' ); ?></p>
					
			

			<?php endif; ?>

			</div><!-- #izq_cate -->
			</div><!-- #contenidos -->
			<?php get_sidebar(); ?>
	
        
<?php get_footer(); ?>