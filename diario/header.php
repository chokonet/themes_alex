<!doctype html>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Diario de tu bebé, Academia Bebé Gold">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
		<title><?php print_title(); ?></title>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>

		<?php global $current_user; get_currentuserinfo(); ?>

		<div id="fb-root">
			<!-- Place holder for the Facebook javascript API script to attach elements to the DOM -->
		</div>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<header id="main">
			<section id="logos" class="center">
				<div class="logo logoAcademia"><img src="<?php echo THEMEPATH ?>images/leon_escudo.png" alt="Academia bebé Gold" width="196" height="170"></div>
				<div class="logo main logoDiario"><img src="<?php echo THEMEPATH ?>images/logo_diario.png" alt="Diario de mi bebé" width="260" height="220"></div>
				<div class="logo subeFoto">
					<img src="<?php echo THEMEPATH ?>images/foto_nina.png" alt="Sube aqui tu foto">
					<p class="white">¡Míralo crecer!</p>
					<p class="blue">Sube aquí tu foto semanal</p>
				</div>
			</section>
			<section id="cover">
				<img class="foto_cover" id="fotoCoverA" src="<?php echo THEMEPATH ?>images/cover_picA.jpg" alt="Laura y camila">
				<img class="foto_cover" id="fotoCoverB" src="<?php echo THEMEPATH ?>images/cover_picB.jpg" alt="Laura y camila">
				<img class="foto_cover" id="fotoCoverC" src="<?php echo THEMEPATH ?>images/cover_picC.jpg" alt="Laura y camila">
				<img class="foto_cover" id="fotoCoverD" src="<?php echo THEMEPATH ?>images/cover_picD.jpg" alt="Laura y camila">
				<p>Laura y <span class="blue"><?php echo $current_user->display_name; ?></span></p>
			</section>
		</header>

		<div class="container">