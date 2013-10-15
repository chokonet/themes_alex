	<div class="main_fq border_fq" id="edit-administration">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Next payment', 'bemygirl'); ?> </span>
		</div>
		<div class="register perfil-status">
			 <form id="form-myCount-edit">
				<div class="col1">
					 <label for="edit-name"><?php _e('Date', 'bemygirl'); ?> </label>
					 <input type="text" class="form-text-date" id="datepicker"  name="email" size="60" value="10/09/201" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
					 <div class="description-date"><?php _e('E.g., 10/09/2013', 'bemygirl'); ?>.</div>
				</div>
				<div class="col2">
					<label for="edit-name"><?php _e('Profile active', 'bemygirl'); ?><span class="form-required" title="required">*</span></label>
 				</div>
				<div class="col2">
 					<input type="radio" name="activeProfile" value="inactive" id="radio1" checked="checked">
					<label for="radio1" class="estado">Inactive </label>
				</div>
				<div class="col2">
 					<input type="radio" name="activeProfile" value="active" id="radio2" checked="">
					<label for="radio2" class="estado">Active </label>
				</div>
				 <input type="submit" name="op" value="Save" class="form-submit-profile" >
			  </form>
		</div>

	</div><!-- end main -->