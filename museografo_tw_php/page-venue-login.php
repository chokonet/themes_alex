<?php
	get_header();
	$template_url = get_bloginfo( 'template_url' );
?>

<div class="content_full home">
	
	<div class="fondo_index">
		<p class="ultra_big">¡Bienvenido venue!</p>
	</div><!-- fondo_index -->

	<div class="content">

		<div class="home_right venue col_4">

			<div class="login bloque borde_general">
				<form class="login_form" action="" method="post">
					<input class="input_border" type="text" value="Username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >
					<input class="input_border" type="password" value="password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
					<input class="boton" type="submit" value="log in">
				</form>
			</div><!-- login -->

			<div class="registrate bloque borde_general">
				<h3>Regístrate</h3>
				<form class="register_form" action="" method="post">
					<input class="input_border" type="text" value="Username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >
					<input class="input_border" type="password" value="password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
					<input class="boton" type="submit" value="siguiente">
				</form>
			</div><!-- registrate -->
		</div><!-- right -->
	</div><!-- content -->
</div><!-- content_full -->

<?php get_footer( ); ?>