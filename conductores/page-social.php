<?php get_header(); ?>

		<div class="columna_izq">
			<div id="logo"></div>
			<div class="image_conductore"><img src="<?php bloginfo('template_url'); ?>/images/img_main.png"></div>
			<div class="encuentranos">
				<h4>Encuéntranos en</h4>
				<a href=""><img id="facebook" src="<?php bloginfo('template_url'); ?>/images/ico_big_facebook.png"></a>
				<a href="https://twitter.com/PMCanal5Oficial" target='_blank'><img id="twitter" src="<?php bloginfo('template_url'); ?>/images/ico_big_twitter.png"></a>
				<p id="facebook_url">fb.me/PMCanal5Oficial</p>
				<a href='https://twitter.com/PMCanal5Oficial' target='_blank'><p id="twitter_url">@PMCanal5Oficial</p></a>

				<div class="hashtag_conductores">
					<?php $twitters = get_option('twitter_info'); $index = 0;
					foreach ($twitters as $twitter) :
						$class = ($index % 2) ? 'verde' : 'rosa';
						echo "<a href='https://twitter.com/$twitter' target='_blank'><h2 class='$class'>@$twitter</h2></a>";
					$index++; endforeach; ?>
				</div>
			</div>

			<div class="trending">Trending</div>
			<!--hashtag-->
			<div class="hashtag">
				<?php $hashtags = get_option('twitter_hash');
					foreach ($hashtags as $hashtag) :
						echo "<a href='https://twitter.com/#$hashtag' target='_blank'><h2>#$hashtag</h2></a>";
					endforeach; ?>
			</div>
			<!--end hashtag-->
		</div><!--columna izq-->

		<?php get_sidebar(); ?>

	</div><!-- main -->

<?php get_footer(); ?>