<?php get_header(); ?>
	<div class="main_fq border_fq">

			<div class="iphoneLine soloiPhone"></div>
			<div id="plecasup">
				<span>Contacts</span>
			</div>
			 <div class="contact">
              	<form id="form-contact-bemygirl">
              	   	<input type="text" id="form-contact-gitl-name"  name="name" value="<?php _e('Your name', 'bemygirl'); ?>" size="60" maxlength="128" class="form-text required auto-hint" title="Your name" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
              	   	<input class="form-text" id="form-contact-girl-email" name="email" size="60" title="Your e-mail address " value="<?php _e('Your e-mail address', 'bemygirl'); ?>" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
              	   	<input class="form-text" type="Subject" id="form-contact-girl-subject" name="subject" size="60" title="Subject " value="<?php _e('Subject', 'bemygirl'); ?>" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
              	   	<textarea id="form-contact-girl-comment" name="comment" cols="60" rows="5" type="message"   value="<?php _e('Message', 'bemygirl'); ?>" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">Message</textarea>
              	  	<input type="submit" id="edit-submit"  value="<?php _e('Send', 'bemygirl'); ?>" class="form-submit" >
              	</form>
	        </div>

			<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<div class="columna_der contact_img noiPhone">
					<div class="girl tamano ">
						<a href="#"><?php the_post_thumbnail( 'large'); ?> </a>
					</div><!-- end .girl -->
				</div>
			<?php endwhile; endif; ?>

	</div><!-- end #main -->
<?php get_footer(); ?>