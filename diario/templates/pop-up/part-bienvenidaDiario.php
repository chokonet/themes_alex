<?php global $current_user; get_currentuserinfo(); ?>

	<div id="bienvenida-diario" class="popups_diario drop_pop">

		<div class="labelContainer">
			<p class="pink uppercase">¡BIENVENIDA <?php echo $current_user->data->display_name; ?> !</p>
		</div>

		<p class="blue description_pop">
			En el Diario de mi Bebé podrás llevar un registro<br/>
			de todos los momentos especiales en la vida de tu pequeño,<br/>
			así como crear tus propias alertas y recordatorios<br/>
			para facilitarte esta etapa tan especial. :)
		</p>

		<div class="boton_pop greenBtn rounded drop" id="bt-bienvenida-diario">¡EMPEZAR!</div>

	</div><!-- fin bienvenida -->