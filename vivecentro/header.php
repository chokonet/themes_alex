<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php wp_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">

		<!-- MAPAS -->

		<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpRDGroBfBHDWHllH-WvT_5vcYrmdPPvE&sensor=true"></script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class();?>>
		<div id="fb-root"> </div>

		<div id="wrapper">
			<header>
				<div id="logo">
					<h1><a href="<?php bloginfo('url'); ?>" alt="Vive #en el Centro">Vive #en el Centro</a></h1>
				</div><!-- end #logo -->
					<div id="header-right">
						<div id="secondary-menu">
							<ul>
								<li><a class="login-facebook ">Login</a></li>
								<li><a href="<?php bloginfo('url'); ?>/blog">Blog | </a></li>
								<li><a href="<?php bloginfo('url'); ?>/terminos-y-condiciones">Términos y condiciones | </a></li>
								<li><a href="<?php bloginfo('url'); ?>/acerca-de">Acerca de | </a></li>
							</ul>
						</div><!-- end #secondary-menu -->
						<nav>
							<?php get_template_part('templates/content', 'navegador'); ?>
						</nav>
				</div><!-- #end header-right -->
			</header>
			<div id="content" class="clearfix">
				<div class="content-left">