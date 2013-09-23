<?php get_header();?>

	<div class="contenedor_generico" >
	<?php if(!is_user_logged_in ()) : ?>
		<div class="login-box" >
			<h2>Acceso a padrinos</h2>
			<form method="post" action="<?php echo site_url(); ?>/wp-login.php" id="loginform_custom" name="loginform_custom">
				<table>
					<tr>
						<td>Username</td>
						<td><input type="text" class="u-name" name="log" /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" class="u-pass" name="pwd" /></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input class="boton grande" type="submit"  name="submit" value="Login" />
							<!-- <a href="<?php echo site_url();?>/wp-login.php?action=register">Register</a>
							<a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Lost your password?</a> -->
						</td>
					</tr>
				</table>
			</form>
		</div><!-- end .login-box -->
	</div><!-- end #contenedor_generico -->
	<?php else: ?>

		<?php
		$current_user = wp_get_current_user();

		$role = $current_user->roles;

		if ($role[0] == 'padrino'):
			$nombre_palabras = explode(' ', $current_user->user_firstname);
			$nombre = implode(' ', array_splice($nombre_palabras, 0, 2));
		else:
			$nombre = $current_user->display_name;
		endif;
		?>
			<div class="contenido-padrino" >

				<h2>¡Hola <?php echo $nombre; ?>!</h2>

				<div class="holder_tienda">

				<?php
					global $post;
					$args = array( 'post_type' => 'productos', 'posts_per_page' => -1, 'orderby' => 'title' );
					query_posts( $args );

					while ( have_posts() ) : the_post();

						$post_id = $post->ID;
						$meta = get_post_meta($post_id,'_productos_meta',TRUE);

						if(!empty($meta)){
							$editorial 		= (empty($meta['editorial'])) 		? ''  :  $meta['editorial'];
							$edades 		= (empty($meta['edades'])) 			? ''  :  $meta['edades'];
							$sinopsis 		= (empty($meta['sinopsis'])) 		? ''  :  $meta['sinopsis'];
							$precio 		= (empty($meta['precio'])) 			? '0' :  $meta['precio'];
							$precio_venta 	= (empty($meta['precio_venta'])) 	? '0' :  $meta['precio_venta'];
						}?>

						<div class="item cart-element" data-id="data-<?php echo $post_id; ?>" data-type="<?php echo $edades; ?>">

							<div class="sinopsis">
							<h3><?php the_title(); ?></h3>

							<?php echo $sinopsis; ?>
							</div>

							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'tienda-thumb' );
								} else { ?>
								<img alt="" src="http://placehold.it/200x200">
							<?php } ?>

							<div class="contents">
								<h2><?php the_title(); ?></h2>
								<p><?php echo $editorial; ?></p>
								<p><strong>Edades: </strong><?php echo $edades; ?></p>
								<p><strong>Precio: </strong>$<?php echo number_format($precio_venta, 2, '.', ','); ?></p>
							</div>

							<button type="submit" class="add_to_cart boton pequeno" id="<?php echo $post_id; ?>">Agregar al Carrito</button>

						</div><!-- end .cart-element -->

			 	<?php endwhile; ?>

				</div><!-- end .holder_tienda -->

			</div><!-- end div.contenido-padrino -->

			<?php get_sidebar('padrino'); ?>

	<?php endif; ?> <!-- end if(is_user_logged_in)  -->

	<script>

		(function($){

			$(document).ready(function() {

				$('.add_to_cart').live('click', function(e){

					console.log('clicked!');
					var id = $(this).attr('id');

					$.ajax({
						type: 'POST',
						url: '<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php',
						data: {
							post_id: id,
							user_id: <?php echo $current_user->ID; ?>,
							action:'add_to_cart'
						},
						complete: function(){
							alert('¡Agregaste un regalo al carrito!');
							location.reload();
						},
						dataType: 'json'
					});
					e.preventDefault();
				});
			});

		})(jQuery);
	</script>

<?php get_footer(); ?>

