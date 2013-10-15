<!doctype html>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
		<title><?php bloginfo('name'); ?></title>
		<script type="text/javascript"> if (window.location.hash == '#_=_') window.location.hash = ''; </script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?> >

		<div id="fb-root">
			<!-- Place holder for the Facebook javascript API script to attach elements to the DOM -->
		</div>

		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->

		<div class="container">

			<div class="fondo_dorado"></div>

				<?php get_template_part( 'templates/header', 'barra' ); ?>

				<h1>
					<a href="<?php echo site_url(); ?>">
						<img class="logo" src="<?php echo THEMEPATH ?>/images/leon_escudo.png" alt="Progress Gold"  />
					</a>
				</h1>

				<div class="main">

					<?php get_template_part( 'templates/header', 'main' ); ?>