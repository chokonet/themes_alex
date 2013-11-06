<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


	//•--------------------» [ FRONT END ] «--------------------•\\


		// PAGE HOME
		if( ! get_page_by_path('home') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Home',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		// PAGE FAQ
		if( ! get_page_by_path('faq') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'FAQ',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

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
		// favorites
		if( ! get_page_by_path('favorites') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Favorites',
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





	//•--------------------» [ PARA ADMIN ] «--------------------•\\

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
		if( ! get_page_by_path('dashboard/edit') ){
			$parent = get_page_by_path('dashboard', OBJECT);
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Edit',
				'post_parent' => $parent->ID,
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		// MEMBERS
		if( ! get_page_by_path('dashboard/members') ){
			$parent = get_page_by_path('dashboard', OBJECT);
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Members',
				'post_parent' => $parent->ID,
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// CREATE USER
		if( ! get_page_by_path('dashboard/create-user') ){
			$parent = get_page_by_path('dashboard', OBJECT);
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Create User',
				'post_parent' => $parent->ID,
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// USERS
		if( ! get_page_by_path('dashboard/users') ){
			$parent = get_page_by_path('dashboard', OBJECT);
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Users',
				'post_parent' => $parent->ID,
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// USERS EDIT
		if( ! get_page_by_path('dashboard/edit-user') ){
			$parent = get_page_by_path('dashboard', OBJECT);
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Edit User',
				'post_parent' => $parent->ID,
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	});