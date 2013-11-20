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
						<li>Ventas</li>
						<li class="active">Exportar</li>
					</ul>
				</nav>

				<div class="stats_container_admin export col_10 bloque borde_venue clearfix right">
					
				<h2>Exportar base de datos</h2>
							
				<form class="filter_bar" action="">
					<select class="chosen-select" name="filtro" id="filtro">
						<option value="">Edad</option>
						<option value="">Otro</option>
					</select>

					<select class="chosen-select" name="filtro" id="filtro">
						<option value="">Pais</option>
						<option value="">Otro</option>
					</select>

					<select class="chosen-select" name="filtro" id="filtro">
						<option value="">Ciudad</option>
						<option value="">Otro</option>
					</select>

					<select class="chosen-select" name="filtro" id="filtro">
						<option value="">Genero</option>
						<option value="">Otro</option>
					</select>
				  	<button class="boton">Exportar</button>
				</form>
				</div>
					

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ) ?>