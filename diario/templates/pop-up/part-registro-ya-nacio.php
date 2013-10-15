<?php global $current_user; get_currentuserinfo(); ?>

	<div id="registro-ya-nacio" class="popups_diario drop_pop">

		<div class="cierre_pop"></div>

		<p class="pink uppercase titulo">¡ MUCHAS FELICIDADES <?php echo $current_user->data->display_name; ?> !</p>

		<form id="form-ya-nacio">

			<p class="blue description_pop" style="margin-bottom:10px;">
				LOL Ahora podrás aprovechar al máximo esta aplicación que creamos para ti.
				Compártenos más información sobre tu pequeño para personalizar tu experiencia.</p>
			<p class="blue description_pop">¿Cómo se llama tu bebé?</p>

			<input type="text" id="form-nombre-bebe" name="nombre" class="rounded nombre_bebe" >
			<p class="blue description_pop">¿Cuándo nació?</p>

			<input type="text" id="form-dia-nacimiento" name="dia" class="rounded dia_nacimiento" value="Día" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

			<input type="text" id="form-mes-nacimiento" name="mes" class="rounded mes_nacimiento" value="Mes" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

			<select class="chosen-select" id="form-anio-nacimiento">
			  <option>2013</option>
              <option>2012</option>
              <option>2011</option>
              <option>2010</option>
			</select>

			<div id="bt-registro-ya-nacio" class="greenBtn rounded drop">SIGUIENTE</div>

		 </form>

	</div><!-- fin registro mama -->