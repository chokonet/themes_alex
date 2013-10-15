<?php get_header(); ?>
	<div class="main_fq border_fq">
		<div class="iphoneLine soloiPhone"></div>
		<div id="plecasup">
			<span><?php _e('Account', 'bemygirl'); ?></span>
		</div>
		<div class="register">
			<form id="form-account">
				<div class="type-meber noiPhone"><?php _e('Member', 'bemygirl'); ?></div>

					<div class="col1">
						<label for="edit-account-username"><?php _e('Username', 'bemygirl'); ?> <span class="form-required">*</span></label>
						<input class="form-text " id="edit-account-username" name="username" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
						<div class="description"><?php _e('Spaces are allowed; punctuation is not allowed except for periods, hyphens, apostrophes, and underscores', 'bemygirl'); ?>.</div>
						<label for="edit-account-email"><?php _e('E-mail address', 'bemygirl'); ?> <span class="form-required">*</span></label>
						<input class="form-text " id="edit-account-email" name="email" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
						<div class="description"><?php _e('A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail', 'bemygirl'); ?>.</div>
					</div>

					<div class="col2">
						<label for="edit-account-password"><?php _e('Password', 'bemygirl'); ?><span class="form-required">*</span></label>
						<input class="form-text bottom" id="edit-account-password" name="password" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
						<label for="edit-account-confirm-password"><?php _e('Confirm Password', 'bemygirl'); ?><span class="form-required">*</span></label>
						<input class="form-text " id="edit-account-confirm-password" name="confirm-password" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					<div class="description"><?php _e('Provide a password for the new account in both fields', 'bemygirl'); ?>.</div>
							 <!-- <div class="fieldset-description">This question is for testing whether you are a human visitor and to prevent automated spam submissions.</div> -->
				</div>

				<input type="submit" id="edit-submit" name="op" value="Next" class="form-submit" >
			</form>
		</div>

	</div><!-- end #main -->
<?php get_footer(); ?>