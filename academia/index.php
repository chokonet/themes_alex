<?php get_header() ?>

	<div class="seccion_full">

		<?php $embarazo = new WP_Query(array('category_name'=>'1-3-anos', 'posts_per_page'=>1));

		if ( $embarazo->have_posts() ) : while ( $embarazo->have_posts() ) : $embarazo->the_post(); ?>

			<div class="seccion_imagen embarazo_pleca">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen' ); ?></a>
				<span class="tag embarazo_back"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
			</div><!-- seccion_imagen -->

			<div class="info_seccion">
				<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
				<h3 class="embarazo_texto"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
				<a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a>
			</div>

		<?php endwhile; endif; wp_reset_query(); ?>

	</div><!-- seccion_full -->

	<div class="seccion_mitad">

		<?php $meses0 = new WP_Query(array('category_name'=>'0-6-meses', 'posts_per_page'=>1));

		if ( $meses0->have_posts() ) : while ( $meses0->have_posts() ) : $meses0->the_post(); ?>

			<div class="seccion_imagen primeros_pleca">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
				<span class="tag primeros_back"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
			</div><!-- seccion_imagen -->

			<div class="info_seccion">
				<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
				<h3 class="primeros_texto"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
				<a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a>
			</div>

		<?php endwhile; endif; wp_reset_query(); ?>

	</div><!-- seccion_mitad -->

	<?php get_template_part( 'templates/main', 'links' ) ?>


	<div class="seccion_mitad">

		<?php $meses6 = new WP_Query(array('category_name'=>'6-12-meses', 'posts_per_page'=>1));

		if ( $meses6->have_posts() ) : while ( $meses6->have_posts() ) : $meses6->the_post(); ?>

			<div class="seccion_imagen sorpresas_pleca">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
				<span class="tag sorpresas_back"><?php $category = get_the_category();	echo $category[0]->cat_name;?></span>
			</div><!-- seccion_imagen -->

			<div class="info_seccion">
				<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true)); ?></p>
				<h3 class="sorpresas_texto"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
			</div>

		<?php endwhile; endif; wp_reset_query(); ?>

	</div><!-- seccion_mitad -->



	<div class="seccion_mitad">

		<?php $anos = new WP_Query(array('category_name'=>'1-3-anos', 'posts_per_page'=>1));

		if ( $anos->have_posts() ) : while ( $anos->have_posts() ) : $anos->the_post(); ?>

			<div class="seccion_imagen descubriendo_pleca">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
				<span class="tag descubriendo_back"><?php $category = get_the_category();	echo $category[0]->cat_name;?></span>
			</div><!-- seccion_imagen -->

			<div class="info_seccion">
				<p class="date">Hace <?php echo parsepostDate(get_post_time('U', true));  ?></p>
				<h3 class="descubriendo_texto"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
				<a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a>
			</div>

		<?php endwhile; endif; wp_reset_query(); ?>

	</div><!-- seccion_mitad -->

<?php get_footer() ?>