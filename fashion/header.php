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

	<div class="container">
		<div class="header <?php pasa_class_theme(); ?>">
			<span id="redes_idioma">
				<div id="idioma">
					<?php qtrans_generateLanguageSelectCode('text', 'idioma'); ?> <!--  #idioma-chooser -->
					<span class="line">/</span>
				</div>
				<div id="tweet">tweet</div>
				<div id="facebook">facebook</div>
			</span>
			<h1 class="logo">Fashion Depot</h1>
			<ul class="nav">
				<li><h2><a href="<?php bloginfo('url'); ?>"><?php _e('NOSOTROS', 'fashion'); ?></a></h2>
					<ul class="submnu">
						<li><a class="ancla" href="<?php bloginfo('url'); ?>#acerca_de"><?php _e('ACERCA DE', 'fashion'); ?></a></li>
						<li><a class="ancla" href="<?php bloginfo('url'); ?>#clientes"><?php _e('CLIENTES', 'fashion'); ?></a></li>
					</ul>
				</li>
				<li><h2><a href="<?php bloginfo('url'); ?>/productos/"><?php _e('PRODUCTOS', 'fashion'); ?></a></h2>
					<ul class="submnu">
						<li><a class="ancla" href="<?php bloginfo('url'); ?>/productos/#marcas"><?php _e('MARCAS', 'fashion'); ?></a></li>
						<li><a class="ancla" href="<?php bloginfo('url'); ?>/productos/#marcas_propias"><?php _e('MARCAS PROPIAS', 'fashion'); ?></a></li>
					</ul>
				</li>
				<li><h2><a href="<?php bloginfo('url'); ?>/contacto/"><?php _e('CONTACTO', 'fashion'); ?></a></h2>
					<ul class="submnu">
						<li><a class="ancla" href="<?php bloginfo('url'); ?>/contacto/#escribenos"><?php _e('ESCRÍBENOS', 'fashion'); ?></a></li>
						<li><a class="ancla" href="<?php bloginfo('url'); ?>/contacto/#sevicio_clientes"><?php _e('SERVICIO A CLIENTES', 'fashion'); ?></a></li>
					</ul>
				</li>
			</ul>
		</div><!-- fin header -->
