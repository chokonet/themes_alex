<?php get_header(); ?>

	<script type="text/javascript">
	AudioPlayer.setup("<?php bloginfo('template_url'); ?>/js/player.swf", {  
	    width: 290  
	});
	</script>

	<div id="escucha_cont">
		<img src="<?php bloginfo('template_url'); ?>/images/banner_interiores_escucha.jpg" alt="Escucha radios comunitarias" />
		<h2>Escucha las producciones de nuestras radios comunitarias</h2>
		
		<?php 
		query_posts('post_type=escucha&posts_per_page=-1');
		if(have_posts()): while(have_posts()): the_post(); ?>
		<div class="audio">
			<h3><?php the_title(); ?></h3>
			
			<p id="audioplayer_<?php echo $post->ID; ?>">Alternative content</p>  
			        <script type="text/javascript">  
			        AudioPlayer.embed("audioplayer_<?php echo $post->ID; ?>", 
						{
						soundFile: "<?php echo get_post_meta( $post->ID, 'MP3', true ); ?>", 
						bg: "E5E5E5", 
						leftbg: "feba61", 
						rightbg: "fd9001", 
						lefticon:"FFFFFF", 
						righticon:"FFFFFF",
						volslider:"FD9001",
						loader:"FD9001",
						rightbghover:"005e9e",
						});  
			        </script>
		</div><!-- end .audio -->
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
	</div><!-- end #escucha_cont -->
	
<?php get_footer(); ?>