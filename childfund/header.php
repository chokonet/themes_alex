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

			<p><strong>Child Fund México / Fondo para Niños de México, A.C.,</strong>con domicilio en Av. Patriotismo #889 3er Piso Col. Insurgentes Mixcoac, C.P. 03920, Del. Benito Juarez, es responsable de recabar sus datos personales, del uso que se le dé a los mismos, así como de  su protección.</p>

			<p>Los datos personales recabados serán utilizados para: La procuración de fondos de beneficencia pera desarrollo comunitario y programas humanitarios en favor de niños necesitados en la Republica Mexicana.</p>

			<p>Para el fin antes señalado, requerimos obtener de usted los siguientes datos personales: Nombre(s) y apellidos, domicilio, teléfonos y correo electrónico; N° de Tarjeta de Crédito o Debito y su código de seguridad</p>

			<p>Al respecto, nos comprometemos a que dichos datos personales serán tratados bajo las medidas de seguridad necesarias para garantizar su confidencialidad.</p>

			<p>Usted tiene derecho, en todo momento, de acceder, rectificar y cancelar sus datos personales, así como de oponerse al tratamiento de los mismos y/o revocar el consentimiento que para tal fin nos haya otorgado, a través de los procedimientos que para dichos efectos ponemos su disposición. Para conocer dichos procedimientos, los requisitos y plazos, se puede poner en contacto con la Gerencia de Patrocinio en Av. Patriotismo #889 3er Piso. Col. Insurgentes Mixcoac. C.P.03920, o a los teléfonos: 56 11 77 33, lada sin costo 01800 506 31 61 o a la dirección electrónica: <a href="mailto:valerias@childfundmexico.org.mx">valerias@childfundmexico.org.mx</a>, de Lunes a Viernes de  9:00 a 17:00 hrs, en días hábiles. Tendremos un plazo máximo de 15 días hábiles para atender su petición y le informaremos sobre la procedencia de la misma al correo electrónico que nos haya proporcionado para tales efectos.</p>

			<p>Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, cualquier modificación o actualización podrá consultarla en <a href="<?php site_url(); ?>">www.childfundmexico.org.mx</a></p>

			<p>Fecha última actualización 24 de Octubre de 2012</p>

			<p>
				<input type="checkbox" name="autorizo" id="autorizo">
				<strong>Consiento y autorizo que mis datos personales sean tratados conforme a lo previsto en el presente Aviso de Privacidad.</strong>
			<p>

			<p class="boton grande centered" id="submit-aviso-privacidad"><a href="#">Aceptar</a></p>

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
