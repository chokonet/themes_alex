	<div id="sidebar" class="tienda_padrinos">
		<?php if (is_user_logged_in()) :
		
			$current_user = wp_get_current_user();
			$role = $current_user->roles;
			
			if ($role[0] == 'padrino'):  ?>
			
				<!-- Datos del usuario (padrino) -->
				<div id="padrino-data">
					<a href="<?php echo site_url('acceso-padrinos'); ?>">
					<?php 
						$current_user = wp_get_current_user();
						echo 'Padrino: ' . $current_user->user_firstname . ' ' . $current_user->user_lastname . '<br />';
						echo 'Email: ' . $current_user->user_email . '<br />';
						//echo 'User ID: ' . $current_user->padrino_id . '<br />';
						
						if (!$current_user->user_level == 1 ) :
						
							$args = array(
								'numberposts' => -1,
								'post_type' => 'ninos',
								'meta_key' => '_padrino_id',
								'meta_value' => $current_user->padrino_id,
								'estatus_ninos' => 'apadrinado'
							);
							$ahijados = get_posts($args);
							$cuantos = count($ahijados);
						
							echo 'Tienes ' . $cuantos. ' ahijados';
						
						else: 
							
							echo 'No tienes ahijados';
						
						endif;
						
						wp_reset_query();
					?>
					
					<?php if( is_page('tienda-padrinos') ): ?>
					<p class="regresar_ahijados">Regresar</p>
					<?php endif; ?>
					</a>
					
				</div>
				
			<?php else: // NO ES PADRINO PERO SI TIENE USUARIO DE WORDPRESS ?>
			
				<div id="padrino-data">
					<a href="mailto:childfundmexico@childfundmexico.org.mx">
					<?php
						echo 'Usuario: ' . $current_user->display_name . '<br />';
						echo 'No tienes ahijados<br />';
						echo 'Ponte en contacto con nosotros!';
					?>
					</a>
				</div>
				
				
				<ul id="filterOptions">
					<!-- <h3>Filtros:</h3> -->
					<li class="active"><a class="all" href="#">Todos los regalos</a></li>
					<li><a class="0-5" href="#">Niños de 0-5</a></li>
					<li><a class="6-12" href="#">Niños de 6-12</a></li>
					<li><a class="13-18" href="#">Jóvenes de 13-18</a></li>
				</ul>
				
			
			<?php endif; // END if($role == 'padrino')  ?>	
			
			
			<?php if( is_page('acceso-padrinos') ): ?>
				<p class="boton grande tienda"><a href="<?php echo site_url('tienda-padrinos'); ?>">Ver regalos</a></p>
			<?php endif; ?>
						

			<div class="clear"></div>
			
			
			<!-- muestra el menu para filtrar los regalos por edad -->
			<?php if( is_page('tienda-padrinos') ): ?>
				<ul id="filterOptions">
					<!-- <h3>Filtros:</h3> -->
					<li class="active"><a class="all" href="#">Todos los regalos</a></li>
					<li><a class="0-5" href="#">Niños de 0-5</a></li>
					<li><a class="6-12" href="#">Niños de 6-12</a></li>
					<li><a class="13-18" href="#">Jóvenes de 13-18</a></li>
				</ul>
			<?php endif; ?>
			
	
			<?php 
				global $wpdb;
				$user_id = $current_user->ID; 
				$query = "SELECT cart_id, post_id FROM wp_cart WHERE cart_status IS NULL AND user_id = '$user_id' ORDER BY post_id;";
				$result = mysql_query($query);
				$i = 1;
				$carrito_suma = 0;
	
				if (mysql_num_rows($result)) { ?>
					<!-- Elementos en el carrito de compras -->
					<div id="carrito-padrino">
					
						<h1>CARRITO</h1>
						
						<?php while ($row = mysql_fetch_array($result)) :
							$cart_id = $row['cart_id'];
							$post_id = $row['post_id'];
							
							$meta = get_post_meta($post_id,'_productos_meta',TRUE);
							if(!empty($meta)){
								$nombre 		= (empty($meta['nombre'])) 		 ? ''  :  $meta['nombre'];
								$editorial 		= (empty($meta['editorial'])) 	 ? ''  :  $meta['editorial'];
								$edades 		= (empty($meta['edades'])) 		 ? ''  :  $meta['edades'];
								$sinopsis 		= (empty($meta['sinopsis'])) 	 ? ''  :  $meta['sinopsis'];
								$precio 		= (empty($meta['precio'])) 		 ? '0' :  $meta['precio'];
								$precio_venta 	= (empty($meta['precio_venta'])) ? '0' :  $meta['precio_venta'];
							}?>
							
							<li class="cart-row">
								<?php if ( has_post_thumbnail($post_id) ) { 
									echo get_the_post_thumbnail( $post_id, 'cart-thumb' ); 
									} else { ?>
									<img alt="" src="http://placehold.it/90x90">
								<?php } ?>
								
								<div class="left contenido-carrito">
									<!-- <button class='cart-delete boton' id='<?php echo $cart_id; ?>' type='button'>X</button> -->
									<h3><?php echo get_the_title($post_id); ?></h3>
									<p><?php echo $editorial; ?></p>
									<p><strong>Edades: </strong><?php echo $edades; ?></p>
									<p><strong>Precio: </strong>$<?php echo number_format($precio_venta, 2, '.', ','); ?></p>
									<p class="num_producto"><?php echo $i; ?></p>
								</div>
							</li>
							
						<?php 
						$i++;
						$carrito_suma = $carrito_suma + $precio_venta;
						endwhile; 
						
						?>
						
					<!-- <button type="submit" class="check_out" id="cart-check-out">Check Out &raquo; </button> -->
					
					<?php 
						/* Exsiten dos metodos de checkout dependiendo si el usuario tiene el rol de padrino o no */
						if ($role[0] == 'padrino'): ?>
						
							<a href="<?php echo site_url(); ?>/padrino-checkout/" class="check_out">Pagar &raquo; $<?php echo number_format($carrito_suma, 2, '.', ','); ?> </a>
							<p class="importante"><strong>Importante:</strong> Al momento de pagar podrás asignar los regalos del carrito a tus ahijados.</p>
							
						<?php else: ?> <!-- NO ES PADRINO PERO SI TIENE USUARIO DE WORDPRESS -->
						
							<a href="<?php echo site_url(); ?>/checkout/" class="check_out">Pagar &raquo; $<?php echo number_format($carrito_suma, 2, '.', ','); ?> </a>
							
						<?php endif; ?>	<!-- end if($role == 'padrino') -->	
						
					
					<?php
					if(isset($current_user->padrino_id) AND is_page('tienda-padrinos') ):
						$i = 1;
						echo '<div class="ahijados_sidebar">';
						echo '<h4>Tus ahijados:</h4>';
						foreach($ahijados as $post): setup_postdata($post);
							echo'<p><strong>'. $i . '. ';
							the_title();
							echo '</strong><br />Rango de edad: ' . get_post_meta($post->ID, '_rango_edad', true);
							echo '</p>';
							$i++;
						endforeach;
						echo '</div><!-- end .ahijados_sidebar -->';
					endif;
					?>
							
					
			<?php	
				}else{
					echo "<p class='empty_cart'>No has agregado regalos al carrito.</p>";
				} ?>
			
			</div>
		
			<script>
				$(document).ready(function() {
					
					$('.cart-delete').live('click', function(e){
					
					var cart_id = $(this).attr('id');
					
						jQuery.ajax({
							type: 'POST',
							url: '<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php',
							data: {
								cart_id: cart_id,
								user_id: <?php echo $current_user->ID; ?>,
								action:'delete_cart_element'
							},
							complete: function(){
								location.reload();
							},
							dataType: 'json'
						});
					});
				});
			</script>		
		
		<?php endif; ?>
				
	</div><!-- end #sidebar -->