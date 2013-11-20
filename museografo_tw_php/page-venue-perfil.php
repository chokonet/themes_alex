<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>
			<div class="content_full">

				<div class="content">

					<div class="col_12">

						<div class="settings_page venue bloque borde_general clearfix">

							<h2 class="smaller">Completa tu perfil</h2>
							<form action="">

								<img class="profile_pic margin_right_10 " src="<?php echo $template_url; ?>/images/user.jpg">
								<input type="file" name="profile_pic_chooser" class="chooser" accept="image/*">
								<div class="custom_file_chooser inblock align_bottom"><button class="boton">Choose file</button><p class="description">Debe ser GIF, JPG o PNG menor a 100KB</p></div>

								<div class="clearfix"></div>

								<div class="settings_col left col_4 margin_right">

									<label class="left col_2" for="user">Username</label>
									<input class="col_2 right" type="text" name="user">

									<label class="left col_2" for="nombre">Nombre</label>
									<input class="col_2 right" type="text" name="nombre">

									<label class="left col_2" for="email">E-mail</label>
									<input class="col_2 right" type="text" name="email">

									<label class="left col_2" for="url">URL</label>
									<input class="col_2 right" type="text" name="url">

									<label class="left col_2" for="twitter">Twitter</label>
									<input class="col_2 right" type="text" name="twitter">

									<label class="left col_2" for="facebook">Facebook</label>
									<input class="col_2 right" type="text" name="facebook">

									<label class="left col_2" for="coordenadas">Coordenadas</label>
									<input class="col_2 right" type="text" name="coordenadas">

									<label class="left col_2" for="contacto">Contacto</label>
									<input class="col_2 right" type="text" name="contacto">

									<label class="left col_2" for="contacto">Tipo de venue</label>
									<select class="chosen-select" name="venue_select" id="venue_select">
										<option value="na">Selecciona uno</option>
										<option value="galeria">Galeria</option>
										<option value="museo">Museo</option>
									</select>
									<div class="clearfix"></div>
									<button class="boton no_margins">Guardar</button>
								</div>
								<div class="settings_col left col_3 margin_right">
									<label class="left col_2" for="">Descripción</label>
									<textarea class="margin_bottom_10" name="descripcion_venue" id="descripcion_venue" cols="20" rows="5"></textarea>

									<label class="left col_2" for="">Dirección</label>
									<textarea name="descripcion_venue" id="descripcion_venue" cols="20" rows="5"></textarea>
								</div>
								<div class="settings_col icons left col_4">
									<p>Servicios</p>
									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="restaurante" name="servicios" value="restaurante">
										<label class="icon left" for="restaurante">Restaurante</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="fumar" name="servicios" value="fumar">
										<label class="icon" for="fumar">Área de fumar</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="wifi" name="servicios" value="wifi">
										<label class="icon" for="wifi">Wi-fi</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="banos" name="servicios" value="banos">
										<label class="icon" for="banos">Baños</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="tienda" name="servicios" value="tienda">
										<label class="icon" for="tienda">Tienda</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="bar" name="servicios" value="bar">
										<label class="icon" for="bar">Bar</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="cajero" name="servicios" value="bar">
										<label class="icon" for="cajero">Cajero</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="bebederos" name="servicios" value="bebederos">
										<label class="icon" for="bebederos">Bebederos</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" class="icon" type="checkbox" id="perro" name="servicios" value="perro">
										<label class="icon" for="perro">Perro guía</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="cafeteria" name="servicios" value="cafeteria">
										<label class="icon" for="cafeteria">Cafetería</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="braile" name="servicios" value="braile">
										<label class="icon" for="braile">Braile</label>
									</div>

									<div class="left col_2 clearfix">
										<input class="inblock" type="checkbox" id="foro" name="servicios" value="foro">
										<label class="icon" for="foro">Foro</label>
									</div>

								</div>

							</form>
						</div><!-- settings_page -->

					</div><!-- full -->



					<div class="clear"></div>

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ); ?>