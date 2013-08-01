<div class="paso paso_5">

	<p> - Paso 5 - </p>
	<h2>¡Comparte tu Momento Gold!</h2>
	<img class="separador" src="<?= THEMEPATH; ?>/img/separador.png" />

	<div class="fotos_fb">

		<div class="edicion_paso_3">

			<?php global $current_user;
			// imagenPaso5 es la imagen que se guarda temporalmente en el folder: imagenesPaso4/
			$imagenPaso5 = THEMEPATH.'/img/imagenesPaso4/'.$current_user->user_login.'.png'; ?>

			<img id="imagen-final" src="<?= $imagenPaso5; ?>" />

			<div class="options">
				<button id="publish-to-wall" class="boton publicar">Publicar en tu muro</button>
				<button id="set-as-profile-picture" class="boton perfil">Usar como foto de perfil</button>
				<button class="boton descargar">Descargar a tu compu</button>
				<a href="<?php echo site_url('/momentos-gold/'); ?>">
					<button class="empezar"></button>
				</a>
				<p class="boton_empezar">volver a empezar</p>
			</div><!-- options -->

		</div><!-- objetos_foto -->

	</div><!-- subir_fb -->


	<!-- hidden form: descargar-imagen -->
	<?php $imageData = get_template_directory()."/img/imagenesPaso4/$current_user->user_login.png" ?>
	<form id="form-descargar-imagen" action="<?= THEMEPATH; ?>/image-download.php" method="POST">
		<input name="image" type="hidden" value="<?php echo $imageData ?>">
	</form>

</div><!-- paso_1 -->