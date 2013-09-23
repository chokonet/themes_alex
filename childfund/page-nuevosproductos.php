<?php get_header(); ?>

		<div id="wrapper">

			<header><img src="<?php echo CSSPATH ?>img/header.png"></header>

			<form id="donativo" action="https://www.paypal.com/cgi-bin/webscr" method="POST">

				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="upload" value="1" />
				<input type="hidden" name="business" value="childfundmexico@childfundmexico.org.mx" />
				<input type='hidden' name='tax_cart' value='0' />
				<input type="hidden" name="notify_url" value="<?php echo site_url('/nuevosproductos-paypal-ipn/'); ?>" />
				<input type="hidden" name="return" value="<?php echo site_url('/post-donativo/'); ?>" />
				<input type="hidden" name="rm" value="2" />
				<input type="hidden" name="cbt" value="Regresar a ChildFund" />
				<input type="hidden" name="cancel_return" value="<?php echo site_url('/nuevosproductos/'); ?>" />
				<input type="hidden" name="lc" value="MX" />
				<input type="hidden" name="currency_code" value="MXN" />
				<input type='hidden' name='custom' id="custom" value='' />
				<input type='hidden' id='nombre_1' name='item_name_1' value='' />
				<input type='hidden' id='amount_1' name='amount_1' value='' />
				<input type='hidden' id='quantity_1' name='quantity_1' value='1' />
				<input type='hidden' id='shipping_1' name='shipping_1' value='' />
				<input type='hidden' id='onetime-custom' name='custom' value='' />


				<ul>
					<h3>Elige:</h3>
					<li class="uno"><a class="num">1</a>
						<h2>Forma de donación</h2><p>Puedes donar una sola vez o mensualmente.</p><br>
						<!-- Forma del donativo -->
						<input type="radio" name="forma" id="unico" value="unico">
						<label for="unico">Donativo Único</label>
						<input type="radio" name="forma" id="mensual" value="mensual">
						<label for="mensual">Donativo Mensual</label>
					</li>

					<li class="dos"><a class="num">2</a>

						<h2>Programa al que deseas apoyar</h2><p>¡Tú puedes hacer que mas niñ@s reciban nuestros programas!</p><br>
						<!-- Programa -->
						<div id="edu" class="col">
							<input type="radio" class="tipo-donativo" name="programa" id="educacion" value="educacion"><br>
							<label for="educacion">

								<p>Educación</p>
								<img id="img-educacion" src="<?php echo CSSPATH ?>img/educacion_btn.png">
								<div id="educlick" class="clickme" data-img="#img-educacion"></div>

							</label>

							<div id="eduWnd" class="programa-info"><div class="close"></div></div>
						</div>
						<div id="sal" class="col">
							<input type="radio" class="tipo-donativo" name="programa" id="salud" value="salud"><br>
							<label for="salud">
								<p>Salud y <br>Nutrición</p>
								<img id="img-salud" src="<?php echo CSSPATH ?>img/salud_btn.png">
								<div id="salclick" class="clickme" data-img="#img-salud"></div>
							</label>

							<div id="salWnd" class="programa-info"><div class="close"></div></div>
						</div>
						<div id="pro" class="col">
							<input type="radio" class="tipo-donativo" name="programa" id="proteccion" value="proteccion"><br>
							<label for="proteccion">
								<p>Protección <br>del Niño/a</p>
								<img id="img-proteccion" src="<?php echo CSSPATH ?>img/proteccion_btn.png">
								<div id="proclick" class="clickme" data-img="#img-proteccion"></div>
							</label>

							<div id="proWnd" class="programa-info"><div class="close"></div></div>
						</div>

						<div id="cui" class="col">
							<input type="radio" class="tipo-donativo" name="programa" id="cuidado" value="cuidado"><br>
							<label for="cuidado">

								<p>Medio <br>Ambiente</p>
								<img id="img-cuidado" src="<?php echo CSSPATH ?>img/ambiente_btn.png">
								<div id="cuiclick" class="clickme" data-img="#img-ambiente"></div>

							</label>

							<div id="cuiWnd" class="programa-info"><div class="close"></div></div>
						</div>

						<div class="col" id="col_top" >

							<input type="radio" class="tipo-donativo" name="programa" id="cualquiera" value="cualquiera"><br>
							<label for="cualquiera">
								<p>Cualquiera <br>de los <br>Programas</p>
								<img src="<?php echo CSSPATH ?>img/cualquiera_btn.png">

							</label>
						</div>
					</li>

					<li class="tres"><a class="num">3</a>
						<h2>Monto del donativo</h2><p>Indica la cantidad con la que deseas apoyar el programa</p><br>
						<!-- Monto -->
						<div class="col_3">
							<label class="label3" for="1">$1.00</label>
							<input type="radio" class="monto-donativo" name="monto" id="1" value="1">
						</div>
						<div class="col_3">
							<label class="label3" for="300" >$300.00.00</label>
							<input type="radio" class="monto-donativo" name="monto" id="300" value="300" style="margin-left:51px;">
						</div>
						<div class="col_3">
							<label class="label3" for="500">$500.00</label>
							<input type="radio" class="monto-donativo" name="monto" id="500" value="500">
						</div>
						<div class="col_3">
							<label class="label3" for="1000">$1,000.00</label>
							<input type="radio" class="monto-donativo" name="monto" id="1000" value="1000">
						</div>
						<div class="col_3">
							<label class="label3" for="2000">$2,000.00</label>
							<input type="radio" class="monto-donativo" name="monto" id="2000" value="2000">
						</div>
						<div class="col_3">
							<label class="label3" for="2500">$2,500.00</label>
							<input type="radio" class="monto-donativo" name="monto" id="2500" value="2500">
						</div>
					</li>

				</ul>

				<!-- Submit -->
				<br>
				<div class="submit"><input id="submit-paypal-form" type="submit" value="Listo"></div>

			</form>





			<div id="factura-container">

				<div id="recibo">
					<header><img src="<?php echo THEMEPATH; ?>css/img/header_recibo.png"> </header>
					<ul id="desea_recibo">
						<li class="si"><a href="#"><p>deseo obtener mi recibo.</p></a></li>
						<li class="no"><a href="#"><p>gracias.</p></a></li>
					</ul>
					<div class="logo_blanco"></div>
				</div><!-- recibo -->



				<div id="formFactura">

					<form id="form-facturaForm" name="facturaForm" method="post" action="">

						<p>Recibo a nombre de:</p>
						<label for="nombre">Nombre:  </label>
						<input id="nombre" name="nombre" type="text" required>
						<label for="apPat">Apellido paterno: </label>
						<input id="apPat" name="apPat" type="text" required>
						<label for="apMat">Apellido materno: </label>
						<input id="apMat" name="apMat" type="text" required>
						<label for="rfc">R.F.C.: </label>
						<input id="rfc" name="rfc" type="text" required>
						<label for="mail">Correo electrónico: </label>
						<input id="mail" name="mail" type="email" required>

						<p>Domicilio Fiscal:</p>
						<label for="calle">Calle y número: </label>
						<input id="calle" name="calle" type="text" required>
						<label for="colonia">Colonia:</label>
						<input id="colonia" name="colonia" type="text" required>
						<label for="delegacion">Delegación o municipio: </label>
						<input id="delegacion" name="delegacion" type="text" required>
						<label for="ciudad">Ciudad y estado: </label>
						<input id="ciudad" name="ciudad" type="text" required>
						<label for="cp">CP: </label>
						<input id="cp" name="cp" type="text" required>


						<div class="submit">
							<p class="error-message hidden">* Por favor, llena todos los campos</p>
							<input type="submit" id="submit-formFactura" value="Enviar">
						</div>


					</form>

				</div><!-- formFactura -->

			</div>






			<form id="subscription" name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="POST" target="_blank">

				<input type="hidden" name="cmd" value="_xclick-subscriptions">
				<input type="hidden" name="business" value="childfundmexico@childfundmexico.org.mx">
				<input type="hidden" name="notify_url" value="<?php echo site_url('/nuevosproductos-subscription-paypal-ipn/'); ?>" />
				<input type="hidden" id="subscription_name" name="item_name" value="">
				<input type="hidden" name="item_number" value="ChildFund Donativo Mensual">
				<input type="hidden" name="return" value="<?php echo site_url('/post-donativo/'); ?>" />
				<input type="hidden" name="currency_code" value="MXN">
				<input type="hidden" name="lc" value="MX">
				<input type="hidden" name="no_shipping" value="1">
				<input type="hidden" id="subscription_amount" name="a3" value="">
				<input type="hidden" name="p3" value="1">
				<input type="hidden" name="t3" value="M">
				<input type="hidden" name="src" value="1"><!-- Set recurring payments until canceled. -->
				<input type="hidden" name="sra" value="1"><!-- PayPal reattempts failed recurring payments. -->
				<input type='hidden' id='subscription-custom' name='custom' value='' />

			</form>


		</div>

	<?php get_footer(); ?>
