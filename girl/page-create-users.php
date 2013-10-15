<?php get_header('admin'); ?>
	<div class="content_admin add-user">
		<div class="next_prev">
			<ul class="menu-users">
				<li><a href="<?php bloginfo('url'); ?>/users/"><?php _e('List', 'bemygirl'); ?></a></li>
				<li><a href="<?php bloginfo('url'); ?>/create-users/" class="active"><?php _e('Add User', 'bemygirl'); ?></a></li>
			</ul>

		</div>

		<div class="views-field-name">Create Account</div>
		<div class="menu-add-user">
			<ul>
				<li><a class="active">Account</a></li>
				<li><a>Administration</a></li>
				<li><a>Contact</a></li>
				<li><a>Profile</a></li>
				<li><a>Services</a></li>
				<li><a>Message</a></li>
				<li><a>Hours & Rates</a></li>
				<li><a>Photos</a>
			</ul>
		</div>

		<div class="main_fq border_fq">

			<div id="plecasup">
				<span><?php _e('Account', 'bemygirl'); ?> </span>
			</div>

			<div class="register-types-block"><div class="type-girl">Escort</div></div>

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
							<div class="password-strength-text" aria-live="assertive">Weak</div>
							<div class="password-strength-title">Password strength:</div>
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
<?php get_footer('admin'); ?>