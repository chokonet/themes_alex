<?php get_header() ?>

	<?php $user = get_queried_object() ?>

		<div class="columna_izq ">

			<div id="logo1" class="margen_conductores"></div>
			<div class="image_principal margen_img_conduct">
			<?php echo get_user_meta($user->ID, 'user_image', true) ?>
			</div>
			<div class="nombre_conductor">

				<h3><?php echo get_user_meta($user->ID, 'first_name', true) ?></h3>
				<p><?php echo get_user_meta($user->ID, 'description', true) ?></p>
			</div>


			<div class="videos_home margen_vid_conduct">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				 <div id="cont_vid">
					<div class="img_vid margen_cont_vid"><?php the_post_thumbnail('thumbnail'); ?></div>
					<h4 class="tit_conduct"><?php the_title() ?></h4>
					<p><?php the_excerpt() ?></p>
				</div>
			<?php endwhile; endif; ?>
			</div>

		</div><!--columna izq-->


	<?php get_sidebar(); ?>
	</div><!-- main -->

<?php get_footer(); ?>