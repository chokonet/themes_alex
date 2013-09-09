

	<div class="barra_header">

		<a href="<?php echo site_url('/actividad/') ?>" alt="Mi Actividad">
			<button class="boton_barra azul">Mi Actividad</button>
		</a>

		<a href="<?php echo site_url('/favorito/') ?>" alt="Mis Favoritos">
			<button class="boton_barra azul">Mis Favoritos</button>
		</a>

		<div class="boton_barra rosa compartir"></div>

		<div class="boton_barra rosa buscar">
			<form class="forma_buscar" method="GET" action="">
				<input type="text" name="s" value="buscar" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
				<input type="submit" value="">
			</form>
		</div><!-- boton_barra -->

	</div><!-- barra_header -->