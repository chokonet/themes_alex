<?php get_header(); ?>
	<div class="main_fq border_fq">
		<div id="plecasup">
			<span><?php _e('Magazine', 'bemygirl'); ?></span>
		</div>

		<div class="columna_izq magazine">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

				<div class="container_magazine magazine_a">

					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
					<h2>Bemygirl <?php _e('news', 'bemygirl'); ?> </h2>
					<p id="pie_foto"><?php _e('Photo shoot for', 'bemygirl'); ?> <?php the_author_posts_link(); ?> <?php _e('escort in', 'bemygirl'); ?> Cornavin, Genève</p>
					<p id="copy">2013 © bemygirl.ch</p>
					<div class="share"><?php _e('Share', 'bemygirl'); ?></div>

					<div class="box_share">
						<span id="nipple"></span>
						<label><?php _e('Short URL:', 'bemygirl'); ?></label>
						<input type="text" readonly="" value="<?php the_permalink(); ?>">
						<div id="social">
							<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.1375828408.html#_=1376421463272&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fnews.bemygirl.ch%2F&amp;size=m&amp;text=BemyGirl.ch%20%7C%20News%20%7C%20Escort%20in%20Geneve%2C%20Lausanne&amp;url=<?php the_permalink(); ?>" class="twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 90px; height: 20px;"></iframe>
							<iframe class="facebook-like-button" src="http://www.facebook.com/plugins/like.php?href=http://news.bemygirl.ch/post/57775501264/bemygirl-news-photo-shoot-for-vyctoria-escort-in&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;colorscheme=light&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:20px;" allowtransparency="true"></iframe>
						</div>
					</div>

				</div>

			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
		<nav class="main_paging" >

				<div class="prev" class="enabled"><a href="#"><?php _e('Previous', 'bemygirl'); ?></a></div>
				<div class="divider"></div>
				<div class="next"><a href="#"><?php _e('Next', 'bemygirl'); ?></a></div>
		</nav>

		<div class="content_search">
			 <form id="searchForm" action="/search" method="get">
						<input id="searchField" placeholder="Search" type="text" name="q" value="">
					</form>
		</div>

	</div><!-- end #main -->
<?php get_footer(); ?>