<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		//•------------» [ PARA ADMIN ] «------------•\\

		// DASHBOARD
		if( ! get_page_by_path('dashboard') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Dashboard',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// EDIT
		if( ! get_page_by_path('edit') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Edit',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		// USERS
		if( ! get_page_by_path('users') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Users',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// USERS EDIT
		if( ! get_page_by_path('users-edit') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Users Edit',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		// Members
		if( ! get_page_by_path('members') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Members',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		// create-user
		if( ! get_page_by_path('create-users') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Create Users',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		// create-edit
		if( ! get_page_by_path('create-edit') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Create edit',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		//•------------» [ TERMINA PARA ADMIN ] «------------•\\


		// PAGE ADVANCED
		if( ! get_page_by_path('advanced-search') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Advanced Search',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PAGE FQS
		if( ! get_page_by_path('frequent-questions') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Frequent Questions',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PAGE REGISTER
		if( ! get_page_by_path('register') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Register',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PAGE CONTACT
		if( ! get_page_by_path('contact') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Contact',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PAGE LOGIN
		if( ! get_page_by_path('login') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Login',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PAGE SIGN ESCORT
		if( ! get_page_by_path('sign-escort') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Sign Escort',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PAGE SIGN ACCOUNT
		if( ! get_page_by_path('account') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Account',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PAGE SIGN TERMS
		if( ! get_page_by_path('terms') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Terms',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}



	});