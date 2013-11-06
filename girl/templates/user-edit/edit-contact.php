	<div class="main_fq border_fq" id="edit-contact">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Contact', 'bemygirl'); ?> </span>
		</div>
		<div class="register">

			<form id="form-girlcontact-edit" class="forms-admin no-submit">

				<div class="col1">
					<label for="contact-girl-shownamel">
						<?php _e('Showname', 'bemygirl'); ?>
						<span class="form-required">*</span>
					</label>
                    <input type="text" class="form-text" id="contact-girl-shownamel" name="user_nicename" size="60">
 				</div><!-- /showname -->

 				<div class="col2 selected-contact">
					<label for="contact-girl-type"><?php _e('Type', 'bemygirl'); ?>
					<span class="form-required">*</span></label>
                    <select id="contact-girl-type" name="service_venue">
                    	<option value="">&lt;none&gt;</option>
						<option value="Private Apartment">Private Apartment</option>
						<option value="Massage Parlour">Massage Parlour</option>
					</select>
					<div id="bt-select-contact-type"></div>
 				</div><!-- /type -->

 				<div class="col1">
					<label for="contact-girl-mobile"><?php _e('Mobile', 'bemygirl'); ?>
					<span class="form-required">*</span></label>
                    <input type="tel" class="form-text" id="contact-girl-mobile" name="contact_mobile" size="60">
 				</div><!-- /mobile -->

 				<div class="col1">

					<label for="contact-instructions">
						<?php _e('Instructions', 'bemygirl'); ?>
						<span class="form-required" title="required">*</span>
					</label>

					<!-- radio: SMS & Call -->
					<input type="radio" name="contact_instructions" value="sms-call" id="contact-sms-call">
					<label for="contact-sms-call" class="available-contact">
						<?php _e('SMS & Call', 'bemygirl'); ?>
					</label>

					<!-- radio: SMS Only -->
					<input type="radio" name="contact_instructions" value="sms" id="contact-sms">
					<label for="contact-sms" class="available-contact">
						<?php _e('SMS Only', 'bemygirl'); ?>
					</label>

					<!-- radio: No SMS -->
					<input type="radio" name="contact_instructions" value="no-sms" id="contact-no-sms">
					<label for="contact-no-sms" class="available-contact">
						<?php _e('No SMS', 'bemygirl'); ?>
					</label>

					<!-- checkbox: No Withheld numbers -->
					<input type="checkbox" name="withheld" value="true" id="contact-withheld-numbers">
					<label for="contact-withheld-numbers" class="withheld">
						<?php _e('No Withheld numbers', 'bemygirl'); ?>
					</label>

				</div><!-- /instructions -->

				<div class="col2 selected-contact">
					<label for="contact-region"><?php _e('Region', 'bemygirl'); ?></label>
                    <select id="contact-region" name="region">
                    	<option value="">&lt;none&gt;</option>
						<option value="Geneva">Geneva</option>
						<option value="Vaud">Vaud</option>
					</select>
					<div id="bt-select-contact-region"></div>
 				</div><!-- /region -->

 				<div class="col2 selected-contact">
					<label for="contact-area"><?php _e('Area', 'bemygirl'); ?></label>
                    <select id="contact-area" name="area">
						<option value="">&lt;none&gt;</option>
						<option value="Acacias">Acacias</option>
						<option value="Carouge">Carouge</option>
						<option value="Charmilles">Charmilles</option>
						<option value="Champel">Champel</option>
						<option value="Cointrin">Cointrin</option>
						<option value="Cornavin">Cornavin</option>
						<option value="Eaux-Vives">Eaux-Vives</option>
						<option value="Grand-Saconnex">Grand-Saconnex</option>
						<option value="Jonction">Jonction</option>
						<option value="Meyrin">Meyrin</option>
						<option value="Petit-Lancy">Petit-Lancy</option>
						<option value="Plainpalais">Plainpalais</option>
						<option value="Plan-les-Ouates">Plan-les-Ouates</option>
						<option value="Cité-Centre">Cité-Centre</option>
						<option value="Servette">Servette</option>
					</select>
					<div id="bt-select-contact-area"></div>
 				</div><!-- /area -->

 				<div class="col1">
					<label for="contact-girl-appointment"><?php _e('Appointment', 'bemygirl'); ?> </label>

					<!-- checkbox: Incall -->
					<input type="checkbox" name="incall" value="true" id="incall">
					<label for="incall" class="withheld"><?php _e('Incall', 'bemygirl'); ?></label>

					<!-- checkbox: Outcall -->
					<input type="checkbox" name="outcall" value="true" id="outcall">
					<label for="outcall" class="withheld"><?php _e('Outcall', 'bemygirl'); ?></label>
				</div><!-- /appointment -->

				<div class="col1">
					<label for="Website"><?php _e('Website', 'bemygirl'); ?> </label>

                    <div class="file-website">
						<label for="contact-girl-url"><?php _e('URL ', 'bemygirl'); ?> </label>
                    	<input type="url" class="form-text" id="contact-girl-url" name="user_url" size="60">
                    </div>
 				</div><!-- /Website -->

 				<div class="col1">
					<input type="checkbox" name="contact_show_email" value="true" id="show-email">
					<label for="show-email" class="withheld bold"><?php _e('Show my Email on my profile', 'bemygirl'); ?> </label>
				</div><!-- /show email -->

				<div class="col1">
					<label for="email"><?php _e('Email', 'bemygirl'); ?></label>
                    <input type="email" class="form-text" id="contact-girl-Email" name="work_email" size="60">
 				</div><!-- /email -->

 				<div class="col1">
					<label for="address"><?php _e('Address', 'bemygirl'); ?> </label>
                    <input type="text" class="form-text" id="contact-girl-address" name="contact_address" size="60">
 				</div><!-- /address -->

 				<div class="col1">
					<label for="postalCode"><?php _e('Postal Code', 'bemygirl'); ?> </label>
                    <input type="number" min="0" class="form-text" id="contact-girl-postalCode" name="contact_postal_code" size="60">
 				</div><!-- /postalCode -->

				<input type="submit" name="op" value="Save" class="form-submit-contact-girl" >

			 </form><!-- end #form-girlcontact-edit -->
		</div>

	</div><!-- end main -->