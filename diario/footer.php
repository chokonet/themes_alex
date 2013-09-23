
			<p class="footer">
				Queda estrictamente prohibido utilizar imágenes, ofensivas, de carácter sexual, que vayan en contra de las buenas costumbres,
				uso de palabras altisonantes u ofensivas, material discriminatorio, etc. y/o que puedan encuadrarse dentro del artículo 202
				del Código Penal Federal y sus artículos correspondientes en las demás legislaciones locales. Nos reservamos el derecho de
				bloquear a los usuarios que infrinjan los términos y condiciones de uso.
			</p>

			<div class="footer">

				<img class="leon" src="<?php echo THEMEPATH ?>/images/leon.png" width="100" height="159" />

				<div class="barra_footer">
					<div id="cont_politicas">
						<p> <a href="#"  id="privToggle">Política de privacidad</a></p>
						<p class="terms"> <a href="#" id="termsToggle">Términos y condiciones</a></p>
					</div>
				</div><!-- barra_footer -->

				<div id="terminos">
				  <?php get_template_part( 'templates/diario', 'terminos' ); ?>
				</div>
				<div id="privacy">
				  <?php get_template_part( 'templates/diario', 'privacy' ); ?>
				</div>

			</div><!-- footer -->

		</div><!-- container -->

	<?php wp_footer(); ?>

	</body>

</html>