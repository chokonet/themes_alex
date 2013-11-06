<?php get_header('admin'); ?>

		<div class="content_admin">

			<div class="next_prev">
				<ul class="menu-users">
					<li><a href="<?php bloginfo('url'); ?>/dashboard/users/" class="active"><?php _e('List', 'bemygirl'); ?></a></li>
					<li><a href="<?php bloginfo('url'); ?>/dashboard/create-user/"><?php _e('Add User', 'bemygirl'); ?></a></li>
				</ul>

			</div>

			<div class="barra-edit-users">
				<ul class="menu-users">

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

		</div><!-- end content_admin -->

		<?php get_template_part( 'templates/user-edit/edit', 'account' ); ?>

		<?php get_template_part( 'templates/user-edit/edit', 'contact' ); ?>

		<?php get_template_part( 'templates/user-edit/edit', 'profile' ); ?>

		<?php get_template_part( 'templates/user-edit/edit', 'services' ); ?>

		<?php get_template_part( 'templates/user-edit/edit', 'hours' ); ?>

		<?php get_template_part( 'templates/user-edit/edit', 'message' ); ?>

		<?php get_template_part( 'templates/user-edit/edit', 'media' ); ?>

		<?php get_template_part( 'templates/user-edit/edit', 'history' ); ?>


	</div><!-- page-container  -->

		<div class="clear"></div>

		<div class="external-links">
			<ul>
				<li><a href="https://twitter.com/#!/bemygirl_ch" target="_blank" class="twitter"></a></li>
				<li><a href="http://pinterest.com/bemygirl/" target="_blank" class="pinterest"></a></li>
				<li><a href="https://vimeo.com/bemygirl" target="_blank" class="vimeo"></a></li>
				<li><a href="http://news.bemygirl.ch/" class="tumblr" target="_blank"></a></li>
				<li><a href="https://www.facebook.com/BemyGirl.ch" class="facebook" target="_blank"></a></li>
			</ul>
		</div>

		<div class="pop-mensajes">
			<div class="notice-body"></div>
			<div class="notice-bottom"></div>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>
