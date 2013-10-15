<?php get_header(); ?>
	<div class="main_fq border_fq">
		<div class="iphoneLine soloiPhone"></div>
		<div id="plecasup">
			<span>FAQ</span>
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<div class="columna_izq">

				<?php the_content(); ?>

			</div>
			<div class="columna_der noiPhone">
				<div class="girl tamano">
					<a href="#"><?php the_post_thumbnail( 'large'); ?> </a>
				</div><!-- end .girl -->
			</div>
		<?php endwhile; endif; ?>

	</div><!-- end #main -->
<?php get_footer(); ?>