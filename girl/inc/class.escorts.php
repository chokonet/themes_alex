<?php

namespace Escort;

	/**
	 * Class Query
	 * @author LosMaquiladores <info@losmaquiladores.com>
	 */
	class Query {

		public $accounts;
		private $wpdb, $table_prefix;

		public function __construct($query = true)
		{
			global $wpdb, $table_prefix;

			$this->wpdb   = &$wpdb;
			$this->query  = <<< SQL
				SELECT u.*, ap.region, ap.area FROM {$wpdb->prefix}users as u
						INNER JOIN {$wpdb->prefix}usermeta AS um ON u.ID = um.user_id
						LEFT OUTER JOIN {$wpdb->prefix}account_profile AS ap ON u.ID = ap.account_id
							WHERE u.user_status = '1'
							AND ( um.meta_key = 'wp_capabilities' AND CAST(um.meta_value AS CHAR) LIKE '%escort%' )
								ORDER BY RAND();
SQL;
			if($query) $this->execute();
		}


		public function query(){
			if( empty($this->results) ) $this->execute();
			return $this->results;
		}


		public function execute()
		{
			$this->accounts = $this->wpdb->get_results($this->query, OBJECT);
			$this->set_current();
		}


		public function set_current()
		{
			$this->current = current($this->accounts);
		}


		public function have_escorts()
		{
			return $this->current;
		}


		public function the_escort()
		{
			$current = $this->current;
			$this->current = next($this->accounts);
			return $current;
		}


		public function update_users_table($attrs)
		{
			$this->wpdb->update("{$this->wpdb->prefix}users",
				array(
					'user_nicename' => $attrs['user_nicename'],
					'user_email'    => $attrs['user_email'],
					'user_url'      => $attrs['user_url'],
					'user_status'   => $attrs['user_status'],
					'display_name'  => $attrs['user_nicename']
				),
				array( 'ID' => $attrs['ID'] ),
				array('%s','%s','%s','%d','%s')
			);
		}


		public function replace_profile_data($profileData)
		{
			$this->wpdb->replace(
				"{$this->wpdb->prefix}account_profile",
				$profileData,
				array('%d','%d','%s','%s','%s','%s','%d','%d','%d','%d','%s','%s','%s','%s','%d','%d','%s')
			);
		}


		public function insert_profile_data($profileData)
		{
			unset($profileData['profile_id']);
			$this->wpdb->insert(
				"{$this->wpdb->prefix}account_profile",
				$profileData,
				array('%d','%s','%s','%s','%s','%d','%d','%d','%d','%s','%s','%s','%s','%d','%d','%s')
			);
		}


		public function update_profile($attrs)
		{
			$attrs['profile_id'] = $this->get_profile_id( $attrs['ID'] );

			$profileData = array(
				'profile_id'   => $attrs['profile_id'],
				'account_id'   => $attrs['ID'],
				'region'       => $attrs['region'],
				'area'         => $attrs['area'],
				'nationality'  => $attrs['nationality'],
				'ethnicity'    => $attrs['ethnicity'],
				'height'       => $attrs['height'],
				'weight'       => $attrs['weight'],
				'age'          => $attrs['age'],
				'shoe_size'    => $attrs['shoe_size'],
				'hair_color'   => $attrs['hair_color'],
				'eyes_color'   => $attrs['eyes_color'],
				'breast_size'  => $attrs['breast_size'],
				'pubic_hair'   => $attrs['pubic_hair'],
				'available'    => $attrs['available'],
				'work_email'   => $attrs['work_email'],
				'next_payment' => $attrs['next_payment']
			);

			if ( $attrs['profile_id'] ){
				$this->replace_profile_data($profileData);
			}else{
				$this->insert_profile_data($profileData);
			}
		}


		public function update_services($attrs)
		{

			// revisar si existe el key => value pair (un solo query)

			// si existe actualizar campo

			// no existe insertar campo

			// $this->wpdb->replace(
			// 	"{$this->wpdb->prefix}services",
			// 	array(
			// 		'escort_id'  => $attrs['ID'],
			// 		'type'       => $attrs['type'],
			// 		'name'       => $attrs['name'],
			// 		'slug'       => $attrs['slug'],
			// 		'value'      => $attrs['value']
			// 	),
			// 	array('%d','%s','%s','%s','%s')
			// );
		}


		public function get_profile_id($account_id)
		{
			return $this->wpdb->get_var(
				"SELECT profile_id FROM {$this->wpdb->prefix}account_profile
					WHERE account_id = '$account_id';"
			);
		}


		public function to_slug($string)
		{
			$result = remove_accents($string);
			return apply_filters('sanitize_title', $result, $string, 'save');
		}



	} // end class Query




	/**
	 * Class Account
	 * @uses class Query
	 * @author LosMaquiladores <info@losmaquiladores.com>
	 */
	class Account extends Query{

		public $attrs;

		public function __construct($args)
		{

			parent::__construct(false);
			$defaults = array(
				'user_login'    => '', 'user_pass'  => '', 'next_payment' => '', 'available'   => '',
				'user_nicename' => '', 'user_email' => '', 'user_url'     => '', 'user_status' => '',
				'display_name'  => '', 'region'     => '', 'area'         => '', 'work_email'  => '',
				'nationality'   => '', 'ethnicity'  => '', 'age'          => '', 'weight'      => '',
				'height'        => '', 'hair_color' => '', 'eyes_color'   => '', 'shoe_size'   => '',
				'breast_size'   => '', 'pubic_hair' => ''
			);
			$this->attrs = wp_parse_args( $args, $defaults );
			$this->hash_password();
			return $this;
		}


		private function hash_password()
		{
			$this->attrs['user_pass'] = wp_hash_password($this->attrs['user_pass']);
		}



		public function create( $args = array() )
		{
			$this->attrs = wp_parse_args( $args, $this->attrs );
			return wp_create_user(
				$this->attrs['username'],
				$this->attrs['user_pass'],
				$this->attrs['user_email']
			);
		}


		public function save( $args = array() )
		{
			$this->attrs = wp_parse_args( $args, $this->attrs );

			if ( isset($this->attrs['ID']) ) return $this->update($args);

			$result = $this->create($args);

			if( ! is_wp_error($result) ) return $this->attrs['ID'] = $result;

			return $result;
		}


		/**
		 * Gets the URL of the author page for the author with a given ID
		 * @param  int		$user_id
		 * @return string	The URL to the escort page.
		 */
		public static function url($user_id)
		{
			echo get_author_posts_url($user_id);
		}


		private function array_pluck( &$array, $field )
		{
			$result = array();
			foreach ( $array as $key => $value ) {
				if ( strpos($key, $field) !== false ){
					$slug = $this->to_slug($value);
					$result[ $slug ] = $value;
					unset($array[ $key ]);
				}
			}
			return $result;
		}


		private function format_services()
		{
			$services = array();
			$services['ordinary'] = $this->array_pluck($this->attrs, 'ordinary');
			$services['extra']    = $this->array_pluck($this->attrs, 'extra');
			$services['tags']     = $this->array_pluck($this->attrs, 'tags');
			return $services;
		}



		private function update_database_tables()
		{
			$this->update_users_table($this->attrs);
			$this->update_profile($this->attrs);

			if ( isset($this->attrs['services']) )
				$this->update_services($this->attrs['services']);
		}


		public function update( $args = array() )
		{
			$this->attrs = wp_parse_args( $args, $this->attrs );

			$this->attrs['services'] = $this->format_services();


			file_put_contents(
				'/Users/maquilador7/Desktop/php.txt',
				var_export( $this->attrs, true )
			);

			// $this->update_database_tables();

			return $this->attrs;
		}


	} // end class Account

