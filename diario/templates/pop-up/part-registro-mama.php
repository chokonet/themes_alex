
	<div id="registro-mama" class="popups_diario drop_pop">

		<p class="pink uppercase titulo">¡YA CASI!</p>

		<form id="form-registro-mama">

			<p class="blue description_pop">¿Cómo se llama tu bebé?</p>
			<input type="text" id="form-nombre-bebe" name="nombre" class="rounded nombre_bebe">

			<p class="blue description_pop">¿Cuándo nació?</p>

			<input type="text" id="form-dia-nacimiento" name="dia" class="rounded dia_nacimiento" value="Día" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

			<input type="text" id="form-mes-nacimiento" name="mes" class="rounded mes_nacimiento" value="Mes" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

			<select class="chosen-select" id="form-anio-nacimiento">
				<option value="2013">2013</option>
				<option value="2012">2012</option>
				<option value="2011">2011</option>
				<option value="2010">2010</option>
			</select>

			<div id="bt-registro-mama" class="greenBtn rounded drop">SIGUIENTE</div>

		</form>

	</div><!-- fin registro mama -->