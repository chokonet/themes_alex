<?php get_header(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('li#menu-item-76').addClass('current-menu-item');
	});
</script>

<div class="noticias">
	<h2><a href="<?php echo site_url('noticias'); ?>">Noticias</a></h2>	
	<?php 
	if(have_posts()): while(have_posts()): the_post();
	?>
		<div class="nota">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('noticias-thumb'); ?></a>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="fecha"><?php echo get_the_date(); ?></p>
			<?php the_content(); ?>
			<p class="leer-mas regresar"><a onclick="goBack()"><span class="flechita"><</span> Regresar</a></p>
			<div class="clear"></div><!-- end .clear -->
		</div><!-- end .nota -->
		
		<p class="paginado">Más noticias: <br />
		<?php previous_post_link( '%link', '« anterior', TRUE ); ?> - <?php next_post_link( '%link', 'siguiente »', TRUE ); ?></p>
	<?php endwhile; endif; ?>
	
	
	
</div><!-- end .noticias -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>