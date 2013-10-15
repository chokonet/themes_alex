
	<section id="sliderContainer">

		<div class="labelContainer">
			<p class="pink uppercase si-embarazada">ALERTAS DE MI EMBARAZO</p>
			<p class="pink uppercase no-embarazada">ALERTAS DE MAMÁ</p>
		</div>

		<a class="leftArrow prev "></a>

		<div class="viewport">

			<ul class="overview">
			<?php global $facebook;
				$eventos = $facebook->get_user_events(); // name, pic_cover, pic_big, start_time
				if ( $eventos ) : foreach ( $eventos as $evento) : ?>

					<li class="eventoThumb"><a href="#">
						<img src="<?php echo $evento['pic_big'] ?>">
						<p><?php echo mysql2date('j M Y', $evento['start_time']); ?></p>
						<p><?php echo $evento['name']; ?></p>
					</a></li><!-- eventoThumb -->

				<?php endforeach; else : ?>

					<div id="prealerta">
						<p><strong>¿Necesitas recordar algún pendiente?</strong></p>
						<p>¡Haz clic en el botón en cualquier momento para agregar tu alerta!</p>
					</div>

				<?php endif; ?>

			</ul><!-- slider -->

		</div>

		<a class="rightArrow next"></a>
		<div class="cf"></div>

		<a class="nuevo"><p class="etiqueta rounded drop" id="agregar-alerta">+ Agregar alerta</p></a>

	</section><!-- sliderContainer -->