<!doctype html>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Diario de tu bebé, Academia Bebé Gold">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
		<title><?php bloginfo('title'); ?></title>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div class="overlay">
			<img src="<?php echo THEMEPATH ?>/images/loader.gif" />
		</div>

		<?php global $current_user; get_currentuserinfo(); ?>

		<div id="fb-root">
			<!-- Place holder for the Facebook javascript API script to attach elements to the DOM -->
		</div>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->

		<!-- POP UPS  -->

		<div id="popup_fondo" class=""></div>

		<div id="registro-inicial" class="popups_diario drop_pop">
			<div class="labelContainer"><p class="pink uppercase">¡BIENVENIDA!</p></div>
			<p class="blue description_pop">Antes de empezar, cuéntanos si ya nació tu bebé o estás embarazada.</p>
			<div class="boton_pop pinkBtn rounded drop" id="bt-estoy-embarazada" >Estoy embarazada</div>
			<div class="boton_pop orange rounded drop" id="bt-soy-mama">Ya soy mamá</div>
		</div><!-- fin registro inicial -->

		<?php get_template_part( 'templates/pop-up/part', 'registro-mama' ); ?>

		<?php get_template_part( 'templates/pop-up/part', 'registro-ya-nacio' ); ?>

		<?php get_template_part( 'templates/pop-up/part', 'bienvenidaDiario' ); ?>

		<?php get_template_part( 'templates/pop-up/part', 'crearAlerta' ); ?>

		<?php get_template_part( 'templates/pop-up/part', 'generarLogro' ); ?>

		<?php get_template_part( 'templates/pop-up/part', 'compartirAlbum' ); ?>

		<?php get_template_part( 'templates/pop-up/part', 'foto-album' ); ?>

		<!-- FIN POP UPS  -->

		<header id="main">

			<section id="logos">
				<div class="logo main logoDiario"></div>
				<div class="logo logoAcademia"></div>
			</section>

			<?php
				get_template_part( 'templates/cambiar-foto/perfil', 'foto' );
				get_template_part( 'templates/cambiar-foto/perfil', 'cambiar' );
				get_template_part( 'templates/cambiar-foto/perfil', 'facebook' );
				get_template_part( 'templates/cambiar-foto/perfil', 'computadora' ); ?>

		</header>

		<div class="container">
			<div class="fondo_dorado"></div>
