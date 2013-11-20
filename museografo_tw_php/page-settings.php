<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>
			<div class="content_full">

				<div class="content">

					<div class="left left col_8 margin_right">

						<div class="settings_page bloque borde_general clearfix">

							<p class="titulo_evento">Settings</p>
							<p>Foto de perfil</p>
							<form action="">
								<img class="profile_pic" src="<?php echo $template_url; ?>/images/user.jpg">
								<input type="file" name="profile_pic_chooser" class="chooser" accept="image/*">
								<div class="custom_file_chooser inblock align_bottom"><button class="boton">Choose file</button><p class="description">Debe ser GIF, JPG o PNG menor a 100KB</p></div>

								<div class="clear"></div>

								<input class="col_3 block" type="text" value="Username" onblur="if (this.value == '') {this.value = 'Username';}"
 onfocus="if (this.value == 'Username') {this.value = '';}">

								<input class="col_3 block" type="text" value="Nombre" onblur="if (this.value == '') {this.value = 'Nombre';}"
 onfocus="if (this.value == 'Nombre') {this.value = '';}">

								<input class="col_3 block" type="text" value="Apellido" onblur="if (this.value == '') {this.value = 'Apellido';}"
 onfocus="if (this.value == 'Apellido') {this.value = '';}">

								<input class="col_3 block" type="text" value="Email" onblur="if (this.value == '') {this.value = 'Email';}"
 onfocus="if (this.value == 'Email') {this.value = '';}">

								<textarea class="col_3 block margin_bottom_10" name="" id="" cols="20" rows="5" onblur="if (this.value == '') {this.value = 'Bio';}"
 onfocus="if (this.value == 'Bio') {this.value = '';}">Bio</textarea>

								<input class="col_3 block" type="text" value="Location" onblur="if (this.value == '') {this.value = 'Location';}"
 onfocus="if (this.value == 'Location') {this.value = '';}">

								<input class="col_3 block" type="text" value="Género" onblur="if (this.value == '') {this.value = 'Género';}"
 onfocus="if (this.value == 'Género') {this.value = '';}">

								<input class="col_3 block" type="text" value="Edad" onblur="if (this.value == '') {this.value = 'Edad';}"
 onfocus="if (this.value == 'Edad') {this.value = '';}">

								<p>Cambiar contraseña</p>
								<input class="col_3 block" type="text" value="Contraseña actual" onblur="if (this.value == '') {this.value = 'Contraseña actual';}"
 onfocus="if (this.value == 'Contraseña actual') {this.value = '';}">

								<input class="col_3 block" type="text" value="Nueva contraseña" onblur="if (this.value == '') {this.value = 'Nueva contraseña';}"
 onfocus="if (this.value == 'Nueva contraseña') {this.value = '';}">

								<input class="col_3 block" type="text" value="Confirmar nueva contraseña" onblur="if (this.value == '') {this.value = 'Confirmar nueva contraseña';}"
 onfocus="if (this.value == 'Confirmar nueva contraseña') {this.value = '';}">

								<button class="boton">Guardar</button>
							</form>
						</div><!-- settings_page -->

					</div><!-- left -->

					<div class="timeline_recomendados bloque col_4 borde_general_claro left">
						<h3>Mis Eventos</h3>

						<div class="agendado borde_top_gris">
							<h4>Asco: Elite de oscuro</h4>
							<span class="cerrar"></span>

							<div class="calificacion left borde_right_gris">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_right_gris">
								<img src="<?php echo $template_url; ?>/images/location.png" alt="">
							</div><!-- location -->

							<div class="fecha left">
								<p>21/03/2013</p>
								<p>28/07/2013</p>
							</div><!-- fecha -->

							<img src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

						</div><!-- agendado -->
						<div class="agendado borde_top_gris">
							<h4>Asco: Elite de oscuro</h4>
							<span class="cerrar"></span>

							<div class="calificacion left borde_right_gris">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_right_gris">
								<img src="<?php echo $template_url; ?>/images/location.png" alt="">
							</div><!-- location -->

							<div class="fecha left">
								<p>21/03/2013</p>
								<p>28/07/2013</p>
							</div><!-- fecha -->

							<img src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

						</div><!-- agendado -->

						<div class="agendado borde_top_gris">
							<h4>Asco: Elite de oscuro</h4>
							<span class="cerrar"></span>

							<div class="calificacion left borde_right_gris">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_right_gris">
								<img src="<?php echo $template_url; ?>/images/location.png" alt="">
							</div><!-- location -->

							<div class="fecha left">
								<p>21/03/2013</p>
								<p>28/07/2013</p>
							</div><!-- fecha -->

							<img src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

						</div><!-- agendado -->

						<div class="agendado borde_top_gris">
							<h4>Asco: Elite de oscuro</h4>
							<span class="cerrar"></span>

							<div class="calificacion left borde_right_gris">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_right_gris">
								<img src="<?php echo $template_url; ?>/images/location.png" alt="">
							</div><!-- location -->

							<div class="fecha left">
								<p>21/03/2013</p>
								<p>28/07/2013</p>
							</div><!-- fecha -->

							<img src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

						</div><!-- agendado -->

					</div><!-- bloque -->



					<div class="clear"></div>

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ); ?>