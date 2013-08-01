<?php get_header(); ?>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="leyeron">
				<p>Ellas también leyeron este artículo: </p>

				<div class="usuarios">
					<img class="user" src="<?php bloginfo('template_url'); ?>/images/bebe_wide.jpg" />
					<img class="user" src="<?php bloginfo('template_url'); ?>/images/bebe_wide.jpg" />
					<img class="user" src="<?php bloginfo('template_url'); ?>/images/bebe_wide.jpg" />
				</div><!-- usuarios -->

			</div><!-- leyeron -->

			<div class="titulo_single">
				<h2><?php the_title(); ?>	</h2>
				<p>Subido el <?php the_date('d \d\e F'); ?>	</p>
			</div><!-- titulo_single -->

			<div class="barra_social">

				<div class="share_buttons">
					<div class="twitter">

						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://twitter.com/home?status=<?php the_permalink();?>" data-text="<?php the_title();?>" data-size="large" data-count="none">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div><!-- twitter -->

					<div class="facebook">
						  <a href="#" onclick="
						    window.open(
						      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
						      'facebook-share-dialog',
						      'width=626,height=436');
						    return false;">

						  compartir
						</a>
					</div><!-- facebook -->

				</div><!-- share_buttons -->

				<div class="agregar_fav">
					<p>Agregar a  favoritos</p>
				</div><!-- agregar_fav -->
			</div><!-- barra_social -->
			<div class="hero">
				<?php the_post_thumbnail( 'imagen_single' ); ?>
			</div>
			<div class="texto">
			<?php the_content(); ?>	
			</div><!-- texto -->
			<?php $ids_checked[] = $post->ID; ?>
			 <?php endwhile; else: ?>
        <p><?php _e('no ahi contenidos'); ?></p>

        <?php endif; ?>
			<div class="side">
				<h4>También te puede interesar:</h4>
				<?php $args = array('posts_per_page' => 2, 'post__not_in' => $ids_checked, 'orderby'=>'rand' );
				query_posts($args);
				while ( have_posts() ) : the_post();
				$category = get_the_category();
				?>
					<div class="seccion_mitad">

						<div class="seccion_imagen <?php if ($category[0]->cat_name == 'PREPI'): echo 'embarazo_pleca'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_pleca'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_pleca'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_pleca';endif;?>">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
							<span class="tag <?php if ($category[0]->cat_name == 'PREPI'): echo 'embarazo_back'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_back'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_back'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_back';endif;?>"><?php 	echo $category[0]->cat_name;?></span>
						</div><!-- seccion_imagen -->

						<div class="info_seccion">
							<p class="date">Hace <?php echo parsepostDate(get_the_time());  ?></p>
							<h3 class="<?php if ($category[0]->cat_name == 'PREPI'): echo 'embarazo_texto'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_texto'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_texto'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_texto';endif;?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3>
							<?php
								$excerpt = get_the_excerpt();
								$excerpt = string_limit_words($excerpt,12);
							?>
							<p><?php echo $excerpt; ?>…</p>
						</div><!-- info_seccion -->

					</div><!-- seccion_mitad -->
			    <?php endwhile; ?>

			</div><!-- side -->
			      

		</div><!-- main -->
	<?php get_footer(); ?>