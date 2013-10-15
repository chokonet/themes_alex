<?php get_header('admin'); ?>
	<div class="content_admin">

		<div class="views-field-name">Hello Master</div>

		<table class="views-table cols-11 members-user">
		<thead>
			<tr>
				<th class="views-edit">
					Edit
				</th>
				<th class="views-username">
					Username
				</th>
				<th class="views-mail">
					Email
				</th>
				<th class="views-created">
					<a href="#" title="sort by Registration date" class="active">Registration date</a>
				</th>
				<th class="views-profile-active">
					Active
				</th>
				<th class="views-cancel-node">
					Delete
				</th>
			</tr>
		</thead>
		<tbody>

			<?php
				$args = array(  'role'		   => 'subscriber',
								'orderby'      => 'display_name',
							 );

				// The Query
				$user_query = new WP_User_Query( $args );

				// User Loop
				if ( ! empty( $user_query->results ) ) {
					foreach ( $user_query->results as $scort ) {
			?>
				<!-- datos scort -->
					<tr class="views-escort">
					<td class="views-edit">
						<a href="<?php bloginfo('url'); ?>/users-edit/">edit</a>
					</td>
					<td class="views-username">
						<a href="/adel"><?php echo $scort->display_name; ?></a>
					</td>
					<td class="views-mail">
						<a href="#"><?php the_author_meta( 'email', $scort->ID ); ?></a>
					</td>
					<td class="views-created">
						<?php echo $scort->user_registered; ?>
					</td>
					<td class="views-profile-active">

							<img src="<?php echo THEMEPATH; ?>/images/ico-yes.png">

					</td>

					<td class="views-cancel-node">
						<a href="#" class="cancel">cancel</a>
					</td>
				</tr>
				<!--fin datos scort -->
			<?php
					}
				} else {
					echo 'No users found.';
				}
			?>


		</tbody>
		</table>

	</div><!-- end content_admin -->
<?php get_footer('admin'); ?>