<!doctype html>
<?php
	$objeto = get_queried_object();
	$na     = isset( $objeto->name) ? $objeto->name : false;
	$res    = isset( $objeto->post_type) ? $objeto->post_type : false; ?>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_url'); ?>">

		<?php /* BANNERS */ ?>
		<?php /* BANNERS VIEJOS
		<script type='text/javascript'>
			var googletag = googletag || {};
			googletag.cmd = googletag.cmd || [];
			(function() {
				var gads = document.createElement('script');
				gads.async = true;
				gads.type = 'text/javascript';
				var useSSL = 'https:' == document.location.protocol;
				gads.src = (useSSL ? 'https:' : 'http:') +
				'//www.googletagservices.com/tag/js/gpt.js';
				var node = document.getElementsByTagName('script')[0];
				node.parentNode.insertBefore(gads, node);
			})();
		</script>


		<script type='text/javascript'>
			googletag.cmd.push(function() {
				googletag.defineSlot('/9262827/codigo_home', [300, 600], 'div-gpt-ad-1374362520645-0').addService(googletag.pubads());
				googletag.pubads().enableSingleRequest();
				googletag.enableServices();
			});
		</script>
		*/?>

			<script type='text/javascript'>
				(function() {
				var useSSL = 'https:' == document.location.protocol;
				var src = (useSSL ? 'https:' : 'http:') +
				'//www.googletagservices.com/tag/js/gpt.js';
				document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
				})();
			</script>

			<script type='text/javascript'>
				googletag.defineSlot('/9262827/cod_home_3_970x90', [970, 90], 'div-gpt-ad-1378399931388-0').addService(googletag.pubads());
				googletag.defineSlot('/9262827/codigo_home', [300, 600], 'div-gpt-ad-1378399931388-1').addService(googletag.pubads());
				googletag.pubads().enableSyncRendering();
				googletag.pubads().enableSingleRequest();
				googletag.enableServices();
			</script>

		<?php /* END  BANNERS */ ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="fb-root"></div>

			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=562472433795086";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

			<div id="wrapper">

				<?php if(!is_single()) : ?>

					<section id="noticiero-head">
						<ul id="lista-noticiero-head">
							<?php
								$args = array(
									'posts_per_page' => 4,
									'post_type' => 'post',
									'meta_key' => 'noticiero',
									'meta_value' => 'true'
									);
								$noticiasHead = get_posts($args);
								foreach ($noticiasHead as $post): setup_postdata($post); ?>
							<li class="noticia-noticiero-head">
								<span class="date"><?php echo get_the_date('d.m.y'); ?> | <?php the_category(' - ', $post->ID); ?></span>
								<h4><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
							</li>
							<?php endforeach; wp_reset_query(); ?>
						</ul>
					</section><!-- end #noticiero-head -->

				<?php endif; ?>


				<header>

					<div id="header" class="<?php if($objeto) echo $objeto->slug; ?>">

						<div id="header-top">

							<div id="logo">
								<h1><a href="<?php echo bloginfo('url'); ?>">Código Espagueti</a></h1>
							</div><!-- end #logo -->

							<div id="redes">
								<ul>
									<li><a href="http://facebook.com/SomosEspagueti" target="_blank" id="facebook">Facebook</a></li>
									<li><a href="http://twitter.com/SomosEspagueti" target="_blank" id="twitter">twitter</a></li>
									<li><a href="http://codigoespagueti.com/rss" target="_blank" id="rss">rss</a></li>
								</ul>
							</div><!-- end #redes -->

							<div id="busqueda">

								<span id="search">search</span>

								<span id="searcho">searcho</span>
								<div id="bus">
									<form id="form_busqueda"  method="get" action="<?php echo home_url('/'); ?>">
										<input type="text" id="search-input" name="s" value=" Buscar" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" placeholder="<?php esc_attr_e( '' ); ?>">
										<input type="submit">
								    </form><!-- form_busqueda -->
							    </div><!-- end busqueda-->
						    </div>

						</div><!-- end #header-top -->

						<nav>
							<div id="nav">
								<ul>

									<li><a href="<?php echo bloginfo('url'); ?>/tecnologia" class="<?php if ($na == 'Tecnología'): echo 'select'; endif;  ?>">Tecnología</a></li>
									<li><a href="<?php echo bloginfo('url'); ?>/internet" class="<?php if ($na == 'Internet'): echo 'select'; endif;  ?>">Internet</a></li>
									<li><a href="<?php echo bloginfo('url'); ?>/innovacion" class="<?php if ($na == 'Innovación'): echo 'select'; endif;  ?>">Innovación</a></li>

									<li><a href="<?php echo bloginfo('url'); ?>/videojuegos" class="<?php if ($na == 'Videojuegos'): echo 'select'; endif;  ?>">Videojuegos</a></li>
									<li><a href="<?php echo bloginfo('url'); ?>/ciencia" class="<?php if ($na == 'Ciencia'): echo 'select'; endif;  ?>">Ciencia</a></li>
									<li><a href="<?php echo bloginfo('url'); ?>/cultura" class="<?php if ($na == 'Cultura'): echo 'select'; endif;  ?>">Cultura</a></li>
									<li><a href="<?php echo bloginfo('url'); ?>/opinion" class="<?php if ($na == 'Opinión'): echo 'select'; endif;  ?>">Opinión</a></li>
									<li><a href="<?php echo bloginfo('url'); ?>/resenas" class="<?php if (($na == 'resenas') or ($res == 'resenas')): echo 'select'; endif;  ?>">Reseñas</a></li>
								</ul>
							</div><!-- end #nav -->
						</nav>

						<?php if(is_home()) : ?>

							<div id="tweet-ticker">

								<a id="pajarito" href="http://twitter.com/SomosEspagueti"><img src="<?php echo bloginfo('template_url'); ?>/images/tweet-ticker.png"></a>
								<ul id="tweets">
									<?php $tweets = get_transient_tweet(); ?>
									<?php foreach ($tweets as $index => $tweet) { ?>
										<li>
											<span class="timer"><?php echo parseTweetDate($tweet->created_at); ?></span>
											<p><?php echo parseLinks($tweet->text); ?></p>
										</li>
									<?php } ?>
								</ul>

							</div><!-- end #tweet-ticker -->

						<?php endif; ?>

					</div><!-- end #header -->

				</header>

			<div id="container">