<?php get_header(); ?>

		<div id="slider_wrap_100" class="slider_wrap_ana">
			<div id="slider_wrap">

				<h2>Ana Vásquez Colmenares</h2>

				<ul id="slider_ana1" style="top:211px;">
					<?php
					$args = array(
						'posts_per_page' => 5,
						'category_name'	 => 'pensamientos'
					);
					query_posts( $args );
					while( have_posts() ) : the_post(); ?>
						<li>
						<?php the_post_thumbnail('slider_home'); ?>
					<div class="slider_info">
								<p><?php the_excerpt(); ?>…</p>
								
							</div><!-- slider_info -->
						</li>
					<?php endwhile; ?>
				
				</ul>

				<div id="flechas_slider">
					<div id="slider_prev" class="flechas" ></div>
					<div id="slider_next" class="flechas" ></div>
				</div><!-- flechas_slider -->

			</div><!-- slider_wrap -->
			</div><!-- slider_wrap 100 -->

			<div id="content">

				<div class="izq">

					<div class="un_tercio tercio ana_verde">

						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/conferencias/'); ?>"><h3 class="ana_verde">Conferencias</h3></a>

						<div class="tercio_in">
							<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'conferencias'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post();?>
								<a href="<?php echo home_url('/category/ana-vasquez-colmenares/conferencias/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
							<?php endwhile; ?>
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div class="un_tercio tercio buzon">

						<a href="<?php echo home_url('/category/ana-vasquez-colmenares/blog-de-ana/') ?>"><h3 class="ana_verde">Blog de Ana</h3></a>

						<div class="tercio_in">
							<?php
							$args = array(
								'posts_per_page' => 1,
								'category_name'	 => 'blog-de-ana'
							);
							query_posts( $args );
							while ( have_posts() ) : the_post();?>

								<a href="<?php echo home_url('/category/ana-vasquez-colmenares/blog-de-ana/'); ?>"><?php the_post_thumbnail('un_tercio'); ?></a>
							<?php endwhile; ?>
							
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div id="articulos" class="dos_tercios tercio">
						<h3 class="ana_verde">Artículos</h3>
						<div class="tri_ana tri_ana_izq"></div>

						<div id="carusel-articulos">
						    <a class="flechas flecha_carrusel prev" href="#"></a>
						    <div class="viewport">
						        <ul class="overview">
						        	<?php $al=array('posts_per_page' => 8,'post_type' => 'post','tax_query' => array(array('taxonomy' => 'category','field' => 'name','terms' => array('cursos','conferencias') ) ));
    
						           $des = get_posts($al);
						            foreach( $des as $post ) : setup_postdata($post); 
						            ?>
						            <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('car_articulos'); ?></a></li>
						            
						            <?php endforeach; ?> 
						        </ul>
						    </div>
						    <a class="flecha_carrusel next" href="#"></a>
						</div><!-- carusel-diccionario -->

					</div><!-- articulos dos_tercios -->
					
				</div><!-- izq -->

				<div class="der2">

					<div class="un_tercio tercio preguntale ana_verde">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h3 class="brand_azul">Consulta a Ana</h3></a>
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">
					</div><!-- un_tercio -->

					<div class="un_tercio tercio ad">
						<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
					</div><!-- tercio -->

					<br />
					<br />
					<br />

					<div id="twitter_wid" class="un_tercio tercio twitter_ana">
						<a class="twitter-timeline" href="https://twitter.com/anavasquezc" data-widget-id="339810405939552258">Tweets by @anavasquezc</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

					</div><!-- twitter -->

				</div><!-- der -->

			</div><!-- content -->

<?php get_footer(); ?>