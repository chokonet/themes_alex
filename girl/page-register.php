<?php get_header();

 ?>
	<div class="main_fq border_fq">

		<div class="iphoneLine soloiPhone"></div>

		<div id="plecasup">
			<span><?php _e('Register', 'bemygirl'); ?></span>
		</div>

		<div class="register_cont">
			<div class="register_col_izq">
				<div class="girl noiPhone">
					<?php $page_sing = get_page_by_path('sign-escort');?>
					<img src="<?php attachment_image_url($page_sing->ID, 'imagen_register '); ?>">
				</div><!-- end .girl -->

				<?php
					$post    = get_page($page_sing->ID);
					$content = apply_filters('the_content', $post->post_content);
					$content = str_replace(']]>', ']]>', $content);
					echo $content;
				?>

				<a href="<?php echo home_url('/sign-escort/'); ?>"><div id="register_escort" class="register_boton soloiPhone"><?php _e('REGISTER', 'bemygirl'); ?></div></a>
			</div>
			<div class="register_col_der">
					<?php $page_account = get_page_by_path('account');?>

				<div class="girl noiPhone">
					<img src="<?php attachment_image_url($page_account->ID, 'imagen_register'); ?>">
				</div><!-- end .girl -->

				<?php
					$post    = get_page($page_account->ID);
					$content = apply_filters('the_content', $post->post_content);
					$content = str_replace(']]>', ']]>', $content);
					echo $content;
				?>

			</div>
			<div class="registerBtnWrap">
				<a href="<?php bloginfo('url'); ?>/sign-escort/"><div id="register_escort" class="register_boton noiPhone"><?php _e('REGISTER', 'bemygirl'); ?></div></a>
				<a href="<?php bloginfo('url'); ?>/account/"><div id="register_account" class="register_boton register_right"><?php _e('REGISTER', 'bemygirl'); ?></div></a>
			</div>
		</div><!-- register_cont -->

	</div><!-- end #main -->
<?php get_footer(); ?>