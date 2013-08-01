
	<div class="paso paso_1">

		<p> - Paso 3 - </p>
		<h2>¡Personaliza tu Momento Gold!</h2>
		<img class="separador" src="<?= THEMEPATH; ?>/img/separador.png" />

		<div class="fotos_fb">

			<div class="edicion_paso_3">

				<?php global $current_user;
				// imagen es la imagen que se guarda temporalmente en el folder imagenesPaso2/
				$imagen = THEMEPATH.'/img/imagenesPaso2/'.$current_user->user_login.'.png'; ?>

				<div class="resultado">
					<p id="leyenda-label" class="texto">¡Soy todo un Rockstar!</p>
					<img class="imagen_editada" id="imagen-paso3" src="<?= $imagen; ?>" />
					<img class="footer_resultado" src="<?= THEMEPATH; ?>/img/momentos-gold-temas/tema1.png" />
				</div><!--resultado-->

				<div class="options">

					<div class="slider_options_cont">
						<div class="slider_options_box">
							<h4>Elige un tema:</h4>
							<div class="wrap_slider_options viewport">
								<ul class="slider_options overview">

									<li class="slide temas" data-tema="01marco.png">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="02marco.png">
										<img src="<?= THEMEPATH; ?>/img/rosa.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="03marco.png">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="04marco.png">
										<img src="<?= THEMEPATH; ?>/img/rosa.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="05marco.png">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="06marco.png">
										<img src="<?= THEMEPATH; ?>/img/rosa.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="07marco.png">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="08marco.png">
										<img src="<?= THEMEPATH; ?>/img/rosa.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="09marco.png">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->
									<li class="slide temas" data-tema="10marco.png">
										<img src="<?= THEMEPATH; ?>/img/rosa.png" />
									</li><!-- slide -->


								</ul><!-- slider_options -->



									<a class="flecha_carrusel" href="#"><img class="prev" src="<?= THEMEPATH; ?>/img/prev.png" /></a>
									<a class="flecha_carrusel" href="#"><img class="next" src="<?= THEMEPATH; ?>/img/next.png" /></a>

							</div><!-- wrap_slider_options -->
						</div><!-- slider_options_box -->


						<div class="slider_options_box">
							<h4>Agrégale un filtro:</h4>
							<div class="wrap_slider_options viewport">
								<ul class="slider_options overview">

									<li class="slide effects" data-effect="vintage">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->
									<li class="slide effects" data-effect="sepia">
										<img src="<?= THEMEPATH; ?>/img/rosa.png" />
									</li><!-- slide -->
									<li class="slide effects" data-effect="greenish">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->
									<li class="slide effects" data-effect="reddish">
										<img src="<?= THEMEPATH; ?>/img/rosa.png" />
									</li><!-- slide -->
									<li class="slide effects" data-effect="retro">
										<img src="<?= THEMEPATH; ?>/img/azul.png" />
									</li><!-- slide -->


								</ul><!-- slider_options -->

								<img class="prev flecha_carrusel" src="<?= THEMEPATH; ?>/img/prev.png" />
								<img class="next flecha_carrusel" src="<?= THEMEPATH; ?>/img/next.png" />

							</div><!-- wrap_slider_options -->
						</div><!-- slider_options_box -->

				    </div>
				    <div class="slider_options_cont sep">
						<div class="slider_options_box">
							<h4>¡Personaliza tu Momento Gold!</h4>
							<textarea id="leyenda-text"></textarea>
						</div><!-- slider_options_box -->
				    </div>

				</div><!-- add_ons -->

			</div><!-- objetos_foto -->

		</div><!-- subir_fb -->

		<form id="form-paso-tres" action="" method="GET">
			<input type="hidden" name="paso" value="4">
			<input type="hidden" name="theme" id="theme" value="tema1.png">
			<input type="hidden" name="texto" id="texto" value="¡Soy todo un Rockstar!">
			<input id="submit-paso-tres" type="submit" class="boton subir" value="Siguiente">
		</form>


	</div><!-- paso_1 -->
	<form id="form-paso-tres" action="" method="GET">
		<input type="hidden" name="paso" value="1">
		<input type="submit" class="boton empesar2" value="volver a empezar">
	</form>