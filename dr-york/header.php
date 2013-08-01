<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>DR YORK</title>

	<link rel="icon" type="image/png" href="favicon.png">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.png">

	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

	<script src="<?php echo get_bloginfo('template_url'); ?>/js/player.js"></script>
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/audio/audio-player.js"></script>

	<script type="text/javascript">
		AudioPlayer.setup("<?php echo get_bloginfo('template_url');?>/js/audio/player.swf", {
			width: 80,
			transparentpagebg: "yes",
		});
	</script>

	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-38455009-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	</script>
</head>

<body>

<?php $lang = qtrans_getLanguage(); ?>

<div id="container">
	<div id="header">
		<div class="logo">
			<a href="<?php echo home_url('/'); ?>">
				<img src="<?php echo get_bloginfo('template_url'); ?>/images/dryorklogo2.png" alt="dryorklogo" width="71" height="87"/>
			</a>
		</div><!-- logo -->

		<ul id="social">
			<li class="twitter">
				<?php if ( $lang == 'es' ){ ?>
					<a href="https://twitter.com/dr_york" target="_blank">
				<?php } else { ?>
					<a href="https://twitter.com/dryorkla" target="_blank">
				<?php } ?>
					<img src="<?php echo get_bloginfo('template_url'); ?>/images/twitter.png" alt="twitter" width="28" height="27"/>
				</a>
			</li>

			<li class="facebook">

				<?php if ( $lang == 'es' ){ ?>
					<a href="https://www.facebook.com/AnteojeriaDrYork" target="_blank">
				<?php } else { ?>
					<a href="https://www.facebook.com/dryorkspectaclemaker" target="_blank">
				<?php } ?>
					<img src="<?php echo get_bloginfo('template_url'); ?>/images/facebook.png" alt="facebook" width="13" height="27" />
				</a>
			</li>
			<li class="instagram">
				<a href="http://instagram.com/dryork" target="_blank">
					<img src="<?php echo get_bloginfo('template_url'); ?>/images/instagram.png" alt="instagram" width="28" height="27" />
				</a>
			</li>
		</ul><!-- social -->
	</div><!-- header -->

	<div id="aside">
		<div id="nav">
			<ul>
				<li class="home"><a href="<?php echo qtrans_convertURL( home_url('/') ); ?>"> <?php echo ( $lang == 'es' ) ? 'inicio' : 'home'; ?></a><br>*</li>
				<li class="gente"><a href="<?php echo qtrans_convertURL( home_url('/se-trata-de-la-gente/') ); ?>"><?php echo ( $lang == 'es' ) ? 'se trata de la gente' : "it's about the people"; ?></a><br>*</li>
				<li class="quienes"><a href="<?php echo qtrans_convertURL( home_url('/quienes/') ); ?>"><?php echo ( $lang == 'es' ) ? 'quienes somos' : 'about us'; ?></a><br>*</li>
				<li class="contacto"><a href="<?php echo qtrans_convertURL( home_url('/contacto/') );?>"><?php echo ( $lang == 'es' ) ? 'contacto' : 'contact'; ?></a><br>*</li>
				<li class="blog"><a href="<?php echo qtrans_convertURL( home_url('/blog/') ); ?>"><?php echo ( $lang == 'es' ) ? 'blog / novedades' : 'blog / newspress'; ?></a><br>*</li>
				<li class="prensa"><a href="<?php echo qtrans_convertURL( home_url('/prensa/') );?> "> <?php echo ( $lang == 'es' ) ? 'prensa' : 'press'; ?></a><br>*</li>
			</ul>
		</div><!-- nav -->
	</div><!-- aside -->

	<div id="ver_video">
		<p><?php echo ( $lang == 'es' ) ? 'Ver video' : 'Watch Video'; ?></p>
		<ul>
			<li class="lang-en <?php echo ( $lang == 'es' ) ? '' : 'active'; ?> ">
				<a href="<?php echo home_url('/en/'); ?>" hreflang="en" title="English">
					<span>English</span>
				</a>
			</li>
			<li class="lang-es <?php echo ( $lang == 'es' ) ? 'active' : ''; ?>">
				<a href="<?php echo home_url('/'); ?>" hreflang="es" title="Español">
					<span>Español</span>
				</a>
			</li>
		</ul>

	</div><!-- ver_video -->

	<div id="video" class="video_escondido">
		<div id="cerrar_video">X</div>

		<!-- <iframe id="ytplayer" width="853" height="480" src="http://www.youtube.com/embed/mhYs6OhgYPo" frameborder="0" allowfullscreen></iframe> -->
		<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->

		<div id="player"></div>
		<div id="negro"></div>



		<script>
			// 2. This code loads the IFrame Player API code asynchronously.
			var tag = document.createElement('script');
			tag.src = "//www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			// 3. This function creates an <iframe> (and YouTube player)
			//	 after the API code downloads.
			var player;
			function onYouTubeIframeAPIReady() {
				player = new YT.Player('player', {
				 height: '480',
				 width: '853',
				 videoId: 'mhYs6OhgYPo',
				 events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				 }
				});
			}

			// 4. The API will call this function when the video player is ready.
			function onPlayerReady(event) {
				//event.target.playVideo();
			}

			// 5. The API calls this function when the player's state changes.
			//	 The function indicates that when playing a video (state=1),
			//	 the player should play for six seconds and then stop.
			var done = false;
			function onPlayerStateChange(event) {
			}

		</script>

	</div><!-- video -->