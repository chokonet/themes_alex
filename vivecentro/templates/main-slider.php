			<div id="slider">
				<a class="prev" href=""></a>
				<div class="slides">
					<?php
						$args = array(
								'post_type' => 'lugares',
								'posts_per_page' => 5,
								'orderby' => 'rand'
							);

						$slides = get_posts($args);
						foreach ($slides as $post): setup_postdata( $post );
					?>
					<div class="slide">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
						<div class="info-slide">
							<h3><?php the_title(); ?></h3>
						<!-- 	<h4>Frase</h4> -->
						</div><!-- end .info-slide -->
					</div><!-- end .slide -->
					<?php endforeach; wp_reset_query(); ?>
					<a class="next" href=""></a>
				</div><!-- end .slides -->
				<div class="slider-nav">
				</div><!-- end .slider-nav -->
			</div><!--end #slider -->