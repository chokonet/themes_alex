<?php get_header();?>
	<ul class="servicios">
		<li><a href="<?php echo site_url('servicios'); ?>">Nosotros</a></li>
		<li><a href="<?php echo site_url('party'); ?>">Filmstrip Party Club</a></li>
		<li><a href="<?php echo site_url('design'); ?>">Filmstrip Design Club</a></li>
	</ul>
	<div id="servicios">
		<div class="qsomos">
			<h2>Quiénes Somos</h2>
			<p>
				Somos una empresa dedicada al mundo de la cinematografía, donde encontraras información actualizada, trailes, curiosidades, cortos y todo lo relacionado con el séptimo arte.<br/><br/>

				Filmstrip Club se ramifica para ofrecer el servicio de organización de eventos, brindando la mayor calidad en entretenimiento, ofreciendo innovación, atención personalizada, amable, respetuosa y sobretodo preocupada por lograr la satisfacción de nuestros clientes.<br/><br/>

				Esta división se denomina Filmstrip Party Club, en donde desarrollamos cada detalle para que sea impactante, único y original.<br/><br/>

				Para ofrecer un servicio integral se crea Filmstrip Design Club por medio del cual se elaborarán todo tipo de creaciones graficas, obras audiovisuales, diseño web, y todo lo relacionado con la creatividad y el mundo empresarial.<br/><br/>
			</p>
		</div>
		<div class="qsomos">
			<h2>Misión</h2>
			<p>Brindar un servicio especializado de calidad en entretenimiento y diversión, ofreciendo atención personalizada, respetuosa y sobre todo preocupada por lograr la satisfacción total de nuestros clientes.</p>
		</div>
		<div class="qsomos">
			<h2>Visión</h2>
			<p>Ser una empresa reconocida a nivel estatal por la calidad de sus servicios, consciente de la creciente demanda de productos para el entretenimiento y diversión.</p>
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