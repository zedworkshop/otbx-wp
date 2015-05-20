<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js full-height">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico">

    <!-- SEO -->
    <meta name="description" content="Old Town Beer Exchange (OTBX) is a craft beer and wine store located in the Quigley Entertainment District in Downtown Huntsville, Alabama.">

    <!-- Social: Facebook / Open Graph -->
    <meta property="fb:admins" content="503386332"/>
    <meta property="fb:admins" content="574394256"/>
    <meta property="fb:app_id" content="1407866092842844">
    <meta property="og:url" content="http://otbxhsv.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Old Town Beer Exchange">
    <meta property="og:image" content="http://otbxhsv.com/images/fb.png"/>
    <meta property="og:description" content="OTBX is a beer and wine retailer in downtown Huntsville, AL. We exist to cultivate the craft beer and wine snob that exists in all of us.">
    <meta property="og:site_name" content="[OTBX] Old Town Beer Exchange">
    <meta property="article:publisher" content="https://www.facebook.com/zedworkshop">

    <!-- Social: Google+ / Schema.org  -->
    <meta itemprop="name" content="Old Town Beer Exchange">
    <meta itemprop="description" content="Old Town Beer Exchange (OTBX) is a craft beer and wine store located in the Quigley Entertainment District in Downtown Huntsville, Alabama.">
    <meta itemprop="image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fb.png">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<script src="//use.typekit.net/xlj7cxc.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class('full-height'); ?>>

	<div class="[ clearfix full-height ] wrapper">

		<?php if(is_front_page()) : ?>
		<header class="[ sm-col sm-col-5 full-height ] [ sm-flex flex-column ] siteheader" role="banner">
		<?php else: ?>
		<header class="[ sm-col sm-col-4 full-height ] [ sm-flex flex-column ] siteheader" role="banner">
		<?php endif; ?>

			<div class="[ center p2 full-width ] site-branding">
				<a class="[ ] logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="<?php bloginfo( 'name' ); ?> logo" src="<?php echo  get_template_directory_uri(); ?>/img/logo.png" /></a>
				<!-- <button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button> -->
			</div><!-- .site-branding -->

			<nav class="[ clearfix mb2 ] main-navigation">
				<?php
				if ( has_nav_menu( 'primary' ) ) :

					// Primary navigation menu.
					$cleanermenu = wp_nav_menu([
						'theme_location' 	=> 'primary',
					  	'container'       	=> false,
					  	'items_wrap' 		=> '%3$s',
					  	'depth'           	=> 0,
					  	'echo'				=> false
					]);

					// Find the closing bracket of each li and the opening of the link, then all instances of "li"
					$find = ['><a', 'li'];

					// Replace the former with nothing (a.k.a. delete) and the latter with "a"
					$replace = ['', 'a'];

					echo str_replace( $find, $replace, $cleanermenu );

				endif;
				?>
			</nav>
			<!-- .main-navigation -->

			<div class="[ full-width px2 ] contact">
				<div class="clearfix">
					<p class="[ col-right col-4 right-align ] [ sm-col-12 sm-center ] small white">M - W  11am - 9pm<br />Th - S  11am - 10pm<br />Closed Sunday</p>
					<p class="[ col col-4 ] [ sm-col-12 sm-center ] small white">301 Holmes Ave <br />Huntsville, Alabama 35801</p>
				</div>
			</div>

		</header><!-- .site-header -->

		<?php if(is_front_page()) : ?>
		<main class="[ sm-col sm-col-7 ] [ full-height relative ] main" role="main" id="main">
		<?php else: ?>
		<main class="[ sm-col sm-col-8 lg-col-8 xl-col-6 ] [ bg-white shadowed full-height relative py2 ] main" role="main">
		<?php endif; ?>

			<div class="[ full-width p2 left-0 top-0 ] tagline">
				<div class="clearfix">
					<p class="[ caps small gray center bold mb0 ]">Southern &times; Craft &times; Culture</p>
				</div>
			</div>

