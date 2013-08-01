<?php get_header(); ?>
	<div id="gente">
<div class="featured">
		<?php 
			$args = array('post_type' => 'gente', 'showposts' => 1);
			$featured = get_posts($args);
			foreach($featured as $post): setup_postdata($post); $do_not_duplicate = $post->ID;?>
			
			<!-- <h2>Personaje del día</h2> -->
			
			<div id="persona_featured">
				<h4><?php the_title(); ?></h4>
				<?php the_post_thumbnail('gente'); ?>
			</div><!-- persona_featured -->
			<?php endforeach; ?>
			
			
	</div>
	
		<?php if(qtrans_getLanguage() == 'es'){ ?>
			<h3>GENTE</h3>
		<?php } elseif(qtrans_getLanguage() == 'en'){ ?>
			<h3>PEOPLE</h3>
		<?php } ?>
		<div id="grid">
			<?php get_template_part( 'loop', 'gente' ); ?>
			
		</div><!-- grid -->
		
		
	</div><!-- gente -->
	<a id="inifiniteLoader"><img src="<?php bloginfo('template_directory'); ?>/images/loader-gente3.gif" /></a>	
	  
	

<?php get_footer(); ?>