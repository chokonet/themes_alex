<?php
get_header( );
$template_url = get_bloginfo( 'template_url' );
?>
			<div class="content_full">

				<div class="content">

					<div class="left left col_8 margin_right">

						<div class="evento_main bloque borde_artista clearfix">

							<img class="left" src="<?php echo $template_url; ?>/images/carlos.jpg" alt="">
							<p class="titulo_evento">Carlos Amorales presenta “Cuarta Bienal de Cartel Polaco”</p>

							<div class="slider_evento col_8 clearfix">

								<img src="<?php echo $template_url; ?>/images/slider.jpg" alt="">

								<div class="carrusel clearfix">

									<img class="left" src="<?php echo $template_url; ?>/images/carrusel.jpg" alt="">
									<img class="left" src="<?php echo $template_url; ?>/images/carrusel.jpg" alt="">
									<div class="left">
										<div class="mas"></div>
										<div class="negro"></div>
										<img src="<?php echo $template_url; ?>/images/carrusel.jpg" alt="">
									</div>
									<div class="sube_tu_foto left boton">
										<p>Sube tu foto</p>
									</div>

								</div><!-- carrusel -->

							</div><!-- slider_evento -->

							<ul class="descripcion text left margin_right">
								<li><strong>Lugar:</strong> Museo Tamayo</li>
								<li><strong>Empieza:</strong> 18 Octubre 10:00 AM</li>
								<li><strong>Acaba:</strong> 22 de Octubre 5pm</li>
								<li><strong>Horario:</strong> 10am a 5pm</li>
								<li><strong>Costo:</strong> $120</li>
								<li><strong>Artistas:</strong> Pixel Pancho, Francesco Romoli, Mary McDonald, Yaoska Davila, Athena Calderone.</li>
								<li><strong>Dirección:</strong> Reforma 2987</li>
								<li><strong>Descripción:</strong> Lorem ipsum dolor sit amet consectetur adipiscing elit.</li>
								<li><strong>Tipo de Evento:</strong> Exposición</li>
								<li><strong>Categoría:</strong> Arte Contemporaneo</li>
								<li><strong>Área:</strong> Cinco salas</li>
							</ul><!-- descripcion -->

							<div class="mapa left col_3">
								<iframe width="222" height="222" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps?f=q&amp;source=s_q&amp;hl=es-419&amp;geocode=&amp;q=Museo+Tamayo,+Miguel+Hidalgo,+Ciudad+de+M%C3%A9xico&amp;aq=0&amp;oq=Tamayo&amp;sll=23.554131,-102.6205&amp;sspn=34.174549,67.631836&amp;ie=UTF8&amp;hq=Museo+Tamayo,+Miguel+Hidalgo,+Ciudad+de+M%C3%A9xico&amp;t=m&amp;ll=19.42572,-99.181716&amp;spn=0.021046,0.032015&amp;output=embed"></iframe>
							</div><!-- mapa -->

							<div class="evento_top_extras">
								<div class="calificacion">
									<p>8.9</p>
								</div><!-- calificacion -->
								<div class="share">

								</div><!-- share -->
							</div><!-- evento_top_extras -->

							<div class="clear"></div>

							<button class="boton left margin_right_10">Agendar</button>
							<button class="boton left">Asistí</button>

						</div><!-- evento_main -->

						<div class="comentarios bloque borde_general clearfix">

							<h3>Comentarios</h3>

							<img class="left margin_right_10" src="<?php echo $template_url; ?>/images/raul.jpg" alt="">

							<form class="comment_form left" action="">
								<textarea class="input_border left" name="comentario" id="" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >Mensaje</textarea>
								<input class="boton" type="submit" value="enviar">
							</form><!-- comment_form -->

							<div class="clear"></div>

							<div class="comentario borde_top_gris clearfix">

								<div class="left">
									<img class="user" src="<?php echo $template_url; ?>/images/york.jpg" alt="">
									<img class="vote left" src="<?php echo $template_url; ?>/images/down_vote.png" alt="">
									<img class="vote left" src="<?php echo $template_url; ?>/images/up_vote.png" alt="">
								</div><!-- left -->

								<h4>York</h4>
								<p class="text left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tum Piso: Quoniam igitur aliquid omnes, quid Lucius noster? Quae sunt igitur communia vobis cum antiquis, iis sic utamur quasi concessis; Est enim effectrix multarum et magnarum voluptatum. Obsecro, inquit, Torquate, haec dicit Epicurus? Quid, si etiam iucunda memoria est praeteritorum malorum? Legimus tamen Diogenem.</p>

							</div><!-- comentario -->

							<div class="comentario borde_top_gris clearfix">

								<div class="left">
									<img class="user" src="<?php echo $template_url; ?>/images/york.jpg" alt="">
									<img class="vote left" src="<?php echo $template_url; ?>/images/down_vote.png" alt="">
									<img class="vote left" src="<?php echo $template_url; ?>/images/up_vote.png" alt="">
								</div><!-- left -->

								<h4>York</h4>
								<p class="text left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tum Piso: Quoniam igitur aliquid omnes, quid Lucius noster? Quae sunt igitur communia vobis cum antiquis, iis sic utamur quasi concessis; Est enim effectrix multarum et magnarum voluptatum. Obsecro, inquit, Torquate, haec dicit Epicurus? Quid, si etiam iucunda memoria est praeteritorum malorum? Legimus tamen Diogenem.</p>

							</div><!-- comentario -->

						</div><!-- comentarios -->

					</div><!-- left -->

					<div class="timeline_recomendados bloque col_4 borde_general left">
						<h3>Eventos recomendados</h3>

						<div class="recomendado borde_top_gris">
							<h4>La persistencia de la geometría</h4>
							<span class="cerrar"></span>

							<img class="imagen_recomendado left margin_right_10" src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

							<div class="left">
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

								<div class="clear"></div>

								<button class="boton left">Ver evento</button>
								<button class="boton right">Agendar</button>
							</div>

						</div><!-- recomendado -->

						<div class="clear"></div>

						<div class="recomendado borde_top_gris">
							<h4>La persistencia de la geometría</h4>
							<span class="cerrar"></span>

							<img class="imagen_recomendado left margin_right_10" src="<?php echo $template_url; ?>/images/agendados.jpg" alt="">

							<div class="left">
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

								<div class="clear"></div>

								<button class="boton left">Ver evento</button>
								<button class="boton right">Agendar</button>
							</div>

						</div><!-- recomendado -->

					</div><!-- bloque -->

					<div class="timeline_agenda col_4 bloque borde_general left">
						<h3>Mis eventos</h3>

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


					</div><!-- timeline_agenda -->

					<div class="clear"></div>

				</div><!-- content -->
			</div><!-- content_full -->

<?php get_footer( ); ?>