<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Clark-Lindsey
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php

	wp_head();

?></head>
<body <?php body_class(); ?>>
<div class="main_container">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'clark-lindsey' ); ?></a>

	<header class="header">
		<div class="container">
			<div class="logo">
				<a href="<?php bloginfo('url'); ?>/" class="logolink"></a>
			</div>
			<div class="description mobile"><?php bloginfo('description'); ?></div>
			<div class="cs_logos">
				<a href="<?php echo network_site_url( '/village' ); ?>" class="othersmed">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_vl_med.jpg" class="logo_vl_med" />
				</a>
				<a href="<?php echo network_site_url( '/meadowbrook' ); ?>"class="othersmed">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_mb_med.jpg" class="logo_mb_med" />
				</a>
				<a href="<?php echo network_site_url( '/renewal' ); ?>"class="othersmed">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_rn_med.jpg" class="logo_rn_med" />
				</a>
			</div>
			<div class="header_links"><?php

				if ( ! is_home() || ! is_front_page() ) {

					?><div class="fontsize"><?php chgfontsize_display_options(); ?></div><?php
				}

				get_template_part( 'menus/menu', 'work' );

				?><div class="facebook"><a href="http://www.facebook.com/ClarkLindseyVillage/" class="facebook"></a></div>
			</div>
			<div class="description"><?php bloginfo('description'); ?></div>
		</div><!-- .container -->
	</header><?php

	get_template_part( 'menus/menu', 'primary' );

	?><div class="cs_content">
