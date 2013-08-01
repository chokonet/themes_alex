<?php get_header(); ?>

	<h2>Informe anual</h2>
	
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="350" id="FlashID">
	  <param name="movie" value="/files/informe_anual_2010.swf" />
	  <param name="quality" value="high" />
	  <param name="wmode" value="opaque" />
	  <param name="swfversion" value="6.0.65.0" />
	  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
	  <param name="expressinstall" value="/Scripts/expressInstall.swf" />
	  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
	  <!--[if !IE]>-->
	  <object data="/files/informe_anual_2010.swf" type="application/x-shockwave-flash" width="100%" height="350">
	    <!--<![endif]-->
	    <param name="quality" value="high" />
	    <param name="wmode" value="opaque" />
	    <param name="swfversion" value="6.0.65.0" />
	    <param name="expressinstall" value="/Scripts/expressInstall.swf" />
	    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
	    <div>
	      <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
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
	<h2>Informe anual 2010</h2>
	<a href="/files/pdf/informe_anual_2010.pdf">Descargar PDF</a>
	</div>

<?php get_footer(); ?>