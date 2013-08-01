		<footer id="peliculaFoot">
			<?php if (qtrans_getLanguage() == 'es') { ?>
				<a href="<?php echo get_home_url() ?>/aviso-privacidad">Aviso de privacidad</a>
			<?php } else if (qtrans_getLanguage() == 'en') { ?>
				<a href="<?php echo get_home_url() ?>/en/aviso-privacidad/">Privacy policy</a>
			<?php } ?>
		</footer>

	</div>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.1.min.js"> </script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bjqs-1.3.min.js"></script>


	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/helpers/jquery.fancybox-media.js"></script>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/funciones.js"> </script>
	<script>
		jQuery(document).ready(function($){

			$('#login-form').on('submit', function (e) {

				e.preventDefault();

				var username  = $('#username').val();
				var userpass = $('#userpass').val();

				var login_trigger = $.ajax({
					type : 'POST',
					url  : '<?php bloginfo('wpurl') ?>/wp-admin/admin-ajax.php',
					data : {
						username : username,
						userpass : userpass,
						action   : 'canana_login'
					},
					dataType : 'json'
				});

				login_trigger.done(function (data) {
					if( typeof(data) === 'object' ){
						location.reload();
					}else{
						$('#login-error').empty().html(data);
					}
				});
			});
		});
	</script>

	<?php wp_footer(); ?>
	</body>

</html>