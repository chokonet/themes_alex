<?php get_header(); ?>
<div id="contenido">
<?php while ( have_posts() ) : the_post();  ?>
	<div class="bordeBlanco">
		<div class="tema2" id="extraPadInt">
			<div class="bordeBlanco centrado sinBordeAbajo">
				<div class="tituloPuesto"><?php the_title(); ?>
				</div>
			</div>
			
		<div class="contenidoTemaSobre colCol">
		<?php the_content(); ?>
		</div>
		<div class="clear"></div>
	</div>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>