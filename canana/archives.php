<?php get_header(); ?>
<?php $lang = qtrans_getLanguage(); ?>

	<div id="contenido">
		<div class="contenidoTemaPelicula">
			<div class="col1Datos">
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 100,
				'orderby'=>'date',
				'order'=>'DESC'
			);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="bordeBlancoBlog">
					<div class="tema2" >

						<div class="tituloBlog">
							<a href="<?php the_permalink(); ?>">
								<h1><?php the_title(); ?></h1>
							</a>
						</div><!-- tituloBlog -->

						<div class="contenidoBlog">
							<a href="<?php the_permalink(); ?>" rel="nofollow">
								<?php the_post_thumbnail( 'archive-noticias' ) ?>
							</a>

						<div class="txtBlog">
							<?php the_excerpt(); ?>
						</div><!-- txtBlog -->

						<div class="colBlog">
							<div class="bordeVertBlog">
								<div class="separadorBlog">
									<?php echo get_the_date('d'); ?><br />
									<span class="candaraBold"><?php echo get_the_date('M'); ?></span><br />
									<?php echo get_the_date('Y'); ?>
								</div><!-- separadorBlog -->
							</div><!-- bordeVertBlog -->
						</div><!-- colBlog -->

						<div class="clear"></div>
					</div><!-- tema2 -->
				</div><!-- bordeBlancoBlog -->
			</div><!-- col1Datos -->
			<?php endwhile; ?>

			<div class="clear"></div>

		</div><!-- contenidoTemaPelicula -->

		<div  class="colFicha fondoGris">
			<div class="bordeBlancoVert">

				<?php
				$args = array(
					'orderby' => 'name'
				);
				$categories = get_categories( $args );
					foreach ( $categories as $category ) {
						if($category->cat_ID == "6"){ ?>

							<a href="<?php echo get_category_link( $category->term_id ) ?>">
								<div class="bordeBlanco">
									<span class="tituloFT">
										<?php echo ( $lang == 'es' ) ? $category->name : 'Press Releases'; ?>
									</span><!-- tituloFT -->
								</div><!-- bordeBlanco -->
							</a>
							<?php
						}
					} ?>

				 <a href="feed/">
					<div class="bordeBlanco">
						<span class="tituloFT">RSS</span>
					</div><!-- bordeBlanco -->
				 </a>
			</div><!-- bordeBlancoVert -->
		</div><!-- colFicha -->

		<div class="clear"></div>

	</div><!-- contenido -->

	<div style="clear"></div>

<?php get_footer(); ?>