<?php get_header('admin'); ?>
		<div class="content_admin add-user">
			<div class="next_prev">
				<ul class="menu-users">
					<li><a href="<?php bloginfo('url'); ?>/users/"><?php _e('List', 'bemygirl'); ?></a></li>
					<li><a href="<?php bloginfo('url'); ?>/create-users/" class="active"><?php _e('Add User', 'bemygirl'); ?></a></li>
				</ul>

			</div>

			<div class="views-field-name"><?php _e('Create Account', 'bemygirl'); ?></div>
			<div class="menu-add-user">
				<ul>
					<li><a class="active"><?php _e('Account', 'bemygirl'); ?></a></li>
					<li><a><?php _e('Contact', 'bemygirl'); ?></a></li>
					<li><a><?php _e('Profile', 'bemygirl'); ?></a></li>
					<li><a><?php _e('Services', 'bemygirl'); ?></a></li>
					<li><a><?php _e('Message', 'bemygirl'); ?></a></li>
					<li><a><?php _e('Hours & Rates', 'bemygirl'); ?></a></li>
					<li><a><?php _e('Media', 'bemygirl'); ?></a>
					<li><a><?php _e('History', 'bemygirl'); ?></a></li>
				</ul>
			</div>

			<div class="main_fq border_fq">

				<div id="plecasup">
					<span><?php _e('Account', 'bemygirl'); ?> </span>
				</div>

				<div class="register-types-block"><div class="type-girl"><?php _e('Escort', 'bemygirl'); ?></div></div>

				<div class="register">
					<form id="form-myCount-edit" action="<?php bloginfo('url'); ?>/create-edit/">
						<div class="col1">
							<label for="edit-create-username"><?php _e('Username', 'bemygirl'); ?> <span class="form-required" title="required">*</span></label>
							<input class="form-text"  name="username" id="edit-create-username" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
						</div>
						<div class="col1">
							<label for="edit-create-email"><?php _e('E-mail address ', 'bemygirl'); ?><span class="form-required" title="required">*</span></label>
							<input class="form-text " name="email" id="edit-create-email" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
						</div>
						<div class="col2">
							<label for="edit-create-password"><?php _e('Password', 'bemygirl'); ?> <span class="form-required" title="required">*</span></label>
							<input class="form-text bottom" name="password" id="edit-create-password" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

							<div class="password-strength">
								<div class="password-strength-text" aria-live="assertive"><?php _e('Weak', 'bemygirl'); ?></div>
								<div class="password-strength-title"><?php _e('Password strength:', 'bemygirl'); ?></div>
								<div class="password-indicator">
									<div class="indicator"></div>
								</div>
							</div>

							<label for="edit-create-ConfirmPassword"><?php _e('Confirm Password', 'bemygirl'); ?> <span class="form-required" title="required">*</span></label>
							<input class="form-text " name="confirm-pasword" id="edit-create-ConfirmPassword" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

						</div>

						<input type="submit" name="op" value="Next" class="form-submit" id="edit-user-create" >

					</form>
				</div>

			</div>

		</div><!-- end content_admin -->
		<div class="clear"></div>
		</div><!-- page-container  -->

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