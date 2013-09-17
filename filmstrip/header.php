<?php
    if(function_exists('login_user_gm'))
        login_user_gm();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>"> <!-- info del mapa de caracteres lo mas seguro (utf-8)-->
    <title>
        <?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

    ?>
    </title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
    <link rel="alternate" type="application/rss+xml" title="Game master" href="<?php bloginfo('rss2_url')?>"/>

        <?php wp_head();?>
</head>
<body <?php body_class();?> >
<div class="header">
	<div id="palomas"><img src="<?php print IMAGES; ?>/PALOMAS.png"></div>
	<div id="logo"><a href="<?php echo site_url('/'); ?>"> <img src="<?php print IMAGES; ?>/LOGO.png"></a></div>
    <div id="facebookcolor"><a href="https://www.facebook.com/FilmstripClub?ref=hl"target="_blank"><img src="<?php print IMAGES; ?>/iconoface.png"></a></div>
    <div id="twittercolor"><a href="https://twitter.com/FilmstripClub"target="_blank"><img src="<?php print IMAGES; ?>/iconotwit.png"></a></div>
    <div id="icoyou"><a href="#"target="_blank"><img src="<?php print IMAGES; ?>/icoyou.png"></a></div>

</div><!--end header-->

<div class="menu">
	<div id="menu_caja">
    	<a href="<?php echo site_url('servicios'); ?>">
    	<div id="menu_img"><img src="<?php print IMAGES; ?>/menu1.png"></div>
        <div id="menu_ftxt">Servicios</div>
    	</a>
    </div>
    <div id="menu_caja">
    	<a href="<?php echo site_url('category/primicias'); ?>">
    	<div id="menu_img"><img src="<?php print IMAGES; ?>/menu2.png"></div>
        <div id="menu_ftxt">Primicias</div>
        </a>
        </div>
    <div id="menu_caja">
    	<a href="<?php echo site_url('category/trailers'); ?>">
        <div id="menu_img"><img src="<?php print IMAGES; ?>/menu3.png"></div>
        <div id="menu_ftxt">Trailers</div>
    	</a>
        </div>
    <div id="menu_caja">
    	<a href="<?php echo site_url('category/nanometrajes'); ?>">
        <div id="menu_img"><img src="<?php print IMAGES; ?>/menu4.png"></div>
        <div id="menu_ftxt">Nanometrajes</div>
    	</a>
        </div>
    <div id="menu_caja">
    	<a href="<?php echo site_url('category/estrenos'); ?>">
        <div id="menu_img"><img src="<?php print IMAGES; ?>/menu5.png"></div>
        <div id="menu_ftxt">Estrenos</div>
    	</a>
        </div>
     <div id="menu_caja">
    	<a href="#">
        <div id="menu_img"><img src="<?php print IMAGES; ?>/menu6.png"></div>
        <div id="menu_ftxt">Contacto</div>
    	</a>
        </div>
</div>
<!--Contenidos-->
<div class="contenidos">