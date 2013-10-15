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
			unset($contactmethods['url']);
			unset($contactmethods['aim']);
			unset($contactmethods['yim']);
			unset($contactmethods['jabber']);
			$contactmethods['twitter']  = 'Twitter';
			$contactmethods['facebook'] = 'Facebook';
			$contactmethods['url_imagen']  = 'Url Imagen';
			$contactmethods['mobile']  = 'Mobile';
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



// CREAR ROLES ////////////////////////////////////////////////////////////////////////



	add_action('admin_menu', function() use (&$current_user){
		if ( in_array('developer', $current_user->roles) ){
			add_options_page( 'All Settings', 'All Settings', 'developer', 'options.php');
		}
		if ( in_array('escort', $current_user->roles) ){
			add_options_page( 'All Settings', 'All Settings', 'escort', 'options.php');
		}
	});


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
	});
