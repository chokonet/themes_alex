<?php get_header(); the_post(); ?>

	<div class="leyeron">
		<p>Ellas también leyeron este artículo:</p>
		<div class="usuarios">
			<img class="user" src="<?php echo THEMEPATH ?>images/bebe_wide.jpg" />
			<img class="user" src="<?php echo THEMEPATH ?>images/bebe_wide.jpg" />
			<img class="user" src="<?php echo THEMEPATH ?>images/bebe_wide.jpg" />
		</div><!-- usuarios -->
	</div><!-- leyeron -->


	<div class="titulo_single">
		<h2><?php the_title(); ?></h2>
		<p>Subido el <?php the_date('d \d\e F'); ?>	</p>
	</div>


	<div class="barra_social">

		<div class="share_buttons">

			<!-- twitter -->
			<div class="twitter">
				<a href="https://twitter.com/share"
					class="twitter-share-button"
					data-url="<?php the_permalink() ?>"
					data-text="<?php the_title() ?>"
					data-size="large"
					data-via="AcademiaGOLD"
					data-hashtags="AcademiaGOLD"
					data-count="none">Tweet</a>
			</div>

			<!-- facebook -->
			<div class="facebook"><a href="#" onclick="shareOnFacebook();">compartir</a></div>

		</div><!-- share_buttons -->

		<div class="agregar_fav" data-post_id="<?php the_ID() ?>"><p>Agregar a  favoritos</p></div>

	</div><!-- barra_social -->


	<div class="hero"><?php the_post_thumbnail( 'imagen_single' ); ?></div>

	<div class="texto"><?php the_content() ?></div>

	<?php $exlude[] = get_the_ID(); ?>



	<div class="side">

		<h4>También te puede interesar:</h4>

		<?php $query = new WP_Query(array(
			'posts_per_page' => 2,
			'post__not_in'   => $exlude,
			'orderby'        => 'rand'
		));

		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

			$category = get_the_category(); ?>

			<div class="seccion_mitad">

				<div class="seccion_imagen <?php get_category_style($category); ?>">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'seccion_imagen_chica' ); ?>
					</a>
					<span class="tag <?php get_category_back($category); ?>">
						<?php echo is_admin($category[0]) ? $category[0]->cat_name : ''; ?>
					</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="<?php get_category_text($category) ?>">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</h3>
					<p><?php the_excerpt() ?></p>
				</div><!-- info_seccion -->

			</div><!-- seccion_mitad -->

		<?php endwhile; endif; wp_reset_query(); ?>

	</div><!-- side -->



<?php get_footer(); ?>