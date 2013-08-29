<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
	<?php wp_head(); ?>
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=604212099631020";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

	</head>
	<body>
		<div id="navWrap_100">
			<div id="navWrap">
				<nav>
					<div id="logoPM5"></div>
					<ul id="topmenu">
						<li><a href="#">Social</a></li>
						<li class="hasSub"><a href="#">Programas</a></li>
						<li class="hasSub"><a href="#">Series</a></li>
					</ul><!-- topmenu -->
					<ul id="socialIcons">
						<a href="#"><li class="facebook"></li></a>
						<a href="#"><li class="twitter"></li></a>
						<a href="#"><li class="youtube"></li></a>
					</ul><!-- socialIcons -->
				</nav>
			</div><!-- navWrap -->
		</div><!-- navWrap_100 -->
	<div class="container">
				<!--menu-->
		<div class="main">

			<div class="columna_der_nav">
				<div id="nav">
					<ul>
						<a href="#"><li class="conductores animate" >CONDUCTORES</li></a>
						<a href="<?php echo home_url('category/capsulas/') ?>"><li class="capsulas animate <?php if( is_category('capsulas') ): echo select; endif; ?>">CÁPSULAS</li></a>
						<a href="<?php echo home_url('/social/') ?>"><li class="social animate <?php if( is_page('social') ): echo select; endif; ?>">SOCIAL</li></a>
						<a href="<?php echo home_url('/') ?>"><li class="principal animate <?php if( is_home() ): echo select; endif; ?>"  >PRINCIPAL</li></a>
					</ul>

					<div id="siguenos">
						<h5>Síguenos</h5>
						<a href=""><span id="ico_twitter"></span></a>
						<a href=""><span id="ico_facebook"></span></a>
					</div>
				</div>
				<div class="submenu">
					<?php usuarios_conductores() ?>
				</div>
			</div>
		<!--fin menu-->

