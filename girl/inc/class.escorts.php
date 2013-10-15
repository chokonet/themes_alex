<?php

	class Query_Escorts {


		public $query, $results, $modifiers, $url;
		private $wpdb;


		public function __construct()
		{
			global $wpdb, $wp_rewrite;

			$this->wpdb      = &$wpdb;
			$this->url       = site_url("/{$wp_rewrite->author_base}/");
			$this->results   = array();

			$this->modifiers = "";
			$this->query     = "SELECT
									wp_users.ID            AS ID,
									wp_users.display_name  AS display_name,
									wp_users.user_email    AS user_email,
									wp_users.user_modified AS user_modified,
									CONCAT( '{$this->url}', wp_users.user_nicename) AS link,
									mt2.meta_value AS `region`,
									mt3.meta_value AS `area`,
									mt4.meta_value AS `type`,
									mt5.meta_value AS `tags`,
									mt5.meta_value AS `raiting`
								FROM wp_users
									INNER JOIN wp_usermeta ON (wp_users.ID = wp_usermeta.user_id)
									INNER JOIN wp_usermeta AS mt1 ON (wp_users.ID = mt1.user_id)
										LEFT JOIN wp_usermeta AS mt2 ON (wp_users.ID = mt2.user_id AND mt2.meta_key = 'region')
										LEFT JOIN wp_usermeta AS mt3 ON (wp_users.ID = mt3.user_id AND mt3.meta_key = 'area')
										LEFT JOIN wp_usermeta AS mt4 ON (wp_users.ID = mt4.user_id AND mt4.meta_key = 'type')
										LEFT JOIN wp_usermeta AS mt5 ON (wp_users.ID = mt5.user_id AND mt5.meta_key = 'tags')
										LEFT JOIN wp_usermeta AS mt6 ON (wp_users.ID = mt6.user_id AND mt6.meta_key = 'raiting')
											WHERE 1=1 AND ( (wp_usermeta.meta_key = 'profile_active' AND CAST(wp_usermeta.meta_value AS CHAR) = 'TRUE')
												AND  (mt1.meta_key = 'wp_capabilities' AND CAST(mt1.meta_value AS CHAR) LIKE '%escort%') )";

			$this->group_by = " GROUP BY wp_users.user_login ORDER BY RAND();";
			$this->execute();
			$this->set_current();
		}



		public function isset_GET($field)
		{
			if ( isset($_GET[$field])
				AND $_GET[$field] !== 'all'
				AND $_GET[$field] !== '' ){
					$this->{$field} = $_GET[$field];
					return true;
			}
			return false;
		}



		private function parse_modifiers()
		{
			if ($this->isset_GET('region'))
				$this->modifiers .= " AND mt2.meta_value = '{$this->region}' ";
			if ($this->isset_GET('area'))
				$this->modifiers .= " AND mt3.meta_value = '{$this->area}' ";
			if ($this->isset_GET('type'))
				$this->modifiers .= " AND mt4.meta_value = '{$this->type}' ";
			if ($this->isset_GET('tags'))
				$this->modifiers .= " AND mt5.meta_value = '{$this->tags}' ";

		}



		public function query(){
			if( empty($this->results) ) $this->execute();
			return $this->results;
		}


		public function set_current()
		{
			$this->current = current($this->results);
		}



		public function execute()
		{
			$this->parse_modifiers();
			$this->results = $this->wpdb->get_results(
				$this->query . $this->modifiers . $this->group_by, OBJECT
			);
		}



		public function have_escorts()
		{
			return $this->current;
		}



		public function the_escort()
		{
			$current = $this->current;
			$this->current = next($this->results);
			return $current;
		}

	}
