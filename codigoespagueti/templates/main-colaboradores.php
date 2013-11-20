<div id="colaboradores-home">

	<h5>Opinión</h5>

	<div id="content-colaboradores">

		<?php

		$colaboradores = get_users( array(
			'meta_key'     => 'colaborador',
			'meta_value'   => 1,
			'meta_compare' => '=',
			'orderby'      => 'display_name'
		) );

		foreach ($colaboradores as $colaborador) :

			$data    = get_user_meta($colaborador->ID);

			$first   = isset($data['first_name'][0])     ? $data['first_name'][0]     : '';
			$last    = isset($data['last_name'][0])      ? $data['last_name'][0]      : '';
			$columna = isset($data['nombre_columna'][0]) ? $data['nombre_columna'][0] : '';
			$content = isset($data['bio'][0])            ? $data['bio'][0]            : '';
			$imagen  = get_avatar( $colaborador->ID, 80 );
			$url     = site_url("colaborador/{$colaborador->data->user_nicename}");

			echo <<< colaborador

				<div class="colaborador">
					<a href="$url">$imagen</a>
					<a href="$url"><h6>$first  $last</h6></a>
					<a href="$url">$columna</a>
					<p>$content</p>
				</div>

colaborador;

		endforeach; ?>

	</div><!-- end #content-colaboradores -->
</div><!-- end #colaboradores-home -->