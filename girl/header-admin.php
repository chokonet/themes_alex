<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
		<title>BeMyGirl.ch</title>
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/bemygirl.ico" type="image/vnd.microsoft.icon">
		<?php wp_head(); ?>
	</head>

	<body class="admin">
		<?php $object = get_queried_object() ?>

		<div  class="container"><!--inicia page-container  -->
			<!-- header-->
			<div id="header" >
				<?php $objeto = get_queried_object();?>


				<div class="sideMenuTrigger"><a id="sidrTrigger" href="#sidr"><img src="<?php echo THEMEPATH; ?>/images/sideTrigger.png" alt="menu lateral"></a></div>
					<div id="sidr">
						<ul>
							<li class="title"><?php _e('Search', 'bemygirl'); ?>
								<ul>
									<li>
										<div class="content_search">
											<form class="forma_buscar" method="get" action="<?php bloginfo('url'); ?>/">
												<input type="submit" value="">
												<input type="text" name="s" value="Enter search keywords..." onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
											</form><!-- forma_buscar boton_barra -->
										</div>
									</li>
								</ul>
							</li>
							<li class="title"><?php _e('Contact', 'bemygirl'); ?>
								<ul>
									<li><a href="<?php bloginfo('url'); ?>/login/"><?php _e('Sign in', 'bemygirl'); ?></a></li>
									<li><a href="<?php bloginfo('url'); ?>/register/"><?php _e('Register', 'bemygirl'); ?></a></li>
									<li class="last"><a href="<?php bloginfo('url'); ?>/contact/">Contact</a></li>
								</ul>
							</li>
							<li class="title"><?php _e('Languages', 'bemygirl'); ?>
								<ul>
									<li><a href="<?php echo SITEURL ?>">English</a></li>
									<li class="last"><a href="<?php echo SITEURL ?>/fr/">Français</a></li>
								</ul>
							</li>
							<li class="title"><?php _e('Menu', 'bemygirl'); ?>
								<ul>
									<li><a href="<?php bloginfo('url'); ?>/advanced-search/"><?php _e('Advanced search', 'bemygirl'); ?></a></li>
									<li><a href="<?php bloginfo('url'); ?>/frequent-questions/">FAQ</a></li>
									<li class="last"><a href="#"> <?php _e('Costumer Support', 'bemygirl'); ?></a></li>
								</ul>
							</li>
						</ul>
					</div>

					<span id="logo"><a href="<?php bloginfo('url'); ?>" rel="home" title="Home"><img src="<?php bloginfo('template_url'); ?>/images/logo-bmg.png" alt="Home" title="Home" ></a></span>

					<div id="search-box">
						<div class="user-loged">
					</div>
					<div class="content">
						<ul class="menu">
							<li class="last leaf"><a href="<?php bloginfo('url'); ?>/contact/" class=""><?php _e('User', 'bemygirl'); ?></a></li>
							<li class="last leaf"><a href="<?php bloginfo('url'); ?>/contact/" class="user-name"><?php _e('romaingruner', 'bemygirl'); ?></a></li>
							<li class="first leaf"><a href="<?php bloginfo('url'); ?>/login/" class="signin-menu-item"><?php _e('Sign in', 'bemygirl'); ?></a></li>
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
				</div>

				<div class="nav">
					<ul id="nav">
						<a href="<?php bloginfo('url'); ?>/dashboard/" ><li class="nav_li"  <?php if(is_page('dashboard')):?>id="active"<?php endif; ?> ><?php _e('Dashboard', 'bemygirl'); ?></li></a>
						<a href="<?php bloginfo('url'); ?>/edit/" ><li class="nav_li" <?php if(is_page('edit')):?>id="active"<?php endif; ?>><?php _e('My Account', 'bemygirl'); ?></li></a>
						<a href="<?php bloginfo('url'); ?>/users/" ><li class="nav_li" <?php if((is_page('users')) or (is_page('create-users'))):?>id="active"<?php endif; ?> ><?php _e('Users', 'bemygirl'); ?></li></a>
						<a href="<?php bloginfo('url'); ?>/members/" ><li class="nav_li" <?php if(is_page('members')):?>id="active"<?php endif; ?>> <?php _e('Members', 'bemygirl'); ?></li></a>
						<a href="<?php bloginfo('url'); ?>/#/" ><li class="nav_li" <?php if(is_page('#')):?>id="active"<?php endif; ?>> <?php _e('Reports', 'bemygirl'); ?></li></a>
					</ul>
				</div>
			</div> <!-- fin header-->