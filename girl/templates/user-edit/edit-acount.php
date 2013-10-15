	<div class="main_fq border_fq" id="edit-account">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Account', 'bemygirl'); ?> </span>
		</div>
		<div class="register">
			 <form id="form-myCount-edit">
				<div class="col1">
					 <label for="edit-name"><?php _e('Username', 'bemygirl'); ?> </label>
					 <input class="form-text"  name="submitted[email]" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					 <div class="description"><?php _e('Spaces are allowed; punctuation is not allowed except for periods, hyphens, apostrophes, and underscores', 'bemygirl'); ?>.</div>

					 <label for="edit-name"><?php _e('E-mail address ', 'bemygirl'); ?><span class="form-required" title="required">*</span></label>
					 <input class="form-text " name="submitted[email]" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					 <div class="description"><?php _e('A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.', 'bemygirl'); ?>.</div>
				</div>
				<div class="col2">
					 <label for="edit-name"><?php _e('Password', 'bemygirl'); ?></label>
					 <input class="form-text bottom" name="password" id="form-edit-password" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

					<div class="password-strength">
						<div class="password-strength-text" aria-live="assertive">Weak</div>
						<div class="password-strength-title">Password strength:</div>
						<div class="password-indicator">
							<div class="indicator"></div>
						</div>
					</div>

					 <label for="edit-name"><?php _e('Confirm Password', 'bemygirl'); ?></label>
					 <input class="form-text " name="confirm-pasword" id="form-edit-ConfirmPassword" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
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

	</div><!-- end main -->