<?php get_header(); ?>

				<?php //require_once('inc/templates/slider.php'); ?>

				<?php get_template_part( 'templates/main', 'slider' ) ?>


					<?php get_template_part('templates/recorridos', 'navegador'); ?>

					<div class="loop-lugares" class="clearfix">
						<?php
							$args = array(
								'post_type' => 'lugares',
								'posts_per_page' => '6',
								'orderby' => 'rand'
								);
							$lugares = get_posts($args);
							foreach ( $lugares as $post ) : setup_postdata( $post );
							$terms = wp_get_post_terms($post->ID, 'categorias');
								foreach($terms as $term){
						?>
						<div <?php post_class('lugar-home no_click'); ?>>
							<a class="link-foto" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('cuadrado_grande'); ?></a>
								<span class="titulo"><?php echo $term->name; ?></span>
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>
						</div><!-- end .lugar-home -->
						<?php } endforeach; wp_reset_query(); ?>

					</div><!-- end #lugares-home -->




<?php get_footer(); ?>