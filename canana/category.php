<?php get_header(); ?>
<div id="contenido">
	<div class="contenidoTemaPelicula">
		<div class="col1Datos">
        <?php  while ( have_posts() ) : the_post(); ?>
			<div class="bordeBlancoBlog">

				<div class="tema2" >

					<div class="tituloBlog"><a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                    </div>


					<div class="contenidoBlog">
					<a href="<?php the_permalink(); ?>" rel="nofollow">
						<?php the_post_thumbnail('archive-noticias'); ?>
					</a>


					<div class="txtBlog">
					<?php the_excerpt(); ?>
						</div>
						<div class="colBlog">
							<div class="bordeVertBlog">
							<div class="separadorBlog">
							<?php echo get_the_date('d'); ?><br />
							<span class="candaraBold"><?php echo get_the_date('M'); ?></span><br />
							<?php echo get_the_date('Y'); ?>
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
         <?php } }; ?>
         <a href="feed/">
				<div class="bordeBlanco">
			<span class="tituloFT">Otra</span>
			</div>
         </a>
			</div>
		</div>
<div class="clear"></div>
	</div>

<?php //get_footer();
?>
<div style="clear"></div>
<?php get_footer(); ?>