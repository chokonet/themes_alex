<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>

			<div class="content_full">

				<div class="single_venue content">

					<div class="user_perfil bloque col_12 borde_venue clearfix">

						<h3 class="username">Administración</h3>

						<div class="stat_container">
							<h4>Seguidores</h4>
							<div class="graph">
								<img class="borde_gris" src="<?php echo THEMEPATH; ?>images/graph.png" alt="seguidores">
							</div>
						</div><!-- stat_container -->

						<div class="stat_container">
							<h4>Asistentes</h4>
							<div class="graph">
								<img class="borde_gris" src="<?php echo THEMEPATH; ?>images/graph.png" alt="seguidores">
							</div>
						</div><!-- stat_container -->

						<div class="stat_container">
							<h4>Asistentes frecuentes</h4>
							<div class="graph">
								<img class="borde_gris" src="<?php echo THEMEPATH; ?>images/graph.png" alt="seguidores">
							</div>
						</div><!-- stat_container -->

						<div class="stat_container">
							<h4>Pageviews por evento</h4>
							<div class="graph">
								<img class="borde_gris" src="<?php echo THEMEPATH; ?>images/graph.png" alt="seguidores">
							</div>
						</div><!-- stat_container -->

						<div class="stat_container">
							<h4>Calificaciones de tus eventos</h4>
							<div class="graph">
								<img class="borde_gris" src="<?php echo THEMEPATH; ?>images/graph.png" alt="seguidores">
							</div>
						</div><!-- stat_container -->

						<div class="stat_container">
							<h4>Promueve tus eventos</h4>
							<div class="graph">
								<img class="borde_gris" src="<?php echo THEMEPATH; ?>images/promueve.png" alt="seguidores">
							</div>
						</div><!-- stat_container -->

						<div class="bg_venue col_7 inblock">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, quas, nostrum commodi perferendis sunt aut accusamus sapiente ab cumque ex.</p>
						</div>

						<div class="bg_venue col_2 inblock margin_left">
							<p>Crea un nuevo evento</p>
							<a id="trigger" class="plus" href="#"></a>
						</div>

					</div><!-- user_perfil -->

					<div id="nuevo_evento" class="bloque col_12 borde_general venue first_event settings_page clearfix">

						<form class="center_form col_8" action="">
								<label class="col_2 left" for="nombre">Nombre</label>
								<input class="col_6 left" type="text"  name="nombre">

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

								</div>
								<div class="settings_col left">
									<label class="col_3 block margin_right" for="">Descripción</label>
									<textarea class="col_3 block margin_bottom_10" name="descripcion_venue" id="descripcion_venue" cols="20" rows="5"></textarea>

									<label class="col_3 block margin_right" for="">Artistas</label>
									<textarea class="col_3 block" name="descripcion_venue" id="descripcion_venue" cols="20" rows="5"></textarea>
								</div>

								<div class="col_buttons">
									<button class="boton no_margins long_button">Promueve tu evento</button>
									<button class="boton no_margins">Publica tu evento</button>
								</div>

							</form>



					</div><!-- user_perfil -->

					<div class="user_perfil bloque col_12 borde_venue clearfix">

						<div class="datos col_5 left clearfix margin_right">
							<div class="col_2 left margin_right">
								<img class="user left block" src="<?php echo $template_url; ?>/images/mna.png" alt="Venue">
								<div class="conexiones col_2">
									<h4>Seguidores</h4>
									<ul class="te_siguen borde_gris round_corners_2">
										<li class="artistas">
											<h4 class="numero">266</h4>
											<p>Artistas</p>
										</li>
										<li class="museografos">
											<h4 class="numero">663</h4>
											<p>Museógrafos</p>
										</li>
									</ul><!-- siguiendo -->

								</div><!-- conexiones -->
							</div>
							<div class="col_3 left">
								<h3 class="username">Museo Nacional de Antropología</h3>

								<p class="nombre">
									México, D.F.<br />
								</p>

								<ul class="social_minibar">
									<li class="web"><a href="#"></a></li>
									<li class="email"><a href="#"></a></li>
									<li class="facebook"><a href="#"></a></li>
									<li class="twitter"><a href="#"></a></li>
								</ul><!-- social_minibar -->

								<ul class="servicios">Servicios:
									<li class="icon"><a href="">Restaurante</a></li>
									<li class="icon"><a href="">Wi-fi</a></li>
									<li class="icon"><a href="">Tienda</a></li>
									<li class="icon"><a href="">Cajero</a></li>
								</ul><!-- servicios -->
							</div>
						</div><!-- left -->

						<div class="bio left col_6 margin_right">
							<p><span>Tipo de venue:</span>Museo. </p>
							<p><span>Dirección:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Expectoque quid ad id, quod quaerebam, respondeas. Non quaeritur autem quid naturae tuae consent.</p>
							<p><span>Descripción:</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis doloremque cupiditate necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur!
							</p>
						</div>




					</div><!-- user_perfil -->

					<div class=" col_4 left margin_right">


						<div class="fotos bloque borde_general clearfix">
							<h3>Fotos</h3><span class="label_password">(27)</span>

							<div class="borde_top_gris">

								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left last" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">

								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left last" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">

								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">
								<img class="left last" src="<?php echo $template_url; ?>/images/foto.jpg" alt="">

							</div><!-- fotos_container -->

						</div><!-- fotos -->

						<div class="resenas bloque borde_general clearfix">
							<h3>Reseñas</h3><span class="label_password">(7)</span>

							<div class="resena borde_top_gris">

								<h4>La persistencia de la geometría</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. Quae hic rei publicae vulnera inponebat ille…</p>

							</div><!-- resena -->

							<div class="resena borde_top_gris">

								<h4>Asco: Elite de lo oscuro</h4>
								<p>Lorem ipsum dolor sit amet consectetur adipiscing elit scio enim esse quosdam qui quavis lingua philosophari possint videamus igitur sententias…</p>

							</div><!-- resena -->

							<div class="resena borde_top_gris">

								<h4>Carlos Bunga. Por amor a la disidencia</h4>
								<p>Lorem ipsum dolor sit amet consectetur adipiscing elit maximas vero virtutes iacere omnis necesse est voluptate dominante nihil opus est…</p>

							</div><!-- resena -->

						</div><!-- resenas -->

					</div><!-- lateral -->



					<div class="col_4 bloque borde_general_claro left margin_right">
						<h3>Mis eventos</h3>

						<div class="agendado borde_top_gris">
							<h4>Asco: Elite de oscuro</h4>
							<span class="cerrar"></span>

							<div class="calificacion left">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_left_gris borde_right_gris">
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

							<div class="calificacion left">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_left_gris borde_right_gris">
								<img src="<?php echo $template_url; ?>/images/location.png" alt="">
							</div><!-- location -->

							<div class="fecha left">
								<p>21/03/2013</p>
								<p>28/07/2013</p>
							</div><!-- fecha -->

							<img src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

						</div><!-- agendado -->

					</div><!-- timeline_agenda -->

					<div class="col_4 bloque borde_general_claro left">
						<h3>Mis eventos</h3>

						<div class="agendado borde_top_gris">
							<h4>Asco: Elite de oscuro</h4>
							<span class="cerrar"></span>

							<div class="calificacion left">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_left_gris borde_right_gris">
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

							<div class="calificacion left">
								<p>8.9</p>
							</div><!-- calificacion -->

							<div class="location left borde_left_gris borde_right_gris">
								<img src="<?php echo $template_url; ?>/images/location.png" alt="">
							</div><!-- location -->

							<div class="fecha left">
								<p>21/03/2013</p>
								<p>28/07/2013</p>
							</div><!-- fecha -->

							<img src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

						</div><!-- agendado -->


					</div><!-- timeline_agenda -->

					<div class="clear"></div>

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ); ?>