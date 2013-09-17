<?php get_header();?>
<h1 class="estrenos_tit">Estrenos</h1>
    <div id="estrenos_cat">
        <h3>Cine</h3>
         <?php query_posts('category_name=cine&posts_per_page=8' );
              while ( have_posts() ) : the_post();
        
            ?>    
        <div class="estrenos_content">
            <div class="image">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'img_vid_hom' ); ?></a>
            </div>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php
                            $excerpt = get_the_content();
                            $excerpt = string_limit_words($excerpt,35);

                ?>
                <p><?php echo $excerpt; ?>…</p>
        </div>
        <?php endwhile; ?>
    </div>

    <div id="estrenos_cat">
        <h3>DVD / Blu-ray</h3>
         <?php query_posts('category_name=dvd-bluray&posts_per_page=8' );
              while ( have_posts() ) : the_post();
        
            ?>    
        <div class="estrenos_content">
            <div class="image">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'img_vid_hom' ); ?></a>
            </div>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php
                            $excerpt = get_the_content();
                            $excerpt = string_limit_words($excerpt,35);

                ?>
                <p><?php echo $excerpt; ?>…</p>
        </div>
        <?php endwhile; ?>
    </div>
<?php get_footer();?>