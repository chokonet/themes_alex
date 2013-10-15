	<div class="main_fq border_fq" id="edit-contact">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Contact', 'bemygirl'); ?> </span>
		</div>
		<div class="register">
			<form id="form-girlcontact-edit" class="forms-admin">
				<div class="col1">
					<label for="contact-girl-available"><?php _e('Available', 'bemygirl'); ?> <span class="form-required" title="required">*</span> </label>
					<input type="radio" name="avalible" value="" id="no-avaliable" checked="checked">
					<label for="no-avaliable" class="available-contact"><?php _e('Not Available', 'bemygirl'); ?></label>
					<input type="radio" name="avalible" value="" id="avaliable" checked="">
					<label for="avaliable" class="available-contact"><?php _e('Available', 'bemygirl'); ?></label>
				</div>
				<div class="col1">
					<label for="showname"><?php _e('Showname', 'bemygirl'); ?> <span class="form-required">*</span></label>
                    <input class="form-text" id="contact-girl-shownamel" name="showname" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-gender"><?php _e('Gender', 'bemygirl'); ?> <span class="form-required">*</span></label>
                    <select>
						<option>Woman</option>
					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-type"><?php _e('Type', 'bemygirl'); ?> <span class="form-required">*</span></label>
                    <select>
						<option>Private Apartment</option>
						<option>Massage Parlour</option>
					</select>
 				</div>
 				<div class="col1">
					<label for="mobile"><?php _e('Mobile', 'bemygirl'); ?> <span class="form-required">*</span></label>
                    <input class="form-text" id="contact-girl-mobile" name="mobile" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
 				</div>
 				<div class="col1">
					<label for="contact-girl-instructions"><?php _e('Instructions', 'bemygirl'); ?> <span class="form-required" title="required">*</span> </label>
					<input type="radio" name="instructions" value="" id="smaycall" checked="checked">
					<label for="smaycall" class="available-contact"><?php _e('SMS & Call', 'bemygirl'); ?></label>
					<input type="radio" name="instructions" value="" id="smsonly" checked="">
					<label for="smsonly" class="available-contact"><?php _e('SMS Only', 'bemygirl'); ?></label>
					<input type="radio" name="instructions" value="" id="nosms" checked="">
					<label for="nosms" class="available-contact"><?php _e('No SMS', 'bemygirl'); ?></label>
					<input type="checkbox" name="withheld" value="" id="withheld-numbers">
					<label for="withheld-numbers" class="withheld"><?php _e('No Withheld numbers', 'bemygirl'); ?></label>
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-type"><?php _e('Region', 'bemygirl'); ?></label>
                    <select>
                    	<option>- Select a value -</option>
						<option>Geneva</option>
						<option>Vaud</option>
					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-type"><?php _e('Area', 'bemygirl'); ?></label>
                    <select>
						<option>- Select a value -</option>
						<option>Acacias</option>
						<option>Carouge</option>
						<option>Charmilles</option>
						<option>Champel</option>
						<option>Cointrin</option>
						<option>Cornavin</option>
						<option>Eaux-Vives</option>
						<option>Grand-Saconnex</option>
						<option>Jonction</option>
						<option>Meyrin</option>
						<option>Petit-Lancy</option>
						<option>Plainpalais</option>
						<option>Plan-les-Ouates</option>
						<option>Cité-Centre</option>
						<option>Servette</option>
					</select>
 				</div>
 				<div class="col1">
					<label for="contact-girl-appointment"><?php _e('Appointment', 'bemygirl'); ?> </label>
					<input type="checkbox" name="appointment" value="" id="incall">
					<label for="incall" class="withheld"><?php _e('Incall', 'bemygirl'); ?></label>
					<input type="checkbox" name="appointment" value="" id="outcall">
					<label for="outcall" class="withheld"><?php _e('Outcall', 'bemygirl'); ?></label>
				</div>
				<div class="col1">
					<label for="Website"><?php _e('Website', 'bemygirl'); ?> </label>
					<div class="file-website">
						<label for="title"><?php _e('Title ', 'bemygirl'); ?> </label>
                    	<input class="form-text" id="contact-girl-title " name="Title" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                    	<div class="description-date"><?php _e('The link title is limited to 128 characters maximum', 'bemygirl'); ?>.</div>
                    </div>
                    <div class="file-website">
						<label for="url"><?php _e('URL ', 'bemygirl'); ?> </label>
                    	<input class="form-text" id="contact-girl-url " name="url" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                    </div>
 				</div>
 				<div class="col1">

					<input type="checkbox" name="show-email" value="" id="show-email">
					<label for="show-email" class="withheld bold"><?php _e('Show my Email on my profile', 'bemygirl'); ?> </label>
				</div>
				<div class="col1">
					<label for="email"><?php _e('Email', 'bemygirl'); ?></label>
                    <input class="form-text" id="contact-girl-Email" name="email" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
 				</div>
 				<div class="col1">
					<label for="address"><?php _e('Address', 'bemygirl'); ?> </label>
                    <input class="form-text" id="contact-girl-address" name="address" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
 				</div>
 				<div class="col1">
					<label for="postalCode"><?php _e('Postal Code', 'bemygirl'); ?> </label>
                    <input class="form-text" id="contact-girl-postalCode" name="postalCode" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
 				</div>


				<input type="submit" name="op" value="Save" class="form-submit-contact-girl" >
			 </form>
		</div>

	</div><!-- end main -->