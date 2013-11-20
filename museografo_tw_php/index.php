<?php
	get_header();
	$template_url = get_bloginfo( 'template_url' );
?>

<div class="content_full home">

	<div class="fondo_index">
	</div><!-- fondo_index -->

	<div class="content">

		<img class="iphone col_3" src="<?php echo $template_url; ?>/images/iphone_app.png" alt="iphone_app">

		<div class="middle col_5">

			<div class="copy bloque borde_general">
				<h2>Lorem ipsum dolor sit amet</h2>
				<p class="text texto_obscuro" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quod autem satis est, quicquid accessest.</p>
			</div><!-- copy -->

			<div class="download">
				<a class="appstore col_2" href="#">
					<img src="<?php echo $template_url; ?>/images/appstore.png" alt="appstore">
				</a>
				<a class="gplay col_2" href="#">
					<img src="<?php echo $template_url; ?>/images/gplay.png" alt="google play">
				</a>
			</div><!-- download -->
		</div><!-- middle -->

		<div class="home_right col_4">

			<div class="password bloque borde_general">
				<h3>¿Olvidaste tu contraseña?</h3>
				<form class="forgot_password_form" action="" method="post" >
					<label class="label_password" for="mail">Escribe tu correo:</label>
					<input class="input_border" type="mail" value="">
					<input class="boton" type="submit" value="enviar">
				</form>
			</div><!-- password -->

			<div class="login bloque borde_general">
				<form class="login_form" action="" method="post">
					<input class="input_border" type="text" value="username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >
					<input class="input_border" type="password" value="password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
					<input class="boton" type="submit" value="log in">
				</form>
			</div><!-- login -->

			<div class="registrate bloque borde_general">
				<h3>Regístrate</h3>
				<button class="facebook boton">Facebook</button>
				<button class="twitter boton" onclick="window.location.href='<?php url_twitter(); ?>'">Twitter</button>
				<div class="clear"></div>
				<h3>O con nosotros</h3>
				<form class="register_form" action="" method="post">
					<input class="input_border" type="text" value="username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >
					<input class="input_border" type="password" value="password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
					<input class="boton" type="submit" value="siguiente">
				</form>
			</div><!-- registrate -->
		</div><!-- right -->
	</div><!-- content -->
</div><!-- content_full -->

<?php get_footer( ); ?>