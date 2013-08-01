<?php get_header(); ?>

	<div class="noticias">
		<h2><a href="<?php echo site_url('noticias'); ?>">Noticias</a></h2>
		<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts('paged=' . $paged);
		while(have_posts()): the_post();
		?>
			<div class="nota">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('noticias-thumb'); ?></a>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="fecha"><?php echo get_the_date(); ?></p>
				<?php the_excerpt(); ?>
				<p class="leer-mas"><a href="<?php the_permalink(); ?>">Leer más <span class="flechita">></span></a></p>
				<div class="clear"></div><!-- end .clear -->
			</div><!-- end .nota -->
		
		<?php endwhile;	?>
		<p class="paginado"><?php posts_nav_link(); ?></p>
		<?php wp_reset_query(); ?>
		
		
	</div><!-- end .noticias -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>