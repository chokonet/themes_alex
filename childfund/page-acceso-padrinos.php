<?php get_header(); ?>


	<div id="contact">
		<form action="" method="POST">
			<img class="contact-pointer" src="<?php bloginfo('template_directory') ?>/images/pointer.png" alt="">
			<img id="contact-img" width="60" height="60" src="">
			<textarea name="comments" id="comments" cols="50" rows="2"></textarea>
			<div id="form-buttons">
				<input class="boton" type="submit" id="contact-submit" value="Enviar">
			</div>
		</form>
	</div>

	<div class="contenedor_generico" >

	<?php if(!is_user_logged_in ()) : ?>
		<div class="login-box" >

		<!-- <h2>Catálogo navideño cerrado</h2> -->

			<!-- <h2>Catálogo navideño 2012</h2> -->
			<form method="post" action="" id="loginform_custom" name="loginform_custom">
				<table>
					<tr>
						<td>Usuario</td>
						<td><input type="text" class="input" id="login_username"></td>
					</tr>
					<tr>
						<td>Contraseña</td>
						<td><input type="password" class="input" id="login_userpass"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input class="boton grande" type="submit" id="submit-login-form" name="submit" value="Entrar" />
							<!-- <a href="<?php echo site_url();?>/wp-login.php?action=register">Register</a>
							<a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Lost your password?</a> -->
						</td>
					</tr>
				</table>
				<p id="login_error"></p>
			</form>



		</div><!-- end .login-box -->
	</div><!-- end #contenedor_generico -->
	<?php else: ?>


	<div class="contenido-padrino" >
		<?php

		$current_user = wp_get_current_user();
		$nombre_palabras = explode(' ', $current_user->user_firstname);
		$nombre = implode(' ', array_splice($nombre_palabras, 0, 2));
		?>

		<h2>¡Hola <?php echo $nombre; ?>!</h2>

	    <!--<div class="texto_bienvenida">-->


			<!-- <p>Como cada año esta temporada es la mejor oportunidad de hacer que la Navidad y las fiestas

			decembrinas sean algo especial para tu ahijad@ (s).</p>

			<p>En el catálogo hemos seleccionado juguetes y libros de acuerdo a la edad y a la etapa de
			desarrollo en el que se encuentra tu ahijad@.</p>

			<p>En la parte derecha encontrarás el botón de “Ver Regalos”, dale click para visualizar el catálogo
			general. Para ver los juguetes y libros de tu ahijad@ da click en el rango de edad que le
			corresponde.</p>

			<p>Para conocer la descripción de los artículos pasa el puntero del mouse sobre las imágenes esto te
			permitirá elegir la mejor opción para tu ahijad@.</p>

			<p>Para seleccionar un artículo da click en el botón “Agregar al carrito”, tendrás la opción de agregar
			varios artículos.</p>

			<p>Al terminar de seleccionar los regalos de tu ahijado (s) da click en el botón “Pagar”. Te aparecerá
			una pantalla con los artículos que elegiste para tu ahijado (s) así como la suma total a pagar. En la
			columna “Para quien” despliega el menú para que selecciones al ahijado al que le quieres mandar
			el regalo. Para finalizar haz tu pago con tarjetas VISA o MasterCard a través de PayPal.</p>

			<p><strong>Gracias por hacer de esta Navidad un momento especial para tu ahijad@</strong></p> -->
		<!--</div>--><!-- end .texto_bienvenida -->


			<?php
			$current_user = wp_get_current_user();
			$role = $current_user->roles;

			if ( $role[0] == 'padrino' ) : ?>

				<div class="lista_ahijados">

					<h3>Lista de ahijados:</h3>

					<?php

					if( isset($current_user->padrino_id) ):
						$args = array(
							'numberposts'   => -1,
							'post_type'     => 'ninos',
							'meta_key'      => '_padrino_id',
							'meta_value'    => $current_user->padrino_id,
							'estatus_ninos' => 'apadrinado'
						);

						$ahijados = get_posts($args);

						foreach($ahijados as $index => $post): setup_postdata($post);
                            echo "<div class='ahijado-data'>";
                            echo  get_the_post_thumbnail($post->ID, 'ninos-thumb');
							echo '<a href="#" class="send-msg" data-ahijado="'.$post->ID.'">'. get_the_title($post->ID) . '</a>';
                            echo "<p>$post->post_content</p>";
                            echo "</div>";
						endforeach;

					endif;
					?>
				</div><!-- end .lista-ahijados -->
			<?php else: ?><!-- NO ES PADRINO PERO SI TIENE USUARIO DE WORDPRESS -->

				<!-- Agregar contenido que se desea mostrar para los usuarios que no son padrinos aqui -->

			<?php endif; ?><!-- end if($role == 'padrino') -->





	<?php endif; ?>
    </div><!-- end div.contenido-padrino -->

		<?php if( is_user_logged_in() ){

			//get_sidebar('padrino');
			get_sidebar('interior');

		} ?>


	<div class="clear"></div>

	<?php
	//Para subir un CSV


	// ini_set("auto_detect_line_endings", true);
	// $handle = fopen("http://localhost:8888/ninos_childfund_con_id_2.csv", "r");
	// global $wpdb;
	// // $url = site_url();
	//
	// //Para actualizar niños
	//
	// while(!feof($handle)):
	//

	// 	$line = fgetcsv($handle, 1024);
	// 	$padrino_id = utf8_encode($line[0]);
	// 	$nino_id = utf8_encode($line[1]);
	// 	$nombre = utf8_encode($line[2]);
	// 	$edad = utf8_encode($line[3]);
	// 	$existe = existe_nino($nombre);
	//
	// 	// //para probar el csv
	// 	// echo $padrino_id . ' ' . $nino_id . ' ' . $nombre . ' ' . $edad . '<br />';
	//

	// 		if( $existe != false ):
	// 			$nino_post = existe_nino($nombre);
	// 			update_post_meta( $nino_post, '_nino_id', $nino_id );
	// 			echo $nino_id . ' chido<br />';
	// 		else:
	//
	// 			crear_nino($nombre, $padrino_id, $nino_id, $edad);
	//
	// 		endif;
	//
	// 	endwhile;
	//
	// fclose($handle);

	function existe_nino($nombre) {
		global $wpdb;
		$nino_post_id = $wpdb->get_var("SELECT ID FROM wp_posts WHERE post_title = '$nombre' and post_status = 'publish'");
		if($nino_post_id > 0):

			return $nino_post_id;
		else:
			return false;
		endif;
	}


	function crear_nino($nombre, $padrino_id, $nino_id, $edad) {
		$nino_nuevo_post = array(
			'post_title' => $nombre,
			'post_type' => 'ninos',
			'post_status' => 'publish'
		);


		$nino_post_id = wp_insert_post( $nino_nuevo_post );
		update_post_meta( $nino_post_id, '_padrino_id', $padrino_id );
		update_post_meta( $nino_post_id, '_rango_edad', $edad );
		update_post_meta( $nino_post_id, '_nino_id', $nino_id );
		wp_set_object_terms( $nino_post_id, 'apadrinado', 'estatus_ninos' );
		echo $nino_id . ' nino_creado</br>';
	}


	//Para meter padrinos

	// while(!feof($handle)):
	//

	// 	$line = fgetcsv($handle, 1024);
	// 	$padrino_id = utf8_encode($line[0]);
	// 	$pass = utf8_encode($line[1]);
	// 	$nombre = utf8_encode($line[2]);
	// 	$username = utf8_encode($line[3]);
	// 	$email = utf8_encode($line[4]);

	//
	// 	echo $padrino_id. ' ';
	//
	// 	$a_ver = insertar_usuario($username, $pass, $email, $nombre, $padrino_id);
	//
	// 	if( is_wp_error($a_ver) ):
	// 		echo ' - ';
	// 		echo $a_ver->get_error_message();
	// 	else:
	// 		echo ' - success' ;
	// 	endif;
	//
	// 		echo '<br />';
	//
	//
	// 	endwhile;
	//
	// fclose($handle);

	//Para borrar padrinos


	// include('/Applications/MAMP/htdocs/lamaquiladora/childfund.lamaquiladora.com/web/content/wp-admin/includes/user.php');
	// $padrinos = get_users('blog_id=1&orderby=nicename&role=padrino');
	// // echo '<pre>';
	// // print_r($padrinos);
	// // echo '</pre>';
	// echo '<ul>';
	//     foreach ($padrinos as $user) {
	//         echo '<li>' . $user->ID . '</li>';
	// 		wp_delete_user($user->ID);
	//     }
	// echo '</ul>';


	function insertar_usuario($username, $pass, $email, $nombre, $padrino_id) {

		$insertar = wp_insert_user( array ('user_login' => $username, 'user_pass' => $pass, 'user_email' => $email, 'first_name' => $nombre, 'role' => 'padrino', 'padrino_id' => $padrino_id ) ) ;
		return $insertar;

	} ?>


<?php get_footer(); ?>
