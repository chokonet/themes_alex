<?php get_header();?>
    <!--col_izquierda-->

    <div id="cont_izq">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         
    <!--trailers-->
    <div id="trailers">
   		<?php $url_vid= get_post_meta($post->ID, 'url_vid', true);//video
              $nom_orig = get_post_meta( $post->ID, 'nom_orig', true );
              $director = get_post_meta( $post->ID, 'director', true );
              $protagonistas = get_post_meta( $post->ID, 'protagonistas', true );
              $fecha_estreno = get_post_meta( $post->ID, 'fecha_estreno', true );?>
        
        <?php if ($url_vid != ''): ?>
	
            <iframe width="558" height="309" src="http://www.youtube.com/embed/<?php echo $url_vid; ?>" id="frame" frameborder="0" allowfullscreen></iframe>
            <h1 class="titulo_archive titulo_archive_home"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="info_extra">
                <div id="txt1"><h2>Nombre Original:</h2><h3><?php echo $nom_orig; ?></h3></div>
                <div id="txt2"><h2>Protagonistas:</h2><h3><?php echo $protagonistas; ?></h3></div>
                <div id="txt1"><h2>Director:</h2><h3> <?php echo $director; ?></h3></div>
                <div id="txt2"><h2>Fecha de Estreno:</h2><h3> <?php echo $fecha_estreno; ?></h3></div>
            </div>
        <?php else: ?>
        	  <div class="imagen_archive margin_left"><?php the_post_thumbnail( 'img_single' ); ?></div>
        	<h1 class="titulo_archive " style="margin-bottom: 10px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php endif; ?>
        <div class="info_single"><?php the_content(); ?></div>
	</div> 
    <!--fin trailers-->
         
        <?php endwhile; else: ?>
        <p><?php _e('no ahi contenidos'); ?></p>

        <?php endif; ?>
    </div><!--end col izquierda-->
    <div id="cont_der">
    <!--noticias-->
    <div id="noticias">
<?php query_posts('category_name=primicias&posts_per_page=5' );
			  while ( have_posts() ) : the_post();
		
		?>
            <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
            <a href="<?php the_permalink(); ?>">
                <?php
                            $excerpt = get_the_content();
                            $excerpt = string_limit_words($excerpt,15);

                ?>
                <p><?php echo $excerpt; ?>…</p>
            </a>	
        <?php endwhile; ?>
    </div>
    	
    <!--fin noticias-->
    
        <img src="<?php print IMAGES; ?>/banner_filmstrip_party.gif" id="banner">
	</div>
<?php get_footer();?>

