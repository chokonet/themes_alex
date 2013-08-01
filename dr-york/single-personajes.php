<?php the_post(); ?>
<div class="cajita-con-audio">

	<div class="cajita">
		<?php
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post->ID,
			'post_mime_type' => 'image'
		);

		$attachments = get_posts( $args );
		if ( $attachments ) {
			$contador = 0;
			foreach ( $attachments as $attachment ) { $contador++;
				echo '<div class="minicaja">';
					if ($contador==1) {echo '<p>'; the_title(); echo'</p>';}
					if ($contador==4) {echo '<p>'; the_title(); echo'</p>';}
						echo wp_get_attachment_image( $attachment->ID, "imagenes_personajes");
				echo '</div>';
			}
		}
		?>

	</div><!-- cajita -->
	<?php $meta = get_post_meta($post->ID, 'subtitulo', true ); ?>
		<?php if($meta !=  ''):?>
		<div id="subtitulo" >
			<div id="cont">
				<p class="text_subtitulo">
				<?php echo $meta; ?>
				</p>
			</div>
		</div>
	<?php endif;?>
	<?php

	$cont = get_the_content( );
	if ( $cont != '' ){ ?>
		<div class="bio">
			<?php the_content(); ?>
		</div><!-- bio -->
	<?php } ?>

	<!--[if !IE]> -->

		<img class="next play_large" src="<?php bloginfo("template_url");?>/images/play_large.png" alt="play_large" width="200" height="200" />

	<!-- <![endif]-->

		<!--[if lte IE 8]>
			<div class="player2">
				<p id="audioplayer_1">Alternative content</p>
				<script type="text/javascript">
					AudioPlayer.embed("audioplayer_1", {soundFile: "<?php $key="audio-mp3"; echo get_post_meta($post->ID, $key, true); ?>"});
				</script>
			</div>
		<![endif]-->

			<div class="player">
			<audio>
				<source class="nadita-ogg" src="<?php $key="audio-ogg"; echo get_post_meta($post->ID, $key, true); ?>"></source>
				<source class="nadita-mp3" src="<?php $key="audio-mp3"; echo get_post_meta($post->ID, $key, true); ?>"></source>
			</audio>
			</div>

</div><!-- cajita-con-audio -->