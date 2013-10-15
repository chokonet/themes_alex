			<!--footer-->
			<div id="footer">

				<div class="block-webform footer-left  noiPhone">
					<h2><?php _e('Customer support', 'bemygirl'); ?></h2>
					<div class="content">
						<form id="form-contact-footer">
							<input type="text" id="form-footer-name" name="name" value="Name" size="60" maxlength="128" class="form-text required auto-hint" title="Name " onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
							<input class="form-text " type="email" name="email" id="form-footer-email"  size="60" title="Email " value="Email" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
							<textarea name="comment" cols="60" rows="5" type="comment" id="form-footer-comment"   value="Comments" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">Comments</textarea>
							<input type="submit" id="edit-submit" value="Send" class="form-submit" >
						</form>
					</div>
				</div>

				<div class="content">

					<div class="block-footer twitter noiPhone">
						<h2><?php _e('Latest Tweets', 'bemygirl'); ?></h2>

						<ul>
							<?php global $userTweets;
								foreach( $userTweets as $tweet ) { ?>
								<li><?php echo parseLinks($tweet->text) ?></li>
							<?php } ?>
						</ul>
					</div>


					<div class="block-footer contact">
						<h2><?php _e('Contact', 'bemygirl'); ?></h2>
						<span class="etiqueta"><?php _e('E-mail', 'bemygirl'); ?></span>
						<span class="dato"><a href="mailto:info@bemygirl.ch">info@bemygirl.ch</a></span>
						<ul>
							<li><a href="<?php bloginfo('url'); ?>/contact/"><?php _e('Contact', 'bemygirl'); ?></a></li>
							<li><a href="<?php bloginfo('url'); ?>/frequent-questions/">FAQ</a></li>
							<li><a href="<?php bloginfo('url'); ?>/terms/"><?php _e('Terms and conditions', 'bemygirl'); ?></a></li>
						</ul>
						<ul class="right">
							<span class="firma">© 2012-2013 BemyGirl.ch</span>
						</ul>
					</div><!-- contact -->

					<div class="block-footer links  noiPhone">
						<h2><?php _e('Links', 'bemygirl'); ?></h2>
						<ul>
							<li><a href="<?php bloginfo('url'); ?>"><?php _e('Home', 'bemygirl'); ?></a></li>
							<li><a href="<?php bloginfo('url'); ?>/advanced-search/"><?php _e('Advanced Search', 'bemygirl'); ?></a></li>
							<li><a href="<?php bloginfo('url'); ?>/login/"><?php _e('Sign in', 'bemygirl'); ?></a></li>
							<li><a href="<?php bloginfo('url'); ?>/register/"><?php _e('Register', 'bemygirl'); ?></a></li>
							<li><a href="/escorts/geneve"><?php _e('Escort in', 'bemygirl'); ?> Geneve</a></li>
							<li><a href="/escorts/lausanne"><?php _e('Escort in', 'bemygirl'); ?> Lausanne</a></li>
						</ul>
					</div>

				</div><!-- end .content -->

			</div><!-- end #footer -->

		</div><!-- page-container  -->

		<div class="external-links">
			<ul>
				<li><a href="https://twitter.com/#!/bemygirl_ch" target="_blank" class="twitter"></a></li>
				<li><a href="http://pinterest.com/bemygirl/" target="_blank" class="pinterest"></a></li>
				<li><a href="https://vimeo.com/bemygirl" target="_blank" class="vimeo"></a></li>
				<li><a href="http://news.bemygirl.ch/" class="tumblr" target="_blank"></a></li>
				<li><a href="https://www.facebook.com/BemyGirl.ch" class="facebook" target="_blank"></a></li>
			</ul>
		</div>

		<div class="pop-mensajes">
			<div class="notice-body"></div>
			<div class="notice-bottom"></div>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>