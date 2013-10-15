<?php get_header(); ?>
	<div class="main_fq border_fq">
        <div class="iphoneLine soloiPhone"></div>
		<div id="plecasup">
			<span><?php _e('Login', 'bemygirl'); ?></span>
		</div>
		 <div class="register">

            <form class="loginForm" id="form-login">

                <label for="edit-login-username"><?php _e('Username', 'bemygirl'); ?> <span class="form-required">*</span></label>
                <input class="form-text" id="edit-login-username" name="username" size="60"value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                <div class="description"><?php _e('Enter your BemyGirl username', 'bemygirl'); ?></div>

                <label for="edit-login-password"><?php _e('Password', 'bemygirl'); ?><span class="form-required">*</span></label>
                <input class="form-text" id="edit-login-password" name="password" size="60" value="" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                <div class="description"><?php _e('Enter your BemyGirl password', 'bemygirl'); ?></div>

                <input type="submit" id="edit-submit" name="op" value="<?php _e('Log in', 'bemygirl'); ?>" class="form-submit" >

            </form>

        </div>

	</div><!-- end #main -->
<?php get_footer(); ?>