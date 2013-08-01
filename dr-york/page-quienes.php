<?php get_header(); ?>

	<div id="quienes">
	
		<div id="quienessomos">
		
		<div id="imagen_izquierda">
			<img src="<?php echo get_bloginfo('template_url'); ?>/images/quienes_int.jpg" alt="quienes" width="428" height="642"/>
		</div><!-- imagen_izquierda -->
		
		<div id="texto_derecha">
			<?php if(have_posts()): while(have_posts()): the_post();?> 
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div><!-- texto_derecha -->
		</div><!-- quienessomos -->
	</div><!-- quienes -->

<?php get_footer(); ?>