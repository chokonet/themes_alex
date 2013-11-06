	<div class="main_fq border_fq" id="edit-account">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Account', 'bemygirl'); ?><p class="segundoTit"><?php _e('Next payment', 'bemygirl'); ?> </p> </span>
		</div>
		<div class="register payment">

			<form id="form-myCount-edit" class="no-submit">

				<div class="col1">
					<label for="edit-name"><?php _e('Username', 'bemygirl'); ?> </label>
					<input class="form-text"  name="username" id="username" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					<div class="description"><?php _e('Spaces are allowed; punctuation is not allowed except for periods, hyphens, apostrophes, and underscores', 'bemygirl'); ?>.</div>

					<label for="edit-email"><?php _e('E-mail address ', 'bemygirl'); ?><span class="form-required" title="required">*</span></label>
					<input class="form-text" name="user_email" id="edit-email" size="60" value="">
					<div class="description"><?php _e('A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.', 'bemygirl'); ?>.</div>
				</div>

				<div class="col2">
					 <label for="password"><?php _e('Password', 'bemygirl'); ?></label>
					 <input type="password" class="form-text bottom" name="user_pass" id="form-edit-password" size="60" value="">

					<label for="confirmPasword"><?php _e('Confirm Password', 'bemygirl'); ?></label>
					<input type="password" class="form-text " name="confirmPasword" id="form-edit-ConfirmPassword" size="60" value="">

					<div class="password-suggestions"><?php _e('To make your password stronger', 'bemygirl'); ?>
						<ul>
							<li id="caracter6"><?php _e('Make it at least 6 characters', 'bemygirl'); ?> </li>
							<li id="letra-minuscula"><?php _e('Add lowercase letters', 'bemygirl'); ?></li>
							<li id="letra-mayuscula"><?php _e('Add uppercase letters', 'bemygirl'); ?></li>
							<li id="numeros-pass"><?php _e('Add numbers', 'bemygirl'); ?></li>
							<li id="caracteres-especiales"><?php _e('Add punctuation', 'bemygirl'); ?></li>
						</ul>
					</div><!-- password-suggestions  -->

					<div class="description"><?php _e('Provide a password for the new account in both fields', 'bemygirl'); ?>.</div>
					<!-- <div class="fieldset-description">This question is for testing whether you are a human visitor and to prevent automated spam submissions.</div> -->
				</div><!-- passwords -->

				<div class="password-strength">
					<div class="password-strength-text" aria-live="assertive">Weak</div>
					<div class="password-strength-title">Password strength:</div>
					<div class="password-indicator">
						<div class="indicator"></div>
					</div>
				</div><!-- password-strength  -->

				<!-- Next payment  -->
				<div class="next_payment">

					<div class="col1">
						<label for="datepicker"><?php _e('Date', 'bemygirl'); ?> </label>
						<input type="date" class="form-text-date m-calendario" id="datepicker"  name="next_payment" size="60" value="10/09/201" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
						<div class="description-date"><?php _e('E.g., 10/09/2013', 'bemygirl'); ?>.</div>
					</div>

					<!-- Profile active  -->
					<div class="col2">
						<label for="edit-name"><?php _e('Profile active', 'bemygirl'); ?><span class="form-required" title="required">*</span></label>
					</div>

					<div class="col2">
						<input type="radio" name="user_status" value="0" id="radio1" checked="true">
						<label for="radio1" class="estado"><?php _e('Inactive', 'bemygirl'); ?></label>
					</div>

					<div class="col2">
						<input type="radio" name="user_status" value="1" id="radio2" >
						<label for="radio2" class="estado"><?php _e('Active', 'bemygirl'); ?></label>
					</div>

					<!-- Avalible -->
					<div class="col2">
						<label for="edit-avalible"><?php _e('Available', 'bemygirl'); ?><span class="form-required" title="required">*</span></label>
					</div>

					<div class="col2">
						<input type="radio" name="available" value="0" id="no-avalible-girl" checked="">
						<label for="no-avalible-girl" class="estado"><?php _e('Not Available', 'bemygirl'); ?></label>
					</div>

					<div class="col2">
						<input type="radio" name="available" value="1" id="avalible-girl" >
						<label for="avalible-girl" class="estado"><?php _e('Available', 'bemygirl'); ?></label>
					</div>

				</div>

				<!-- End Next payment  -->
				<input type="submit" name="op" id="create-new-escort" value="Save" class="form-submit" >

			  </form>
		</div>


	</div><!-- end main -->