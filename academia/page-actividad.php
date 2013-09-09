<?php get_header(); ?>

	<div class="titulo_seccion">
		<h2 class="actividad">Tu Actividad</h2>
		<a href="<?php echo site_url() ?>"><button class="regresar">Regresar a home</button><a/>
	</div><!-- titulo_seccion -->

	<?php $user_activity = get_user_activity();

		if ( $user_activity ) : foreach ($user_activity as $post) : setup_postdata( $post );

		$category = get_the_category(); ?>

		<div class="seccion_mitad_papa">

				<div class="seccion_mitad">

					<div class="seccion_imagen <?php get_category_style($category) ?>"><!-- alex corregir ejemplo -->
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
						<span class="tag <?php if ($category[0]->cat_name == 'Mi Embarazo'): echo 'embarazo_back'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_back'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_back'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_back';endif;?>"><?php 	echo $category[0]->cat_name;?></span>
					</div><!-- seccion_imagen -->

					<div class="info_seccion">
						<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
						<h3 class="<?php if ($category[0]->cat_name == 'Mi Embarazo'): echo 'embarazo_texto'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_texto'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_texto'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_texto';endif;?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<a href="<?php the_permalink(); ?>"><p><?php the_excerpt() ?></p></a>
					</div><!-- info_seccion -->

				</div><!-- seccion_mitad -->

				<div class="share_buttons">
					<div class="twitter">
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://twitter.com/home?status=<?php the_permalink();?>" data-text="<?php the_title();?>" data-size="large" data-count="none">Tweet</a>
					</div><!-- twitter -->

					<div class="facebook">
						<a href="#" onclick="shareOnFacebook();">
						  compartir
						</a>
					</div><!-- facebook -->

				</div><!-- share_buttons -->

			</div><!-- secciom_mitad_papa -->

	<?php endforeach; endif; wp_reset_query(); ?>

<?php get_footer(); ?>