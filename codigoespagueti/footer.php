				<?php if(!is_single()) { ?>
				<div class="content-bottom">
					<ul>
						<?php $args = array(
							'type'       => 'post',
							'oderby'     => 'slug',
							'exclude'    => '1,5,13,20',
							'hide_empty' => 0
						);
						$cats_footer= get_categories($args);
						foreach ($cats_footer as $categoria) : ?>
							<li>
								<h5><a rel="nofollow" href="<?php echo bloginfo('url').'/'.$categoria->slug; ?>"><?php echo $categoria->name; ?></a></h5>
								<?php $argsPosts = array(
									'type'           => 'post',
									'posts_per_page' => 2,
									'category'       => $categoria->cat_ID
								);
								$foot_posts = get_posts($argsPosts);
								foreach ($foot_posts as $post) : setup_postdata($post); ?>
									<div class="post-footer">
										<span class="date"><?php echo get_the_date('d.m.y'); ?></span>
										<h6><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h6>
									</div><!-- end .post-footer-->
								<?php endforeach; wp_reset_query(); //termina loop posts ?>
							</li><!-- end category container -->
						<?php endforeach; wp_reset_query(); //termina loop categorías ?>
					</ul>
				</div><!-- end #content-bottom-->
				<?php } ?>
			</div><!-- end #container -->

			<footer>
				<div id="footer">

					<div id="tweet-foot">
						<span><img src="<?php echo bloginfo('template_url'); ?>/images/t.png"></span>
						<div id="caja_prin">
							<?php $mentions = get_tweet_mentions(); ?>
							<?php foreach ( $mentions as $mention ) {
								$tweet = format_twitter_mention_data($mention); ?>
								<div class="caja">
									

										<?php echo $tweet->name .' '. $tweet->user ; ?>
										<?php echo $tweet->time; ?><br/>
										<?php echo $tweet->text; ?>
									
								</div>
							<?php } ?>
						</div><!-- caja_prin -->
					</div><!-- tweet-foot -->
					<div id="fb-foot">
						<div class="fb-like-box" data-href="https://www.facebook.com/codigoespagueticom" data-width="295" data-height="260" data-show-faces="false" data-colorscheme="dark" data-stream="true" data-show-border="false" data-header="false"></div>
					</div>
					<div id="about-foot">
						<a href="<?php bloginfo('url'); ?>"><img src="<?php echo bloginfo('template_url'); ?>/images/logo-foot.png"></a>
						<?php $about = get_page_by_path('about'); ?>
						<p><?php echo $about->post_content; ?></p>

					</div>
				</div>
			</footer>
		</div><!-- end #wrapper -->

		<!-- google plus -->
		<script type="text/javascript">
			window.___gcfg = { lang: 'es-419' };

			(function() {
				var po = document.createElement('script');
					po.type  = 'text/javascript';
					po.async = true;
					po.src   = 'https://apis.google.com/js/plusone.js';

				var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(po, s);
			})();
		</script>
		<?php wp_footer(); ?>
	</body>
</html>