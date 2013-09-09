<?php get_header(); ?>

	<div class="titulo_seccion">
		<h2 class="favoritos">Mis Favoritos</h2>
		<a href="<?php echo site_url() ?>"><button class="regresar">Regresar a home</button><a/>
	</div><!-- titulo_seccion -->

	<?php $user_favorites = get_user_favorites();

	if ( $user_favorites ) : foreach ($user_favorites as $post) : setup_postdata( $post );

		$category = get_the_category(); ?>

			<div class="seccion_mitad_papa">

				<div class="seccion_mitad">

					<div class="seccion_imagen <?php get_category_style($category) ?>"><!-- alex corregir ejemplo -->
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
						<span class="tag <?php get_category_back($category) ?>">
							<?php echo isset($category[0]) ? $category[0]->cat_name : '' ?>
						</span>
					</div><!-- seccion_imagen -->

					<div class="info_seccion">
						<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
						<h3 class="<?php get_category_text($category) ?>">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<a href="<?php the_permalink(); ?>"><p><?php the_excerpt() ?></p></a>
					</div><!-- info_seccion -->

				</div><!-- seccion_mitad -->

				<div class="share_buttons">
					<!-- twitter -->
					<div class="twitter">
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://twitter.com/home?status=<?php the_permalink() ?>" data-text="<?php the_title() ?>" data-size="large" data-count="none">Tweet</a>
					</div>

					<!-- facebook -->
					<div class="facebook"><a href="#" onclick="shareOnFacebook();">compartir</a></div>
				</div><!-- share_buttons -->

			</div><!-- secciom_mitad_papa -->

	<?php endforeach; endif; wp_reset_query(); ?>

<?php get_footer(); ?>