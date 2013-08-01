
	<button class="regresar-paso-uno">Regresar</button>

	<div class="paso paso_1">

		<div class="fotos_fb">

			<div class="fotos_fb_header">

				<button id="regresar-albums">regresar</button>

				<p id="cambio_album">Selecciona entre tus álbumes de Facebook:</p>

			</div><!-- fotos_fb_header -->

			<div class="albums borde_face" id="facebook-albums-container">

				<!-- Portadas de los facebook albums -->

			</div><!-- profile_pictures -->
		</div><!-- subir_fb -->



		<form id="form-paso-uno-facebook" action="" method="GET">
			<input type="hidden" name="paso" value="2">
			<input id="submit-paso-uno-facebook" type="submit" class="boton subir" value="Usar">
		</form>


		<script id="albumTemplate" type="text/template">
			<div class="album" data-id="{{id}}">
				<img class="album_cover" src="{{cover}}" />
				<div class="album_name"><p>{{name}}</p></div>
			</div>
		</script>

		<script id="albumContentsTemplate" type="text/template">
			<div class="album-inside" data-id="{{id}}" style="background: url('{{cover}}') center center" data-source="{{cover}}">
				<img class="selected" src="<?php bloginfo('template_url'); ?>/img/selected.png" />
			</div>
		</script>


	</div><!-- paso_1 -->