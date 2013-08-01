<?php

//------------------------------------ Front end scripts


	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	add_action('wp_enqueue_scripts', 'enqueue_childfund_scripts');

	function enqueue_childfund_scripts(){

		wp_enqueue_script( 'validate', JSPATH.'jquery.validate.min.js', array('jquery'), false, true);
		wp_enqueue_script( 'messages_es', JSPATH.'messages_es.js', array('jquery', 'validate'), false, true);
		wp_enqueue_script( 'audio-player', JSPATH.'audio-player.js', array('jquery'), false, true);
		wp_enqueue_script( 'easing', JSPATH.'jquery.easing.1.3.js', array('jquery'), false, true);
		wp_enqueue_script( 'quicksand', JSPATH.'jquery.quicksand.js', array('jquery'), false, true);
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('jquery', 'validate'), false, true);
		wp_enqueue_script( 'mapa', JSPATH.'jquery-1.7.1.js', array('jquery'), false, true);

		wp_localize_script('functions', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');
	}


//------------------------------------ wp dashboard (admin) scripts

	add_action('admin_enqueue_scripts', 'enqueue_childfund_admin_scripts');

	function enqueue_childfund_admin_scripts(){

		// scripts
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'jquery-ui-datepicker' ); // Default WordPress datepicker
		wp_enqueue_script( 'modernizr_admin', JSPATH.'modernizr.min.js', array('jquery'), false, true);
		wp_enqueue_script( 'functions_admin', JSPATH.'functions_admin.js', array('jquery', 'media-upload', 'modernizr_admin', 'jquery-ui-datepicker'), false, true);

		// styles
		wp_enqueue_style( 'styles_admin', CSSPATH.'style_admin.css' );
		wp_enqueue_style( 'jquery-ui-css', CSSPATH.'jquery-ui.css' );

		wp_localize_script('functions_admin', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');

		wp_enqueue_media();
	}

//------------------------------------ Registro de menús


	function registro_de_menus() {
		register_nav_menus(
			array(
				'top_menu'  => 'Menú superior',

				'main_menu' => 'Menú principal'
			));
	}
	add_action('init', 'registro_de_menus');


//------------------------------------ Crear Pages

	add_action('init', function(){
		if( ! get_page_by_title('Padrino Facturas') ){
			$page = array(
				'post_author'  => 1,
				'post_status'  => 'publish',
				'post_title'   => 'Padrino Facturas',
				'post_type'    => 'page'
			);
			wp_insert_post( $page, true );
		}
	});


//------------------------------------ Acceso redirigido para padrinos


	function rt_checkRole() {

		global $wp_roles;
		$currentrole ='';
		foreach ( $wp_roles->role_names as $role => $name ) :
			if ( current_user_can( $role ) ):
						$currentrole = $role;
					endif;
		endforeach;


		if( $currentrole == 'padrino' and !isset($_REQUEST['action']) ) :
			wp_redirect( site_url().'/acceso-padrinos/' );
		endif;

		if($currentrole == 'subscriber'):
			wp_redirect( site_url().'/acceso-padrinos/' );
		endif;
	}

	add_action('admin_init', 'rt_checkRole');
	//add_action('template_redirect', 'rt_redirectuser');

	//esconde la barra de WP a cualquiera que no sea admin
	function my_function_admin_bar($content) {
		return ( current_user_can( 'administrator' ) ) ? $content : false;
	}
	add_filter( 'show_admin_bar' , 'my_function_admin_bar');

//------------------------------------ Agrega campos al perfil de usuarios


	function my_user_contactmethods($user_contactmethods){
		$user_contactmethods['twitter']     = 'Twitter';
		$user_contactmethods['facebook']    = 'Facebook';
		$user_contactmethods['user_email2'] = 'Otro email';
		$user_contactmethods['padrino_id']  = 'ID de padrino en ChildFund';
	  return $user_contactmethods;
	}

	add_filter('user_contactmethods', 'my_user_contactmethods');


//------------------------------------ Registro de post-types y taxonomías

	function registro_de_post_types() {
		$args = array ( 'public' => true, 'label' => 'Niños', 'menu_position' => 5, 'show_in_menu' => true, 'has_archive' => true, 'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'comments' ) );
		register_post_type( 'ninos', $args );

		$args = array ( 'public' => true, 'label' => 'Organizaciones comunitarias', 'menu_position' => 5, 'show_in_menu' => true, 'has_archive' => true, 'rewrite' => array( 'slug' => 'organizaciones-comunitarias' ) );
		register_post_type( 'centros', $args );

		$args = array ( 'public' => true, 'label' => 'Infome anual', 'show_in_menu' => true, 'has_archive' => true, 'supports' => array ('title', 'editor', 'custom-fields', 'thumbnail' ) );
		register_post_type( 'informe', $args );

		$args = array ( 'public' => true, 'label' => 'Escucha', 'menu_position' => 5, 'show_in_menu' => true, 'has_archive' => true, 'supports' => array( 'title', 'custom-fields' ) );
		register_post_type( 'escucha', $args );

		$args = array ( 'public' => true, 'label' => 'FAQ', 'menu_position' => 5, 'show_in_menu' => true, 'has_archive' => true );
		register_post_type( 'faq', $args );

		$args = array ( 'public' => true, 'label' => 'Regalos', 'menu_position' => 5, 'show_in_menu' => true, 'has_archive' => true, 'supports' => array( 'title', 'custom-fields', 'thumbnail' ) );
		register_post_type( 'productos', $args );

		$args = array ( 'public' => true, 'label' => 'Intención de apadrinar', 'show_in_menu' => true, 'has_archive' => true, 'supports' => array( 'title', 'custom-fields' ) );
		register_post_type( 'intencion-padrinos', $args );

		// Taxonomías
		register_taxonomy('centros_comunitarios_estados',array('centros'), array(
			'hierarchical' => true,
			'label'        => 'Estados',
			'show_ui'      => true,
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'centros_comunitarios_estados' ),
		  ));

		register_taxonomy('estatus_ninos',array('ninos'), array(
			'hierarchical' => true,
			'label'        => 'Estatus niño',
			'show_ui'      => true,
			'query_var'    => true
		  ));
	}

	add_action('init', 'registro_de_post_types');


//------------------------------------ Tamaños de imágenes


	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}


	if ( function_exists( 'add_image_size' ) ) {

		add_image_size( 'noticias-thumb', 220, 180, true ); //300 pixels wide (and unlimited height)
		add_image_size( 'noticias-interior', 600, 9999 ); //(cropped)
		add_image_size( 'ninos-thumb', 100, 133, true );
		add_image_size( 'ninos-interior', 165, 220, true );
		add_image_size( 'tienda-thumb', 200, 200, true );
		add_image_size( 'cart-thumb', 90, 90, true );
	}


//------------------------------------ CUSTOM FIELD NIÑO - PADRINO ID

	add_action("admin_init", "ninos_meta_init");

	function ninos_meta_init(){
		add_meta_box("mi_padrino", "Metadata", "ninos_meta_setup", "ninos", "side", "low");
	}

	function ninos_meta_setup(){
		global $post;


		$padrino_id = get_post_meta($post->ID, '_padrino_id', true);
		$nino_id    = get_post_meta($post->ID, '_nino_id', true);
		$rango_edad = get_post_meta($post->ID, '_rango_edad', true);
		?>
		<p>
			<!-- Padrino -->
			<label style="margin-right:10px;">Padrino ID:</label>
			<input id="_padrino_id" name="_padrino_id" class="widefat" value="<?php echo $padrino_id; ?>" />
		</p>

		<p>
			<!-- Niño -->
			<label style="margin-right:26px;">Niño ID:</label>
			<input id="_nino_id" name="_nino_id" class="widefat" value="<?php echo $nino_id; ?>" />
		</p>


		<p>
			<!-- Rango Edad -->
			<label>Rango Edad:</label>

			<select name="select_edad" id="select_edad" class="widefat" style="margin-top: 5px;">
				<option value="">– seleccionar –</option>
				<option value="0-5">0-5 años</option>
				<option value="6-12">6-12 años</option>
				<option value="13-18">13-18 años</option>

			<input type="hidden" id="_rango_edad" name="_rango_edad" value="<?php echo $rango_edad; ?>" />
		</p>

		<script>
			jQuery(document).ready(function() {


				var edad = jQuery('#_rango_edad').val();
				if(edad != ''){
					jQuery('#select_edad').val(edad);
				}

				jQuery('#publish').click(function() {
					var edad_selected = jQuery('#select_edad').val();
					jQuery('#_rango_edad').attr('value', edad_selected);
				});

			});
		</script>
		<?php
	}


	add_action('save_post', 'ninos_meta_save');

	function ninos_meta_save(){
		global $post;
		update_post_meta($post->ID, "_padrino_id", $_POST["_padrino_id"]);
		update_post_meta($post->ID, "_nino_id", $_POST["_nino_id"]);
		update_post_meta($post->ID, "_rango_edad", $_POST["_rango_edad"]);

	}


//------------------------------------ CUSTOM FIELDS PRODUCTOS (REGALOS)

	define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
	define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));


	add_action('admin_init','meta_init');

	function meta_init(){
		foreach (array('productos') as $type){
			add_meta_box('productos_all_meta', 'Descripción Producto', 'productos_meta_setup', $type, 'normal', 'high');
		}
		add_action('save_post','productos_meta_save');

	}

	function productos_meta_setup(){
		global $post;

		// using an underscore, prevents the meta variable from showing up in the custom fields section
		$meta = get_post_meta($post->ID,'_productos_meta',TRUE);

		// instead of writing HTML here, lets do an include
		include(MY_THEME_FOLDER . '/custom/productos_meta.php');


		// create a custom nonce for submit verification later
		echo '<input type="hidden" name="productos_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	}


//------------------------------------ SAVE OBJETO META DATA
	function productos_meta_save($post_id){

		// authentication checks: make sure data came from our meta box
		$the_nonce = (empty($_POST['productos_meta_noncename'])) ? "" : $_POST['productos_meta_noncename'];

		if (!wp_verify_nonce($the_nonce,__FILE__)){
			return $post_id;
		}


		// check user permissions
		if ($_POST['post_type'] == 'productos'){
			if (!current_user_can('edit_page', $post_id)){ return $post_id; }
		}else{
			if (!current_user_can('edit_post', $post_id)){ return $post_id; }
		}


		// authentication passed, save data
		$current_data = get_post_meta($post_id, '_productos_meta', TRUE);

		$new_data = $_POST['_productos_meta'];

		my_meta_clean($new_data);

		if ($current_data){
			if(is_null($new_data)){
				delete_post_meta($post_id,'_productos_meta');
			}else{
				update_post_meta($post_id,'_productos_meta',$new_data);
			}

		}elseif(!is_null($new_data)){
			add_post_meta($post_id,'_productos_meta',$new_data,TRUE);
		}
		return $post_id;
	}

	function my_meta_clean(&$arr){
		if (is_array($arr)){
			foreach ($arr as $i => $v){
				if (is_array($arr[$i])){
					my_meta_clean($arr[$i]);
					if (!count($arr[$i])){
						unset($arr[$i]);
					}
				}else{
					if (trim($arr[$i]) == ''){
						unset($arr[$i]);
					}
				}
			}
			if (!count($arr)){
				$arr = NULL;
			}
		}
	}

//------------------------------------ Agrega elementos al carrito de compras (wp_cart)
	/*
		CREATE TABLE `wp_cart` (
		  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `user_id` int(11) DEFAULT NULL,
		  `post_id` int(11) DEFAULT NULL,
		  `quantity` int(11) DEFAULT '0',
		  `beneficiario` int(11) DEFAULT NULL,
		  `cart_status` varchar(11) DEFAULT NULL,
		  PRIMARY KEY (`cart_id`)
		) DEFAULT CHARSET=utf8;
	*/
	function add_to_cart(){
		global $wpdb;

		$post_id = (isSet($_POST['post_id'])) ? $_POST['post_id'] : "";
		$user_id = (isSet($_POST['user_id'])) ? $_POST['user_id'] : "";

		$post_id = mysql_real_escape_string($post_id);
		$user_id = mysql_real_escape_string($user_id);


		if($post_id != '' && $user_id != ''){
			$insert = "INSERT INTO wp_cart ( user_id, post_id, quantity ) VALUES ( '$user_id', '$post_id', '1' );";
			$result = mysql_query($insert);
		}
		exit;
	}
	add_action('wp_ajax_add_to_cart', 'add_to_cart');
	add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');



//------------------------------------ Borrar elementos del carrito de compras (wp_cart)

	function delete_cart_element(){
		global $wpdb;
		$cart_id = (isSet($_POST['cart_id'])) ? $_POST['cart_id'] : "";
		$user_id = (isSet($_POST['user_id'])) ? $_POST['user_id'] : "";


		$post_id = mysql_real_escape_string($post_id);
		$user_id = mysql_real_escape_string($user_id);


		$query = "DELETE FROM wp_cart WHERE cart_id = '$cart_id' AND cart_status IS NULL;";
		$result = mysql_query($query);
		exit;
	}
	add_action('wp_ajax_delete_cart_element', 'delete_cart_element');
	add_action('wp_ajax_nopriv_delete_cart_element', 'delete_cart_element');


//------------------------------------ Cambiar la cantidad de elementos en wp_cart
	function update_cart_quantity(){
		global $wpdb;

		$post_id = (isSet($_POST['post_id'])) ? $_POST['post_id'] : "";
		$user_id = (isSet($_POST['user_id'])) ? $_POST['user_id'] : "";
		$quantity = (isSet($_POST['quantity'])) ? $_POST['quantity'] : "";

		$post_id = mysql_real_escape_string($post_id);
		$user_id = mysql_real_escape_string($user_id);
		$quantity = mysql_real_escape_string($quantity);


		if($quantity > 0){
			$query = "UPDATE wp_cart SET quantity = '$quantity' WHERE user_id = '$user_id' AND post_id  = '$post_id' AND cart_status IS NULL;";
			$result = mysql_query($query);
		}
		exit;
	}
	add_action('wp_ajax_update_cart_quantity', 'update_cart_quantity');
	add_action('wp_ajax_nopriv_update_cart_quantity', 'update_cart_quantity');



	add_action( 'admin_init', function(){
		register_setting('votacion_iberocine', 'fecha_seleccion');

	});

	add_action( 'admin_menu', function(){
		add_options_page( 'votacion', 'Votación', 'administrator', 'iberocine-settings', function(){

			add_settings_section('fechas_main_section', 'Fehcas Limite', '', __FILE__);
			add_settings_field('seleccion', 'Fecha límite de Selección', 'seleccion_callback', __FILE__, 'fechas_main_section');


			// Fehca Selección
			function seleccion_callback(){
				$seleccion = get_option('fecha_seleccion');
				echo "<textarea class='large-text' name='fecha_seleccion' value='$seleccion' rows='10' ></textarea>";
			}

			?>

			<div class="wrap">
				<?php screen_icon(); ?>
				<h2>Fechas de la Votación</h2>
				<form method="POST" action="options.php">
					<?php settings_fields('votacion_iberocine'); ?>
					<?php do_settings_sections(__FILE__); ?>
					<p class="submit">
						<input name="submit" type="submit" class="button-primary" value="Guardar Cambios" />
					</p>
				</form>
			</div><?php

		});
	});



	function get_post_thumb(){
		$post_id = ( isset($_POST['post_id']) ) ? $_POST['post_id'] : '';
		$image   = get_the_post_thumbnail( $post_id, 'thumbnail' );
		echo json_encode($image);
		exit;
	}
	add_action('wp_ajax_get_post_thumb', 'get_post_thumb');
	add_action('wp_ajax_nopriv_get_post_thumb', 'get_post_thumb');


	function add_ahijado_message(){

		global $current_user;

		$post_id = (isSet($_POST['post_id'])) ? $_POST['post_id'] : "";
		$message = (isSet($_POST['message'])) ? $_POST['message'] : "";

		$time = current_time('mysql');

		$data = array(
			'comment_post_ID'      => $post_id,
			'comment_author'       => $current_user->user_login,
			'comment_author_email' => $current_user->user_email,
			'comment_author_url'   => 'http://',
			'comment_content'      => $message,
			'comment_type'         => '',
			'comment_parent'       => 0,
			'user_id'              => $current_user->ID,
			'comment_agent'        => '',
			'comment_date'         => $time,
			'comment_approved'     => 1,
		);

		$result = wp_insert_comment($data);

		echo json_encode($result);
		exit;

	}
	add_action('wp_ajax_add_ahijado_message', 'add_ahijado_message');
	add_action('wp_ajax_nopriv_add_ahijado_message', 'add_ahijado_message');



	function get_facturas_padrino($user_id){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT * FROM wp_posts
				WHERE post_author = '$user_id'
					AND post_type = 'attachment'
					AND post_mime_type = 'application/pdf'
						ORDER BY post_date;", OBJECT);

	}


	function user_custom_fields($user){
		$facturas = get_the_author_meta('_facturas_padrino', $user->ID ); ?>

		<!-- User Information -->
		<h3>Información</h3>
		<table class="form-table">
			<tr>
				<th><label for="ocupacion">Facturas</label></th>
				<td>
					<button class='upload_factura_button' data-uploader_title='factura_file' data-user_id="<?php echo $user->ID ?>">
						Seleccionar Archivo
					</button>
				</td>
			</tr>

			<?php $facturas = get_facturas_padrino($user->ID);

			foreach ($facturas as $key => $factura) { ?>
				<tr>
					<th></th>
					<td><?php echo $factura->post_title.'.pdf'; ?></td>
				</tr>
		<?php } ?>

		</table><?php
	}

	add_action( 'show_user_profile', 'user_custom_fields' );
	add_action( 'edit_user_profile', 'user_custom_fields' );


	add_filter('parse_query', 'parse_query_callback');

	function parse_query_callback($wp_query){
		if( is_admin() and preg_match('/user-edit.php/', $_SERVER['HTTP_REFERER']) ){

			$parts = explode('user_id=', $_SERVER['HTTP_REFERER']);

			$user_id = ($parts) ? explode('&', $parts[1]) : false;

			if( isset($user_id[0]) and !empty($user_id[0]) ){
				$wp_query->set('author' , $user_id[0]);
			}

			$wp_query->set('post_mime_type' , 'application/pdf');
		}
	}


	// Guardar los campos (meta) del usuario
	function save_user_custom_fields($user_id) {
		if ( !current_user_can( 'edit_user', $user_id ) ){
			return false;
		}
		$user_meta = ( isset($_POST['_facturas_padrino']) ) ? $_POST['_facturas_padrino'] : '';
		update_user_meta( $user_id, '_facturas_padrino', $user_meta );
	}
	add_action( 'personal_options_update', 'save_user_custom_fields' );
	add_action( 'edit_user_profile_update', 'save_user_custom_fields' );



	function save_factura(){
		global $wpdb;

		$attachment = ( isset($_POST['attachment']) ) ? $_POST['attachment'] : false;
		$user_id    = ( isset($_POST['user_id']) )    ? $_POST['user_id']    : false;
		$fecha      = ( isset($_POST['fecha']) )      ? $_POST['fecha']      : false;

		if($attachment and $user_id){
			$wpdb->query("UPDATE wp_posts SET post_author = '$user_id' WHERE ID = '$attachment'");
		}

		update_post_meta($attachment, 'fecha_factura', $fecha );


		echo json_encode($attachment);
		exit;
	}
	add_action('wp_ajax_save_factura', 'save_factura');
	add_action('wp_ajax_nopriv_save_factura', 'save_factura');


//------------------------------------ Attachments Meta (facturas)

	add_filter( 'attachment_fields_to_edit', 'custom_attachment_fields', 1, 2 );

	function custom_attachment_fields( $form_fields, $attachment ) {

		$fecha = get_post_meta( $attachment->ID, 'fecha_factura', true );

		// $form_fields['fecha_factura'] = array(
		// 	'label' => 'Fecha',
		// 	'input' => 'text',
		// 	'value' => $fecha_factura
		// );



		$fecha_factura = &$form_fields['fecha_factura'];
		$fecha_factura['label'] = 'Fecha';
		$fecha_factura['input'] = 'html';
		$fecha_factura['html']  = "<input type='date'
										class='fecha-factura'
										name='attachments[$attachment->ID][fecha_factura]'
										id='attachments[$attachment->ID][fecha_factura]'
										value='$fecha' />";

		return $form_fields;
	}


	add_action( 'edit_attachment', 'save_attachment_meta_callback' );

	function save_attachment_meta_callback( $attachment_id ) {

		$fecha_factura = $_REQUEST['attachments'][$attachment_id]['fecha_factura'];

		if ( $fecha_factura ) {
			update_post_meta( $attachment_id, 'fecha_factura', $fecha_factura );
		}else{
			delete_post_meta( $attachment_id, 'fecha_factura');
		}
	}





	function childfund_login(){

		$username = isset($_POST['login_username']) ? $_POST['login_username'] : '';
		$password = isset($_POST['login_userpass']) ? $_POST['login_userpass'] : '';

		if( $username  and $password ) :

			$creds = array(
				'user_login'	=> $username,
				'user_password'	=> $password,
				'remember'		=> true
			);

			$user = wp_signon( $creds, false );
		endif;

		if ( is_wp_error( $user ) ) {
			echo json_encode( $user->get_error_message() );
		} else {
			echo json_encode( wp_set_current_user( $user->ID ) );
		}
		exit;
	}
	add_action('wp_ajax_childfund_login', 'childfund_login');
	add_action('wp_ajax_nopriv_childfund_login', 'childfund_login');



