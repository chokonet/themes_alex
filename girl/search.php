<?php get_header(); ?>

	<div class="main_fq border_fq">

		<div id="plecasup">
			<span><?php _e('Keyword Search Results', 'bemygirl'); ?></span>
		</div>

		<div class="columna_izq magazine">

			<div class="galeria">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


				<?php endwhile; endif; ?>

				<div class="view-footer noiPhone">
					<?php _e('Photos', 'bemygirl'); ?> © BemyGirl.ch
				</div>

			</div><!--galeria-->

		</div>

	</div><!-- end #main -->

<?php get_footer(); ?>