<?php 
add_action('pre_get_posts','alter_search_query');
function alter_search_query($query){
	$query->set('post_status', 'publish');
	return $query;
} ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
			<div class="titulo_seccion">
				<h2 class="busqueda"><?php printf( __( '%s' ),  get_search_query()  ); ?></h2>
				<a href="<?php echo home_url(); ?>"><button class="regresar">Regresar a home</button></A>
			</div><!-- titulo_seccion -->
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $category = get_the_category();?>
			
			<div class="seccion_mitad_papa">
				<div class="seccion_mitad">
					
					<div class="seccion_imagen <?php if ($category[0]->cat_name == 'PREPI'): echo 'embarazo_pleca'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_pleca'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_pleca'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_pleca';endif;?>">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seccion_imagen_chica' ); ?></a>
						<span class="tag <?php if ($category[0]->cat_name == 'PREPI'): echo 'embarazo_back'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_back'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_back'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_back';endif;?>"><?php 	echo $category[0]->cat_name;?></span>
					</div><!-- seccion_imagen -->

					<div class="info_seccion">
						<p class="date">Hace <?php echo parsepostDate(get_the_time());  ?></p>
						<h3 class="<?php if ($category[0]->cat_name == 'PREPI'): echo 'embarazo_texto'; elseif ($category[0]->cat_name == '0-6 Meses'): echo 'primeros_texto'; elseif ($category[0]->cat_name == '6-12 Meses'): echo 'sorpresas_texto'; elseif ($category[0]->cat_name == '1-3 Años'): echo 'descubriendo_texto';endif;?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php
								$excerpt = get_the_excerpt();
								$excerpt = string_limit_words($excerpt,15);
								?>
						<a href="<?php the_permalink(); ?>"><p><?php echo $excerpt; ?>…</p></a>
					</div><!-- info_seccion -->

				</div><!-- seccion_mitad -->
				

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
			</div><!-- secciom_mitad_papa -->
<?php endwhile;?>
          <ul class="dicc_pager link_azul2">
						<?php posts_nav_link( ' | ', '< Anterior', 'Siguiente >' ); ?>
					</ul><!-- dicc_pager -->
 <?php else : ?>

              
           	  <p><?php _e( 'No encontramos lo que buscabas, por favor busca con otras palabras.' ); ?></p>
                  
 <?php endif; ?>
			
		</div><!-- msin -->
		
<?php get_footer(); ?>