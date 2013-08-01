<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width" />
		<title>Ana Vásquez</title>
		<link rel="shortcut icon" href="http://anavasquez.com/wp-content/uploads/2011/12/Lupaok.jpg">
		<?php wp_head(); ?>

	</head>

	<body>
		<div id="container" class="home">

			<div id="header">

				<div id="logo">
					<h1><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo_ana.png" alt="Ana Vásquez" /></a></h1>
				</div><!-- logo -->

				<div id="banner">
					<img src="<?php bloginfo('template_url'); ?>/images/banner.jpg">
				</div><!-- banner -->

				<ul id="nav">

					<li class="nav_li"><a href="<?php echo home_url(); ?>">Home</a></li>
					<li class="nav_li"><a href="<?php echo home_url('/category/ana-vasquez-colmenares/') ?>">Ana Vásquez</a>
						<ul class="submenu sub_center">
							<li class="submenu_li"><a href="<?php echo home_url('/quien-es-ana-vasquez-colmenares/'); ?>">¿Quién es?</a></li>
							<li class="submenu_li"><a href="<?php echo home_url('/category/ana-vasquez-colmenares/blog-de-ana/'); ?>">Blog de Ana</a></li>
							<li class="submenu_li"><a href="<?php echo home_url('/category/ana-vasquez-colmenares/conferencias/'); ?>">Conferencias</a></li>
						</ul>
					</li>
					<li class="nav_li"><a href="<?php echo home_url('category/branding-personal/') ?>">Branding Personal</a>
						<ul class="submenu sub_center2">
							<li class="submenu_li"><a href="<?php echo home_url('/que-es-branding-personal'); ?>">¿Qué es?</a></li>
							<li class="submenu_li"><a href="<?php echo home_url('/category/articulos') ?>" class="pD">Artículos</a>
								<ul class="subsubmenu ">
									<li class="subsubmenu_li"><a href="<?php echo home_url('/category/articulos/branding-femenino/'); ?>">Branding Femenino</a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/category/articulos/branding-masculino/'); ?>">Branding Masculino</a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/category/articulos/branding-laboral/'); ?>">Branding Laboral</a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/category/articulos/branding-y-etiqueta/'); ?>">Branding y Etiqueta</a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/category/articulos/salud-y-bienestar/'); ?>">Salud y Bienestar</a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/category/articulos/estilo-de-vida/'); ?>">Estilo de Vida</a></li>
								</ul>
							</li>
							<li class="submenu_li"><a href="<?php echo home_url('/category/asesorias') ?>" >Asesorías</a>
									<ul class="subsubmenu">
									<li class="subsubmenu_li"><a href="<?php echo home_url('/asesoria-de-imagen-completa/'); ?>">Imagen Completa </a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/imagen-basica-de-rostro-2/'); ?>">Imagen Básica de Rostro </a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/imagen-basica-de-cuerpo/'); ?>">Imagen Básica de Cuerpo </a></li>
									<li class="subsubmenu_li"><a href="<?php echo home_url('/analisis-de-color/'); ?>">Análisis de Color </a></li>

								</ul>
							</li>
							<li class="submenu_li"><a href="<?php echo home_url('/category/diccionario/'); ?>">Diccionario</a></li>
							<li class="submenu_li"><a href="<?php echo home_url('/category/videos/'); ?>">Videos</a></li>
							<li class="submenu_li"><a href="<?php echo home_url('/category/cursos/'); ?>">Cursos</a></li>
						</ul>
					</li>
					<li class="nav_li"><a href="<?php echo home_url('/category/equipo') ?>">Equipo</a></li>

				</ul><!-- nav -->

				<div id="contacto">
					<ul id="social">
						<li> <a id="mail" href="#"> </a> </li>
						<li> <a id="twitter" href="http://twitter.com/anavasquezc" target="_blank"> </a> </li>
						<li> <a id="facebook" href="http://www.facebook.com/pages/Ana-Vasquez-Experta-en-Branding-Personal/147411208620150" target="_blank"> </a> </li>
						<li> <a id="youtube" href="http://www.youtube.com/user/AnaVasquezTV" target="_blank"> </a> </li>
						<li> <a id="linkedin" href="http://mx.linkedin.com/pub/ana-vasquez-colmenares/0/1bb/510" target="_blank"> </a> </li>
						<li> <a id="rss" href="#"> </a> </li>
					</ul><!-- social -->

					<form id="form_busqueda" method="get" action="<?php echo home_url('/'); ?>">
						<input type="text" name="s" value="Buscar" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" placeholder="<?php esc_attr_e( '' ); ?>">
						<input type="submit" value="">
					</form><!-- form_busqueda -->
				</div><!-- contacto -->


			</div><!-- header -->
			<div class="clear"></div>