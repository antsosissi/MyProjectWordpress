<?php

global $bondy_options;
global $wp;
$menuHeader = Cmenu::get_menu("MenuHeader");
$lienContact = Cmenu::get_menu("LienContact");

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="x-ua-compatible" content="IE=edge">
<title><?php
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
    echo ' | ' . sprintf( __( 'Page %s', 'bondy' ), max( $paged, $page ) );

  ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<**?php bloginfo( 'stylesheet_url' ); ?>" /> -->

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri();?>/assets/css/critical.css" media="all" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri();?>/assets/css/main.css" media="no" onload="if(media!='all')media='all'" />
<noscript>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/main.css" >
</noscript>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- favicon -->
<link rel="icon" href="<?php if($bondy_options['favicon'] == null){echo get_template_directory_uri() ?>/favicon.ico"<?php } else { echo $bondy_options['favicon']; } ?> />

    <?php
  /* We add some JavaScript to pages with the comment form
   * to support sites with threaded comments (when in use).
   */
  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  /* Always have wp_head() just before the closing </head>
   * tag of your theme, or you will break many plugins, which
   * generally use this hook to add elements to <head> such
   * as styles, scripts, and meta tags.
   */
  wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed">
    <div id="layer-loader">
        <div class="loader">
            <figure>
            <img  src="<?php echo get_template_directory_uri() ."/assets/images/logo-bondy-vh-210.png"; ?>" alt="<?php echo bloginfo(); ?>" >
            </figure>
            <div class="loader-content">
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
            </div>
        </div>
    </div>


    <!-- main content here -->
    <div id="main">