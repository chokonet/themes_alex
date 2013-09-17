<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Ana Vásquez</title>
		<link rel="shortcut icon" href="http://anavasquez.com/wp-content/uploads/2011/12/Lupaok.jpg">
		<?php wp_head(); ?>

	</head>

	<body>

		<?php define( 'SITEURL', site_url() ) ?>

		<div id="container" class="home">

			<div id="header">

				<div id="logo">
					<h1><a href="<?php echo SITEURL; ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo_ana.png" alt="Ana Vásquez" /></a></h1>
				</div><!-- logo -->

				<div id="banner">
					<!-- Google Adsense -->
					<div class="adsense_leaderboard">
						<script type="text/javascript">
						google_ad_client = "ca-pub-5042601521790259";
						/* Header */
						google_ad_slot = "4624226151";
						google_ad_width = 728;
						google_ad_height = 90;
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
					</div>
				</div><!-- banner -->

				<div id="contacto">
					<ul id="social">
						<li> <a id="mail" href="<?php echo home_url('/consulta-a-ana/'); ?>"> </a> </li>
						<li> <a id="twitter" href="http://twitter.com/consejosdeana" target="_blank"> </a> </li>
						<li> <a id="facebook" href="http://www.facebook.com/pages/Ana-Vasquez-Experta-en-Branding-Personal/147411208620150" target="_blank"> </a> </li>
						<li> <a id="youtube" href="http://www.youtube.com/user/AnaVasquezTV" target="_blank"> </a> </li>
						<li> <a id="linkedin" href="http://mx.linkedin.com/pub/ana-vasquez-colmenares/0/1bb/510" target="_blank"> </a> </li>
						<li> <a id="rss" href="<?php bloginfo('rss2_url'); ?>" target="_blank"> </a> </li>
					</ul><!-- social -->

					<form id="form_busqueda" method="get" action="<?php echo SITEURL ?>">
						<input type="text" name="s" value="Buscar" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" placeholder="<?php esc_attr_e( '' ); ?>">
						<input type="submit" value="">
					</form><!-- form_busqueda -->
				</div><!-- contacto -->
				<div id="banner_responsive">
					<!-- Google Adsense 468 x 60 px -->
					<div class="adsense_leaderboard">
						<script type="text/javascript">
						google_ad_client = "ca-pub-5042601521790259";
						/* Header */
						google_ad_slot = "4624226151";
						google_ad_width = 468;
						google_ad_height = 60;
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
					</div>
				</div><!-- banner responsive-->
				<div class="nav_mobile ">
					MENÚ
				</div>


				<div class="menu_mobile">
					<ul>
						<a href="<?php echo SITEURL ?>"><li>Home</li></a>

						<li class="abre_submenu">Ana Vásquez</li>
							<div class="submenu_mobile">
								<ul>
										<a href="<?php echo SITEURL ?>/category/ana-vasquez-colmenares/"><li class="submenu_mobile_li">Ana Vásquez</li></a>
										<a href="<?php echo SITEURL ?>/quien-es-ana-vasquez-colmenares/"><li class="submenu_mobile_li">¿Quién es?</li></a>
										<a href="<?php echo SITEURL ?>/category/ana-vasquez-colmenares/blog-de-ana/"><li class="submenu_mobile_li">Blog de Ana</li></a>
								</ul>
							</div>

							<li class="abre_submenu">Branding Personal</li>
							<div class="submenu_mobile">
								<ul>
									<a href="<?php echo home_url('category/branding-personal/') ?>"><li class="submenu_mobile_li">Branding Personal</li></a>
									<a href="<?php echo SITEURL ?>/que-es-branding-personal"><li class="submenu_mobile_li">¿Qué es?</li></a>

										<li class="submenu_mobile_li abre_subsubmenu"><a href="<?php echo SITEURL ?>/category/articulos')" class="pD">Artículos</a></li>
										<div class="subsubmenu_mobile">
											<ul>
												<a href="<?php echo SITEURL ?>/category/articulos/branding-femenino/"><li class="subsubmenu_mobile_li">Branding Femenino</li></a>
												<a href="<?php echo SITEURL ?>/category/articulos/branding-masculino/"><li class="subsubmenu_mobile_li">Branding Masculino</li></a>
												<a href="<?php echo SITEURL ?>/category/articulos/branding-laboral/"><li class="subsubmenu_mobile_li">Branding Laboral</li></a>
												<a href="<?php echo SITEURL ?>/category/articulos/branding-y-etiqueta/"><li class="subsubmenu_mobile_li">Branding y Etiqueta</li></a>
												<a href="<?php echo SITEURL ?>/category/articulos/salud-y-bienestar/"><li class="subsubmenu_mobile_li">Salud y Bienestar</li></a>
												<a href="<?php echo SITEURL ?>/category/articulos/estilo-de-vida/"><li class="subsubmenu_mobile_li">Estilo de Vida</li></a>
											</ul>
										</div>

									<a href="<?php echo SITEURL ?>/category/diccionario/"><li class="submenu_mobile_li">Diccionario</li></a>
									<a href="<?php echo SITEURL ?>/category/videos/"><li class="submenu_mobile_li">Videos</li></a>

								</ul>
							</div>
						<li class="abre_submenu">Asesorías</li>
							<div class="submenu_mobile">
								<ul>
									<a href="<?php echo SITEURL ?>/category/asesorias" ><li class="submenu_mobile_li">Asesorías</li></a>
									<a href="<?php echo SITEURL ?>/asesoria-de-imagen-completa/"><li class="submenu_mobile_li">Imagen Completa </li></a>
									<a href="<?php echo SITEURL ?>/imagen-basica-de-rostro-2/"><li class="submenu_mobile_li">Imagen Básica de Rostro </li></a>
									<a href="<?php echo SITEURL ?>/imagen-basica-de-cuerpo/"><li class="submenu_mobile_li">Imagen Básica de Cuerpo </li></a>
									<a href="<?php echo SITEURL ?>/analisis-de-color/"><li class="submenu_mobile_li">Análisis de Color </li></a>
								</ul>
							</div>
						<a href="<?php echo SITEURL ?>/category/ana-vasquez-colmenares/conferencias/"><li>Conferencias</li></a>
						<a href="<?php echo SITEURL ?>/category/cursos/"><li>Cursos</li></a>
						<a href="<?php echo SITEURL ?>/category/equipo/"><li>Equipo</li></a>

					</ul>
				</div>
				<ul id="nav">

					<li class="nav_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>">Home</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
					<li class="nav_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/ana-vasquez-colmenares/">Ana Vásquez</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?>
						<ul class="submenu sub_center">
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/quien-es-ana-vasquez-colmenares/">¿Quién es?</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/ana-vasquez-colmenares/blog-de-ana/">Blog de Ana</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
						</ul>
					</li>
					<li class="nav_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo home_url('category/branding-personal/') ?>">Branding Personal</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?>
						<ul class="submenu sub_center2">
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/que-es-branding-personal">¿Qué es?</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/articulos')" class="pD">Artículos</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?>
								<ul class="subsubmenu ">
									<li class="subsubmenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/articulos/branding-femenino/">Branding Femenino</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
									<li class="subsubmenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/articulos/branding-masculino/">Branding Masculino</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
									<li class="subsubmenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/articulos/branding-laboral/">Branding Laboral</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
									<li class="subsubmenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/articulos/branding-y-etiqueta/">Branding y Etiqueta</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
									<li class="subsubmenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/articulos/salud-y-bienestar/">Salud y Bienestar</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
									<li class="subsubmenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/articulos/estilo-de-vida/">Estilo de Vida</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
								</ul>
							</li>

							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/diccionario/">Diccionario</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/videos/">Videos</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
						</ul>
					</li>
					<li class="nav_li abajo_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/asesorias" >Asesorías</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?>
						<ul class="submenu submenu_acesorias">
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a class="acesoria" href="<?php echo SITEURL ?>/asesoria-de-imagen-completa/">Imagen Completa </a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a class="acesoria" href="<?php echo SITEURL ?>/imagen-basica-de-rostro-2/">Imagen Básica de Rostro </a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a class="acesoria" href="<?php echo SITEURL ?>/imagen-basica-de-cuerpo/">Imagen Básica de Cuerpo </a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
							<li class="submenu_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a class="acesoria" href="<?php echo SITEURL ?>/analisis-de-color/">Análisis de Color </a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
						</ul>
					</li>
					<li class="nav_li abajo_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/ana-vasquez-colmenares/conferencias/">Conferencias</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>
					<li class="nav_li abajo_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/cursos/">Cursos</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>

					<li class="nav_li abajo_li"><?php if (is_home()): ?><h2><?php else: ?><h3><?php endif; ?><a href="<?php echo SITEURL ?>/category/equipo/">Equipo</a><?php if (is_home()): ?></h2><?php else: ?></h3><?php endif; ?></li>

				</ul><!-- nav -->


			</div><!-- header -->
			<div class="clear"></div>