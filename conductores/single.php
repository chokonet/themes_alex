<?php get_header(); ?>

	<?php the_post(); ?>

		<div class="columna_izq">
			<div id="logo1" class="margen_conductores"></div>
			<div class="pleca_single">
				<?php $regresar_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url(); ?>
				<a href="<?php echo $regresar_url ?>"><h4>REGRESAR</h4></a>
				<h3><?php the_title(); ?></h3>
				<div id="compartir_single"><a href="">LIKE</a>  .  <a href="">SHARE</a></div>
			</div>
			<div class="cont_single">
				<?php the_post_thumbnail('foto_single	') ?>
				<div class="content">
					<div class="excerpt_single"><?php the_excerpt() ?></div>
					<?php the_content() ?>
				</div>
			</div>
		</div><!--columna izq-->

		<?php get_sidebar(); ?>

	</div><!-- main -->

<?php get_footer(); ?>