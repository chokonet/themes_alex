<?php get_header(); the_post(); ?>

	<!-- popup leyeron -->
	<div id="popup_leyeron">
		<p class="cabeza_pop">Ellas también leyeron este artículo</p>
		<div class="user_leyeron">

			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->
			<div class="usuarios_cont">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/images/cuadro_users.png"></a>
				<p>Sara Albania N Rivas</p>
			</div><!-- usuarios -->


		</div>
	</div>
	<div id="popup_leyeron_fondo"></div>
	<!-- fin popup leyeron -->

	<div class="felicidades">
		<div class="cierre_pop"></div>
	</div>
	<?php $categorias = get_the_category($post->ID);

		foreach ($categorias as $categoria) {
			$cat = $categoria->slug;
		}
	 ?>
	<div class="pleca_categoria <?php echo 'cat_'.$cat; ?>">
		<?php get_frace_categoria($cat); ?>
	</div>

	<div class="leyeron">
		<p>Ellas también leyeron este artículo:</p>
		<div class="usuarios">
			<a href=""><img src="<?php bloginfo('template_url'); ?>/images/mas_leyeron.png" class="user vermas_leyeron"></a>
		</div><!-- usuarios -->
	</div><!-- leyeron -->


	<div class="titulo_single" data-post_id="<?php the_ID() ?>">
		<h2><?php the_title(); ?></h2>
		<p>Subido el <?php the_date('d \d\e F'); ?>	</p>
	</div>


	<div class="barra_social">

		<div class="share_buttons">

			<!-- twitter -->
			<div class="twitter">
				<a	href="https://twitter.com/share"
					class="twitter-share-button"
					data-url="http://twitter.com/home?status=<?php the_permalink() ?>"
					data-text="<?php the_title() ?>"
					data-size="large"
					data-via="academiaBBgold"
					data-hashtags="AcademiaBebeGOLD"
					data-count="none">Tweet</a>
			</div>

			<!-- facebook -->
			<div class="facebook">
				<a href="#"
					data-permalink="<?php the_permalink() ?>"
					data-title="<?php the_title() ?>"
					data-description="<?php echo strip_tags( wp_trim_words( get_the_content(), 26 ) ) ?>"
					data-image="<?php attachment_image_url($post->ID, 'thumbnail') ?>">
					compartir</a>
			</div>

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
						<?php the_post_thumbnail( 'imagen_single_relacion' ); ?>
					</a>
					<span class="tag <?php get_category_back($category); ?>">
						<?php echo isset($category[0]) ? $category[0]->cat_name : ''; ?>
					</span>
				</div><!-- seccion_imagen -->

				<div class="info_seccion">
					<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
					<h3 class="<?php get_category_text($category) ?>">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</h3>
					<p><?php echo wp_trim_words( get_the_excerpt(), 10 ) ?>...</p>
				</div><!-- info_seccion -->

			</div><!-- seccion_mitad -->

		<?php endwhile; endif; wp_reset_query(); ?>

	</div><!-- side -->

<?php get_footer(); ?>