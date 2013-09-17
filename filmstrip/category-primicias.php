<?php get_header();?>
     <div id="cont_izq">
    <!--trailers-->
    <div id="trailers">
        <div id="titulo_principal"><h3>Primicias</h3></div>
    	<?php
			  $c=0;
			  while ( have_posts() ) : the_post();
			  $c++;
			  if($c == 1):

		?>

            <div class="imagen_archive margin_left"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'img_single' ); ?></a></div>
        	<h1 claSS="titulo_archive"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            
        <?php else: ?>
    	   <div id="vid"><div id="img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'img_vid_hom' ); ?></a></div>
           <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
       	<?php endif;?>
        <?php endwhile; ?>
	</div>
    <!--fin trailers-->

    </div>
    <div id="cont_der">


        <img src="<?php print IMAGES; ?>/banner_filmstrip_party.gif" id="banner">
	</div>
<?php get_footer();?>s