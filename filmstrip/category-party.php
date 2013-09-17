<?php get_header();?>
	<ul class="servicios">
		<li><a href="<?php echo site_url('servicios'); ?>">Servicios</a></li>
		<li><a href="<?php echo site_url('category/party'); ?>">Filmstrip Party Club</a></li>
		<li><a href="<?php echo site_url('category/desing'); ?>">Filmstrip Desing Club</a></li>
	</ul>
	<div id="servicios">
		<div class="qsomos">
			<h2>Filmstrip Party Club</h2>
			<div class="container_serv">

			</div>
		</div>
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