<?php


// CREAR LA TABLA PARA GUARDAR ACTIVIDAD USUARIO /////////////////////////////////////



	add_action('init', function() use (&$wpdb){
		$wpdb->query(
			"CREATE TABLE IF NOT EXISTS wp_post_favorito (
				id_favorito BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				facebook_id BIGINT(20) NOT NULL,
				post_id_favorito BIGINT(20) NOT NULL,
				PRIMARY KEY (id_favorito),
				KEY post_id_favorito (post_id_favorito)
			) ENGINE=InnoDB AUTO_INCREMENT=1 CHARSET=utf8;"
		);
	});