<?php get_header(); $escorts = get_queried_object();

	/**
	 * Class Query
	 * @author LosMaquiladores <info@losmaquiladores.com>
	 */
	class Query_escort{

		public $accounts;
		private $wpdb;


		public function __construct($ID_scort)
		{
			global $wpdb, $table_prefix;

			$this->wpdb  = &$wpdb;
			$this->query = <<< SQL
				SELECT * FROM {$table_prefix}users as u
					INNER JOIN {$table_prefix}usermeta AS um ON u.ID = um.user_id
					LEFT OUTER JOIN {$table_prefix}account_profile AS ap ON u.ID = ap.account_id
						WHERE u.ID = $ID_scort
							AND ( um.meta_key = 'wp_capabilities' AND CAST(um.meta_value AS CHAR) LIKE '%escort%' )
								ORDER BY RAND();
SQL;
			$this->execute();

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

	}

	$query = new Query_escort($escorts->ID);

	 if ( $query->have_escorts() ) : while( $query->have_escorts() ) : $escort = $query->the_escort();?>

		<div class="main">
			<div class="next_prev">
				<a class="back-results" href="<?php echo site_url(); ?>"><?php _e('Back to search results', 'bemygirl'); ?></a>
				<a class="prev-link" href="#"><?php _e('PREVIOUS', 'bemygirl'); ?></a>
				<a class="next-link" href="#"><?php _e('Next', 'bemygirl'); ?></a>
			</div>
			<div class="iphoneLine soloiPhone"></div>
			<div class="mobile_next_prev soloiPhone">
				<a class="prev-link" href="#"></a>
				<h1><?php echo $escort->display_name; ?></h1>
				<a class="next-link" href="#"></a>
			</div>

			<?php get_template_part( 'templates/escort', 'sidebar' ) ?>

			<div class="cont_single">

				<?php include('templates/escort-profile.php'); ?>
				<?php include('templates/escort-service.php'); ?>
				<?php include('templates/escort-hours.php'); ?>

			</div>
		</div><!-- end #main -->
	<?php endwhile; endif;

	get_footer(); ?>