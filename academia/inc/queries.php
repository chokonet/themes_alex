<?php


// CREAR LA TABLA PARA GUARDAR ACTIVIDAD USUARIO /////////////////////////////////////


	add_action('init', function() use (&$wpdb){
		$wpdb->query(
			"CREATE TABLE IF NOT EXISTS wp_actividad (
				actividad_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				facebook_id BIGINT(20) NOT NULL,
				post_id BIGINT(20) NOT NULL,
				favorito INT(10) UNSIGNED NOT NULL DEFAULT '0',
				PRIMARY KEY (actividad_id),
				KEY post_id (post_id)
			) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;"
		);
	});