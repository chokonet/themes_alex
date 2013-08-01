
	<div class="paso paso_1">

		<p> - Paso 1 - </p>
		<h2 id="titulo_paso1">Sube la foto de tu bebé</h2>
		<h2 id="sube_foto_face1">Selecciona un álbum</h2>
		<img class="separador" src="<?php bloginfo('template_url'); ?>/img/separador.png" />

		<div id="sube-foto-tabs">

			<!-- sube_fb -->
			<div class="sube sube_fb">
				<a href="#" rel="facebook">
					<img src="<?php bloginfo('template_url'); ?>/img/desde_fb.png" />
				</a>
				<p>Desde Facebook</p>
			</div>

			<!-- sube_compu -->
			<div class="sube sube_compu">
				<a href="#" rel="compu">
					<img src="<?php bloginfo('template_url'); ?>/img/desde_compu.png" />
				</a>
				<p>Desde tu compu</p>
			</div>

			<!-- sube_cam -->
			<div class="sube sube_cam">
				<a href="#" rel="cam">
					<img src="<?php bloginfo('template_url'); ?>/img/desde_cam.png" />
				<a/>
				<p>Con tu camarita</p>
			</div>

		</div><!-- sube-foto-tabs -->


		<!-- sube_fb -->
		<div class="hidden" id="content-facebook">
			<?php get_template_part( 'templates/momentos-gold/subir-foto/foto', 'facebook' ); ?>
		</div>

		<!-- sube_compu -->
		<div class="hidden" id="content-compu">
			<?php get_template_part( 'templates/momentos-gold/subir-foto/foto', 'computadora' ); ?>
		</div>

		<!-- sube_cam -->
		<div class="hidden" id="content-cam">
			<?php get_template_part( 'templates/momentos-gold/subir-foto/foto', 'camara' ); ?>
		</div>

	</div>