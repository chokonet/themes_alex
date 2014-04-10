<?php
/*

8888888b.   .d88888b.   .d8888b. 8888888 88888888888 8888888  .d88888b.  888b    888
888   Y88b d88P" "Y88b d88P  Y88b  888       888       888   d88P" "Y88b 8888b   888
888    888 888     888 Y88b.       888       888       888   888     888 88888b  888
888   d88P 888     888  "Y888b.    888       888       888   888     888 888Y88b 888
8888888P"  888     888     "Y88b.  888       888       888   888     888 888 Y88b888
888        888     888       "888  888       888       888   888     888 888  Y88888
888        Y88b. .d88P Y88b  d88P  888       888       888   Y88b. .d88P 888   Y8888
888         "Y88888P"   "Y8888P" 8888888     888     8888888  "Y88888P"  888    Y888



888    888 8888888888        d8888 8888888b.  8888888888 8888888b.
888    888 888              d88888 888  "Y88b 888        888   Y88b
888    888 888             d88P888 888    888 888        888    888
8888888888 8888888        d88P 888 888    888 8888888    888   d88P
888    888 888           d88P  888 888    888 888        8888888P"
888    888 888          d88P   888 888    888 888        888 T88b
888    888 888         d8888888888 888  .d88P 888        888  T88b
888    888 8888888888 d88P     888 8888888P"  8888888888 888   T88b

 */



// CREAR TABLA PARA FREATURED IMAGE HEADER POSITION ///////////////////////

	add_action('init', function() use (&$wpdb){


		$wpdb->query(
			"CREATE TABLE IF NOT EXISTS {$wpdb->prefix}image_header (
				position_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				posicion_name VARCHAR(40) NOT NULL DEFAULT '',
				post_id VARCHAR(40) NOT NULL DEFAULT '',
				PRIMARY KEY (position_id),
				KEY posicion_name (posicion_name)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
		);

	});

	/**
	 * SE EJECUTA DESDE metaboxes.php (funcion inicial)
	 */
	function update_image_header($post_id, $position){

		$position_name = revisar_si_esxite_post_id($post_id);
		if ($position_name){
			update_posiciones('', $position_name);
		}

		$existe = check_if_position_image_exist($position);

		if ($existe) update_posiciones($post_id, $position);

		if(!$existe) create_new_position_image_header ($post_id, $position);

	}

	/**
	 * Revisa si existe el campo
	 * @param  String $position
	 * @return Boolean
	 */
	function check_if_position_image_exist($position) {
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare(
			"SELECT COUNT(posicion_name) FROM {$wpdb->prefix}image_header WHERE posicion_name = %s;",
			$position

		));
	}


	/**
	 * Crea una nueva posicion en header
	 * @param  String  $post_id
	 * @param  Integer  $post_id
	 * @return Boolean
	 */
	function create_new_position_image_header ($post_id, $position) {
		global $wpdb;
		$result = $wpdb->query( $wpdb->prepare(
			"INSERT INTO {$wpdb->prefix}image_header ( posicion_name, post_id ) VALUES ( %s, %s );",
			$position, $post_id
		));
		return ($result !== false) ? 1 : 0;
	}



	/**
	 * checa si existe el id en la tabla
	 * @return posicion del id
	 */
	function revisar_si_esxite_post_id($post_id){
		global $wpdb;
		return $wpdb->get_var(
			$wpdb->prepare("SELECT posicion_name FROM {$wpdb->prefix}image_header WHERE post_id = %s;",
			$post_id

		));
	}


	function update_posiciones($post_id, $position){

		global $wpdb;
		$wpdb->query("UPDATE {$wpdb->prefix}image_header SET post_id = '$post_id'
					WHERE posicion_name = '$position' "
			);

	}



	/**
	 * muestra la posicion del post en el header (uso en admin)
	 */
	function get_image_header($post_id){

		global $wpdb;
		return $wpdb->get_var("SELECT posicion_name FROM {$wpdb->prefix}image_header
			WHERE post_id = '$post_id' ORDER BY position_id DESC LIMIT 1; "
		);

	}

	/**
	 * regresa imagen id y title de objeto para header
	 */
	function view_imagen_header(){
		global $wpdb;

		return $wpdb->get_results("SELECT posicion_name, post_id FROM {$wpdb->prefix}image_header
										ORDER BY
											CASE
												WHEN posicion_name=1 THEN 1
												WHEN posicion_name=2 THEN 2
												WHEN posicion_name=4 THEN 3
												WHEN posicion_name=5 THEN 4
												WHEN posicion_name=6 THEN 5
												WHEN posicion_name=3 THEN 6
												WHEN posicion_name=7 THEN 7
												WHEN posicion_name=8 THEN 8
											END ASC;");


	}
