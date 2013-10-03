<?php get_header(); ?>
		<div class="main tema_verde" id="marcas">
			<h3 class="texto_verde"><?php _e('MARCAS', 'fashion'); ?></h3>
			<?php $marca = new WP_Query(array('category_name'=>'marcas', 'posts_per_page'=>-1, 'order'=>'ASC'));
		    if ( $marca->have_posts() ) : while ( $marca->have_posts() ) : $marca->the_post(); ?>

				<a class="marcas tema_verde" href="<?php the_permalink() ?>" target="_blank"><?php the_post_thumbnail( 'marcas-img' ); ?></a>

			<?php endwhile; endif; wp_reset_query(); ?>
		</div><!-- marcas -->

		<div class="main tema_verde" id="marcas_propias">
			<h3 class="texto_verde" ><?php _e('MARCAS PROPIAS', 'fashion'); ?></h3>
			<ul class="nav_marcas">
				<li class="abre_contenidoA active"><?php _e('GUSTATIVA', 'fashion'); ?></li>
				<li class="abre_contenidoB"><?php _e('PRONTO MODA', 'fashion'); ?></li>
				<li class="abre_contenidoC"><?php _e('UNIFORMES Y PROMOCIONALES', 'fashion'); ?></li>
			</ul>

			<?php $marca = new WP_Query(array('category_name'=>'marcas-propias', 'posts_per_page'=>-1, 'order'=>'ASC'));
		    if ( $marca->have_posts() ) : while ( $marca->have_posts() ) : $marca->the_post(); ?>

				<div id="contenedor_marcas" class="contenido_<?php the_ID(); ?>">
					<?php the_content(); ?>
				</div>

			<?php endwhile; endif; wp_reset_query(); ?>
		</div><!-- marcas propias -->
<?php get_footer(); ?>