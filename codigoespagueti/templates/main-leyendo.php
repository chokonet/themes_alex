
	<h5>Estamos Leyendo</h5>

	<div id="content-estamos-leyendo">

		<?php $leyendo = get_posts(array(
			'post_type'      => 'leyendo',
			'posts_per_page' => 4
		));

		foreach ($leyendo as $post): setup_postdata($post); ?>

			<div class="colaborador">

				<?php $url = get_post_meta($post->ID, 'link_externo', true); ?>

				<a class="img_estamos" href="<?php echo $url ?>" target="_blank"><?php the_post_thumbnail('featured_post');?></a>

				<div class="estamos_info">
					<a href="<?php echo $url ?>" target="_blank"><h6><?php the_title(); ?></h6></a>
					<p><?php the_excerpt();?></p>
					<a href="<?php echo $url ?>" target="_blank"><h6><?php the_author(); ?></h6></a>
					<!-- <a href="<?php echo $url ?>">Link</a> -->
				</div><!-- estamos_info -->



			</div><!-- end .colaborador -->

		<?php endforeach; wp_reset_query(); ?>

	</div><!-- end #estamos-leyendo -->