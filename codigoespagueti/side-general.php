<div class="side-general">
	<?php if ( is_single() ): ?>
	<!-- prueba loop ultimo mes-->

		<div class="caja_side">
			<ul class="favoritos">
				<li id="noticias" class="select"></li>
				<li id="masgustado" class=""></li>
				<li id="comentado" class=""></li>
				<li id="sopitas" class=""></li>
			</ul>
			<div class="side_noticias">
				<h2>Últimas noticias</h2>
				<?php global $featured_post;
					$noticias = get_posts(array(
						'post_type'      => 'post',
						'category'       => 1,
						'posts_per_page' => 3,
						'exclude'        => $featured_post
					));

					foreach ($noticias as $post): setup_postdata($post);

				?>
						<div class="cont_post">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<h4>
								<?php
									$categorias = get_the_category($post->ID);
									foreach($categorias as $categoria) {
										echo $categoria->slug;
										echo ' ';
									}
								?>
							</h4>
							<?php
	  							$excerpt = get_the_excerpt();
								$excerpt = string_limit_words($excerpt,10);
							?>
							<p> <?php echo $excerpt; ?>...</p>
						</div>

				<?php endforeach; wp_reset_query(); ?>
			</div><!-- end ultimas noticias-->
			<div class="side_masgustado">
				<h2>Más gustados</h2>
				<?php
					$masGustados = imprime_post_masgustados();

					if($masGustados){
						 foreach ($masGustados as $todoslosposts) {
							foreach ($todoslosposts as $post ) {
								 setup_postdata($post);


				?>
				<div class="cont_post">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						<h3><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h3>
						<h4>
							<?php
									$categorias = get_the_category($post->ID);
									foreach($categorias as $categoria) {
										echo $categoria->slug;
										echo ' ';
									}
							?>
						</h4>
						<?php
							$excerpt = get_the_excerpt();
							$excerpt = string_limit_words($excerpt,10);
						?>
						<p> <?php echo $excerpt; ?>...</p>
				</div>
				<?php } } } wp_reset_postdata(); ?>


			</div><!-- end mas gustados-->
			<div class="side_comentado">
				<h2>Más comentados</h2>
				<?php
					$masComentados = get_posts_mas_comentados();

					if($masComentados){
						 foreach ($masComentados as $todoslosposts) {
							foreach ($todoslosposts as $post ) {
								 setup_postdata($post);

							echo $post_id;
							$post = get_post($post_id);  setup_postdata($post);

				?>
				<div class="cont_post">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<h4>
							<?php
								$categorias = get_the_category($post->ID);
								foreach($categorias as $categoria) {
									echo $categoria->slug;
									echo ' ';
								}
							?>
						</h4>
						<p>
						<?php
							$excerpt = get_the_excerpt();
							$excerpt = string_limit_words($excerpt,10);
						?>
						<p> <?php echo $excerpt; ?>...</p></p>
				</div>
				<?php } } } wp_reset_postdata(); ?>

			</div><!-- end mas comentados-->

			<div class="side_sopitas">

				<h2>sopitas.com</h2>

				<?php
				$rss_sopitas = fetch_feed('http://www.sopitas.com/site/cat/editors-choice/feed/');

				if( ! is_wp_error($rss_sopitas)) :
					$feed_elements = $rss_sopitas->get_items( 0, 3 );

				 	foreach ( $feed_elements as $element ) :

						$imagen = $element->get_item_tags('http://search.yahoo.com/mrss/', 'content');
						$imagen = isset($imagen[0]['attribs']['']['url']) ? $imagen[0]['attribs']['']['url'] : 'http://placehold.it/80x80';

						$categories = $element->get_categories();
						$category   = isset($categories[0]) ? $categories[0]->term : ''; ?>

						<div class="cont_post">
							<a href="<?php echo $element->get_permalink() ?>">
								<img src="<?php echo $imagen ?>">
							</a>
							<h3>
								<a href="<?php echo $element->get_permalink() ?>">
									<?php echo $element->get_title() ?>
								</a>
							</h3>
							<h4><?php echo $category ?></h4>
							<p><?php echo wp_trim_words( $element->get_content(), 10 )?></p>
						</div><?php

					endforeach;

				endif; ?>

			</div><!-- end sopitas.com-->



		</div><!-- end caja_side-->
	<?php endif;?>

	<?php /* BANNER VIEJO
	<div id='div-gpt-ad-1374362520645-0' style='width:300px; height:600px;'>
		<script type='text/javascript'>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1374362520645-0'); });
		</script>
	</div>
	*/ ?>
	<!-- codigo_home -->
	<div id='div-gpt-ad-1378399931388-1' style='width:300px; height:600px;'>
		<script type='text/javascript'>
			googletag.display('div-gpt-ad-1378399931388-1');
		</script>
	</div>
</div><!-- end .side-single -->