			</div><!-- main -->

			<p class="footer">
				El contenido publicado expresa la opinión del autor y no necesariamente la de Pfizer Nutrición.
				<br />
				Antes de seguir cualquier recomendación sobre la salud y nutrición de su bebé, consulte a su médico.
			</p>

			<div class="footer">

				<img class="leon" src="<?php echo THEMEPATH ?>/images/leon.png" />

				<div class="barra_footer">
					<div id="cont_politicas">
						<p> <a href="#"  id="privToggle">Política de privacidad</a></p>
						<p class="terms"> <a href="#" id="termsToggle">Términos y condiciones</a></p>
					</div>
				</div><!-- barra_footer -->

				<div id="terminos">
				  <?php get_template_part( 'templates/academia', 'terminos' ); ?>
				</div>
				<div id="privacy">
				  <?php get_template_part( 'templates/academia', 'privacy' ); ?>
				</div>

			</div><!-- footer -->

		</div><!-- container -->

	<?php wp_footer(); ?>

	</body>

</html>