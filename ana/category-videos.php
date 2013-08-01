<?php get_header(); ?>

<div id="content">
			
				<div class="single_izq">
					<div class="tercio">
						
						<h3 class="brand_verde">Videos</h3>
						<div class="tri_ana tri_ana_izq"></div>
					</div>
					
					<div class="single_cont">
						<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array(
								'posts_per_page' => 8,
								'paged' => $paged,
								'category_name'	 => 'videos'
								);
								query_posts($args);
								while ( have_posts() ) : the_post(); ?>
									<div class="video_wrap_el">	
										<?php
										$video_url = get_post_meta($post->ID, 'dbt_link_video', true);
										?>		
										<iframe width="256" height="192" src="http://www.youtube.com/embed/<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
										<h4><a href="<?php the_permalink(); ?>?a=videos"><?php the_title(); ?></a></h4>
									</div>
						<?php endwhile; ?>	
						<ul class="dicc_pager link_verde" style="margin: 0 0 20px 0;">
						<?php posts_nav_link( ' | ', '< Anterior', 'Siguiente >' ); ?>
					</ul>					
					</div><!-- single_cont -->
					

				</div><!-- single_izq -->
					

				<div class="single_der">

					<div class="un_tercio tercio preguntale brand_verde">
						<h3 class="brand_verde">Consulta a Ana</h3>
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">
						
					</div><!-- un_tercio -->

					<div class="tercio margen_sup_25">
						<div class="tercio_in">
							<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div id="twitter_wid" class="tercio margen_sup_25">
						<a class="twitter-timeline" href="https://twitter.com/anavasquezc" data-widget-id="339810405939552258">Tweets by @anavasquezc</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div><!-- twitter -->



				</div><!-- single_der -->	
				
				
				<div class="tres_tercios tercio diccionario_de_moda">
					

					<h3 class="brand_verde">Diccionario de Moda y Estilo</h3>

					<div class="tri_ana tri_ana_izq"></div>					
					
					<div id="carusel_videos_verde">
					    <a class="flechas flecha_carrusel prev" href="#"></a>
					    <div class="viewport">
					        <ul class="overview">
					        	<?php
					            $args = array(
					            	'posts_per_page' => 50,
					            	'category_name'	 => 'diccionario'
					            );
					            query_posts($args);
					            while ( have_posts() ) : the_post(); ?>
					            	<?php
					            	$titulo = get_the_title();
					            	$letra = substr($titulo, 0, 1);
					            	$letra = strtolower($letra);
					            	?>
					            <li>
										<a href='<?php echo home_url("/category/diccionario/") ?>?letra=<?php echo $letra; ?>'>
											<?php the_post_thumbnail('diccionario'); ?>
											<div class="nombre_diccionario">
												<p><?php the_title(); ?></p>
											</div><!-- nombre_diccionario -->
										</a>
									</li>
                                <?php endwhile; ?>
					        </ul>
					    </div>
					    <a class="flecha_carrusel next" href="#"></a>
					</div><!-- carusel-diccionario -->			
					
				</div><!-- tres_tercios -->				
								
				
			</div><!-- content -->

<?php get_footer(); ?>