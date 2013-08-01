<?php get_header(); ?>

	<div class="facturas">

		<?php global $current_user;

		$facturas = get_facturas_padrino($current_user->ID); ?>


		<table>
			<thead>
				<tr>
					<th>Factura</th>
					<th>Fecha</th>
					<th>Descargar</th>
				</tr>
			</thead>
			<tbody>

			<?php foreach ($facturas as $index => $factura) :

				$fecha_factura = get_post_meta( $factura->ID, 'fecha_factura', true ); ?>

				<tr>
					<td>
						<a href="<?php echo $factura->guid ?>" target="_blank" class="submit-form-factura" rel="nofollow">
							<?php echo $factura->post_title; ?>
						</a>
					</td>
					<td><?php echo $fecha_factura; ?></td>
					<td>
						<a href="<?php echo $factura->guid ?>" target="_blank" class="submit-form-factura" rel="nofollow">
							<img src="<?php bloginfo('template_url'); ?>/images/pdf_download.png" alt="descargar" >
						</a>
					</td>
				</tr>

			<?php endforeach; ?>

				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>

			</tbody>
		</table>


	</div><!-- end .facturas -->

<?php get_footer(); ?>