<?php get_header(); ?>

		<div id="content">

				<div class="single_izq">
					<div class="tercio">

						<h2 class="brand_verde">Branding Personal</h2>
					</div>

					<div class="single_cont">
						<img src="<?php bloginfo('template_url'); ?>/images/branding.png">

						<p>Hace muchas décadas se empezaron a hacer pruebas de sabor (blind test) para averiguar qué tanto los consumidores distinguían un producto específico dentro de otros productos similares sólo por su sabor u olor, pero sin ver el empaque o presentación habitual. En muchos casos, los resultados arrojaron que bajo estas condiciones, las personas no podían distinguir su producto “favorito” de otro de la competencia, y sin embargo los consumidores decían ser “fieles” a un cierto producto de los que habían consumido en la prueba. Las cigarreras, en particular, fueron las primeras compañías en darse cuenta que los clientes en realidad compran la imagen y no el sabor.</p>

						<p>Y en un mundo como el que vivimos es común que pase algo parecido con las personas. Es frecuente que una persona no llegue al proceso final de entrevistas de trabajo si luce de manera inadecuada. También suele suceder que hagan más fácilmente negocios las personas consideradas como más “agradables” en su manera de ser. Prevalece muchas veces la forma sobre el fondo cuando se trata de juzgar a una persona. Entonces la marca más importante de todas es la de tú persona- la marca llamada _________________________ (pon aquí tu nombre).</p>

						<p>El branding personal es una de las cosas más importantes que podemos y debemos aprender a hacer. Pondré un ejemplo: cuando abres la bandeja de entrada de tu correo electrónico, ¿cómo escoges a la persona cuyo correo abrirás primero, cuál borrar y cuál ignorar? En un formato rígido (como el de los casilleros del e-mail) donde todos los correos tiene el mismo tipo y color de letra, el nombre del autor, junto con lo que dice el “asunto” del correo componen los elementos más importantes de su “branding”, y a partir de ella, usualmente reconocemos el valor del contenido y si vale invertir tiempo valioso leyéndolo o no. Pero en un formato “flexible”, donde las personas eligen cómo vestirse, donde reaccionan y se comportan de una manera diferente, hay mucho mayor margen de maniobra, pero también de error.</p>

						<p>Cada uno manejamos nuestra propia “marca”, es decir somos responsables de nuestro Branding Personal. Esta marca ayuda a identificarnos a los ojos de los demás, como una persona de tal o cual carácter, preparación, nivel de competencia, capacidad de socializar, es decir nuestra forma de ser, nuestras cualidades y defectos, habilidades y preferencias, que en buena medida son  percibidas a partir de un vistazo o unos cuantos comentarios que escuchamos de una persona.</p>

						<p>Tú puedes desarrollar y adoptar una estrategia para darte a conocer y promoverte ante los demás. Te aconsejo que comiences a hacerlo hoy. Pregúntate ( y quizá pide la ayuda de alguien de confianza):</p>

						<p>1. ¿Qué te hace diferente y a otras personas en tu área profesional?</p>

						<p>2. ¿Recibes el respeto y reconocimiento que crees merecer o en general te sientes minusvaluado y poco apreciado?</p>

						<p>3. ¿Qué cualidades y habilidades posees y cuáles te hace falta desarrollar para destacarte más en el área de tu interés?</p>

						<p>4. ¿Qué imagen estás proyectando en tu ámbito laboral? ¿Es la adecuada o necesitas verte más serio y profesional, o por el contrario, te serviría una imagen más creativa?</p>

						<p>5. ¿Tienes los contactos suficientes? ¿necesitas nuevos contactos para cumplir tus fines? ¿Posees las habilidades de socialización adecuadas? ¿Conoces la etiqueta adecuada para sentirte seguro en cualquier situación?</p>

						<p>6. ¿Cuáles son las características que te hacen sobresalir, aquellos elementos que hacen que la gente te identifique claramente? Y finalmente, ¿estás satisfecho con tus respuestas? ¿Las características que encuentras son las que deseas transmitir?</p>

						<p>Si en alguno de estos rubros crees que debes mejorar, te recomiendo:</p>

						<p>Observa a las personas importantes del ambiente donde deseas destacar. Échale un ojo a su ropa, zapatos, celular, bolsos, portafolios, accesorios; cómo hablan, qué cualidades los hacen destacar. Ahora haz un examen autocrítico. Pídele a alguien que critique tu forma de vestir, tus modales en la mesa, tu manera de relacionarte con tus compañeros de trabajo, la forma e que das una presentación o hablas en público. Cada elemento de estos te ayuda a proyectar una cierta edad, nivel de profesionalismo, estatus, carisma. Revisa si tu percepción coincide con lo que los demás perciben de ti. Y si no, empieza a tomar cartas en el asunto.</p>

						<p>En las próximas entregas , yo te daré consejos específicos para que hagas cambios en tu vestuario, para que revises tus conocimientos de etiqueta social y de negocios, y en general, para que encuentres la mejor manera de entender y desarrollar tu branding personal, y que éste sea coherente con tu imagen y el mensaje que mandas a tus colegas y amigos. Tu marca es única, y su futuro está en tus manos. Si tienes preguntas sígueme en twitter (@ConsejosdeAna) o mándame un mail a: avasquez@prodigynet.mx</p>


					</div><!-- single_cont -->

					<div class="single_comments">

						<?php
						$commenter = wp_get_current_commenter();
						$req = get_option( 'require_name_email' );
						$aria_req = ( $req ? " aria-required='true'" : '' );

						$args = array(
							'id_submit'       		=> 'single_comm_enviar',
							'title_reply'       	=> '<h4>Deja un comentario</h4>',
  							'title_reply_to'    	=> 'Deja una respuesta a %s',
							'comment_field'			=>  '<div class="single_comm_der"><p class="comment-form-comment"><label for="comment">Comentario</label><textarea id="comment" class="single_comm_in" name="comment" cols="45" rows="8" aria-required="true">' .
												    '</textarea></p><label class="dis_block">
								<small>Al dar clic en “Enviar” aceptas el Aviso de Privacidad</small>
							</label></div>',
							'comment_notes_after'	=> '',
							'label_submit'			=> 'Enviar',
							'fields' => apply_filters( 'comment_form_default_fields', array(

							    'author' =>
							      '<p class="comment-form-author">' .
							      '<label for="author">Nombre</label> ' .
							      ( $req ? '<span class="required">*</span>' : '' ) .
							      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
							      '" size="30"' . $aria_req . ' /></p>',

							    'email' =>
							      '<p class="comment-form-email"><label for="email">Correo</label> ' .
							      ( $req ? '<span class="required">*</span>' : '' ) .
							      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
							      '" size="30"' . $aria_req . ' /></p>',
							  )
							)
						);

						comment_form( $args, $post->ID );

						$args = array(
							'orderby' => '',
							'order' => 'DESC',
							'post_id' => "$post->ID",
							'status' => 'approve'
						);
						$comments = get_comments($args);
						if ( $comments ){?>
							<h2>Comentarios:</h2>
						<?php }
						foreach ( $comments as $comment ){ ?>

							<div class="comentario">
								<h4><?php echo $comment->comment_author; ?>:</h4>
								<p><?php echo $comment->comment_content; ?></p>
							</div><!-- comentario -->

						<?php } ?>
					</div><!-- single_comments -->

				</div><!-- single_izq -->


				<div class="single_der ana_verde">

					<div class="un_tercio tercio preguntale brand_verde">
						<a href="<?php echo home_url('/consulta-a-ana/'); ?>"><h2 class="brand_verde">Consulta a Ana</h2></a>
						<img class="preguntale_img" src="<?php bloginfo('template_url'); ?>/images/preguntale.png">

					</div><!-- un_tercio -->

					<div class="tercio margen_sup_25 banner_ocultar">
						<div class="tercio_in">
							<!-- Google Adsense -->
							<script type="text/javascript">
							google_ad_client = "ca-pub-5042601521790259";
							/* Header */
							google_ad_slot = "4963263372";
							google_ad_width = 300;
							google_ad_height = 250;
							</script>
							<script type="text/javascript"
							src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
							</script>
						</div><!-- tercio_in -->

					</div><!-- tercio -->

					<div id="twitter_wid" class="tercio margen_sup_25 twitter_border">
						<a class="twitter-timeline" href="https://twitter.com/ConsejosdeAna" data-widget-id="346712873344573440">Tweets by @ConsejosdeAna</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

					</div><!-- twitter -->



				</div><!-- single_der -->


			</div><!-- content -->

<?php get_footer(); ?>