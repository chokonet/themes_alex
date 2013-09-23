<?php get_header(); ?>
	
	<div class="ninos_ind">
		
		<h2>Apadrina a un niño</h2>
		
		<?php if(have_posts()): while(have_posts()): the_post(); $do_not_duplicate = $post->ID; ?>
		<div class="fichaContainer">
			<div class="ficha">
				
					<?php the_post_thumbnail('ninos-interior'); ?>
					<h3 class="hola">¡Hola! mi nombre es:</h3>
					<h3><?php the_title(); ?></h3>
					
					<?php the_content(); ?>
					
					<div class="boton grande"><a href="<?php echo site_url('intencion-de-apadrinar'); ?>/?nino=<?php echo $post->ID; ?>">Apadrínalo ></a></div>

			</div><!-- end .ficha -->
			
			<div class="datos">
				
				<h3 class="hola">Más sobre mí:</h3>
					<?php the_meta(); ?>
			
			</div><!-- end .datos -->
		</div><!-- fichaContainer -->
		
		<?php endwhile; endif; ?>
		
	</div><!-- end .ninos_ind -->
	
	<div class="ninos_cont">
		<h2>Otros niños</h2>
		<?php 
		$args = array( 'post_type' => 'ninos', 'estatus_ninos' => 'no-apadrinado', 'numberposts' => 11, 'orderby' => 'rand' );
		$otros_ninos = get_posts( $args );
		$i = 1;
		foreach( $otros_ninos as $post): setup_postdata($post); 
		if($post->ID == $do_not_duplicate || $i > 10) continue;
		?>
			
			<div class="nino">
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('ninos-thumb'); ?>
				<p><?php the_title(); ?></p>
				</a>
			</div><!-- end .nino -->
		
		<?php $i++; endforeach; ?>
		
		<div class="clear"></div>
		
		<p class="paginado"><a href="<?php echo site_url('ninos'); ?>">Ver a todos los niños</a></p>
		
	</div><!-- end .ninos_cont -->
	
	
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>