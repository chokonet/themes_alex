	<head>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/custom/meta.css">
		<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.8.2.min.js"></script>
		<!-- <script src="<?php bloginfo('template_url'); ?>/js/selectmenu.js"></script> -->
	</head>

	<div class="my_meta_control">

 		<!-- Nombre -->
 		<!-- <label>Nombre:</label>
 				<input type="text" name="_productos_meta[nombre]" value="<?php if(!empty($meta['nombre'])) echo $meta['nombre']; ?>"/> -->

		<!-- Editorial / Marca -->
		<label>Editorial / Marca:</label>
		<input type="text" name="_productos_meta[editorial]" value="<?php if(!empty($meta['editorial'])) echo $meta['editorial']; ?>"/>

		<!-- Edades -->
		<label>Edades:</label>
		<select name="seleccion_edades" id="seleccion_edades">
			<option value="N/A">–– Selecciona ––</option>
			<option value="0-5">0 - 5 años</option>
			<option value="6-12">6 - 12 años</option>
			<option value="13-18">13 - 18 años</option>
		</select>
		<input type="hidden" id="edades" name="_productos_meta[edades]" value="<?php if(!empty($meta['edades'])) echo $meta['edades']; ?>"/>

		<!-- Sinopsis -->
		<label>Sinopsis :</label>
		<textarea name="_productos_meta[sinopsis]" id="txtarea_sinopsis"><?php if(isset($meta['sinopsis'])){ echo $meta['sinopsis']; } ?></textarea>
<!--
		<?php
			if(isset($meta['sinopsis'])){
				$sinopsis = $meta['sinopsis'];
				echo '<script>';
				echo '$("#txtarea_sinopsis").val("'.$sinopsis.'");';
	 			echo '</script>';
			}
		?>
-->

		<!-- Precio -->
		<label>Precio:</label>
		<input type="text" name="_productos_meta[precio]" value="<?php if(!empty($meta['precio'])) echo $meta['precio']; ?>"/>

		<!-- Precio Venta -->
		<label>Precio Venta:</label>
		<input type="text" name="_productos_meta[precio_venta]" id="precio_venta" value="<?php if(!empty($meta['precio_venta'])) echo $meta['precio_venta']; ?>"/>

	</div><!-- ends my_meta_control -->

	<script>
		$(document).ready(function() {

			//cambiar el select menu al valor correcto
			var temp = $('#edades').val();
			if(temp != ''){
				$('#seleccion_edades').val(temp);
			}

			$('#publish').click(function() {
				var rango_edades = $('#seleccion_edades').val();
				$('#edades').attr('value', rango_edades);
			});
		});
	</script>
