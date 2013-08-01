	<div id="sidebar">

		<!--
		<a href="http://www.smbb.com.mx/GIM2013-Cancun/" title="Fin al abuso" target="_blank" rel="nofollow">
			<img src="<?php echo bloginfo('template_url'); ?>/images/simp3_banner-02ch.jpg" alt="Industrial microorganisms banner" >
		</a>
		-->

		<!--
		<a href="http://www.finalabuso.org" title="Fin al abuso" target="_blank">
			<img src="<?php echo site_url(); ?>/wp-content/uploads/2012/11/MASdineroEducBLANCO_226x128.png" alt="Fin al abuso" rel="nofollow">
		</a>
		-->

		<!-- Acceso a padrinos -->
		<p class="boton grande centered">
			<a href="<?php echo site_url('acceso-padrinos'); ?>">
				Acceso a padrinos
			</a>
		</p>

		<?php /* <p class="boton grande"><a href="<?php echo site_url('acceso-padrinos'); ?>">Acceso a padrinos</a></p> */ ?>

		<!-- <p class="informe-anual">Descarga nuestro boletín Enero 2012</p> -->

		<?php if(is_home()): ?>

		<div id="twit_feed">
			<a class="twitter-timeline" href="https://twitter.com/ChildFundMexico" data-widget-id="342777110122885121">Tweets by @ChildFundMexico</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div><!--/#twit_feed-->

		<!--Facebook like box-->
		<div class="fb-like-box" data-href="http://www.facebook.com/childfundmx" data-width="275" data-show-faces="true" data-stream="true" data-header="true"></div>

		<?php endif; ?>

	</div><!-- end #sidebar -->