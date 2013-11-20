<div class="side-general">

	<?php if ( is_single() ): ?>

		<div class="caja_side">

			<ul class="favoritos">
				<li id="noticias" class="select"></li>
				<li id="masgustado" class=""></li>
				<li id="comentado" class=""></li>
				<li id="sopitas" class=""></li>
			</ul>

			<?php get_template_part( 'templates/side', 'ultimas-noticias' ); ?>

			<?php get_template_part( 'templates/side', 'mas-gustados' ); ?>

			<?php get_template_part( 'templates/side', 'mas-comentado' ); ?>

			<?php get_template_part( 'templates/side', 'sopitas-feed' ); ?>

		</div><!-- end caja_side-->

	<?php endif;?>

	<!-- codigo_home -->
	<div id='div-gpt-ad-1378399931388-1' style='width:300px; height:600px;'>
		<script type='text/javascript'>
			googletag.display('div-gpt-ad-1378399931388-1');
		</script>
	</div>

</div><!-- end .side-single -->