<div class="navegador recorridos" >

	<?php get_template_part('templates/content', 'navegador'); ?>

	<div id="slider-recorridos" class="clearfix" >
		<div class="slide-recorridos">
			<?php
				$args = array(
						'post_type' => 'recorridos',
					);
				$recorridos = new WP_Query( $args );
				$contador = 0;
					if($recorridos->have_posts()): while($recorridos->have_posts()): $recorridos->the_post();
						$contador ++;
			?>
			<div class="recorrido-slide recorrido-<?php echo $contador; ?>">
				<a href="<?php the_permalink(); ?>"><img class="imagen-cortada" src="<?php bloginfo('template_url'); ?>/images/zablu.png"></a>
				<div class="info-recorrido">
					<h3><?php the_title(); ?></h3>
					<h4><?php echo get_post_meta($post->ID, 'autor', true); ?></h4>
				</div><!-- end .info-recorrido -->
			</div><!-- end .recorrido-slide -->
			<?php endwhile; endif; wp_reset_query(); ?>
		</div><!-- end .slide-recorridos -->

	</div><!-- end #slider-recorridos -->
</div><!-- end .navegador recorridos-->