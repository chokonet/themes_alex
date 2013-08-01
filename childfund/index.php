<?php get_header(); ?>
	
	<?php /*
	<div class="slider">
		Slider
	</div><!-- end .slider -->
	*/ ?>
	
	<div class="botones_home">
		
		<a href="<?php echo site_url('informe/informe-anual-2011'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/CTA_informe_anual.jpg" alt="Conoce nuestras organizaciones comunitarias" /></a>
		<a href="<?php echo site_url('organizaciones_comunitarias'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/CTA_conoce.jpg" alt="Conoce nuestras organizaciones comunitarias" /></a>
		<a href="<?php echo site_url('adquiere'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/CTA_adquiere.jpg" alt="Adquiere" /></a>
		<a href="<?php echo site_url('escucha'); ?>"><img class="last" src="<?php bloginfo('template_url'); ?>/images/CTA_radios.jpg" alt="Conoce nuestras organizaciones comunitarias" /></a>
		
	</div>
	
	<div class="noticias">
		<h2><a href="<?php echo site_url('noticias'); ?>">Noticias</a></h2>
		<p class="leer-mas"><a href="<?php echo site_url('noticias'); ?>"><span class="flechita">Ver más ></span></a></p>
		
		<?php 
		$args = array( 'numberposts' => 4 );
		$noticias = get_posts($args);
		foreach( $noticias as $post ): setup_postdata($post);
		?>
			<div class="nota">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('noticias-thumb'); ?></a>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="fecha"><?php echo get_the_date(); ?></p>
				<?php the_excerpt(); ?>
				<p class="leer-mas"><a href="<?php the_permalink(); ?>">Leer más <span class="flechita">></span></a></p>
				<div class="clear"></div><!-- end .clear -->
			</div><!-- end .nota -->
		<?php endforeach; ?>
		
	</div><!-- end .noticias -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>