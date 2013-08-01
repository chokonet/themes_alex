<DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>"> <!-- info del mapa de caracteres lo mas seguro (utf-8)-->
	<title><?php bloginfo('name'); ?><?php wp_title();?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
	<link rel="alternate" type="application/rss+xml" title="Game master" href="<?php bloginfo('rss2_url')?>"/>
		<?php wp_head();?>
</head>
<body <?php body_class();?>>
 <!--contenido-->
<div id="contenido">
<!--header --> 
<div id="header">
    <div id="logo_game"><img src="<?php print IMAGES; ?>/logo_game.png" alt="<?php bloginfo('name'); ?>"></div>
    <div id="h_registrarse"><a href="#"><img src="<?php print IMAGES; ?>/registrarse.png" alt="<?php bloginfo('name'); ?>"></a></div>
    <div id="h_sesion"><img src="<?php print IMAGES; ?>/ini_sesion.png" alt="<?php bloginfo('name'); ?>"></div>
    <div id="h_cface"><img src="<?php print IMAGES; ?>/facebook.png" alt="<?php bloginfo('name'); ?>"></div>
    
    
    <!--buscador-->
    <div id="h_buscador">
        <?php get_search_form(); ?>
    </div><!--end buscador-->


    <div id="h_facebook"><a href="#"><img src="<?php print IMAGES; ?>/fac.png" alt="<?php bloginfo('name'); ?>"></a></div>
    <div id="h_twitter"><a href="#"><img src="<?php print IMAGES; ?>/twit.png" alt="<?php bloginfo('name'); ?>"></a></div>
    <div id="h_youtube"><a href="#"><img src="<?php print IMAGES; ?>/youtube.png" alt="<?php bloginfo('name'); ?>"></a></div>
    

    <div id="header_mnu">
    <?php wp_nav_menu(array('menu'=>'Main','container'=>'nav'));?>
    </div>
</div>

<!--banner-->
<div id="banner_game">
    <img src="<?php print IMAGES; ?>/baner.png" alt="<?php bloginfo('name'); ?>" > 
</div>
<!-- contenidos -->