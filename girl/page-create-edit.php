<?php get_header('admin'); ?>
	<div class="content_admin add-user">
		<div class="next_prev">
			<ul class="menu-users">
				<li><a href="<?php bloginfo('url'); ?>/users/"><?php _e('List', 'bemygirl'); ?></a></li>
				<li><a href="<?php bloginfo('url'); ?>/create-users/" class="active"><?php _e('Add User', 'bemygirl'); ?></a></li>
			</ul>

		</div>


		<div class="menu-add-user editor-margin">
			<ul>
				<li id="bt-acount"><a class="active-edit"><?php _e('Account', 'bemygirl'); ?></a></li>
				<li id="bt-administration"><a ><?php _e('Administration', 'bemygirl'); ?></a></li>
				<li id="bt-contact"><a class=""><?php _e('Contact', 'bemygirl'); ?></a></li>
				<li id="bt-profile"><a class=""><?php _e('Profile', 'bemygirl'); ?></a></li>
				<li id="bt-services"><a class=""><?php _e('Services', 'bemygirl'); ?></a></li>
				<li id="bt-message"><a class=""><?php _e('Message', 'bemygirl'); ?></a></li>
				<li id="bt-hours"><a class=""><?php _e('Hours & Rates', 'bemygirl'); ?></a></li>
				<li id="bt-photos"><a class=""><?php _e('Photos', 'bemygirl'); ?></a></li>
			</ul>
		</div>

		<?php get_template_part( 'templates/user-edit/edit', 'acount' ) ?>
		<?php get_template_part( 'templates/user-edit/edit', 'administration' ) ?>
		<?php get_template_part( 'templates/user-edit/edit', 'contact' ) ?>
		<?php get_template_part( 'templates/user-edit/edit', 'profile' ) ?>
		<?php get_template_part( 'templates/user-edit/edit', 'services' ) ?>
		<?php get_template_part( 'templates/user-edit/edit', 'hours' ) ?>
		<?php get_template_part( 'templates/user-edit/edit', 'message' ) ?>
		<?php get_template_part( 'templates/user-edit/edit', 'photos' ) ?>



	</div><!-- end content_admin -->
<?php get_footer('admin'); ?>