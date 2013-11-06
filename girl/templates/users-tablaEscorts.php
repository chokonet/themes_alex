	<?php

		$user_query = new WP_User_Query(array(
			'role'    => 'escort',
			'orderby' => 'display_name',
		));


		if ( ! empty( $user_query->results ) ) : foreach ( $user_query->results as $scort ) : ?>
			<!-- datos scort -->
			<tr class="views-escort">

				<td class="views-edit">
					<a href="<?php bloginfo('url'); ?>/dashboard/edit-user/">edit</a>
				</td>

				<td class="views-photo">
					<?php
						$url_image = get_the_author_meta('url_imagen', $scort->ID);
						$url_image = isset($url_image) ? $url_image : '';
					?>
					<img src="<?php echo $url_image; ?>"style="" class="tooltip-image">
				</td>

				<td class="views-title">
					<a href="/adel"><?php echo $scort->display_name; ?></a>
				</td>

				<td class="views-mail">
					<a href="mailto:Adel@bemygirl.ch"><?php the_author_meta( 'email', $scort->ID ); ?></a>
				</td>

				<td class="views-cellphone"><?php the_author_meta( 'mobile', $scort->ID ); ?></td>

				<td class="views-created"><?php echo $scort->user_registered; ?></td>

				<td class="views-profile-active">
					<?php $active = get_the_author_meta( 'profile_active', $scort->ID );
					if ( $active === 'true'): ?>
						<img src="<?php echo THEMEPATH; ?>/images/ico-yes.png">
					<?php else: ?>
						<img src="<?php echo THEMEPATH; ?>/images/ico-no.png">
					<?php endif;	 ?>
				</td>

				<td class="views-available">
					<img src="<?php echo THEMEPATH; ?>/images/ico-yes.png">
				</td>

				<td class="views-cancellation-date">Sep 28 2014</td>
				<td class="views-changed">Oct 07 2013</td>
				<td class="views-cancel-node"><a href="#" class="cancel">cancel</a></td>
			</tr>
			<!--fin datos scort -->
		<?php endforeach;

		else :

			_e('No users found', 'bemygirl');

		endif;
