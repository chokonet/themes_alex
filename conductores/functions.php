<?php
	add_theme_support ('post-thumbnails');

	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'videos', 98, 59, true); //menu index
	add_image_size( 'slide', 324, 103, true); //menu index
	add_image_size( 'footer_post', 297, 95, true);
	add_image_size( 'foto_single', 610, 212, true);
	}

	// Definir el paths a los directorios de javascript y css
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() );



// ENQUEUE FRONT END JAVASCRIPT AND CSS //////////////////////////////////////////////



	add_action('wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true);
		wp_enqueue_script('functions', JSPATH.'functions.js', array('plugins'), '1.0', true);

		// styles
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		// localize scripts
		wp_localize_script('functions', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php' );

	});

	// MAIN QUERY //////////////////////////////////////////////////////////
	add_action('pre_get_posts', function($query){
		if ( !is_admin() && $query->is_main_query() ){

			if( is_home() ){
				$query->set('category_name', 'capsulas');
				$query->set('posts_per_page', 2);
			}
			if( is_category('capsulas') ){
				$query->set('category_name', 'capsulas');
				$query->set('posts_per_page', 6);
			}
		}


	});



// ENQUEUE ADMIN JAVASCRIPT AND CSS //////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// admin scripts
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script('admin_js', JSPATH.'admin.js', array('jquery'), '1.0', true);

		// localize admin scripts
		wp_localize_script('admin_js', 'ajax_url', get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');

		wp_enqueue_media();

	});



// ADD THUMBNAIL AND FEED SUPPORT ////////////////////////////////////////////////////



	add_theme_support( 'post-thumbnails' );

	// thumbnail
	update_option('thumbnail_size_w', 100);
	update_option('thumbnail_size_h', 60);

	// medium size
	update_option('medium_size_w', 297);
	update_option('medium_size_h', 95);

	add_theme_support( 'automatic-feed-links' );



// METABOXES AND TAXONOMIES //////////////////////////////////////////////////////////



	require_once 'inc/metaboxes.php';


	require_once 'inc/taxonomies.php';



// GENERAR USUARIOS NECESARIOS ///////////////////////////////////////////////////////



	add_action('init', function(){
		$users = array('Juan', 'Fer', 'David', 'Lakshmi');
		array_map('create_usuario_conductor', $users);
	});


	function create_usuario_conductor($user){
		$user_id = wp_create_user( $user, wp_generate_password() );

		if ( is_int($user_id) ){
			set_conductor_role($user_id);
		}
	}

	function set_conductor_role($user_id){
		$wp_user = get_user_by( 'id', $user_id );
		$wp_user->set_role('administrator');
		update_user_meta($user_id, 'conductor', 1);
	}


	function get_usuarios_conductores(){
		return get_users( array(
			'meta_key'     => 'conductor',
			'meta_value'   => 1,
			'meta_compare' => '=',
			'orderby'      => 'ID'
		) );
	}

	function usuarios_conductores(){
		$conductores = get_usuarios_conductores();


		$result = '<ul>';
		foreach ($conductores as $conductor) {


			$class = ( is_author($conductor->ID) ) ? 'active_' : '';

			$authorUrl = site_url("author/{$conductor->user_nicename}");
			$result   .= "<a href='$authorUrl'><li class='{$conductor->user_nicename} animate $class{$conductor->user_nicename}'>{$conductor->user_login}</li></a>";
		}
		echo  "$result</ul>";
	}


	function save_user_image(){
		global $wpdb;
		$attachment_id = ( isset($_POST['attachment']) ) ? $_POST['attachment'] : false;
		$user_id       = ( isset($_POST['user_id']) )    ? $_POST['user_id']    : false;
		$img_src       = wp_get_attachment_image_src( $attachment_id, 'full' );
		$img_tag       = '<img src="'. $img_src[0] . '">';
		$result = update_user_meta($user_id, 'user_image', $img_tag );
		wp_send_json_success( $result );
	}
	add_action('wp_ajax_save_user_image', 'save_user_image');
	add_action('wp_ajax_nopriv_save_user_image', 'save_user_image');


	function get_capsula_video(){

		$post_id = isset($_GET['post_id']) ? $_GET['post_id'] : '';
		$video = get_post_meta($post_id, 'video_object', true);

		file_put_contents(
			'/Users/maquilador4/Desktop/php.txt',
			var_export( 'entro al get_capsula_video', true )
		);

		echo json_encode($video);
		exit;
	}
	add_action('wp_ajax_get_capsula_video', 'get_capsula_video');
	add_action('wp_ajax_nopriv_get_capsula_video', 'get_capsula_video');






	add_action('admin_init', function(){
		register_setting('informacion_twitter', 'twitter_info');
		register_setting('informacion_twitter', 'twitter_hash');
	});


	add_action('admin_menu', function(){

		add_menu_page('Twitter', 'Twitter', 'administrator', 'informacion-twitter', function(){

			add_settings_section('twitter_section', 'Twitter Conductores', 'twitter_section_callback', 'informacion-twitter');
			add_settings_section('hashtag_section', 'Trending', 'hashtag_section_callback', 'informacion-twitter'); ?>

			<div class="wrap">
				<?php screen_icon('options-general'); ?>
				<h2>Informacion Twitter</h2>
				<form method="POST" action="options.php">
					<?php settings_fields('informacion_twitter'); ?>
					<?php do_settings_sections('informacion-twitter'); ?>
					<p class="submit">
						<input name="submit" type="submit" class="button-primary" value="Guardar Cambios" />
					</p>
				</form>
			</div><?php

		});
	});

	function twitter_section_callback(){
		$conductores = get_usuarios_conductores();

		foreach ($conductores as $index => $conductor) {
			add_settings_field(
				"twitter_$conductor->user_login",
				"Twitter $conductor->user_login",
				"twitter_callback",
				"informacion-twitter",
				"twitter_section",
				array('user_login' => $conductor->data->user_login)
			);
		}
	}


	function hashtag_section_callback(){
		for($i=0; $i<4; $i++){
			add_settings_field(
				"hashtag_$i",
				"Hashtag $i",
				"hashtag_callback",
				"informacion-twitter",
				"hashtag_section",
				$i
			);
		}
	}


	function twitter_callback($conductor){
		$twitter     = get_option('twitter_info');
		$user_login  = $conductor['user_login'];
		$twitterUser = isset($twitter[$user_login]) ? $twitter[$user_login] : '';
		echo "@<input type='text' class='regular-text' name='twitter_info[$user_login]' value='$twitterUser' placeholder='username'>";
	}

	function hashtag_callback($index){
		$hashtags = get_option('twitter_hash');
		echo "#<input type='text' class='regular-text' name='twitter_hash[$index]' value='{$hashtags[$index]}' placeholder='topic'>";
	}

	// CUSTOM PAGES //////////////////////////////////////////////////////////////////////

  add_action('init', function(){

		// Page Cartelera
		if( ! get_page_by_path('social') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Social',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


	});

  /*paginacion*/
	function get_pagination_links() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
		  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		  'format' => '?paged=%#%',
		  'current' => max( 1, get_query_var('paged') ),
		  'total' => $wp_query->max_num_pages,


		    ) );
	}
/*
---------------------
	LIMIT WORDS
---------------------
*/

function string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}