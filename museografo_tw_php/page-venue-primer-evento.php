<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>
			<div class="content_full">

				<div class="content">

					<div class="col_12">

						<div class="settings_page venue first_event bloque borde_general clearfix">

							<h2 class="smaller">Crea tu primer evento</h2>
							<form action="">
								<label class="col_2" for="nombre">Nombre</label>
								<input type="text" class="col_6" name="nombre">
								<div class="clearfix"></div>
								<div class="settings_col left margin_right">

									<label class="col_2 left margin_right" for="foto">Foto</label>
									<input class="col_2 left" type="text" name="foto">
									<div class="custom_file_chooser">
										<button class="boton right">Choose file</button>
									</div>

									<label class="col_2 left margin_right" for="empieza">Empieza</label>
									<input class="col_3 left" type="text" name="empieza">

									<label class="col_2 left margin_right" for="acaba">Acaba</label>
									<input class="col_3 left" type="text" name="acaba">

									<label class="col_2 left margin_right" for="horario">Horario</label>
									<input class="col_3 left" type="text" name="horario">

									<label class="col_2 left margin_right" for="costo">Costo</label>
									<input class="col_3 left" type="text" name="costo">

									<label class="col_2 left margin_right" for="category_select">Categoría</label>
									<select class="chosen-select col_3 left" name="event_select" id="venue_select">
										<option value="na">Selecciona uno</option>
										<option value="galeria">Galeria</option>
										<option value="museo">Museo</option>
									</select>

									<label class="col_2 left margin_right" for="event_select">Tipo de evento</label>
									<select class="chosen-select col_3 left" name="event_select" id="venue_select">
										<option value="na">Selecciona uno</option>
										<option value="galeria">Galeria</option>
										<option value="museo">Museo</option>
									</select>

									<label class="col_2 left margin_right" for="area">Área</label>
									<input class="col_3 left" type="text" name="area">

									<div class="clearfix"></div>
									<button class="boton no_margins inblock">Saltar</button>
									<button class="boton no_margins inblock">Publicar</button>
								</div>
								<div class="settings_col left">
									<label class="col_3 block margin_right" for="">Descripción</label>
									<textarea class="col_3 block margin_bottom_10" name="descripcion_venue" id="descripcion_venue" cols="20" rows="5"></textarea>

									<label class="col_3 block margin_right" for="">Artistas</label>
									<textarea class="col_3 block" name="descripcion_venue" id="descripcion_venue" cols="20" rows="5"></textarea>
								</div>

							</form>
						</div><!-- settings_page -->

					</div><!-- full -->



					<div class="clear"></div>

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ); ?>