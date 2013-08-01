<?php get_header();

$args2 = array( 'post_type' => 'catalogo', 'posts_per_page' => 100 );
$loop2 = new WP_Query( $args2 );

$args3 = array( 'post_type' => 'logos', 'posts_per_page' => 100 );
$loop3 = new WP_Query( $args3 ); ?>

<?php $lang = qtrans_getLanguage(); ?>
<div id="menuAcerca">
	<div id="menuSeccion">
		<ul>
			<li>
				<a href="<?php echo qtrans_convertURL( home_url('/acerca/sobre-canana/') ); ?>" hreflang="<?php echo $lang; ?>">
					<?php echo ( $lang == 'es' ? 'Sobre Canana' : 'About'); ?>
				</a>
			</li>
			<li>
				<a href="<?php echo qtrans_convertURL( home_url('/cine/') ); ?>" hreflang="<?php echo $lang; ?>">
					<?php echo ( $lang == 'es' ? 'Cine' : 'Film'); ?>
				</a>
			</li>
			<li>

				<a href="<?php echo qtrans_convertURL( home_url('/tv/') ); ?>" hreflang="<?php echo $lang; ?>">
					TV
				</a>
			</li>
			<li>
				<a href="<?php echo qtrans_convertURL( home_url('/branded-content/') ); ?>" hreflang="<?php echo $lang; ?>">
					Branded Content
				</a>
			</li>
			<li class="btnExterno">
				<?php $link_mundial =  get_option('canana_link_mundial') ?>
				<a href="<?php echo $link_mundial  ?>" target="_blank">
					Mundial
				</a>
			</li>
			<li class="btnExterno">
				<?php $link_ambulante =  get_option('canana_link_ambulante') ?>
				<a href="<?php echo $link_ambulante; ?>" target="_blank">
					Ambulante
				</a>
			</li>
		</ul>
	</div><!-- menuSeccion -->
</div><!-- menuAcerca -->

	<div id="slide" >
		<ul class="bjqs">
			<?php
			while ( $loop2->have_posts() ) : $loop2->the_post();
				$themeta = get_post_meta($post->ID, 'canana_slide', TRUE);
				if($themeta != 0) :
					$metabox_datos =  get_post_custom();

					$valor_meta = $metabox_datos ['canana_slide'];

					foreach ( $valor_meta as $key => $valor ){
						$url_slide  = wp_get_attachment_url( $valor, 'large' );

						if ( $url_slide != '' ) { ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo $url_slide; ?>" alt="<?php the_title(); ?>" width="975" height="509" />
									<div class="captionSlide">
										<span><?php the_title(); ?></span>
									</div>
								</a>
							</li><?php
						}
					}
				endif;
			endwhile; ?>
		</ul>
	</div><!-- slide -->

	<div style="clear"></div>

	<div class="footSponsor">
	<?php
	while ( $loop3->have_posts() ) : $loop3->the_post();
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
		$metabox_datos =  get_post_custom();
		?>
		<a href="<?php  $valor_meta = $metabox_datos ['linkLogo']; foreach ( $valor_meta as $key => $valor )
			echo $valor; ?>" target="_blank">
			<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
		</a>
	<?php endwhile; ?>

	</div><!-- footSponsor -->

<?php get_footer(); ?>