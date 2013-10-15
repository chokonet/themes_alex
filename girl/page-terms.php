<?php get_header('terminos'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post();

		the_post_thumbnail( 'imagen_term'); ?>

		<div class="terminos">
			<?php the_content(); ?>
		</div>

		<div class="buttons">
			<a href="<?php bloginfo('url'); ?>" class="access-yes"></a>
			<a href="http://www.google.com" class="access-no"></a>
		</div>

	<?php endwhile; endif; ?>

<?php get_footer('terminos'); ?>