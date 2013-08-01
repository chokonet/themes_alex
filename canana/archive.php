<?php get_header(); ?>
<div id="borde2">
	<div id="menuSeccion">
		<ul>
			<li id="btn_sobre" rel="sobreC" class="actual">Catalogo</li>
			<li id="btn_cine" rel="cineC">Estreno</li>
		</ul>

	</div>
</div>
<div id="contenido">
	<div class="bordeBlanco">
		<div class="tema1" id="sobreC">
			<div class="bordeBlanco centrado">
				<div class="tituloTema">CATÁLOGO
				</div>
			</div>

			<div class="contenidoTemaCatalogo">
			<?php
			$i=0;
			 while ( have_posts() ) : the_post();
			 $i++;
	 $metabox_datos =  get_post_custom();

$attachments = get_children(array('post_parent' => $post->ID,
						'post_status' => 'inherit',
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'order' => 'ASC',
						'orderby' => 'menu_order ID'));

?>
<a href="<?php the_permalink(); ?>">
			<div class="peliculaCatalogo" id="pelicula<?php echo $i; ?>">
				<div class="catalogoContiene">
					<div class="infoPelicula"><span class="tituloPelicula"><?php the_title(); ?></span><?php
							  $valor_meta = $metabox_datos ['linea2titulo'];
  foreach ( $valor_meta as $key => $valor )
    echo $valor;

						?> / <?php
							  $valor_meta = $metabox_datos ['pais'];
  foreach ( $valor_meta as $key => $valor )
    echo $valor;

						?></div>
						<?php
						foreach($attachments as $att_id => $attachment) {
	$full_img_url = wp_get_attachment_url($attachment->ID);
        $split_pos = strpos($full_img_url, 'wp-content');
        $split_len = (strlen($full_img_url) - $split_pos);
        $abs_img_url = substr($full_img_url, $split_pos, $split_len);
        $full_info = @getimagesize(ABSPATH.$abs_img_url);
        $description = $attachment->post_content;
						if ($description == "thumb"){ ?>
						<img src="<?php echo $full_img_url; ?>" alt="<?php the_title(); ?>" width="173" height="247" class="flotaDerecha"/>
						<?php } }; ?>
				</div>
			</div>
</a>
		<?php endwhile; ?>

									<div class="clear"></div>
					</div>
		</div>

		<div class="clear"></div>
   </div>

<?php //get_footer();
?>
<div style="clear"></div>
<?php get_footer(); ?>