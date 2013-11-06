	<div class="main_fq border_fq" id="edit-hours">

	<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div class="content-services">
			<form id="form-girlhours-edit" class="forms-admin">

				<div class="caja-service">
					<div class="plecasup">
						<span> <?php _e('Hours', 'bemygirl'); ?></span>
					</div>

					<?php get_template_part( 'templates/user-edit/hours/hours', 'monday' ) ?>
					<?php get_template_part( 'templates/user-edit/hours/hours', 'tuesday' ) ?>
					<?php get_template_part( 'templates/user-edit/hours/hours', 'wednesday' ) ?>
					<?php get_template_part( 'templates/user-edit/hours/hours', 'thursday' ) ?>
					<?php get_template_part( 'templates/user-edit/hours/hours', 'Friday' ) ?>
					<?php get_template_part( 'templates/user-edit/hours/hours', 'Saturday' ) ?>
					<?php get_template_part( 'templates/user-edit/hours/hours', 'Sunday' ) ?>

					<div class="cont-dia-hora">
						<input type="checkbox" name="hours-24" value="" id="hours-24">
						<label for="hours-24" class="withheld hours"><?php _e('24/7', 'bemygirl'); ?></label>
					</div>

				</div>
				<div class="caja-service">
					<div class="plecasup">
						<span>Rate </span>
					</div>

					<div class="col2 selected-contact-small">
						<label for="minimum-rate"><?php _e('Minimum Rate', 'bemygirl'); ?> </label>
	                    <!-- <input class="form-text" id="contact-girl-shownamel" name="showname" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';"> -->
	                    <select class="select_chico" id="minimum-rate">
	                    	<option value="100">100</option>
	                    	<option value="150">150</option>
	                    	<option value="200">200</option>
	                    	<option value="250">250</option>
	                    	<option value="300">300</option>
						</select>
	 					<span class="field-suffix"> CHF</span>
	 				</div>
				</div>


				<input type="submit" name="op" value="Save" class="form-submit-hours-girl" >

			</form>
		</div>

	</div><!-- end main -->