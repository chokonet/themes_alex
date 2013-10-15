

	<div id="crea-tu-alerta" class="drop_pop">

		<div class="cierre_pop"></div>

		<div class="labelContainer"><p class="pink uppercase">CREA TU ALERTA</p></div>

		<form id="form-crea-alerta">
			<input id="form-nombre-alerta" name="nombre" class="rounded nombre_alerta" >
			<p class="blue description_pop">¿Cuándo quieres recordarla?</p>
			<div class="calendario">
				<div id="calendario_alerta"></div>
				<!-- <input type="text" id="jquery-datepicker" value="" style="visibility:hidden;"> -->
			</div>
			<div class="alarma" id="form-hora-alerta">
				<span class="reloj"></span>

				<select class="chosen-hora" >
					<option></option>
					<option value="6:00">6:00 hr</option>
					<option value="7:00">7:00 hr</option>
					<option value="8:00">8:00 hr</option>
					<option value="9:00">9:00 hr</option>
					<option value="10:00">10:00 hr</option>
					<option value="11:00">11:00 hr</option>
					<option value="12:00">12:00 hr</option>
					<option value="13:00">13:00 hr</option>
					<option value="14:00">14:00 hr</option>
					<option value="15:00">15:00 hr</option>
					<option value="16:00">16:00 hr</option>
					<option value="17:00">17:00 hr</option>
					<option value="18:00">18:00 hr</option>
					<option value="19:00">19:00 hr</option>
					<option value="20:00">20:00 hr</option>
					<option value="21:00">21:00 hr</option>
					<option value="22:00">22:00 hr</option>
					<option value="23:00">23:00 hr</option>
				</select>
			</div>
			<p class="blue description_pop">Elige un ícono para tu alerta, ¡y listo!</p>
			<div id="carrusel_alertas">
						<a class="flechas flecha_carrusel prev disable" href="#"></a>
						<div class="viewport">
							<ul class="overview">

								<li class="selectEvent rounded" data-imagen="evento1.png">
									<img src="<?php echo THEMEPATH ?>images/evento1.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento2.png">
									<img src="<?php echo THEMEPATH ?>images/evento2.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento3.png">
									<img src="<?php echo THEMEPATH ?>images/evento3.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento4.png">
									<img src="<?php echo THEMEPATH ?>images/evento4.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento5.png">
									<img src="<?php echo THEMEPATH ?>images/evento5.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento6.png">
									<img src="<?php echo THEMEPATH ?>images/evento6.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento7.png">
									<img src="<?php echo THEMEPATH ?>images/evento7.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento8.png">
									<img src="<?php echo THEMEPATH ?>images/evento8.png">
								</li>
								<li class="selectEvent rounded" data-imagen="evento9.png">
									<img src="<?php echo THEMEPATH ?>images/evento9.png">
								</li>

							</ul>
						</div>
						<a class="flecha_carrusel next" href="#"></a>
					</div>

			<div class="boton_pop greenBtn rounded drop" id="bt-empezar">¡AGENDAR!</div>
		</form>
	</div><!-- fin registro inicial -->