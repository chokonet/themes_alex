<?php get_header('admin'); ?>

	<div class="content_admin add-user">

		<div class="next_prev">

			<ul class="menu-users">
				<li><a href="<?php bloginfo('url'); ?>/dashboard/users/"><?php _e('List', 'bemygirl'); ?></a></li>
				<li><a href="<?php bloginfo('url'); ?>/dashboard/users/create/" class="active"><?php _e('Add User', 'bemygirl'); ?></a></li>
			</ul>

		</div>

		<div class="views-field-name"><?php _e('Create Account', 'bemygirl'); ?></div>

		<div class="menu-add-user editor-margin">
			<ul>
				<li class="user-create-tabs" data-active="edit-account"><a class="active-edit"><?php _e('Account', 'bemygirl'); ?></a></li>
				<li class="user-create-tabs" data-active="edit-contact"><a class=""><?php _e('Contact', 'bemygirl'); ?></a></li>
				<li class="user-create-tabs" data-active="edit-profile"><a class=""><?php _e('Profile', 'bemygirl'); ?></a></li>
				<li class="user-create-tabs" data-active="edit-services"><a class=""><?php _e('Services', 'bemygirl'); ?></a></li>
				<li class="user-create-tabs" data-active="edit-message"><a class=""><?php _e('Message', 'bemygirl'); ?></a></li>
				<li class="user-create-tabs" data-active="edit-hours"><a class=""><?php _e('Hours & Rates', 'bemygirl'); ?></a></li>
				<li class="user-create-tabs" data-active="edit-photos"><a class=""><?php _e('Media', 'bemygirl'); ?></a></li>
				<li class="user-create-tabs" data-active="edit-history"><a ><?php _e('History', 'bemygirl'); ?></a></li>
			</ul>
		</div>

		<?php get_template_part( 'templates/user/create', 'account' ); ?>

		<?php get_template_part( 'templates/user/create', 'contact' ); ?>

		<?php get_template_part( 'templates/user/create', 'profile' ); ?>

		<?php get_template_part( 'templates/user/create', 'services' ); ?>

		<?php get_template_part( 'templates/user/create', 'hours' ); ?>

		<?php get_template_part( 'templates/user/create', 'message' ); ?>

		<?php get_template_part( 'templates/user/create', 'media' ); ?>

		<?php get_template_part( 'templates/user/create', 'history' ); ?>


	</div><!-- end content_admin -->

<?php get_footer('admin'); ?>
