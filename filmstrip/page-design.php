<?php get_header();?>
	<ul class="servicios">
		<li><a href="<?php echo site_url('servicios'); ?>">Nosotros</a></li>
		<li><a href="<?php echo site_url('party'); ?>">Filmstrip Party Club</a></li>
		<li><a href="<?php echo site_url('design'); ?>">Filmstrip Design Club</a></li>
	</ul>
	<div id="servicios">
		<div class="qsomos">
			<h2>Filmstrip Design Club</h2>
			<div class="container_serv">
				<?php query_posts('post_type=desing&posts_per_page=-1&order=ASC' );
			  		while ( have_posts() ) : the_post();?>
						<div class="caja">
							<?php the_post_thumbnail( 'img_serv' ); ?>
							<h3><?php the_title(); ?></h3>
						</div>
				 <?php endwhile; ?>
				
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