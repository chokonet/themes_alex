<?php get_header(); ?>

			<div class="columna_izq ">
				<div id="logo1"></div>
				<a id="pm_fer" >Fer</a>
				<a id="pm_david" >david</a>
				<a id="pm_la" >lakshmi</a>
				<a id="pm_juan" >lakshmi</a>
				<div class="image_principal"><img src="<?php bloginfo('template_url'); ?>/images/img_principal.png"></div>
				<div class="slide_home" >
					<div id="slider_home">
						<ul id="carousel_ul" >
							<?php $args = array(
								'post_type'      => 'post',
								'posts_per_page' => -1,
								'meta_key'       => 'check_destacados',
								'meta_query'     => array(
							        array(
							            'key'     => 'check_destacados',
							            'value'   => '1',
							            'compare' => '='
							        )
							    )
							);
							$query = new WP_Query($args);
							while ( $query->have_posts() ) : $query->the_post();?>
							<li>
								<div class="pleca"><?php the_title(); ?></div>
								<div class="cont_slide">
									<div class="img_slide"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide'); ?></a></div>
									<div class="texto_slide">
										<a href="<?php the_permalink(); ?>">
											<?php
					  							$excerpt = get_the_content();
												$excerpt = string_limit_words($excerpt,50);
											?>
											<p> <?php echo $excerpt; ?>...</p>
										</a>
									</div>
								</div>
							</li>
							<?php endwhile; ?>

						</ul>
					</div>
				</div>
				<div class="videos_home">
					<?php while ( have_posts() ) : the_post(); ?>
					<div id="cont_vid">
						<a href="<?php echo home_url('category/capsulas/') ?>" class="img_vid"><?php the_post_thumbnail('videos'); ?></a>
						<h4><a href="<?php echo home_url('category/capsulas/') ?>"><?php the_title(); ?></a></h4>
						<a href="<?php echo home_url('category/capsulas/') ?>">
							<?php
	  							$excerpt = get_the_content();
								$excerpt = string_limit_words($excerpt,7);
							?>
							<p> <?php echo $excerpt; ?>...</p>
						</a>
					</div>
					<?php endwhile; ?>
				</div>
			</div><!--columna izq-->

			<?php get_sidebar(); ?>

		</div><!-- main -->

<?php get_footer(); ?>