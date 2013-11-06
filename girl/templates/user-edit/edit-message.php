	<div class="main_fq border_fq" id="edit-message">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Message', 'bemygirl'); ?> </span>
		</div>
		<form>
			<div class="caja-textedit">
			<label for="edit-field-girl-message-und-0-value">Write your message in English <span class="form-required" title="This field is required.">*</span></label>

				<?php
					$elements = array('media_buttons' => false, 'textarea_name' => 'message-english');
					$content = isset($content) ? $content : '';
					wp_editor( $content, 'editpost', $elements); ?>
			</div>
			<div class="caja-textedit">
				<label for="edit-field-message-fr-und-0-value">Écrire votre message en français (limite de 200 mots) </label>
				<?php
					$elements = array('media_buttons' => false, 'textarea_name' => 'message-francais');
					$content = isset($content) ? $content : '';
					wp_editor( $content, 'editpost-francais', $elements); ?>
			</div>

			<input type="submit" name="op" value="Save" class="form-submit-message" >
		</form>
	</div><!-- end main -->