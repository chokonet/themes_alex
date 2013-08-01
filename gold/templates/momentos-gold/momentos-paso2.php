
	<div class="paso paso_2">

		<p> - Paso 2 - </p>
		<h2>Acomoda la foto de tu bebé</h2>
		<img class="separador" src="<?= THEMEPATH; ?>/img/separador.png" />

		<div class="fotos_fb">

			<div class="edicion_foto">

				<canvas id="canvas-container"></canvas>

				<div class="controles">
					<img class="zoom_in" src="<?= THEMEPATH; ?>/img/zoom_in.png">
					<img class="zoom_out" src="<?= THEMEPATH; ?>/img/zoom_out.png">
				</div><!-- controles -->

			</div><!-- edicion_foto -->

			<div class="disclaimer">
				<input type="checkbox" class="checkbox" id="disclaimer" name="disclaimer" value="1">
				<label class="label_checkbox"  >Compartir mi foto con la Academia Gold</label>
				<p>Al aceptar, guardarémos tu foto por la duración de la campañapara usar en nuestra aplicación</p>
			</div><!--disclaimer -->

		</div><!-- subir_fb -->

		<form id="form-paso-dos" action="" method="GET">
			<input type="hidden" name="paso" value="3">
			<input id="submit-paso-dos" type="submit" class="boton subir" value="Siguiente">
		</form>


	</div><!-- paso_2 -->
	<form  action="" method="GET">
		<input type="hidden" name="paso" value="1">
		<input type="submit" class="boton empesar2" value="volver a empezar">
	</form>