<?php global $current_user; get_currentuserinfo(); ?>

	<section id="cover">

		<img src="<?php echo THEMEPATH ?>images/text-portada-embarazo.png" class="tema albumWrapper" id="temaA">
		<img src="<?php echo THEMEPATH ?>images/text-portada-06meses.png" class="tema albumWrapper hidden" id="temaB">
		<img src="<?php echo THEMEPATH ?>images/text-portada-612meses.png" class="tema albumWrapper hidden"  id="temaC">
		<img src="<?php echo THEMEPATH ?>images/text-portada-13-años.png" class="tema albumWrapper hidden" id="temaD">

		<img src="<?php echo THEMEPATH ?>images/fondo_header_foto.png" class="imagen_cover">

		<div id="bt-cambiar-foto"><img src="<?php echo THEMEPATH ?>images/sin_foto_t.png"></div>

		<div id="foto-de-perfil">
			<?php
			if ( false != $portada = cover_image() ) :
				echo "<img src='$portada'>";
			else : ?>
				<img src="<?php echo THEMEPATH ?>images/sin_foto.png"><?php
			endif; ?>
		</div>

		<p>

			<?php
				$user_id = $current_user->ID;
				$user_meta = get_user_meta($user_id, 'first_name');
				echo $user_meta[0];
			?>
			<span class="y-azul no-embarazada">y</span>
			<span class="blue no-embarazada"><?php nombre_bebe(); ?></span>
		</p>

		<p class="etiqueta rounded drop si-embarazada" id="bt-ya-nacio">¡YA NACIó mi bebé!</p>

	</section>
