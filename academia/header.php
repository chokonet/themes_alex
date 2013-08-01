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


		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'academia' ), max( $paged, $page ) );

		?></title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />



	<!--[if IE]>
		<script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="container">

		<div class="fondo_dorado"></div>

		<div class="barra_header">

			<button class="boton_barra azul">
				Mi Actividad
			</button><!-- botton_barra -->

			<button class="boton_barra azul">
				Mis Favoritos
			</button><!-- botton_barra -->

			<div class="boton_barra rosa compartir">

				<img class="user" src="<?php bloginfo('template_url'); ?>/images/bebe_wide.jpg" />
				<p>Compartir mis lecturas</p>

			</div><!-- boton_barra -->

			<div class="boton_barra rosa buscar">
				<form class="forma_buscar" method="get" action="<?php echo home_url('/'); ?>">
					<input type="submit" value="">
					<input type="text" name="s" value="buscar" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
				</form><!-- forma_buscar boton_barra -->
				
			</div><!-- boton_barra -->

		</div><!-- barra_header -->

		<h1>
			<a href="<?php echo home_url(); ?>">
				<img src="<?php bloginfo('template_url'); ?>/images/leon_escudo.png" alt="Progress Gold"  />
			</a>
		</h1>

		<div class="main">

			<div class="header_main">

				<h2>¿En qué etapa están?</h2>

				<ul class="nav_main">
					<li class="embarazo">
						<a href="<?php echo home_url('/category/prepi/'); ?>" id="as"><p>Prepi</p></a>
						<h3 class="embarazo_texto" ><a href="<?php echo home_url('/category/prepi/'); ?>">Mi Embarazo</a></h3>
					</li>
					<li class="primeros">
						<a href="<?php echo home_url('/category/0-6-meses/'); ?>"><p>0-6 Meses</p>
						<h3 class="primeros_texto" ><a href="<?php echo home_url('/category/0-6-meses/'); ?>">Mis Primeros Momentos</a></h3>
					</li>
					<li class="sorpresas">
						<a href="<?php echo home_url('/category/6-12-meses/'); ?>"><p>6-12 Meses</p></a>
						<h3 class="sorpresas_texto" ><a href="<?php echo home_url('/category/6-12-meses/'); ?>">Sorpresas Cada Día</a></h3>
					</li>
					<li class="descubriendo">
						<a href="<?php echo home_url('/category/1-3-anos/'); ?>"><p>1-3 años</p></a>
						<h3 class="descubriendo_texto" ><a href="<?php echo home_url('/category/1-3-anos/'); ?>">Descubriendo El Mundo</a></h3>
					</li>
				</ul><!-- nav_main -->

			</div><!-- header_main -->

