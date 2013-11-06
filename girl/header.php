<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
		<title>BeMyGirl.ch</title>
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/bemygirl.ico" type="image/vnd.microsoft.icon">
		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="fb-root"></div>
		<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<div  class="container"><!--inicia page-container  -->
			<!-- header-->
			<div id="header" >

				<div class="sideMenuTrigger">
					<a id="sidrTrigger" href="#sidr">
						<img src="<?php echo THEMEPATH; ?>/images/sideTrigger.png" alt="menu lateral">
					</a>
				</div>

				<?php get_template_part( 'templates/header', 'nav-mobile' ); ?>

				<span id="logo"><a href="<?php bloginfo('url'); ?>" rel="home" title="Home"><img src="<?php bloginfo('template_url'); ?>/images/logo-bmg.png" alt="Home" title="Home" ></a></span>

				<div id="search-box">
					<div class="user-loged"></div>
					<div class="content">
						<ul class="menu">
							<li class="first leaf"><a href="<?php bloginfo('url'); ?>/login/" class="signin-menu-item"><?php _e('Sign in', 'bemygirl'); ?></a></li>
							<li class="leaf"><a href="<?php bloginfo('url'); ?>" title="Home menu" class="home-menu-item"><?php _e('Home', 'bemygirl'); ?></a></li>
							<li class="leaf"><a href="<?php bloginfo('url'); ?>/register/" class="register-menu-item"><?php _e('Register', 'bemygirl'); ?></a></li>
							<li class="last leaf"><a href="<?php bloginfo('url'); ?>/contact/" class="contact-menu-item"><?php _e('Contact', 'bemygirl'); ?></a></li>
						</ul>
					</div>
					<div class="content_leng">
						<?php qtrans_generateLanguageSelectCode('text', 'idioma'); ?> <!--  #idioma-chooser -->
						<span class="divisor">/</span>
					</div>
					<div class="content_search">
						<form class="forma_buscar" method="get" action="<?php echo home_url('/'); ?>">
							<input type="submit" value="">
							<input type="text" name="s" value="Enter search keywords..." onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
						</form><!-- forma_buscar boton_barra -->
					</div>
				</div><!-- search-box -->

				<?php get_template_part( 'templates/header', 'nav' ); ?>

			</div> <!-- end header-->