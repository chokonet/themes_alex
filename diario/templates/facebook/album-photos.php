<?php
	global $facebook;
	$photos = $facebook->get_album_photos(); ?>

	<?php if ( $photos ) : foreach ( $photos as $album ) : ?>

		<div class="album_fotos_fb album-<?= $album[0]['album_object_id'] ?>">

			<?php foreach ( $album as $image ) : ?>

			<div class="album-inside" data-id="<?= $image['pid'] ?>" style="background: url('<?= $image['src_big'] ?>') center center" data-source="<?= $image['src_big'] ?>">
				<img class="selected_cross" src="<?php bloginfo('template_url'); ?>/images/selected_cross.png" />
				<img class="selected_check" src="<?php bloginfo('template_url'); ?>/images/selected_check.png" />
			</div>

			<?php endforeach; ?>

		</div>

	<?php endforeach; endif;
