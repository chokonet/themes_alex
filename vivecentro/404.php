<?php get_header(); ?>
	<div class="fourofour">
		<h2>Lo sentimos, la página que estás buscando no existe, te invitamos a visitar algunos de los lugares del Centro Histórico.</h2>
	</div>
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
						<div <?php post_class('lugar-home'); ?>>
							<a class="link-foto" href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/aguilita.png"></a>
							<span class="titulo"><?php echo $term->name; ?></span>
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>
						</div><!-- end .lugar-home -->
						<?php } endforeach; wp_reset_query(); ?>

					</div><!-- end #lugares-home -->
<?php get_footer(); ?>