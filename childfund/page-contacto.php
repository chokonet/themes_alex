<?php get_header(); ?>

<div class="contacto">
	
	<img src="<?php bloginfo('template_url'); ?>/images/banner_interiores_acerca.jpg" />
	
	<?php 
	if(have_posts()): while(have_posts()): the_post();
	?>
	
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	
	<?php endwhile; endif; ?>

	
</div><!-- end .acerca -->

<?php get_footer(); ?>