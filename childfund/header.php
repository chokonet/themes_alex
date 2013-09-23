<!DOCTYPE html>
<html>
<head>

	<meta charset='utf-8' />

	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed. --> Tomado del tema Twenty Eleven
		 */
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

		?></title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />



	<!--[if IE]>
		<script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<!-- Google Analytics -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-28955985-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="aviso-container" class="hidden">
		<div class="content-aviso-privacidad">

			<img class="cerrar" src="<?php bloginfo('template_url'); ?>/images/cerrar.png" />

			<h1 style="text-align:center;">AVISO DE PRIVACIDAD</h1>

			<p><strong>Fondo para Niños de México A.C.</strong>(en lo sucesivo, “ChildFund México” o el “Responsable”), con domicilio en Av. Patriotismo #889 3er Piso Col. Insurgentes Mixcoac, C.P. 03920, Del. Benito Juarez, es responsable de recabar sus datos personales, del uso que se le dé a los mismos, así como de  su protección. En estricto cumplimiento a lo establecido en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (la “Ley”) y su Reglamento, el Responsable hace de su conocimiento lo siguiente:</p>

			<p>Los Datos Personales que Usted, de manera libre y voluntaria, proporcione al Responsable directa o personalmente, se utilizan únicamente para los siguientes fines: (i) para la administración de fondos de beneficencia para el desarrollo comunitario y programas humanitarios en favor de niños necesitados en la Republica Mexicana; (ii) para la identificación y verificación del donador; (iii) contacto, y; (iv) para informar al titular sobre su estatus como donador.</p>

			<p>Para los fines antes señalados, requerimos obtener de Usted los siguientes datos personales: nombre(s) y apellidos, domicilio, teléfonos, correo electrónico y número de tarjeta de crédito o débito.</p>

			<p>El Responsable tiene implementadas medidas de seguridad administrativas, técnicas y físicas para proteger sus Datos Personales, mismas que igualmente exigimos sean cumplidas por los proveedores de servicios que contratamos. Toda la información agregada y datos personales que se obtengan de Usted, ya sea a través del uso de nuestro sitio <a href="<?php site_url(); ?>">www.childfundmexico.org.mx</a>, a través de correo electrónico o personalmente, constituirá una base de datos propiedad del Responsable, información que es almacenada con el fin de protegerla y evitar su pérdida, uso indebido, o alteración.</p>

			<p>El área responsable del manejo y administración de sus Datos Personales es la Gerencia de Patrocinio de ChildFund México, misma que puede ser contactada mediante correo electrónico, a la dirección <a href="mail: valerias@childfundmexico.org.mx">valerias@childfundmexico.org.mx</a>, o físicamente en las instalaciones del Responsable, ubicadas en Av. Patriotismo #889 3er Piso. Col. Insurgentes Mixcoac. C.P.03920.</p>

			<p>Usted tiene derecho, en todo momento, de acceder, rectificar y cancelar sus datos personales, así como de oponerse al tratamiento de los mismos y/o revocar el consentimiento que para tal fin nos haya otorgado, a través de los procedimientos que para dichos efectos ponemos su disposición.</p>

			<p>Los mecanismos que se han implementado para el ejercicio de sus Derechos ARCO son a través de la presentación de la solicitud respectiva, poniendo a su disposición dos canales para realizar el trámite:</p>

			<ul><strong>Proceso en las instalaciones del Responsable:</strong>
				<li>Dirigirse al área de Gerencia de Patrocinio en las oficinas de ChildFund México.</li>
				<li>Indicar al responsable del área de protección de datos personales que desea realizar alguna rectificación, cancelación u oposición a sus Datos Personales.</li>
				<li>Acreditar su identidad mostrando una identificación oficial vigente con fotografía.</li>
				<li>Firmar el formato correspondiente, mismo que será llenado por el responsable del área de protección de datos personales, en donde asentará la rectificación, cancelación y oposición a los datos que Usted solicite y al cabo de 15 (quince) días hábiles estos se verán reflejados en el sistema del Responsable.</li>
				<li>Indicar, en su caso, de las modificaciones a realizarse y/o las limitaciones al uso de los Datos Personales y aportar la documentación que sustente su petición.</li>
				<li>Tratándose de solicitudes de acceso a Datos Personales, los mismos le serán entregados directamente en las oficinas de ChildFund México en un plazo que no excederá de 3 (tres) días hábiles contados a partir de la fecha de presentación de su solicitud, previa acreditación de su identidad con los documentos señalados en el inciso c) anterior</li>
				<li>Si Usted lo desea puede recibir un correo electrónico de confirmación de que la rectificación o cancelación solicitada fue llevada a cabo, para lo cual sólo deberá indicar a que cuenta de correo desea recibir el aviso.</li>
			</ul>
			<ul><strong>Proceso vía electrónica:</strong>
				<li>Enviar un correo electrónico a la dirección de correo electrónico  <a href="mail: valerias@childfundmexico.org.mx">valerias@childfundmexico.org.mx</a></li>
				<li>Incluir en el cuerpo del correo la descripción clara y precisa de los Datos Personales que solicita rectificar, cancelar u oponer. En el “Asunto” del correo deberá incluir la siguiente leyenda “Solicitud ARCO de Datos Personales”. Con el fin de acreditar su identidad, usted deberá adjuntar al correo copia a color de una identificación oficial vigente con fotografía.</li>
				<li>Indicar, en su caso, de las modificaciones a realizarse y/o las limitaciones al uso de los Datos Personales y aportar la documentación que sustente su petición.</li>
				<li>El departamento responsable realizará las modificaciones pertinentes en el sistema y al cabo de 15 (quince) días hábiles estos se verán reflejados en el sistema del Responsable.</li>
				<li>Usted recibirá un mensaje de confirmación de que la modificación solicitada fue llevada a cabo o, en su caso, de que la información a la que solicitó acceso está disponible, en la cuenta de correo electrónico desde la que hizo la solicitud.</li>
				<li>Tratándose de solicitudes de acceso a Datos Personales, los mismos le serán entregados directamente en las oficinas de ChildFund México en un plazo que no excederá de 3 (tres) días hábiles contados a partir de la fecha de presentación de su solicitud por vía electrónica, previa acreditación de su identidad con los documentos señalados en el inciso b) anterior.</li>
			</ul>

			<p>De conformidad con lo establecido en el artículo 8, último párrafo de la Ley y 21 de su Reglamento, Usted tienen derecho a revocar su consentimiento para el tratamiento de sus Datos Personales.</p>
			<p>Los mecanismos que se han implementado y que el Responsable pone a su disposición para la revocación de su consentimiento para el tratamiento de sus Datos Personales, son los mismos que aquellos descritos en el presente Aviso de Privacidad para el ejercicio de sus Derechos ARCO.</p>
			<p>Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, cualquier modificación o actualización podrá consultarla en <a href="<?php site_url(); ?>">www.childfundmexico.org.mx</a></p>
			<p>Si Usted considera que en algún momento su derecho de protección de Datos Personales ha sido lesionado por cualquier conducta de nuestros empleados o por nuestras actuaciones o respuestas, o presume que en el tratamiento de sus Datos Personales existe alguna violación a las disposiciones previstas en la Ley, podrá interponer la queja o denuncia correspondiente ante el Instituto Federal de Acceso a la Información. Para mayor información, puede dirigirse al sitio <a href="http://www.ifai.org.mx" target="_blank"> www.ifai.org.mx.</a></p>

			<p>Fecha última actualización 8 de julio de 2013</p>

			<p>
				<input type="checkbox" name="autorizo" id="autorizo">
				<strong>Consiento y autorizo que mis datos personales sean tratados conforme a lo previsto en el presente Aviso de Privacidad.</strong>
			<p>
			<?php if( is_page('nuevosproductos') ) :?>
				<p class="boton grande centered" id="submit-aviso-paypal"><a href="#">Aceptar</a></p>
			<?php else :?>
				<p class="boton grande centered" id="submit-aviso-privacidad"><a href="#">Aceptar</a></p>
			<?php endif; ?>
		</div><!-- wrap -->
	</div>


	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=157656561001872";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


	<div id="wrapper" <?php post_class(); ?>>

		<?php
			//Nav menus integrados con WordPress (ver functions.php)
			wp_nav_menu( array( 'theme_location' => 'top_menu', 'container' => 'nav' ) );
		?>


		<ul id="menu-menu-sociales" class="menu">
			<li id="menu-item-siguenos">Síguenos </li>
			<li><a href="https://twitter.com/childfundmexico" class="afuera"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="Twitter" /></a></li>
			<li><a href="https://facebook.com/childfundmx" class="afuera"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Facebook" /></a></li>
		</ul>


		<h1 class="logo"><a href="<?php echo site_url() ?>" title="ChildFund México 40 años transformando vidas">ChildFund México 40 años transformando vidas</a></h1>

		<?php
		if( is_user_logged_in() ):


			global $wpdb;
			$current_user = wp_get_current_user();
			$nombre_palabras = explode(' ', $current_user->user_firstname);
			$nombre = implode(' ', array_splice($nombre_palabras, 0, 2));

		$redirect_logout = site_url('acceso-padrinos'); ?>
		<p class="logout">Sesión iniciada como <?php echo $nombre; ?> <a href="<?php echo site_url('acceso-padrinos'); ?>">Acceso a padrinos</a> | <a href="<?php echo wp_logout_url( $redirect_logout ); ?>">Cerrar sesión</a></p>

		<?php endif; ?>

		<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container' => 'nav' ) ); ?>

		<div id="main-content">
