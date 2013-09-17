<?php get_header();?>
     <div id="cont_izq">
    <!--trailers-->
    <div id="trailers">
        <div id="titulo_principal"><h3>Nanometrajes</h3></div>
    	<?php
			  $c=0;
			  while ( have_posts() ) : the_post();
			  $c++;
			  if($c == 1):
			  $url_vid= get_post_meta($post->ID, 'url_vid', true);//video
		

		?>

            <iframe width="585" height="309" src="http://www.youtube.com/embed/<?php echo $url_vid; ?>" id="frame" class="margin_left" frameborder="0" allowfullscreen></iframe>
        	<h1 class="titulo_archive"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
           
        <?php else: ?>
    	   <div id="vid"><div id="img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'img_vid_hom' ); ?></a></div>
           <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
       	<?php endif;?>
        <?php endwhile; ?>
	</div>
    <!--fin trailers-->

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
<?php get_footer();?>