
	<div id="generar-logro" class="drop_pop">

		<div class="cierre_pop"></div>

		<img src="<?php echo THEMEPATH ?>images/img_creaLogro.png">

		<div class="labelContainer"><p class="pink uppercase">NUEVO LOGRO:</p></div>

		<form>
			<input id="form-nombre-logro" name="nombre" value="Escríbelo aquí" class="rounded nombre-logro" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
		</form>

		<div class="boton_pop greenBtn rounded drop" id="bt-agregar-nuevo-logro">AGREGAR</div>

	</div><!-- fin generar-logro -->