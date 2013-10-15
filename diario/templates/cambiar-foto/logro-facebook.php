
	<section id="foto-facebook-logro">
		<button id="regresar-logro-cambiar" class="regresar-paso-uno" style="margin-left: 0px;"></button>
		<div class="labelContainer"><p class="pink uppercase">SELECCIONA TU FOTO</p></div>
		<div class="fotos_fb">

			<div class="fotos_fb_header">
				<button id="regresar-albums-logro">regresar</button>
				<p id="cambio_album">Selecciona entre tus álbumes de Facebook:</p>
			</div><!-- fotos_fb_header -->

			<div class="albums borde_face" id="albums-logro">
				<!-- Portadas de los albums de facebook  -->
				<?php get_template_part('templates/facebook/logro', 'covers'); ?>

				<!-- Interiores de los albums -->
				<?php get_template_part('templates/facebook/album', 'photos'); ?>
			</div><!-- profile_pictures -->

		</div><!-- subir_fb -->
		<div class="boton_pop greenBtn rounded drop" id="bt-subir-logro">SUBIR</div>
	</section>