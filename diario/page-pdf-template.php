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
	<body>


		<div id="fb-root">
			<!-- Place holder for the Facebook javascript API script to attach elements to the DOM -->
		</div>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div id="contenido_pdf">
			<div class="portada">
				<div class="imagen-content">
					<img src="<?php echo THEMEPATH ?>images/imagen-pdf.jpg" id="img-portada">
					<img src="<?php echo THEMEPATH ?>images/esq-1.png" id="esquina-1">
					<img src="<?php echo THEMEPATH ?>images/esq-2.png" id="esquina-2">
					<img src="<?php echo THEMEPATH ?>images/esq-3.png" id="esquina-3">
					<img src="<?php echo THEMEPATH ?>images/esq-4.png" id="esquina-4">
				</div>
				<!-- clases para texto -->
				<!-- embarazo (portadaEmbarazo) -->
				<!-- 0 a 6 meses (portada0a6) -->
				<!-- 6 a 12 meses (portada6a12) -->
				<!-- 1 a 3 años (portada1a3) -->
				<p class="portadaEmbarazo">Aquí va el texto del milestone</p>
			</div>
		</div>

	</body>
</html>