
	<div id="sidr">
		<ul>
			<li class="title"><?php _e('Search', 'bemygirl'); ?>
				<ul>
					<li>
						<div class="content_search">
							<form class="forma_buscar" method="get" action="<?php bloginfo('url'); ?>/">
								<input type="submit" value="">
								<input type="search" name="s" value="Enter search keywords..." onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
							</form><!-- forma_buscar boton_barra -->
						</div>
					</li>
				</ul>
			</li>
			<li class="title"><?php _e('Contact', 'bemygirl'); ?>
				<ul>
					<li><a href="<?php bloginfo('url'); ?>/login/"><?php _e('Sign in', 'bemygirl'); ?></a></li>
					<li><a href="<?php bloginfo('url'); ?>/register/"><?php _e('Register', 'bemygirl'); ?></a></li>
					<li class="last"><a href="<?php bloginfo('url'); ?>/contact/">Contact</a></li>
				</ul>
			</li>
			<li class="title"><?php _e('Languages', 'bemygirl'); ?>
				<ul>
					<li><a href="<?php echo SITEURL ?>">English</a></li>
					<li class="last"><a href="<?php echo SITEURL ?>/fr/">Français</a></li>
				</ul>
			</li>
			<li class="title"><?php _e('Menu', 'bemygirl'); ?>
				<ul>
					<li><a href="<?php bloginfo('url'); ?>/advanced-search/"><?php _e('Advanced search', 'bemygirl'); ?></a></li>
					<li><a href="<?php bloginfo('url'); ?>/faq/">FAQ</a></li>
					<li class="last"><a href="#"> <?php _e('Costumer Support', 'bemygirl'); ?></a></li>
				</ul>
			</li>
		</ul>
	</div><!-- sidr -->