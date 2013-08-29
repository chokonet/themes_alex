<?php get_header(); ?>

		<!--columna izquierda-->
		<div class="columna_izq" class="gal_videos">

			<div id="logo" class="logo_float"></div>

			<h2 class="titulo">CÁPSULAS</h2>


			<div class="videos">
				<?php $args = array(
					'posts_per_page' => 1,
					'category_name' => 'capsulas'
					);
					$query = new WP_Query($args);
					while ( $query->have_posts() ) : $query->the_post();?>
					<?php $video_object = get_post_meta($post->ID, 'video_object', true);
							echo $video_object;
					?>
				<?php endwhile; ?>
			</div>


			<!--videos-->
			<div class="videos_home margen_vid_capsulas">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div id="cont_vid" class="cont_vid_capsula">
						<a class="img_vid margen_cont_vid video_gal" href="#" data-post_id="<?php echo $post->ID ?>"><?php the_post_thumbnail('videos'); ?></a>
						<h4 class="tit_conduct"><a href="#" class="video_gal" data-post_id="<?php echo $post->ID ?>"><?php the_title(); ?></a></h4>
						<a href="#" class="video_gal" data-post_id="<?php echo $post->ID ?>">
							<?php
	  							$excerpt = get_the_content();
								$excerpt = string_limit_words($excerpt,7);
							?>
							<p> <?php echo $excerpt; ?>...</p>
						</a>
					</div>
				<?php endwhile; endif; ?>

			</div><!--fin videos-->

		</div><!--fin columna izquierda-->

		<?php get_sidebar(); ?>

	</div><!-- main -->

<?php get_footer(); ?>