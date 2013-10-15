<?php // Portadas de los albums de facebook

	global $facebook;

	$covers = $facebook->get_album_covers(); ?>

	<div id="fb-contenedor-albums">

	<?php if ( $covers ) : foreach ( $covers as $image ) : ?>

		<div class="album" data-id="<?= $image['object_id'] ?>">
			<img class="album_cover" src="<?= $image['src_big'] ?>" />
			<div class="album_name"><p><?= $image['name'] ?></p></div>
		</div>

	<?php endforeach; endif; ?>

	</div>