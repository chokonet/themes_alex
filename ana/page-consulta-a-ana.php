<?php get_header(); ?>

		<div id="content">
				<?php the_post(); ?>
				<div class="single_izq">
					<div class="tercio">
						<h2 class="ana_verde">Consulta a Ana Vásquez Colmenares</h2>
					</div>

					<div class="single_cont">

						<img id="img_preguntale" src="<?php bloginfo('template_url'); ?>/images/consulta.jpg">

						<form id="forma_consulta">
							<label for="name">Nombre:</label><input type="text" name="nombre" id="form-name">
							<label for="email">Mail:</label><input type="email" name="email" id="form-email">
							<label for="pregunta">Pregunta:</label><textarea name="pregunta" id="form-pregunta"></textarea>
							<input type="submit" name="submit" value="enviar">
						</form><!-- forma_consulta -->

					</div><!-- single_cont -->

				</div><!-- single_izq -->

				<div class="single_der">

					<div class="tercio">

						<h2 class="ana_verde">Conferencias</h2>

						<div class="tercio_in">
							<?php
					$args = array(
						'posts_per_page' => 1,
						'category_name'	 => 'conferencias'
					);
					query_posts( $args );
					while( have_posts() ) : the_post(); ?>
						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
					<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->
					<div class="tercio margen_sup_25">
						<div class="tercio_in">
							<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div id="twitter_wid" class="tercio margen_sup_25">
						<a class="twitter-timeline" href="https://twitter.com/ConsejosdeAna" data-widget-id="346712873344573440">Tweets by @ConsejosdeAna</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div><!-- twitter -->

				</div><!-- single_der -->

			</div><!-- content -->

<?php get_footer(); ?>