<?php get_header(); $id = 15; ?>

		<div class="main" id="acerca_de">
			<h3><?php _e('ACERCA DE', 'fashion'); ?></h3>

			<img class="img_acerca" src="<?php attachment_image_url($id, acerca_de ); ?>">

			<?php
				$post    = get_page($id);
				$content = apply_filters('the_content', $post->post_content);
				$content = str_replace(']]>', ']]>', $content);
				echo $content;
			?>

		</div><!-- acerca de -->

		<div class="main" id="clientes">
			<h3><?php _e('CLIENTES', 'fashion'); ?></h3>
			<?php $marca = new WP_Query(array('category_name'=>'clientes', 'posts_per_page'=>-1, 'order'=>'ASC'));
		    if ( $marca->have_posts() ) : while ( $marca->have_posts() ) : $marca->the_post(); ?>

				 <a class="marcas" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'marcas-img' ); ?></a>

			<?php endwhile; endif; wp_reset_query(); ?>
			<!-- <a class="marcas borde_img" href=""><img src="<?php bloginfo('template_url'); ?>/images/suburbia.png"></a> -->
		</div><!-- clientes -->

<?php get_footer(); ?>
