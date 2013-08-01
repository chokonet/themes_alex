<?php get_header(); ?>
<div id="contenido">
	<div class="contenidoTemaPelicula">
		<div class="col1Datos">
		<?php  while ( have_posts() ) : the_post(); ?>
			<div class="bordeBlancoBlog sinBordeAbajo">
				<div class="tema2 sinBordeAbajo" >

					<div class="tituloBlog"><h1><?php the_title(); ?></h1>
					</div>


					<div class="contenidoBlog">
						<?php the_post_thumbnail('archive-noticias'); ?>
						
						<div class="txtBlog">
							<?php the_content(); ?>
						</div>
						<div class="colBlog">
							<div class="bordeVertBlog">
								<div class="separadorBlog">
									<?php echo get_the_date('d'); ?><br />
									<span class="candaraBold"><?php echo get_the_date('M'); ?></span><br />
									<?php echo get_the_date('Y'); ?>
								</div>
								<div class="borde3blog">
									<div class="borde2FechaPelicula"><?php if (qtrans_getLanguage() == 'es') { ?>COMPARTIR<?php } else { ?>SHARE<?php }; ?>
									<div class="redesBlog">
									<div class="fb-like" data-send="false" data-layout="box_count" data-width="55" data-show-faces="false"></div>
									<a href="https://twitter.com/share" class="twitter-share-button" data-related="jasoncosta" data-lang="en" data-size="medium" data-count="none">Tweet</a>
									</div>
									</div>
								</div>

							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</div>
			 <?php endwhile; ?>
			<div class="clear"></div>
		</div>
		<div  class="colFicha fondoGris">
			<div class="bordeBlancoVert">
			<div class="bordeBlanco">
			<span class="tituloFT"><?php if (qtrans_getLanguage() == 'es') { ?>CATEGORÍAS<?php } else { ?>CATEGORIES<?php }; ?></span>
			</div>
			 <?php
$args = array(
  'orderby' => 'name',
  );
$categories = get_categories( $args );
foreach ( $categories as $category ) {
	if($category->cat_ID == "6"){
?>
<a href="<?php echo get_category_link( $category->term_id ) ?>">
				<div class="bordeTablaFicha1">
					<div class="bordeTablaFichaBlog">
						<?php echo $category->name; ?>
					</div>
				</div>
				</a>

		 <?php } } ?>
		 <a href="feed/">
				<div class="bordeBlanco">
			<span class="tituloFT">RSS</span>
			</div>
		 </a>
			<div class="bordeBlanco">
			<span class="tituloFT"><?php if (qtrans_getLanguage() == 'es') { ?>NOTICIAS RELACIONADAS<?php } else { ?>RELATED NEWS<?php }; ?></span>
			</div>
			<?php  $tags = wp_get_post_tags($post->ID);
				if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=>4, // Number of related posts to display.
		'caller_get_posts'=>1
	);

	$my_query = new wp_query( $args );

	while( $my_query->have_posts() ) {
	$my_query->the_post();
			?>

			<div class="bordeTablaFicha1">
					<div class="bordeTablaFichaBlog">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
				</div><?php }
	}
	wp_reset_query();
	?>


			</div>
		</div>
<div class="clear"></div>
	</div>

<div style="clear"></div>
<?php get_footer(); ?>