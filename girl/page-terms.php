<!DOCTYPE html>
<html style="background: #fff;">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
		<title>BeMyGirl.ch</title>
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/bemygirl.ico" type="image/vnd.microsoft.icon">
		<?php wp_head(); ?>
	</head>

	<body class="terms">

		<div  class="container_terms">
			<h1 class="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo-bmg.png"></h1>

			<?php the_post();


				if ( has_post_thumbnail() ) {
					the_post_thumbnail('imagen_term');
				} else { ?>
					<img src="<?php echo THEMEPATH; ?>/images/terms.jpg" alt="terms"><?php
				} ?>

				<div class="terminos">
					<?php the_content(); ?>
				</div>

				<div class="buttons">
					<a href="#" class="access-yes"></a>
					<a href="http://www.google.com" class="access-no"></a>
				</div>

		</div><!--termina page-container  -->

    <?php wp_footer(); ?>
 </body>
</html>