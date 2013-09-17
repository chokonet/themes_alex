<?php get_header();?>
<div id="titulo">
    	<span></span>
       <p> Primicias </p>
       <span></span>
    </div>
     <div id="cont_izq">
    <!--trailers-->
    <div id="trailers">
    	<?php query_posts('category_name=trailers&posts_per_page=3' );
			  $c=0;
			  while ( have_posts() ) : the_post();
			  $c++;
			  if($c == 1):
			  $url_vid= get_post_meta($post->ID, 'url_vid', true);//video
			  $nom_orig = get_post_meta( $post->ID, 'nom_orig', true );
	          $director = get_post_meta( $post->ID, 'director', true );
	          $protagonistas = get_post_meta( $post->ID, 'protagonistas', true );
              $fecha_estreno = get_post_meta( $post->ID, 'fecha_estreno', true );

		?>
        <iframe width="558" height="309" src="http://www.youtube.com/embed/<?php echo $url_vid; ?>" id="frame" frameborder="0" allowfullscreen></iframe>
    	<h1 class="titulo_archive titulo_archive_home"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div id="txt1"><h2>Nombre Original:</h2><h3><?php echo $nom_orig; ?></h3></div>
 		<div id="txt2"><h2>Protagonistas:</h2><h3><?php echo $protagonistas; ?></h3></div>
		<div id="txt1"><h2>Director:</h2><h3> <?php echo $director; ?></h3></div>
 		<div id="txt2"><h2>Fecha de Estreno:</h2><h3> <?php echo $fecha_estreno; ?></h3></div>
        <?php else: ?>
    	<div id="vid"><div id="img"><?php the_post_thumbnail( 'img_vid_hom' ); ?></div><p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
       	<?php endif;?>
        <?php endwhile; ?>
        <span></span>
	</div>
    <!--fin trailers-->
    <!--estrenos-->
    <div id="estrenos">
	   <p> Estrenos </p> <span2></span2> <span3></span3>
       <span></span>
       <div id="cine">
           <p2> Cine </p2>
           <?php query_posts('category_name=cine&posts_per_page=4' );
			  while ( have_posts() ) : the_post();

			?>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <?php endwhile; ?>
        </div>
        <div id="cine">
             <p2> DVD / Blu-Ray </p2>
           <?php query_posts('category_name=dvd-bluray&posts_per_page=4' );
			  while ( have_posts() ) : the_post();

			?>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <?php endwhile; ?>
        </div>
    </div>
	<!--fin estrenos-->
    </div>
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

    <div id="cont_inf">
		  <img src="<?php print IMAGES; ?>/banner_2.gif" id="banner">
     <div id="nanometrajes">
    		<span2></span2> <p> Nanometrajes </p>  <span3></span3>
            <?php query_posts('category_name=nanometrajes&posts_per_page=1' );
			  while ( have_posts() ) : the_post();
				 $url_vid= get_post_meta($post->ID, 'url_vid', true);//video
			?>

            <iframe width="590" height="330" src="http://www.youtube.com/embed/<?php echo $url_vid; ?>" frameborder="0" allowfullscreen></iframe> 			 <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

            <?php endwhile; ?>
		</div>
    </div>


<?php get_footer();?>