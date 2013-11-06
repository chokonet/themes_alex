<?php $object = get_queried_object(); ?>
<div class="nav">
	<ul id="nav">
		<a href="<?php bloginfo('url'); ?>" ><li class="nav_li" id="<?php nav_is('home'); ?>"><?php _e('Home', 'bemygirl'); ?></li></a>
		<a href="<?php bloginfo('url'); ?>/advanced-search/" ><li class="nav_li" <?php if(is_page('advanced-search')):?>id="active"<?php endif; ?>><?php _e('Advanced Search', 'bemygirl'); ?></li></a>
		<?php if(is_author()):?><a href="#>" ><li class="nav_li" id="active" ><?php echo $object->display_name; ?></li></a><?php endif; ?>
		<?php if((is_page('register')) or (is_page('account')) or (is_page('sign-escort'))):?><a href="#>" ><li class="nav_li" id="active" > <?php _e('Registration', 'bemygirl'); ?></li></a><?php endif; ?>
		<?php if(is_page('favorites') ): ?><a href="#" ><li class="nav_li" id="active" > <?php _e('Favorites', 'bemygirl'); ?></li></a><?php endif; ?>
		<a href="<?php bloginfo('url'); ?>/faq/" ><li class="nav_li" <?php if(is_page('faq')):?>id="active"<?php endif; ?> >FAQ</li></a>
		<a href="<?php bloginfo('url'); ?>/magazine/" ><li class="nav_li noiPad" <?php if(is_post_type_archive('magazine')):?>id="active"<?php endif; ?>> <?php _e('Magazine', 'bemygirl'); ?></li></a>
	</ul>
</div>