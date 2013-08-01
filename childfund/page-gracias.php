<?php get_header(); ?>

	<div class="ninos_ind">

		<?php if( filter_var($_POST['mail_padrino'], FILTER_VALIDATE_EMAIL ) ): ?>

		<h2>Muchas gracias, tu información ha sido enviada. Pronto nos pondremos en contacto.</h2>

		<?php
		// Create post object
		$intento_padrino = array(
			'post_title'    => $_POST['mail_padrino'],
			'post_status'   => 'draft',
			'post_type' => 'intencion-padrinos'
		);

		// Insert the post into the database
		$id_intento_padrino = wp_insert_post( $intento_padrino );
		$nino_nombre = get_the_title($_POST['nino_id']);

		update_post_meta( $id_intento_padrino, 'Nombre del padrino', $_POST['nombre_padrino'] );
		update_post_meta( $id_intento_padrino, 'Mail del padrino', $_POST['mail_padrino'] );
		update_post_meta( $id_intento_padrino, 'Teléfono del padrino', $_POST['tel_padrino'] );
		update_post_meta( $id_intento_padrino, 'Celular del padrino', $_POST['cel_padrino'] );
		update_post_meta( $id_intento_padrino, 'Niño apadrinado', $nino_nombre );
		update_post_meta( $id_intento_padrino, 'Niño ID', $_POST['nino_id'] );
		wp_set_object_terms( $_POST['nino_id'], 'en-proceso', 'estatus_ninos' );

		$headers = 'From: ChildFund México <quieroapadrinar@childfundmexico.org.mx>' . "\r\n";
		$message = 'Hola! Hay un nuevo padrino registrado desde el sitio'. "\r\n\r\n";
		$message .= 'Quiere apadrinar a: '.$nino_nombre. "\r\n";
		$message .= 'Su nombre es: '.$_POST['nombre_padrino']. "\r\n";
		$message .= 'Su mail es: '.$_POST['mail_padrino']. "\r\n";
		$message .= 'Su teléfono es: '.$_POST['tel_padrino']. "\r\n";
		$message .= 'Su celular es: '.$_POST['cel_padrino']. "\r\n";
		wp_mail('noricumbo@gmail.com', 'Nuevo padrino en el sitio ChildFund México', $message, $headers);
		wp_mail('quieroapadrinar@childfundmexico.org.mx', 'Nuevo padrino en el sitio ChildFund México', $message, $headers);

		else: ?>

		<h2>No llegaron tus datos, por favor inténtalo de nuevo.</h2>

		<?php endif; ?>

	</div><!-- end .ninos_ind -->

<?php get_footer(); ?>