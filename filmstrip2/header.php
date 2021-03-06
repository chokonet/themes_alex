<!doctype html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->

	<div id="container">

		<div id="palomitas_left"></div>
		<div class="content">

			<div id="header">
				<div class="top-header"></div>
				<ul class="redes">
					<li class="facebook"></li>
					<li class="tweet"></li>
					<li class="printerest"></li>
					<li class="youtube"></li>
				</ul>
				<h1 id="logo">Film</h1>
			   <ul class="nav">
					<li class="bt-left"><a href="<?php echo site_url('/servicios/'); ?>">Servicios</a></li>
					<li><a href="<?php echo site_url('/category/primicias/'); ?>">Primicias</a></li>
					<li><a href="<?php echo site_url('/category/trailers/'); ?>">Trailers</a></li>
					<li><a href="<?php echo site_url('/category/nanometrajes/'); ?>">Nanometrajes</a></li>
					<li><a href="#">Estrenos</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url('/category/estrenos-cine/'); ?>">Cine</a></li>
							<li><a href="<?php echo site_url('/category/estrenos-dvdbr/'); ?>">DVD/BR</a></li>
						</ul>
					</li>
					<li class="bt-rigth"><a href="#">Contacto</a></li>
			   </ul>
			</div> <!-- header -->
