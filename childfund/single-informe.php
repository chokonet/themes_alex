<?php get_header(); ?>
	
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<h2><?php the_title(); ?></h2>
	
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="350" id="FlashID">
	  <param name="movie" value="<?php echo get_post_meta($post->ID, 'SWF', true); ?>" />
	  <param name="quality" value="high" />
	  <param name="wmode" value="opaque" />
	  <param name="swfversion" value="6.0.65.0" />
	  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
	  <param name="expressinstall" value="<?php bloginfo('template_url'); ?>/js/expressInstall.swf" />
	  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
	  <!--[if !IE]>-->
	  <object data="<?php echo get_post_meta($post->ID, 'SWF', true); ?>" type="application/x-shockwave-flash" width="100%" height="350">
	    <!--<![endif]-->
	    <param name="quality" value="high" />
	    <param name="wmode" value="opaque" />
	    <param name="swfversion" value="6.0.65.0" />
	    <param name="expressinstall" value="<?php bloginfo('template_url'); ?>/js/expressInstall.swf" />
	    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
	    <div>
	      <h4>El contenido de esta página requiere la última versión de Flash player.</h4>
	      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
	    </div>
	    <!--[if !IE]>-->
	  </object>
	  <!--<![endif]-->
	</object>
	<script type="text/javascript">
	swfobject.registerObject("FlashID");
	</script>

	<div id="informe_anual">
	<h2><?php the_title(); ?></h2>
	<a href="<?php echo get_post_meta($post->ID, 'PDF', true); ?>">Descargar PDF</a>
	</div>
	
	<?php endwhile; endif; ?>

<?php get_footer(); ?>