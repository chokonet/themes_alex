<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/bjqs.css">
	<?php

	//insertar Post Type
	if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && strpos($_POST['nombreSus'],"@") && strpos($_POST['nombreSus'],".")) {

		// validacion formulario
		if (isset ($_POST['nombreSus']) ) {
			$title =  $_POST['nombreSus'];
		}

		// Add the content of the form to $post as an array
		$post = array(
			'post_title'  => $title,
			'post_status' => 'publish',		// Choose: publish, preview, future, etc.
			'post_type'	  => 'suscriptores' // Use a custom post type if you want to
		);
		wp_insert_post($post);  // Pass  the value of $post to WordPress the insert function
		$mensajeNews = "Muchas gracias por suscribirte al Newsletter";						// http://codex.wordpress.org/Function_Reference/wp_insert_post

	} else if(!empty( $_POST['action'] )) { $mensajeNews = "Introduce un correo válido"; }// end IF

		// Do the wp_insert_post action to insert it
		do_action('wp_insert_post', 'wp_insert_post');


		function descripcionCanana(){
		if ( is_home() ) {
			bloginfo ( 'description');
		} else if( is_singular() ) {
			while ( have_posts() ) : the_post();
				$descrip = get_the_excerpt();
				$descrip_more = '';
				if (strlen($descrip) > 155) {
					$descrip = substr($descrip,0,155);
					$descrip_more = ' ...';
				}

				$descrip      = str_replace('"', '', $descrip);
				$descrip      = str_replace("'", '', $descrip);
				$descripwords = preg_split('/[\n\r\t ]+/', $descrip, -1, PREG_SPLIT_NO_EMPTY);
				array_pop($descripwords);

				$descrip = implode(' ', $descripwords) . $descrip_more;
				echo $descrip;
				endwhile;
		} else if ( is_archive() ) {
		        $miPostType = get_post_type( get_the_ID() );
			if($miPostType  == "catalogo"){
				echo 'Descripción para catálogo';
			} else if($miPostType  == "equipo"){
				echo 'Descripción para equipo';
			} else if($miPostType  == "post"){
				echo 'Descripción para prensa';
			};
		}
	} ?>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php descripcionCanana(); ?>">


	<title>
		 <?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?>
	</title>

	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />



	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=118307431536192";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


	<div class="login_wrap">

		<div class="login">

			<form id="login-form" action="">

				<img class="cerrar" src="<?php bloginfo('template_url'); ?>/images/cerrar.png" />

				<div class="form-element"><h2>Login</h2></div>

				<div class="form-element">
					<label for="username">Usuario:</label>
					<input type="text" id="username" />
				</div>

				<div class="form-element">
					<label for="userpass">Contraseña:</label>
					<input type="password" id="userpass" />
				</div>

				<div class="form-element" id="login-error">
					<!-- login-error message-->
				</div>

				<div class="form-element">
					<button class="submit-login">Entrar</button>
					<input type="submit" class="submit-login" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
				</div>

			</form>

		</div><!-- login -->

	</div><!-- login_wrap -->


<div class="contenido">
		<div id="pleca">
			<?php if (is_user_logged_in() ) { ?>
				<span class="logout-user"><a href="<?php echo wp_logout_url( $_SERVER['REQUEST_URI'] ); ?>">Logout</a></span>
			<?php } else { ?>
				<span class="open-login-form">Entrar</span>
			<?php } ?>
		</div>
	<div id="menuPrincipal">
	<?php if (qtrans_getLanguage() == 'es') { ?>
	<a href="<?php echo get_home_url();?>"><?php if ( is_home() ) { echo "<h1>"; } else { echo "<h2>"; } ?><img src="<?php echo get_bloginfo('template_url'); ?>/images/logo.gif" alt="Canana Logo" width="180" height="67" id="logo"/><?php if ( is_home() ) { echo "</h1>"; } else { echo "</h2>"; } ?></a>
	<?php } elseif (qtrans_getLanguage() == 'en') { ?>
	<a href="<?php echo get_home_url();?>/en"><?php if ( is_home() ) { echo "<h1>"; } else { echo "<h2>"; } ?><img src="<?php echo get_bloginfo('template_url'); ?>/images/logo.gif" alt="Canana Logo" width="180" height="67" id="logo"/><?php if ( is_home() ) { echo "</h1>"; } else { echo "</h2>"; } ?></a>
	<?php } ?>
		<div id="redes">
		<?php if ( ! dynamic_sidebar( 'menu-idioma' ) ) :?><?php endif;?>

		<?php
		$link    = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		$hurl    = str_replace("http://", "", get_home_url());
		$linkIng = str_replace($hurl, get_home_url() . '/en', $link);
		$linkEs  = str_replace($hurl, get_home_url() . '', $link); ?>

			<div class="formulario">
			<div class="busca">
			<div id="lupaBusqueda"></div>
			<!--<img src="<?php echo get_bloginfo('template_url'); ?>/images/lupa.jpg" alt="lupa" id="lupaBusqueda" width="25" height="21" />-->
				<form id="searchForm" action="<?php echo get_home_url()."/".qtrans_getLanguage()."/" ?>">
					<input type="text" name="s" value="Buscar" id="busca">
					<input type="hidden" name="post_type[]" value="catalogo" />
				</form>
			</div>
			<div class="registrate">
			<div id="sobreNews"></div>
			<!--<img src="<?php echo get_bloginfo('template_url'); ?>/images/sobre.jpg" alt="sobre" width="25" height="18" />-->
				<form action=" " method="post" id="new_post" name="new_post">
					<input type="text" name="nombreSus" value="Newsletter" id="newsletter">
					<input type="hidden" name="action" value="post" />
				</form>
			</div>
			</div>
			<?php if(isset($mensajeNews)){ ?>
	    <div id="mensajeNews"><?php echo $mensajeNews; ?></div>
	    <?php } ?>
		<div id="redesHead">
		<a href="https://twitter.com/CANANApresenta" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/twitter.gif" alt="twitter" width="22" height="16" /></a>
		<a href="https://www.facebook.com/CANANA.presenta" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/facebook.gif" alt="facebook" width="10" height="16" /></a>
		<a href="http://www.youtube.com/user/CANANADISTRIBUCION" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/youtube.gif" alt="youtube" width="43" height="16" /></a>
		<a href="#" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/vimeo.gif" alt="vimeo" width="17" height="16" /></a>
		<a href="#" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/tumblr.gif" alt="tumblr" width="20" height="16" /></a>
		<a href="http://instagram.com/cananapresenta" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/instagram.gif" alt="instagram" width="16" height="16" /></a>




<!--<img src="<?php echo get_bloginfo('template_url'); ?>/images/redes.gif" alt="redes" width="176" height="16" id="iconoRedes" />-->
		</div>

		</div>
		<?php //wp_nav_menu( array('menu' => 'Menú General' )); ?>

		<div id="opcionesMenuP">
		<?php $miPostType = get_post_type( get_the_ID() ); ?>
		<?php if (qtrans_getLanguage() == 'es') { ?>
			<ul>
				<li class="<?php if ( is_home() || is_page( 'cine' ) || is_page( 'tv' ) || is_page( 'branded-content' ) ) { echo 'activoM'; } ?>">
					<a href="<?php echo get_home_url(); ?>">
						<h2>CANANA</h2>
					</a>
				</li>
				<li class="<?php if(get_post_type( get_the_ID() ) == "catalogo"){ echo 'activoM'; };?>">
					<a href="<?php echo get_home_url(); ?>/catalogo/">
						<h2>DISTRIBUCIÓN</h2>
					</a>
				</li>
				<li class="<?php if( ($miPostType == "post") && !is_home() || is_page() && !is_page( 'cine' ) &&! is_page( 'cartelera' ) && !is_page( 'tv' ) && !is_page( 'branded-content' ) ) { echo 'activoM'; };?>">
					<a href="<?php echo get_home_url(); ?>/noticias/">
						<h2>NOTICIAS</h2>
					</a>
				</li>
				<li class="<?php if(get_post_type( get_the_ID() ) == "equipo"){ echo 'activoM'; };?>">
					<a href="<?php echo get_home_url(); ?>/equipo/">
						<h2>EQUIPO</h2>
					</a>
				</li>
				<li class="<?php if(is_page( 'cartelera' )){ echo 'activoM'; };?>">
					<a href="<?php echo get_home_url(); ?>/cartelera/">
						<h2>CARTELERA</h2>
					</a>
				</li>
			</ul>
			<?php } elseif (qtrans_getLanguage() == 'en') { ?>
						<ul>
				<li class="<?php if ( is_home() ) { echo 'activoM'; } ?>">
					<a href="<?php echo get_bloginfo('url'); ?>/en">
						<h2>CANANA</h2>
					</a>
				</li>
				<li class="<?php if(get_post_type( get_the_ID() ) == "catalogo"){ echo 'activoM'; };?>">
					<a href="<?php echo get_home_url(); ?>/en/catalogo/">
						<h2>DISTRIBUTION</h2>
					</a>
				</li>
				<li class="<?php if((get_post_type( get_the_ID() ) == "post") && (!is_home())){ echo 'activoM'; };?>">
					<a href="<?php echo get_bloginfo('url'); ?>/en/noticias/">
						<h2>NEWS</h2>
					</a>
				</li>
				<li class="<?php if(get_post_type( get_the_ID() ) == "equipo"){ echo 'activoM'; };?>">
					<a href="<?php echo get_bloginfo('url'); ?>/en/equipo/">
						<h2>STAFF</h2>
					</a>
				</li>
				<!-- <li class="<?php if(get_post_type( get_the_ID() ) == "cartelera"){ echo 'activoM'; };?>"> -->
						<!-- <a href="<?php echo get_bloginfo('url'); ?>/en/cartelera/"> -->
					<!-- <a href="#">
						<h2>LISTINGS</h2>
					</a>
				</li> -->
			</ul>
			<?php }; ?>
		</div>
	</div>
<?php
$miPostType = get_post_type( get_the_ID() );

if ( is_home() || is_singular('acerca') || is_page( 'cine' ) || is_page( 'tv' ) || is_page( 'branded-content' ) ) {

/* }  else if( $miPostType  == "catalogo") {

	$seccion = isset($_GET['estrenos']) ? $_GET['estrenos'] : '';

	echo 'jaja <h1>'.$seccion.'</h1>';

if($seccion == "true"){
	$claseBoton1 = "actual";
	$claseBoton2 = "";
} else {
	$claseBoton1 = "";
	$claseBoton2 = "actual";
}; */ ?>


<?php /*
<div id="borde2">
	<div id="menuSeccion" >

		<?php if (qtrans_getLanguage() == 'es') { ?>
			<ul>
				<li id="btn_sobre" rel="sobreC" class="<?php echo $claseBoton2; ?>"><a href="<?php echo get_home_url(); ?>/catalogo/"><?php if (qtrans_getLanguage() == 'es') { ?>CATÁLOGO<?php } else { ?>FILM LIBRARY<?php }; ?></a></li></a>
				<li id="btn_cine" rel="cineC"  class="<?php echo $claseBoton1; ?>"><a href="<?php echo get_home_url(); ?>/catalogo/?estrenos=true"><?php if (qtrans_getLanguage() == 'es') { ?>Estrenos<?php } else { ?>New releases<?php }; ?></a></li>
			</ul>
		<?php } elseif (qtrans_getLanguage() == 'en') { ?>
			<ul>
				<li id="btn_sobre" rel="sobreC" class="<?php echo $claseBoton2; ?>"><a href="<?php echo get_home_url(); ?>/en/catalogo/"><?php if (qtrans_getLanguage() == 'es') { ?>CATÁLOGO<?php } else { ?>FILM LIBRARY<?php }; ?></a></li></a>
				<li id="btn_cine" rel="cineC"  class="<?php echo $claseBoton1; ?>"><a href="<?php echo get_home_url(); ?>/en/catalogo/?estrenos=true"><?php if (qtrans_getLanguage() == 'es') { ?>Estrenos<?php } else { ?>New releases<?php }; ?></a></li>
			</ul>
		<?php }; ?>

	</div><!-- menuSeccion -->
</div><!-- borde2 -->
*/ ?>



<?php } else { ?>
<div id="borde2">
	<div id="menuSeccion">
		<?php //get_header(); ?>

	</div>
</div>
<?php }; ?>




