<?php get_header(); $ver=0; $ver2=0; $ver3=0; $ver4=0; ?>
			<div class="seccion_full">
				<?php $args = array('category_name' => 'prepi');
					query_posts( $args );
					while ( have_posts() ) : the_post(); $meta = get_post_meta($post->ID, 'check_prod', true );
				?>
					<?php if( !checked( $meta, 1, false ) ) :?>
						<?$ver++; if( $ver == 1) : ?>
							<div class="seccion_imagen embarazo_pleca">

								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen' ); ?></a>
								<span class="tag embarazo_back"><?php $category = get_the_category();	echo $category[0]->cat_name;?></span>
							</div><!-- seccion_imagen -->

							<div class="info_seccion">
								<p class="date">Hace <?php echo parsepostDate(get_the_date());  ?></p>
								<h3 class="embarazo_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
							</div>
					    <?php endif;?>
				<?php endif; ?>
				<?php endwhile;?>
			</div>

			<div class="seccion_mitad">
				<?php $args = array( 'category_name' => '0-6-meses');

					query_posts( $args );
					while ( have_posts() ) : the_post(); $meta2 = get_post_meta($post->ID, 'check_prod', true );

				?>
					<?php if( !checked( $meta2, 1, false ) ) :?>
						<?$ver2++; if( $ver2 == 1) : ?>
							<div class="seccion_imagen primeros_pleca">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
								<span class="tag primeros_back"><?php $category = get_the_category();	echo $category[0]->cat_name;?></span>
							</div><!-- seccion_imagen -->

							<div class="info_seccion">
								<p class="date">Hace <?php echo parsepostDate(get_the_time());  ?></p>
								<h3 class="primeros_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
							</div>
				        <?php endif;?>
				    <?php endif; ?>
			    <?php endwhile;?>
			</div>

			<div class="seccion_mitad seccion">
				<img src="<?php bloginfo('template_url'); ?>/images/seccion.jpg" alt="seccion">
			</div><!-- seccion_mitad -->

			<div class="seccion_mitad seccion">
				<img src="<?php bloginfo('template_url'); ?>/images/seccion.jpg" alt="seccion">
			</div><!-- seccion_mitad -->

			<div class="seccion_mitad">
				<?php
					$args = array(
						'category_name'  => '6-12-meses',
						'posts_per_page' => '1',
						'meta_key'       => 'check_prod',
						'meta_query'     => array(
					        array(
					            'key'     => 'check_prod',
					            'value'   => '1',
					            'compare' => '='
					        )
					    )
					);

					query_posts( $args );
					 while ( have_posts() ) : the_post(); ?>

						<div class="seccion_imagen sorpresas_pleca">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
							<span class="tag sorpresas_back"><?php $category = get_the_category();	echo $category[0]->cat_name;?></span>
						</div><!-- seccion_imagen -->

						<div class="info_seccion">
							<p class="date">Hace <?php echo parsepostDate(get_the_time());  ?></p>
							<h3 class="sorpresas_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
						</div>


			    <?php endwhile; ?>
			</div>

			<div class="seccion_mitad">
				<?php $args = array(
					               'posts_per_page' => 1,
								   'category_name' => '1-3-anos'
							);

					query_posts( $args );
					while ( have_posts() ) : the_post(); $meta4 = get_post_meta($post->ID, 'check_prod', true );

				?>
					<?php if( !checked( $meta4, 1, false ) ) :?>
						<?$ver4++; if( $ver4 == 1) : ?>
							<div class="seccion_imagen descubriendo_pleca">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
								<span class="tag descubriendo_back"><?php $category = get_the_category();	echo $category[0]->cat_name;?></span>
							</div><!-- seccion_imagen -->

							<div class="info_seccion">
								<p class="date">Hace <?php echo parsepostDate(get_the_time());  ?></p>
								<h3 class="descubriendo_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
							</div>
						<?php endif;?>
				    <?php endif; ?>
				<?php endwhile; ?>
			</div>

		</div><!-- main -->

<?php get_footer(); ?>