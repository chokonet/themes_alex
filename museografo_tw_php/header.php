<!doctype HTML 5>
<html>
<?php
	$template_url = get_bloginfo( 'template_url' );
	$current_user = wp_get_current_user();
?>
	<?php wp_head(); ?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<title>Museógrafo</title>

	</head>
	<body>

		<div class="container">

			<div class="header_full">

				<div class="header clearfix">

					<div class="logo left">
						<h1>
							<a href="<?php echo home_url( ); ?>">
								<img src="<?php echo $template_url; ?>/images/logo_museografo.png" alt="Stack Overflow" title="Click to return to Stack Overflow homepage" />
							</a>
						</h1>
					</div><!-- logo -->

					<?php if ( ! is_home() ) {?>

					<div class="buscador col_4 left">
						<form action="" class="buscador_header">
							<input type="submit" value="">
							<input class="buscador_header_input" type="text" value="¿Qué estás buscando?" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >
						</form><!-- buscador_header -->
						<ul class="categorias_buscador">
							<li><a href="#">Eventos más cercanos</a></li>
							<li><a href="#">Más popular</a></li>
							<li><a href="#">A punto de acabar</a></li>
							<li><a href="#">Más concurrido</a></li>
							<li><a href="#">Nuevos</a></li>
						</ul><!-- categorias_buscador -->
					</div><!-- buscador -->

					<div class="settings col_3 right clearfix">

						<div class="notifications on left margin_right_10">
							<p class="notifications">2</p>
							<ul id="notifications_drop">
								<li><img src="<?php echo $template_url; ?>/images/user.jpg" alt=""><a href=""><strong>Tony</strong> te ha empezado a seguir</a><div class="plus"></div></li>
								<li><img src="<?php echo $template_url; ?>/images/user.jpg" alt=""><a href="">Tu amigo <strong>Pablo Covarrubias</strong> ahora está en museógrafo</a><div class="plus"></div></li>
								<li><img src="<?php echo $template_url; ?>/images/york.jpg"><a href=""><strong>York</strong> votó por tu comentario del evento <strong>Expo</strong></a></li>
							</ul>
						</div><!-- notifications -->

						<img class="left margin_right_10" src="<?php echo $template_url; ?>/images/raul.jpg" alt="">

						<ul class="settings_drop left">
							<li class="username"><?php echo $current_user->user_login; ?>
								<ul>
									<li><a href="#">Settings</a></li>
									<li><a href="#">My Profile</a></li>
									<li><a href="#">Log Out</a></li>
								</ul>
							</li>
						</ul><!-- settings_drop -->

					</div><!-- settings -->

					<?php } ?>

				</div><!-- header -->
			</div><!-- header_full -->