
<?php
$template_url = get_bloginfo('template_url');
?>
		</div><!-- container -->

		<div class="footer">
			<?php if( is_category('capsulas') ): ?>

				<div class="footer_container">
					<div class="pagination">

						<img id="prev_pag" src="<?php echo $template_url; ?>/images/prev_pag_bg.png">
						<?php echo get_pagination_links(); ?>
						<img id="next_pag" src="<?php echo $template_url; ?>/images/next_pag_bg.png">


					</div>
				</div>

			<?php elseif ( is_page('social') ): ?>

				<div class="footer_container">
					<h4>¿Tienes algo que decirnos?</h4>
					<a href="#">
						<div class="comentalo_facebook">
							<p>Coméntalo por facebook</p>
							<img src="<?php echo $template_url; ?>/images/ico_big_facebook.png">
						</div>
					</a>
					<a href="#">
						<div class="comentalo_twitter">
							<p>Coméntalo por twitter</p>
							<img src="<?php echo $template_url; ?>/images/ico_big_twitter.png">
						</div>
					</a>
					<div class="ayuda">
						<a href="#">preguntas</a><span>//</span>
						<a href="#">dudas</a><span>//</span>
						<a href="#"> programas</a><span>//</span>
						<a href="#">tendencias</a><span>//</span>
						<a href="#">loquesea</a>

					</div>
				</div>
			<?php elseif ( is_single() ): ?>

			<?php else: ?>
			<?php get_template_part( 'templates/footer', 'posts' ) ?>
			<?php endif; ?>
		</div><!-- footer -->
		<?php wp_footer(); ?>
	</body>
</html>