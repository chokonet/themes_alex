<?php get_header(); ?>
		
		<div id="content">
			<?php the_post(); ?>
				<div class="single_full">
					<h3 class="ana_gris">Aviso de Privacidad</h3>

					<div class="single_cont" style="padding-top: 30px;">
						<?php the_content(); ?>
					</div><!-- single_cont -->

				</div><!-- single_izq -->		

			</div><!-- content -->

<?php get_footer(); ?>