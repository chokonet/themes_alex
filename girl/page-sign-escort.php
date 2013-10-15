<?php get_header(); ?>
	<div class="main_fq border_fq">
		<div id="plecasup">
			<span><?php _e('Sign escort', 'bemygirl'); ?></span>
		</div>
		 <div class="sing">
          	<form id="form-sing-escort">

	            <label for="edit-sing-escort-name"><?php _e('Name', 'bemygirl'); ?><span class="form-required">*</span></label>
	            <input class="form-text" id="edit-sing-escort-name" name="name" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

	            <label for="edit-sing-escort-email"><?php _e('E-mail', 'bemygirl'); ?><span class="form-required" >*</span></label>
	            <input class="form-text" id="edit-sing-escort-email" name="email" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

	            <label for="edit-sing-escort-phone"><?php _e('Phone', 'bemygirl'); ?><span class="form-required" >*</span></label>
	            <input class="form-tex " id="edit-sing-escort-phone" name="phone" size="60" title="Your password " value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">

	            <label for="edit-sing-escort-address"><?php _e('Address', 'bemygirl'); ?></label>
	            <textarea name="address" cols="60" rows="5" id="edit-sing-escort-address" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';"></textarea>

	            <label for="edit-sing-escort-photo"><?php _e('Photo', 'bemygirl'); ?></label>
				<input type="file" id="edit-sing-escort-photo" name="photo" size="22" class="form-file">

				<label for="edit-sing-escort-message"><?php _e('Message', 'bemygirl'); ?></label>
	            <textarea name="message" cols="60" rows="5" id="edit-sing-escort-message" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';"></textarea>

				<div class="fieldset-description">
					<?php _e('This question is for testing whether you are a human visitor and to prevent automated spam submissions', 'bemygirl'); ?>.
				</div>

				<!-- <div id="captcha-form" >
					<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LeYr9ASAAAAACEGsIaloTT_ppOgRM-XRyMvZxKr"><div id="recaptcha_widget_div" style="" class=" recaptcha_nothad_incorrect_sol recaptcha_isnot_showing_audio"><div id="recaptcha_area"><table id="recaptcha_table" class="recaptchatable recaptcha_theme_red"> <tbody> <tr> <td colspan="6" class="recaptcha_r1_c1"></td> </tr> <tr> <td class="recaptcha_r2_c1"></td> <td colspan="4" class="recaptcha_image_cell"><div id="recaptcha_image" style="width: 300px; height: 57px;"><img style="display:block;" alt="Imagen del desafío de la reCAPTCHA" height="57" width="300" src="http://www.google.com/recaptcha/api/image?c=03AHJ_Vuu2FkaURC5Pjl3eoTnlJPS_vPXQgEuVnpHKcp-WPDyskTUKt-tHamJ9VHAr92x8H2gyrspcIjTjLqzGEcZ-qkgHGNaWhFkqepdtb4xWRVGERLMuY-n7r2PpqnPwmmaMPjsVCe6pNGt44-0p5NLtDEg3xIp6fubtsGBcrQQVVBtuYKqGaA0" class="randimg164 protectedimg"><img width="300" height="57" class="blankimage" src="/blank.gif" style="border: 0px solid red; top: 558px; left: 30px; position: absolute; z-index: 10;"></div></td> <td class="recaptcha_r2_c2"></td> </tr> <tr> <td rowspan="6" class="recaptcha_r3_c1"></td> <td colspan="4" class="recaptcha_r3_c2"></td> <td rowspan="6" class="recaptcha_r3_c3"></td> </tr> <tr> <td rowspan="3" class="recaptcha_r4_c1" height="49"> <div class="recaptcha_input_area"> <span id="recaptcha_challenge_field_holder" style="display: none;"><input type="hidden" name="recaptcha_challenge_field" id="recaptcha_challenge_field" value="03AHJ_Vuu2FkaURC5Pjl3eoTnlJPS_vPXQgEuVnpHKcp-WPDyskTUKt-tHamJ9VHAr92x8H2gyrspcIjTjLqzGEcZ-qkgHGNaWhFkqepdtb4xWRVGERLMuY-n7r2PpqnPwmmaMPjsVCe6pNGt44-0p5NLtDEg3xIp6fubtsGBcrQQVVBtuYKqGaA0"></span><input name="recaptcha_response_field" id="recaptcha_response_field" type="text" autocorrect="off" autocapitalize="off" placeholder="Escribe las dos palabras" autocomplete="off"> <span id="recaptcha_privacy" class="recaptcha_only_if_privacy"></span> </div> </td> <td rowspan="4" class="recaptcha_r4_c2"></td> <td><a id="recaptcha_reload_btn" title="Enfrentar un nuevo desafío"><img id="recaptcha_reload" width="25" height="17" src="http://www.google.com/recaptcha/api/img/red/refresh.gif" alt="Enfrentar un nuevo desafío" class="randimg329 protectedimg"><img width="25" height="17" class="blankimage" src="/blank.gif" style="border: 0px solid red; top: 621px; left: 208px; position: absolute; z-index: 10;"></a></td> <td rowspan="4" class="recaptcha_r4_c4"></td> </tr> <tr> <td><a id="recaptcha_switch_audio_btn" class="recaptcha_only_if_image" title="Enfrentar un desafío de audio"><img id="recaptcha_switch_audio" width="25" height="16" alt="Enfrentar un desafío de audio" src="http://www.google.com/recaptcha/api/img/red/audio.gif" class="randimg873 protectedimg"><img width="25" height="16" class="blankimage" src="/blank.gif" style="border: 0px solid red; top: 638px; left: 208px; position: absolute; z-index: 10;"></a><a id="recaptcha_switch_img_btn" class="recaptcha_only_if_audio" title="Enfrentar un desafío visual"><img id="recaptcha_switch_img" width="25" height="16" alt="Enfrentar un desafío visual" src="http://www.google.com/recaptcha/api/img/red/text.gif" class="randimg267 protectedimg" style=""><img width="25" height="16" class="blankimage" src="/blank.gif" style="border: 0px solid red; top: 0px; left: 0px; position: absolute; z-index: 10;"></a></td> </tr> <tr> <td><a id="recaptcha_whatsthis_btn" title="Ayuda"><img id="recaptcha_whatsthis" width="25" height="16" src="http://www.google.com/recaptcha/api/img/red/help.gif" alt="Ayuda" class="randimg432 protectedimg"><img width="25" height="16" class="blankimage" src="/blank.gif" style="border: 0px solid red; top: 654px; left: 208px; position: absolute; z-index: 10;"></a></td> </tr> <tr> <td class="recaptcha_r7_c1"></td> <td class="recaptcha_r8_c1"></td> </tr> </tbody></table> </div></div><script>Recaptcha.widget = Recaptcha.$("recaptcha_widget_div"); Recaptcha.challenge_callback();</script>

					<noscript>
				  		&lt;iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeYr9ASAAAAACEGsIaloTT_ppOgRM-XRyMvZxKr" height="300" width="500" frameborder="0"&gt;&lt;/iframe&gt;&lt;br/&gt;
				  		&lt;textarea name="recaptcha_challenge_field" rows="3" cols="40"&gt;&lt;/textarea&gt;
				  		&lt;input type="hidden" name="recaptcha_response_field" value="manual_challenge"/&gt;
					</noscript>
				</div> -->
	             <input type="submit" id="edit-submit" name="op" value="<?php _e('Submit', 'bemygirl'); ?>" class="form-submit" >

          	</form>
        </div>

	</div><!-- end #main -->
<?php get_footer(); ?>