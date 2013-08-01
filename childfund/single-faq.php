<?php get_header(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#menu-item-153').addClass('current-menu-item');
	});
</script>

<div class="acerca">
	
	<img src="<?php bloginfo('template_url'); ?>/images/banner_interiores_acerca.jpg" />
	
	<ul class="acerca-menu">
		<?php 
			$faq_posts = get_posts( array( 'post_type' => 'faq', 'numberposts' => -1, 'orderby' => 'date', 'order' => 'asc' ) );
			foreach( $faq_posts as $post ): setup_postdata($post);
				$active = '';
				if(is_single($post->ID)) $active = ' active';
				echo '<li class="'.$post->post_name.''.$active.'">
				<a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
			endforeach;
		?>
	</ul><!-- end .acerca-menu -->
	
	<?php 
	if(have_posts()): while(have_posts()): the_post();
	?>
	
	<div class="contenido">
	<h2>Preguntas frecuentes (FAQ): <br /><br /><?php the_title(); ?></h2>
	<?php the_content(); ?>
	
	<?php endwhile; endif; ?>
	</div><!-- end .contenido -->
	
</div><!-- end .acerca -->

<?php get_footer(); ?>