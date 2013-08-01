<?php get_header(); ?>

	<div class="ninos_ind">

		<h2>Registro de intención de apadrinamiento</h2>

		<p>Envíanos tus datos, nos pondremos en contacto contigo.</p>

		<form id="datos_padrino" method="post" action="<?php echo site_url('intencion-de-apadrinar/gracias'); ?>">
			<input type="hidden" name="nino_id" value="<?php echo $_GET['nino']; ?>" />
			<label> Nombre:<input type="text" name="nombre_padrino" value="" class="required" /></label>
			<label> Teléfono:<input type="text" name="tel_padrino" value="" class="required" /></label>
			<label> Mail:<input type="text" name="mail_padrino" value="" class="required email" /></label>
			<label> Celular:<input type="text" name="cel_padrino" value="" class="required" /></label>
			<input id="submit-intencion-apadrinar" class="boton grande" type="submit" value="Apadrínalo" />
		</form>

		<?php $nino = get_post($_GET['nino']); ?>

		<div class="ficha">
			<?php echo get_the_post_thumbnail( $nino->ID, 'ninos-interior'); ?>
			<h3 class="hola">Datos del niño:</h3>
			<h3><?php echo $nino->post_title; ?></h3>
			<?php echo apply_filters('the_content', $nino->post_content); ?>
		</div><!-- end .ficha -->

		<div class="datos">

			<h3 class="hola">Más sobre mí:</h3>

			<ul class="post-meta">
				<?php
				$datos = get_post_meta($nino->ID);
				foreach( $datos as $key => $value ):
					if( substr($key, 0, 1) == '_' ) continue;
					echo '<li><span>'.$key.':</span> '.$value[0].'</li>';
				endforeach;
				?>
			</ul>

		</div><!-- end .datos -->

	</div><!-- end .ninos_ind -->

<?php get_footer(); ?>