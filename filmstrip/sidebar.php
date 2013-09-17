
   <!--columna derecha-->
    <div id="columna_der">
<?php $queried_object = get_queried_object();   
      $s= get_post_meta($queried_object->ID, 'latlng', true); 
      $info = get_post_meta( $queried_object->ID, 'info', true );
      $vuelo = get_post_meta( $queried_object->ID, 'vuelo', true ); 
      $servicio = get_post_meta( $queried_object->ID, 'servicio', true ); 
      $trans = get_post_meta( $queried_object->ID, 'trans', true ); 
      /*ficha hotel*/
      $tip = get_post_meta( $queried_object->ID, 'tip', true ); 
      $viaje = get_post_meta( $queried_object->ID, 'viaje', true ); 
      $direccion = get_post_meta( $queried_object->ID, 'direccion', true );
      $facebook = get_post_meta( $queried_object->ID, 'facebook', true );
      $instagram = get_post_meta( $queried_object->ID, 'instagram', true );
      $sugerencia = get_post_meta( $queried_object->ID, 'sugerencia', true );
?>
     <?php
     $paises = get_the_terms( $queried_object->ID, 'paises' ); 

      foreach( $paises as $pais ) :
        $cont_pais = $pais->name;
      endforeach; ?><!--sacar el pais del post-->
      <?php $ciudades = get_the_terms( $queried_object->ID, 'ciudades' ); 

      foreach( $ciudades as $ciudad ) :
        $cont_ciudad = $ciudad->slug;
      $cont_ciudadn = $ciudad->name;
      endforeach; ?><!--sacar la ciudad del post-->


      <?php if (is_single()):?>
       
       <div id="col_der_bloq1">
        <div id="col_der_bloq1_tit">
          <span id="col_der_bloq1_tit_cuadro"></span>

          <h2> <?php echo $cont_pais; ?></h2>
        </div>
        <h4><?php echo $queried_object->post_title; ?></h4>
        <h3><?php echo $servicio; ?></h3>
        
        
      <?php if($s != ""):?>
            <a id="map-canvas" href="https://maps.google.com/maps?q=<?php echo $s; ?>" title="Ver en Google Maps" target="_blank">
              <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $s; ?>&zoom=12&size=300x250&sensor=false&markers=color:blue%7Clabel:S%7C<?php echo $s; ?>" alt="Ubicación en Google Maps">
            </a>
          
        
      <?php endif;?>
      </div> 
      <?php endif;?>
      <div id="col_der_banner"><img src="<?php print IMAGES; ?>/banner1.jpg"></div>
     <?php if (is_single()):?>
     <?php if(($info != "")or ($vuelo != "")or ($trans != "")):?>
        <!--bloq 2-->
        <div id="col_der_bloq2">
           
          <h3>PARA TOMAR EN CUENTA</h3>
          <span></span>
          <div id="col_der_bloq2_info">
            <div id="col_der_bloq2_info_ico"><img src="<?php print IMAGES; ?>/ico7_bloc2.png"></div>
            <h2>CÓMO LLEGAR</h2>
          </div>
          <?php if($info != ""):?>
          <div id="col_der_bloq2_info">
            <div id="col_der_bloq2_info_ico"><img src="<?php print IMAGES; ?>/ico1_bloc2.png"></div>
            <h1><?php echo $info ?></h1>
          </div>
          <?php endif;?>
          <?php if($vuelo != ""):?>
          <div id="col_der_bloq2_info">
            <div id="col_der_bloq2_info_ico"><img src="<?php print IMAGES; ?>/ico2_bloc2.png"></div>
            <h1><?php echo $vuelo ?></h1>
          </div>
          <?php endif;?>
          <?php if($trans != ""):?>
          <div id="col_der_bloq2_info">
            <div id="col_der_bloq2_info_ico"><img src="<?php print IMAGES; ?>/ico3_bloc2.png"></div>
            <h1><?php echo $trans; ?></h1>
          </div>
          <?php endif;?>
          
          <div id="col_der_bloq2_info">
            <div id="col_der_bloq2_info_ico"><img src="<?php print IMAGES; ?>/ico4_bloc2.png"></div>
            <h2>DÓNDE HOSPEDARSE</h2>
          </div>
          <?php $dosp = array('posts_per_page' => 2,'orderby'=>'rand', 'post_type' => 'hoteles','tax_query' => array(array('taxonomy' => 'ciudades','field' => 'slug','terms' => $cont_ciudad)));
            query_posts($dosp); 
             if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <div id="col_der_bloq2_info">
            <a href="<?php the_permalink(); ?>?en=<?php echo $cont_ciudad; ?>&tax=ciudades&nom=<?php echo $cont_ciudadn; ?>"><p><?php the_title(); ?></p></a>
            <a rel="nofollow" href="<?php the_permalink(); ?>?en=<?php echo $cont_ciudad; ?>&tax=ciudades&nom=<?php echo $cont_ciudadn; ?>"><span id="ver">ver datos </span><a>
            <a rel="nofollow" href="<?php the_permalink(); ?>?en=<?php echo $cont_ciudad; ?>&tax=ciudades&nom=<?php echo $cont_ciudadn; ?>"><img src="<?php print IMAGES; ?>/tri_vmas.png" id="col_der_bloq2_info_triangulo"></a>
        </div>
      <?php endwhile; ?>
        <?php endif;?>
        <div id="col_der_bloq2_info">
            <div id="col_der_bloq2_info_ico"><img src="<?php print IMAGES; ?>/ico5_bloc2.png"></div>
            <h2>DÓNDE COMER</h2>
          </div>
          <?php $dospa = array('posts_per_page' => 2,'orderby'=>'rand', 'post_type' => 'restaurantes','tax_query' => array(array('taxonomy' => 'ciudades','field' => 'slug','terms' => $cont_ciudad)));
            query_posts($dospa); 
             if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <div id="col_der_bloq2_info">
            <a href="<?php the_permalink(); ?>?en=<?php echo $cont_ciudad; ?>&tax=ciudades&nom=<?php echo $cont_ciudadn; ?>"><p><?php the_title(); ?></p></a>
            <a rel="nofollow" href="<?php the_permalink(); ?>?en=<?php echo $cont_ciudad; ?>&tax=ciudades&nom=<?php echo $cont_ciudadn; ?>"><span id="ver">ver datos </span><a>
            <a rel="nofollow" href="<?php the_permalink(); ?>?en=<?php echo $cont_ciudad; ?>&tax=ciudades&nom=<?php echo $cont_ciudadn; ?>"><img src="<?php print IMAGES; ?>/tri_vmas.png" id="col_der_bloq2_info_triangulo"></a>
          <?php endwhile; ?>
        <?php endif;?>  
        </div>
        <!--<div id="col_der_bloq2_info">
            <div id="col_der_bloq2_info_ico"><img src="<?php print IMAGES; ?>/ico6_bloc2.png"></div>
            <h2>DESTINO CULTURAL</h2>
          </div>
          <div id="col_der_bloq2_info">
            <p>Dunas de Dounghan</p>
            <span id="ver">ver datos </span>
            <img src="<?php print IMAGES; ?>/tri_vmas.png" id="col_der_bloq2_info_triangulo">
        </div>
        </div>--><!--end bloq 2-->
      <?php endif;?> <!--cond bloque2-->
       <?php endif;?><!--cond single-->

       <?php if (is_single()):?>
       <?php if(($tip != "")or($viaje != "")or($direccion != "")or($facebook != "")or($instagram != "")or($sugerencia != "")):?>
        <!--ficha hoteles-->
      <div id="col_der_bloq2">
        <h3>DATOS GENERALES</h3>
        <span></span>
        <?php if(($tip != "")or ($viaje != "")):?>
              <div id="col_der_bloq2_info" style="backgraund: transparent;">
                <img src="<?php print IMAGES; ?>/ico7_bloc2.png" id="col_der_bloq2_info_ico">
                <h2>CÓMO LLEGAR</h2>
              </div>
              <?php if($tip != ""):?>
              <div id="col_der_bloq2_info">
                <div id="col_der_hotel_info_tar"><img src="<?php print IMAGES; ?>/ico_fichahotel.png" ></div>
                <h1 style="margin: 0px 0px 0px 18px;"><?php echo $tip ?></h1>
              </div>
              <?php endif;?>
              <?php if($viaje != ""):?>
              <div id="col_der_bloq2_info">
                <img src="<?php print IMAGES; ?>/ico2_bloc2.png" id="col_der_bloq2_info_ico">
                <h1><?php echo $viaje ?></h1>
              </div>
              <?php endif;?>
        <?php endif;?>
        <?php if($direccion != ""):?>
              <div id="col_der_bloq2_info">
                <div id="col_der_hotel_info_ospe"><img src="<?php print IMAGES; ?>/ico_fichahotel.png"></div>
                <h2 style="width: 180px;">DIRECCIÓN</h2>
              </div>
              <div id="col_der_bloq2_info">
                <p><?php echo $queried_object->post_title; ?></p>
                <h4><?php echo $direccion?></h4>
              </div>
        <?php endif;?>
        <?php if($facebook != ""):?>
              <div id="col_der_bloq2_info">
                <div id="col_der_hotel_info_face"><img src="<?php print IMAGES; ?>/ico_fichahotel.png"></div>
                <h5><?php echo $facebook; ?></h5>
              </div>
         <?php endif;?>
         <?php if($instagram != ""):?>
              <div id="col_der_bloq2_info">
                    <div id="col_der_hotel_info_insta"><img src="<?php print IMAGES; ?>/ico_fichahotel.png"></div>
                    <h5><?php echo $instagram; ?></h5>
              </div>
        <?php endif;?>
        <?php if($sugerencia != ""):?>
              <div id="col_der_bloq2_info">
                <div id="col_der_hotel_info_nad"><img src="<?php print IMAGES; ?>/ico_fichahotel.png"></div>
                <h5><?php echo $sugerencia; ?></h5>
              </div>
      <?php endif;?>
      </div><!--end bloq 6-->
    <?php endif;?><!--cond campos ficha hoteles -->
    <?php endif;?><!--cond single ficha hoteles -->
      <div id="col_der_banner"><img src="<?php print IMAGES; ?>/banner2.jpg"></div>

      <!--bloq3-->
      <div id="col_der_bloq3">
        <h3>DESTINOS MÁS VISTOS</h3>
        <span></span>
        <?
        
query_posts(array('posts_per_page' => 3,'post_type' => array('post', 'hoteles', 'restaurantes'), 'meta_key' => 'post_views_count', 'order' => 'DESC'));
if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
  <?php $continentes = get_the_terms( $post->ID, 'continentes' ); 
              foreach( $continentes as $continente ) :
                $cont_term = $continente->name;
              endforeach;?>
  <div id="col_der_bloq3_info">
            <?php             
                        $args = array('numberposts' => 1, 'post_type' => 'attachment', 'post_mime_type' => 'image','order' => 'ASC','orderby' => 'menu_order', 'post_parent' => $post->ID);
                        $images = get_posts( $args );
                        foreach($images as $image):
                        $attachment_url = get_attachment_link( $image->ID );?>
                        <a rel="nofollow" href="<?php the_permalink(); ?>?en=<?php echo $queried_object->slug;?>&tax=<?php echo $queried_object->taxonomy;?>&nom=<?php single_cat_title(); ?>" id="col_der_bloq3_info_img"><?php echo wp_get_attachment_image($image->ID, 'visitados-thumb');?></a>
             <?php endforeach;               ?>
          <div id="col_der_bloq3_info_c">
            <h2><?php echo $cont_term; ?></h2>
            <a href="<?php the_permalink(); ?>?en=<?php echo $cont_ciudad; ?>&tax=ciudades&nom=<?php echo $cont_ciudadn; ?>" ><h1><?php echo the_title() ?></h1></a>
             <?php the_excerpt(); ?>
            <img src="<?php print IMAGES; ?>/mas.png" id="col_der_bloq3_info_mas">
          </div>
        </div>     
<?php endwhile;?>

<?php endif; ?>
        
        
      </div><!--bloq3-->

      <!--bloq4-->
      <div id="col_der_bloq4">
        <h3>NOTICIAS</h3>
        <span></span>
        <?php
      // The Query

      query_posts('cat=-9,-8,-7,-6&posts_per_page=4&orderby=rand' );
  
      // The Loop
      while ( have_posts() ) : the_post();
      //para sacar pais
      $p = get_the_terms( $post->ID, 'paises' );
      foreach( $p as $pa ) :
        $cont_pa = $pa->name;
        $cont_slug = $pa->slug;
      endforeach;
      ?>
        <div id="col_der_bloq4_info">
          <a href="<?php the_permalink(); ?>?en=<?php echo $cont_slug; ?>&tax=paises&nom=<?php echo $cont_pa; ?>" id="col_der_bloq4_info_txt1"><?php the_title(); ?>
          <a rel="nofollow" href="<?php the_permalink(); ?>?en=<?php echo $cont_slug; ?>&tax=paises&nom=<?php echo $cont_pa; ?>" ><?php the_excerpt(); ?></a>
          <a rel="nofollow" href="<?php the_permalink(); ?>?en=<?php echo $cont_slug; ?>&tax=paises&nom=<?php echo $cont_pa; ?>" id="col_der_bloq3_info_mas"><img src="<?php print IMAGES; ?>/mas.png"></a>
           <div id="line_single_h"></div>
        </div>

       

        <?php endwhile;

      // Reset Query
      wp_reset_query();
      ?>
      </div><!--end bloq4-->
      <div id="col_der_banner_mapa"><img src="<?php print IMAGES; ?>/banneripad.jpg"></div>
<!--end columna derecha-->
</div><!--end contenidos-->
<div id="publicidad">
  <p>Publicidad</p>
  <div id="publicidad_banner"><img src="<?php print IMAGES; ?>/publicidad.jpg"></div>
</div>