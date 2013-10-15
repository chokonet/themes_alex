<?php get_header('admin'); ?>
	<div class="main_fq border_fq">
		<div class="iphoneLine soloiPhone"></div>
		<div id="plecasup">
			<span><?php _e('Information', 'bemygirl'); ?> </span>
		</div>
		<div class="register">
			<form id="form-information">
				<div class="col1 ">
					<label for="edit-edit-information-username"><?php _e('Username', 'bemygirl'); ?> <span class="form-required">*</span></label>
					<input class="form-text"  name="username" id="edit-information-username" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					<div class="description"><?php _e('Spaces are allowed; punctuation is not allowed except for periods, hyphens, apostrophes, and underscores', 'bemygirl'); ?>.</div>

					<label for="edit-information-current-password"><?php _e('Current password ', 'bemygirl'); ?></label>
					<input class="form-text " name="current-password" id="edit-information-current-password" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					<div class="description"><?php _e('Enter your current password to change the E-mail address or Password.<a href=""> Forgot My Password</a>.', 'bemygirl'); ?>.</div>

					<label for="edit-information-email"><?php _e('E-mail address ', 'bemygirl'); ?><span class="form-required">*</span></label>
					<input class="form-text " name="email" id="edit-information-email" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					<div class="description"><?php _e('A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.', 'bemygirl'); ?>.</div>
				</div>
				<div class="col2">
					<label for="edit-information-password"><?php _e('Password', 'bemygirl'); ?></label>
					<input class="form-text bottom" name="password" id="edit-information-password" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

					<div class="password-strength">
						<div class="password-strength-text" aria-live="assertive"><?php _e('Weak', 'bemygirl'); ?></div>
						<div class="password-strength-title"><?php _e('Password strength:', 'bemygirl'); ?></div>
						<div class="password-indicator">
							<div class="indicator"></div>
						</div>
					</div>

					<label for="edit-information-confirm-pasword"><?php _e('Confirm Password', 'bemygirl'); ?></label>
					<input class="form-text " name="confirm-pasword" id="edit-information-confirm-pasword" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					<div class="password-suggestions"><?php _e('To make your password stronger', 'bemygirl'); ?>:
						<ul>
							<li id="caracter6"><?php _e('Make it at least 6 characters', 'bemygirl'); ?> </li>
							<li id="letra-minuscula"><?php _e('Add lowercase letters', 'bemygirl'); ?></li>
							<li id="letra-mayuscula"><?php _e('Add uppercase letters', 'bemygirl'); ?></li>
							<li id="numeros-pass"><?php _e('Add numbers', 'bemygirl'); ?></li>
							<li id="caracteres-especiales"><?php _e('Add punctuation', 'bemygirl'); ?></li>
						</ul>
					</div>
					<div class="description"><?php _e('Provide a password for the new account in both fields', 'bemygirl'); ?>.</div>
					<!-- <div class="fieldset-description">This question is for testing whether you are a human visitor and to prevent automated spam submissions.</div> -->
				</div>

				<input type="submit" name="op" value="Save" class="form-submit" >

			</form>
		</div>

	</div><!-- end #main -->
<?php get_footer('admin'); ?>