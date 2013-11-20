<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>

			<div class="content_full">

				<div class="single_admin content">
				<nav class="admin_nav">
					<ul>
						<li>Analytics</li>
						<li>Clientes</li>
						<li class="active">Ventas</li>
						<li>Exportar</li>
					</ul>
				</nav>

				<div class="stats_container_admin col_10 bloque borde_venue clearfix right">

				<h2>Ventas</h2>
				<h3>Abrir nuevo venue</h3>

				<form class="form_60 col_7 clearfix" action="">

					<input class="col_6"name="nombre" value="Nombre" type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >

					<select class="chosen-select" name="tarifa" id="tarifa">
						<option value="">Tarifa</option>
						<option value="">Otro</option>
					</select>

					<input class="col_3 left" name="paypal" value="ID Paypal" type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >

					<input class="col_3 margin_right left" name="contacto" value="Contacto de Cliente"  type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >

					<select class="chosen-select" name="agente" id="agente">
						<option value="">Agente de venta</option>
						<option value="">Otro</option>
					</select>

					<select class="chosen-select change_margin" name="promocion" id="promocion">
						<option value="">Promoción</option>
						<option value="">Otro</option>
					</select>

					<div class="clear"></div>

					<button class="boton">Crear</button>
				</form><!-- form_60 -->

				<h3>Editar venue</h3>

				<form class="form_60 col_7 clearfix" action="">

					<select class="chosen-select" name="venue_select" id="venue_select">
						<option value="">Selecciona un venue</option>
						<option value="">Otro</option>
					</select>

					<input class="col_6" name="nombre" value="Busca un venue" type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >

					<select class="chosen-select" name="tarifa" id="tarifa">
						<option value="">Tarifa</option>
						<option value="">Otro</option>
					</select>

					<input class="col_3 left" name="paypal" value="ID Paypal" type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >

					<input class="col_3 margin_right left" name="contacto" value="Contacto de Cliente"  type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >

					<select class="chosen-select" name="agente" id="agente">
						<option value="">Agente de venta</option>
						<option value="">Otro</option>
					</select>

					<select class="chosen-select change_margin" name="promocion" id="promocion">
						<option value="">Promoción</option>
						<option value="">Otro</option>
					</select>


					<div class="clear"></div>

					<button class="boton">Guardar</button>
				</form>

				</div>


				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ) ?>