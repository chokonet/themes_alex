<?php get_header();?>
	
	<div class="contenedor_generico" >
	<?php if(is_user_logged_in ()) : ?>

		<div class="shopping-cart">
		
			<form id="paypal_form" action="https://www.paypal.com/cgi-bin/webscr" method="POST">

				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="upload" value="1" />
				<input type="hidden" name="business" value="childfundmexico@childfundmexico.org.mx" /><!-- usuario de paypal-->

				<table>
					<thead>
						<tr>
							<th>Regalo</th>
							<th>Precio</th>
							<th>Editar</th>
						</tr>
					</thead>
					
					<tbody>
						<?php 
							global $wpdb;
							setlocale(LC_MONETARY, 'es_MX');//necesario para mostrar los precios en moneda nacional
							
							$user_id = $current_user->ID; 
							/* selecctionar los elementos del carrito decuerdo al usuario */
							$query = "SELECT cart_id, post_id, quantity FROM wp_cart WHERE cart_status IS NULL AND user_id = '$user_id' ORDER BY post_id;";
							$result = mysql_query($query);
							$custom = ""; //variable que nos envia de regreso paypal para hacer updates en la tabla wp_cart
							
							//comprobar si existen resultados
							if(mysql_num_rows($result)) :

								$total = 0; // variable para calcular el total a pagar
								$index = 0; // index que se utiliza para numerar los productos al momento de enviarlos a paypal
							
								//loop que se repite por cada elemento del carrito
								while ($row = mysql_fetch_array($result)) :
									$cart_id = $row['cart_id'];
									$post_id = $row['post_id'];
									$quantity = $row['quantity'];
									
									/* traemos toda la metadata del post_id o producto */
									$meta = get_post_meta($post_id, '_productos_meta', true);
									$nombre = get_the_title($post_id); 
									$precio = $meta['precio_venta'];
									$edades = $meta['edades'];

									$total = $total + $precio; //actualizar el total
									$index++; //iniciar el index en 1 y aumentar cada vuelta del loop
									$array = array();
									
									/* Se van agrgando a la variable $custom el cart_id de todos los productos 
									que se van a actualizar cuando la transaccion se complete */
									$custom .= "$cart_id-";
									?>

									<tr>
									   <td>	<?php if ( has_post_thumbnail($post_id) ) { 
												echo get_the_post_thumbnail( $post_id, 'cart-thumb' ); 
												echo '<br /><strong>'.$nombre.'</strong>';
												echo '<br />Edades: '.$edades;
											} else { ?>
												<img alt="" src="http://placehold.it/90x90" />
											<?php
												echo '<br />'.$nombre;
												echo '<br />'.$edades;
											 } ?>
										</td><!-- nombre -->
									   <td>$<?php echo money_format('%i', $precio); ?></td><!-- precio -->
									   <td>
										   <div class='input-append'>
										   	   <?php
											        echo "<button class='btn btn-small btn-inverse delete boton peque' id='$cart_id' type='button'>Eliminar</button>";
											        											        
											        /* hidden inputs para enviar contenido a paypal */
												    echo "<input type='hidden' id='nombre_$cart_id' name='item_name_$index' value='$nombre' />";
													echo "<input type='hidden' id='amount_$cart_id' name='amount_$index' value='$precio' />";
													echo "<input type='hidden' id='quantity_$cart_id' name='quantity_$index' value='$quantity' />";
													echo "<input type='hidden' id='shipping_$$cart_id' name='shipping_$index' value='' />";
										       ?>
										   </div>
									   </td>
										
									</tr>
									
									
									
								<?php endwhile; ?>
								
									<?php if($total > 0) : ?>
											<tr class="checkout_total">
												<td>Total:</td>
												<td id="total"><strong>$<?php echo money_format('%i', $total); ?></strong></td>
												
												<td>
													<!-- <button class="btn btn-small" id="check_btn" type="button">Tarjeta Credito</button> -->
													<button id="check_out_btn" type="button" class="boton peque">Pagar con PayPal</button>
													<img id="ajax-loading" class="ajax-loading" src="<?php bloginfo("url");?>/wp-admin/images/wpspin_light.gif">
													<script>
														jQuery(document).ready(function(){
															jQuery('.ajax-loading').hide();
														});
													</script>
												</td>
											</tr>

									<?php  else :
										echo "No hay elementos en el carrito de compras.";
									endif; ?>
							<?php else: ?>
								
								<tbody>
									<tr>
										
										<td colspan="4">
											<p>No has agregado ningún regalo al carrito.</p>
										</td>
									</tr>	
								</tbody>
								
							<?php endif; ?><!-- ends if(mysql_num_rows($result)) -->
						</tbody><!-- ends cart-elemets -->
					</table><!-- ends table.cart -->
					
					<p class="leer-mas"><a href="<?php echo site_url('tienda-padrinos'); ?>">Regresar a la tienda</a></p>
					
					<input type='hidden' name='tax_cart' value='0' />
					<input type="hidden" name="notify_url" value="<?php echo site_url(); ?>/paypal-ipn/" />
					<input type="hidden" name="return" value="<?php echo site_url(); ?>" />
					<input type="hidden" name="rm" value="2" />
					<input type="hidden" name="cbt" value="Return to The Store" />
					<input type="hidden" name="cancel_return" value="<?php echo site_url(); ?>/tienda-padrino/" />
					<input type="hidden" name="lc" value="MX" />
					<input type="hidden" name="currency_code" value="MXN" />
					<?php $custom = rtrim($custom, "-"); ?><!-- quitar el ultimo ("-") del string -->
					<?php echo '<input type="hidden" name="custom" id="custom" value="'.$custom.'" />'; ?>
					
	 			</form><!-- ends transferencia de artículos sueltos a PayPal -->

			</div><!-- ends div.shopping-cart -->

	<?php endif; ?>
	
	<script>
		jQuery(document).ready(function(){
					
			/* validar que el usuario tenga seleccionados a los beneficiarios */
			jQuery("#check_out_btn").live('click', function(){
				jQuery('.ajax-loading').show();
				document.forms["paypal_form"].submit();			
			});


			/* eliminar elementos del carrito */
			jQuery("button.delete").live('click', function(){
				var cart_id = jQuery(this).attr('id');
			
				jQuery.ajax({
					type: 'POST',
					url: '<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php',
					data: {
						cart_id: cart_id,
						user_id: <?php echo $current_user->ID; ?>,
						action:'delete_cart_element'
					},
					complete: function(data, textStatus, XMLHttpRequest){
						location.reload();
					},
					dataType: 'json'
				});
			});
		});
	</script>

<?php get_footer(); ?>