<?php


	include_once('class.escorts.php');



// CUSTOM USER CONFIGURATIONS /////////////////////////////////////////////////////////


	$administrator = get_role('administrator');
	add_role( 'developer', 'Developer', $administrator->capabilities );


	// rol de excort (cambiar permisos)
	$escort = get_role('contributor');
	add_role( 'escort', 'Escort', $escort->capabilities );


	remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );


	add_filter('user_contactmethods', function ( $contactmethods ) {
			unset($contactmethods['aim']);
			unset($contactmethods['yim']);
			unset($contactmethods['jabber']);
			$contactmethods['twitter']    = 'Twitter';
			$contactmethods['facebook']   = 'Facebook';
			$contactmethods['url_imagen'] = 'Url Imagen';
			$contactmethods['mobile']     = 'Mobile';
			return $contactmethods;
	});



// CHECK PROFILE STATUS ///////////////////////////////////////////////////////////////



	function my_show_extra_profile_fields ($user) { ?>
		<h3>Extra profile information</h3>
		<table class="form-table">
			<tr>
				<th><label>Profile active</label></th>
				<td>
					<input type="checkbox" name="profile_active" id="profile_active" value="true" <?php if (esc_attr( get_the_author_meta( "profile_active", $user->ID )) == "true") echo "checked"; ?> />
					<label for="profile_active">Active</label>
				</td>
			</tr>
		</table>
		<?php
	}
	add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
	add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );



	function my_save_extra_profile_fields( $user_id ) {
		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		if (!isset($_POST['profile_active'])) $_POST['profile_active'] = "false";

		update_user_meta( $user_id, 'profile_active', $_POST['profile_active'] );
	}
	add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
	add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );



// MOSTRAR MENUS ESPECIALES PARA EL ROL DEVELOPER /////////////////////////////////////



	add_action('admin_menu', function() use (&$current_user){
		if ( in_array('developer', $current_user->roles) ){
			add_options_page( 'All Settings', 'All Settings', 'developer', 'options.php');
		}
	});



// CREATE DEFAULT USERS ///////////////////////////////////////////////////////////////



	add_action('init', function(){
		$users = array('cova', 'nori', 'alex', 'san', 'raul', 'john', 'york');
		array_map('create_usuario_maquilador', $users);
	});



	/**
	 * Crear un nuevo usuario
	 * @param  string $user username
	 */
	function create_usuario_maquilador($user){
		$password = wp_generate_password();
		$user_id  = wp_create_user( $user, $password, "$user@losmaquiladores.com" );
		if ( is_int($user_id) ){
			set_maquilador_role( $user_id );
			wp_new_user_notification( $user_id, $password );
		}
	}


	/**
	 * Set user role as developer (super admin)
	 * @param int $user_id
	 */
	function set_maquilador_role($user_id){
		$wp_user = get_user_by( 'id', $user_id );
		$wp_user->set_role( 'developer' );
	}



// AGREGAR COLUMNA USER MODIFIEDA LA TABLA DE USUARIOS ////////////////////////////////



	add_action('init', function() use (&$wpdb){
		$column = $wpdb->get_var("SELECT user_modified FROM {$wpdb->prefix}users LIMIT 1;");
		if ( ! $column){
			$wpdb->query(
				"ALTER TABLE {$wpdb->prefix}users ADD COLUMN user_modified
					TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;"
			);
		}


		$wpdb->query(
			"CREATE TABLE IF NOT EXISTS {$wpdb->prefix}services (
				service_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				service_type VARCHAR(20) NOT NULL DEFAULT '',
				service_name VARCHAR(20) NOT NULL DEFAULT '',
				service_slug VARCHAR(20) NOT NULL DEFAULT '',
				PRIMARY KEY (service_id),
				UNIQUE KEY service_slug (service_slug),
				KEY service_name (service_name)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
		);


		$wpdb->query(
			"CREATE TABLE IF NOT EXISTS {$wpdb->prefix}service_relationships (
				escort_id BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
				service_relationship_id BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
				INDEX service_index (service_relationship_id),
				FOREIGN KEY (service_relationship_id) REFERENCES {$wpdb->prefix}services(service_id) ON DELETE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
		);


		$wpdb->query(
			"CREATE TABLE IF NOT EXISTS {$wpdb->prefix}account_profile (
				profile_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				account_id BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
				region VARCHAR(20) NOT NULL,
				area VARCHAR(20) NOT NULL,
				nationality VARCHAR(20) NOT NULL DEFAULT '',
				ethnicity VARCHAR(20) NOT NULL DEFAULT '',
				height INT(11) NOT NULL DEFAULT '0',
				weight INT(11) NOT NULL DEFAULT '0',
				age INT(11) NOT NULL DEFAULT '0',
				shoe_size INT(11) NOT NULL DEFAULT '0',
				hair_color VARCHAR(20) NOT NULL DEFAULT '',
				eyes_color VARCHAR(20) NOT NULL DEFAULT '',
				breast_size VARCHAR(20) NOT NULL DEFAULT '',
				pubic_hair VARCHAR(20) NOT NULL DEFAULT '',
				available TINYINT(1) NOT NULL DEFAULT '0',
				work_email VARCHAR(20) NOT NULL DEFAULT '',
				rating_appearance INT(11) NOT NULL DEFAULT '0',
				rating_personality INT(11) NOT NULL DEFAULT '0',
				rating_service INT(11) NOT NULL DEFAULT '0',
				rating_place INT(11) NOT NULL DEFAULT '0',
				next_payment DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				PRIMARY KEY (profile_id),
				KEY escort_id (account_id)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
		);

	});




// ADMINISTRAR USUARIOS ///////////////////////////////////////////////////////////////